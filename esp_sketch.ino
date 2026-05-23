/**
 * Smart Inkubator ESP8266 & ESP32 Code - Versi Online (Production)
 * 
 * Program ini dikonfigurasi langsung untuk mengirim data sensor ke server online:
 * Domain: app.incusmart.site
 * Port: 80
 */

#include <Wire.h>
#include <LiquidCrystal_I2C.h>
#include <DHT.h>
#include <Servo.h>

// Auto-detect & include library WiFi & HTTP sesuai arsitektur board (ESP8266 / ESP32)
#if defined(ESP8266)
  #include <ESP8266WiFi.h>
  #include <ESP8266HTTPClient.h>
  #include <WiFiClient.h>
  #include <WiFiClientSecure.h>
#elif defined(ESP32)
  #include <WiFi.h>
  #include <HTTPClient.h>
#endif

// LCD I2C (SDA = D4, SCL = D3)
LiquidCrystal_I2C lcd(0x27, 16, 2);

#define DHTPIN D5
#define DHTTYPE DHT11
DHT dht(DHTPIN, DHTTYPE);

#define RELAY D6
#define BUZZER D7
#define SERVO_PIN D2

// =========================================================================
// 1. KONFIGURASI WIFI & SERVER ONLINE (PRODUCTION)
// =========================================================================
const char* ssid          = "Smart Egg Incubator";
const char* password      = "mihumihu0";

// Server online tujuan
const char* serverHost    = "app.incusmart.site";
const int serverPort      = 80;
const char* apiEndpoint   = "/api/sensor";

// API Key (Harus sesuai dengan ESP_API_KEY di file .env server online Anda)
const char* apiKey        = "pitik_secure_key_2026";

// Kode Inkubator terdaftar (Harus sudah terdaftar di database online Anda)
const char* incubatorCode = "INC-001X"; 

Servo myServo;

// =========================================================================
// TIMER & STATE MANAGEMENT
// =========================================================================
// 14.400.000 ms = 4 Jam (Timer putaran servo)
const unsigned long servoInterval = 14400000; 
unsigned long previousServoMillis = 0;

// LCD & Baca Sensor lokal (Setiap 2 Detik)
unsigned long prevLcdMillis = 0;
const unsigned long lcdInterval = 2000; 

// Pengiriman data periodik ke Server (Setiap 3 Menit)
unsigned long prevSendMillis = 0;
const unsigned long sendInterval = 180000; 

// Menyimpan state terakhir untuk keperluan deteksi perubahan & pengiriman
float lastSuhu = 0.0;
float lastKelembapan = 0.0;
String lampStatus = "menyala";       // State awal lampu
String lastLampStatus = "";          // Menyimpan state lampu sebelumnya untuk real-time update
bool initialSendDone = false;        // Status pengiriman data awal saat startup

// =========================================================================
// FUNGSI PENGIRIMAN DATA HTTP POST
// =========================================================================
void sendDataToServer(float suhu, float kelembapan, String currentLamp, String turningStatus) {
  if (WiFi.status() == WL_CONNECTED) {
    // Menyusun URL Server Online secara dinamis dan aman
    String serverPath = "";
    if (serverPort == 443) {
      serverPath = "https://" + String(serverHost) + String(apiEndpoint);
    } else if (serverPort == 80) {
      serverPath = "http://" + String(serverHost) + String(apiEndpoint);
    } else {
      serverPath = "http://" + String(serverHost) + ":" + String(serverPort) + String(apiEndpoint);
    }

    Serial.print("[HTTP] Menghubungkan ke: ");
    Serial.println(serverPath);

    #if defined(ESP8266)
      WiFiClient client;
      WiFiClientSecure clientSecure;
      HTTPClient http;

      if (serverPort == 443) {
        clientSecure.setInsecure(); // Mengabaikan verifikasi SSL untuk kemudahan koneksi
        http.begin(clientSecure, serverPath);
      } else {
        http.begin(client, serverPath);
      }
    #elif defined(ESP32)
      HTTPClient http;
      http.begin(serverPath);
    #endif

    // Header HTTP
    http.addHeader("Content-Type", "application/json");
    http.addHeader("X-API-KEY", apiKey); // Autentikasi API Key Server

    // Membuat JSON Payload secara manual (cepat & bebas dependency library tambahan)
    String jsonPayload = "{\"incubator_code\":\"" + String(incubatorCode) + "\""
                       + ",\"temperature\":" + String(suhu, 1)
                       + ",\"humidity\":" + String(kelembapan, 0)
                       + ",\"lamp_status\":\"" + currentLamp + "\""
                       + ",\"turning_status\":\"" + turningStatus + "\"}";

    Serial.print("[HTTP] Mengirim data: ");
    Serial.println(jsonPayload);

    int httpResponseCode = http.POST(jsonPayload);

    if (httpResponseCode > 0) {
      String response = http.getString();
      Serial.print("[HTTP] Selesai! Kode Respon: ");
      Serial.println(httpResponseCode);
      Serial.print("[HTTP] Balasan Server: ");
      Serial.println(response);

      // Logika debugging untuk mempermudah analisa error
      if (httpResponseCode == 200) {
        Serial.println("[HTTP] Sukses: Data berhasil disimpan ke database online!");
      } else if (httpResponseCode == 401) {
        Serial.println("[HTTP] Error 401: API Key salah atau tidak cocok dengan .env server online!");
      } else if (httpResponseCode == 422) {
        Serial.println("[HTTP] Error 422: Validasi gagal. Pastikan Kode Inkubator terdaftar di DB online!");
      } else if (httpResponseCode == 500) {
        Serial.println("[HTTP] Error 500: Terjadi error internal di server online.");
      }
    } else {
      Serial.print("[HTTP] Gagal terhubung ke Server Online. Error: ");
      Serial.println(http.errorToString(httpResponseCode).c_str());
      Serial.println("[TIPS] Cek koneksi internet Wi-Fi Anda atau apakah domain server sedang aktif.");
    }

    http.end();
  } else {
    Serial.println("[HTTP] Gagal mengirim! WiFi terputus.");
  }
}

