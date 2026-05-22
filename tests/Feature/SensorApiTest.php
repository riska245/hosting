<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\SensorData;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Support\Facades\Config;

class SensorApiTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        // Set API Key config manually for testing context
        Config::set('app.esp_api_key', 'test_api_key_123');
    }

    /** @test */
    public function it_fails_if_api_key_is_missing()
    {
        $response = $this->postJson('/api/sensor', [
            'incubator_code' => 'INC-001',
            'temperature' => 38.0,
            'humidity' => 60.0,
            'lamp_status' => 'menyala',
        ]);

        $response->assertStatus(401)
                 ->assertJsonFragment(['message' => 'API Key tidak valid atau tidak disertakan.']);
    }

    /** @test */
    public function it_fails_if_api_key_is_incorrect()
    {
        $response = $this->withHeaders(['X-API-KEY' => 'wrong_key'])
            ->postJson('/api/sensor', [
                'incubator_code' => 'INC-001',
                'temperature' => 38.0,
                'humidity' => 60.0,
                'lamp_status' => 'menyala',
            ]);

        $response->assertStatus(401)
                 ->assertJsonFragment(['message' => 'API Key tidak valid atau tidak disertakan.']);
    }

    /** @test */
    public function it_fails_validation_if_payload_is_invalid()
    {
        $response = $this->withHeaders(['X-API-KEY' => 'test_api_key_123'])
            ->postJson('/api/sensor', [
                // missing incubator_code
                'temperature' => 'not-numeric',
            ]);

        $response->assertStatus(422)
                 ->assertJsonValidationErrors(['incubator_code', 'temperature', 'humidity', 'lamp_status']);
    }

    /** @test */
    public function it_fails_if_incubator_code_is_not_registered()
    {
        $response = $this->withHeaders(['X-API-KEY' => 'test_api_key_123'])
            ->postJson('/api/sensor', [
                'incubator_code' => 'INC-UNREGISTERED',
                'temperature' => 38.0,
                'humidity' => 60.0,
                'lamp_status' => 'menyala',
            ]);

        $response->assertStatus(422)
                 ->assertJsonFragment(['message' => 'Kode inkubator tidak terdaftar']);
    }

    /** @test */
    public function it_succeeds_with_valid_key_header_and_registered_incubator()
    {
        User::create([
            'name' => 'Test User',
            'username' => 'testuser',
            'email' => 'test@example.com',
            'password' => bcrypt('password'),
            'role' => 'user',
            'incubator_code' => 'INC-001'
        ]);

        $response = $this->withHeaders(['X-API-KEY' => 'test_api_key_123'])
            ->postJson('/api/sensor', [
                'incubator_code' => 'INC-001',
                'temperature' => 38.0,
                'humidity' => 60.0,
                'lamp_status' => 'menyala',
                'turning_status' => 'menunggu'
            ]);

        $response->assertStatus(200)
                 ->assertJsonFragment(['message' => 'Data berhasil disimpan']);

        $this->assertDatabaseHas('sensor_data', [
            'incubator_code' => 'INC-001',
            'temperature' => 38.0,
            'humidity' => 60.0,
            'lamp_status' => 'menyala',
            'turning_status' => 'menunggu'
        ]);
    }

    /** @test */
    public function it_succeeds_with_api_key_in_query_params()
    {
        User::create([
            'name' => 'Test User',
            'username' => 'testuser',
            'email' => 'test@example.com',
            'password' => bcrypt('password'),
            'role' => 'user',
            'incubator_code' => 'INC-001'
        ]);

        $response = $this->postJson('/api/sensor?api_key=test_api_key_123', [
            'incubator_code' => 'INC-001',
            'temperature' => 37.8,
            'humidity' => 59.5,
            'lamp_status' => 'menyala',
            'turning_status' => 'menunggu'
        ]);

        $response->assertStatus(200);
        $this->assertDatabaseHas('sensor_data', [
            'incubator_code' => 'INC-001',
            'temperature' => 37.8,
        ]);
    }

    /** @test */
    public function it_succeeds_with_api_key_in_request_body()
    {
        User::create([
            'name' => 'Test User',
            'username' => 'testuser',
            'email' => 'test@example.com',
            'password' => bcrypt('password'),
            'role' => 'user',
            'incubator_code' => 'INC-001'
        ]);

        $response = $this->postJson('/api/sensor', [
            'api_key' => 'test_api_key_123',
            'incubator_code' => 'INC-001',
            'temperature' => 37.8,
            'humidity' => 59.5,
            'lamp_status' => 'menyala',
            'turning_status' => 'menunggu'
        ]);

        $response->assertStatus(200);
        $this->assertDatabaseHas('sensor_data', [
            'incubator_code' => 'INC-001',
            'temperature' => 37.8,
        ]);
    }

    /** @test */
    public function it_protects_latest_sensor_data_route()
    {
        // Without key
        $response = $this->getJson('/api/sensor/latest');
        $response->assertStatus(401);

        // With key
        $response = $this->withHeaders(['X-API-KEY' => 'test_api_key_123'])
            ->getJson('/api/sensor/latest');
        $response->assertStatus(200);
    }
}
