<?php
// temperature.php – API endpoint for temperature sensor data
// Supports POST to store a reading and GET to retrieve all readings.
// Authentication via X-API-Key header; key defined in config.php.

require_once __DIR__ . '/config.php';

// Helper: send JSON response with status code
function send_response($code, $payload) {
    http_response_code($code);
    header('Content-Type: application/json');
    echo json_encode($payload);
    exit;
}

// Verify API key
$headers = getallheaders();
$apiKey = $headers['X-API-Key'] ?? $headers['x-api-key'] ?? '';
if ($apiKey !== API_KEY) {
    send_response(401, ['error' => 'Unauthorized – invalid API key']);
}

$method = $_SERVER['REQUEST_METHOD'];
$dataFile = __DIR__ . '/../data/temperatures.json';

// Ensure data file exists
if (!file_exists($dataFile)) {
    // Attempt to create the directory if missing
    $dir = dirname($dataFile);
    if (!is_dir($dir)) {
        mkdir($dir, 0755, true);
    }
    file_put_contents($dataFile, json_encode([]));
}

if ($method === 'POST') {
    // Read raw POST body
    $raw = file_get_contents('php://input');
    $json = json_decode($raw, true);
    if (json_last_error() !== JSON_ERROR_NONE) {
        send_response(400, ['error' => 'Invalid JSON payload']);
    }
    // Validate required fields
    $required = ['sensor_id', 'value'];
    foreach ($required as $field) {
        if (!isset($json[$field])) {
            send_response(400, ['error' => "Missing field: $field"]);
        }
    }
    // Optional timestamp – if not provided, use current time
    $json['timestamp'] = $json['timestamp'] ?? time();
    // Load existing data
    $existing = json_decode(file_get_contents($dataFile), true);
    if (!is_array($existing)) {
        $existing = [];
    }
    $existing[] = $json;
    // Write back atomically
    file_put_contents($dataFile, json_encode($existing, JSON_PRETTY_PRINT));
    send_response(200, ['status' => 'success', 'data' => $json]);
} elseif ($method === 'GET') {
    $content = file_get_contents($dataFile);
    $arr = json_decode($content, true);
    if (json_last_error() !== JSON_ERROR_NONE) {
        $arr = [];
    }
    send_response(200, ['readings' => $arr]);
} else {
    send_response(405, ['error' => 'Method not allowed']);
}
?>