void setup() {
  Wire.begin(D4, D3);
  
  lcd.begin(16, 2);
  lcd.backlight();

  Serial.begin(115200);
  dht.begin();

  pinMode(RELAY, OUTPUT);
  pinMode(BUZZER, OUTPUT);

  myServo.attach(SERVO_PIN);
  myServo.write(0);

  // KONDISI AWAL
  digitalWrite(RELAY, HIGH);
  digitalWrite(BUZZER, LOW);

  lcd.setCursor(3, 0);
  lcd.print("Smart Egg");
  lcd.setCursor(0, 1);
  lcd.print("Incubator Ready");
  delay(2000);
  lcd.clear();

  // KONEKSI WIFI
  lcd.setCursor(0, 0);
  lcd.print("Connecting WiFi");
  Serial.print("Menghubungkan ke WiFi: ");
  Serial.println(ssid);

  WiFi.begin(ssid, password);
  
  // Set auto-reconnect di latar belakang
  #if defined(ESP8266)
    WiFi.setAutoReconnect(true);
  #elif defined(ESP32)
    WiFi.setAutoReconnect(true);
  #endif

  int attempts = 0;
  while (WiFi.status() != WL_CONNECTED && attempts < 20) {
    delay(500);
    Serial.print(".");
    lcd.setCursor(attempts % 16, 1);
    lcd.print(".");
    attempts++;
  }
  
  lcd.clear();
  if (WiFi.status() == WL_CONNECTED) {
    Serial.println("\n[WiFi] Terhubung!");
    Serial.print("[WiFi] IP Address: ");
    Serial.println(WiFi.localIP());
    lcd.setCursor(0, 0);
    lcd.print("WiFi Connected!");
    lcd.setCursor(0, 1);
    lcd.print(WiFi.localIP().toString());
  } else {
    Serial.println("\n[WiFi] Koneksi Gagal (Timeout). Masuk Mode Offline.");
    lcd.setCursor(0, 0);
    lcd.print("WiFi Timeout!");
    lcd.setCursor(0, 1);
    lcd.print("Offline Mode");
  }
  delay(2000);
  lcd.clear();
}

void loop() {
  unsigned long currentMillis = millis();

  // ==========================================
  // BACA SENSOR & UPDATE LCD (Tiap 2 Detik Tanpa Delay)
  // ==========================================
  if (currentMillis - prevLcdMillis >= lcdInterval) {
    prevLcdMillis = currentMillis;

    float suhu = dht.readTemperature();
    float kelembapan = dht.readHumidity();

    if (isnan(suhu) || isnan(kelembapan)) {
      lcd.setCursor(0, 0);
      lcd.print("Sensor Error    ");
      Serial.println("[Sensor] Gagal membaca DHT11!");
    } else {
      // Simpan nilai sensor terakhir yang valid
      lastSuhu = suhu;
      lastKelembapan = kelembapan;

      // ======================
      // KONTROL RELAY (TRIK INPUT MODE)
      // ======================
      if (suhu >= 38.5) {
        // Jika suhu panas, ubah pin jadi INPUT untuk mematikan relay total
        pinMode(RELAY, INPUT); 
        lampStatus = "mati";
      } 
      else if (suhu <= 37.5) {
        // Jika dingin, kembalikan ke OUTPUT dan set LOW untuk menyalakan
        pinMode(RELAY, OUTPUT);
        digitalWrite(RELAY, LOW);
        lampStatus = "menyala";
      }

      // [FITUR REAL-TIME EVENT]
      // Jika status lampu/relay berubah seketika, langsung kirim data ke server
      if (lastLampStatus != "" && lastLampStatus != lampStatus) {
        Serial.println("[EVENT] Status Lampu berubah! Mengirim update...");
        sendDataToServer(suhu, kelembapan, lampStatus, "menunggu");
      }
      lastLampStatus = lampStatus;

      // [PENGIRIMAN PERDANA]
      // Kirim data sesaat setelah sensor pertama kali berhasil dibaca dan WiFi terhubung
      if (!initialSendDone && WiFi.status() == WL_CONNECTED) {
        Serial.println("[INIT] Mengirim data awal pertama kali...");
        sendDataToServer(suhu, kelembapan, lampStatus, "menunggu");
        initialSendDone = true;
        prevSendMillis = currentMillis; // Reset timer periodik
      }

      // ======================
      // KONTROL BUZZER (ALARM BAHAYA)
      // ======================
      if (suhu < 37.5 || suhu > 38.5 || kelembapan < 55 || kelembapan > 70) {
        digitalWrite(BUZZER, HIGH);
      } else {
        digitalWrite(BUZZER, LOW);
      }

      // ======================
      // TAMPILAN LCD (Tanpa lcd.clear() agar tidak flicker/berkedip)
      // ======================
      lcd.setCursor(0, 0);
      lcd.print("Suhu: ");
      lcd.print(suhu, 1);
      lcd.print((char)223);
      lcd.print("C   "); 

      lcd.setCursor(0, 1);
      lcd.print("Kelembaban: ");
      lcd.print(kelembapan, 0);
      lcd.print("%   ");

      // SERIAL MONITOR
      Serial.print("[Sensor] Suhu: "); Serial.print(suhu, 1);
      Serial.print(" C | Kelembaban: "); Serial.print(kelembapan, 0);
      Serial.println(" %");
    }
  }

  // ==========================================
  // PENGIRIMAN DATA PERIODIK (Tiap 3 Menit)
  // ==========================================
  if (currentMillis - prevSendMillis >= sendInterval) {
    prevSendMillis = currentMillis;

    // Pastikan sensor sudah pernah dibaca sebelum mengirim data periodik
    if (lastSuhu != 0.0 && lastKelembapan != 0.0) {
      Serial.println("[PERIODIK] Interval waktu tercapai. Mengirim sensor ke server...");
      sendDataToServer(lastSuhu, lastKelembapan, lampStatus, "menunggu");
    }
  }

  // ==========================================
  // SERVO OTOMATIS (Sistem Pembalik Telur - Tiap 4 Jam)
  // ==========================================
  if (currentMillis - previousServoMillis >= servoInterval) {
    previousServoMillis = currentMillis;

    Serial.println("[SERVO] Memulai pemutaran rak telur otomatis...");
    
    // [FITUR REAL-TIME EVENT] Beri tahu server bahwa rak sedang berputar (Status: "berputar")
    if (lastSuhu != 0.0) {
      sendDataToServer(lastSuhu, lastKelembapan, lampStatus, "berputar");
    }

    // GERAK PELAN 0 -> 180
    for (int pos = 0; pos <= 180; pos++) {
      myServo.write(pos);
      delay(50); // Kecepatan gerak servo
    }

    delay(2000);

    // GERAK PELAN 180 -> 0
    for (int pos = 180; pos >= 0; pos--) {
      myServo.write(pos);
      delay(50);
    }

    Serial.println("[SERVO] Pemutaran rak telur selesai.");
    
    // [FITUR REAL-TIME EVENT] Beri tahu server pemutaran selesai (Status: "selesai")
    if (lastSuhu != 0.0) {
      sendDataToServer(lastSuhu, lastKelembapan, lampStatus, "selesai");
    }
  }
}
