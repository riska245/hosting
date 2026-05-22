<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class AuthTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function guests_can_access_user_login_page()
    {
        $response = $this->get('/login');
        $response->assertStatus(200);
        $response->assertSee('Selamat Datang');
    }

    /** @test */
    public function guests_can_access_user_register_page()
    {
        $response = $this->get('/register');
        $response->assertStatus(200);
        $response->assertSee('Daftar Akun Baru');
    }

    /** @test */
    public function guests_can_access_admin_login_page()
    {
        $response = $this->get('/admin');
        $response->assertStatus(200);
        $response->assertSee('Portal Admin');
    }

    /** @test */
    public function users_can_login_with_correct_credentials()
    {
        $user = User::create([
            'name' => 'User Test',
            'username' => 'usertest',
            'email' => 'user@test.com',
            'password' => Hash::make('password123'),
            'role' => 'user',
            'incubator_code' => 'INC-999',
        ]);

        $response = $this->post('/login', [
            'username' => 'usertest',
            'email' => 'user@test.com',
            'password' => 'password123',
        ]);

        $response->assertRedirect('/dashboard-detail');
        $this->assertEquals(session('login'), true);
        $this->assertEquals(session('role'), 'user');
        $this->assertEquals(session('username'), 'usertest');
        $this->assertEquals(session('incubator_code'), 'INC-999');
    }

    /** @test */
    public function users_cannot_login_with_incorrect_password()
    {
        $user = User::create([
            'name' => 'User Test',
            'username' => 'usertest',
            'email' => 'user@test.com',
            'password' => Hash::make('password123'),
            'role' => 'user',
            'incubator_code' => 'INC-999',
        ]);

        $response = $this->post('/login', [
            'username' => 'usertest',
            'email' => 'user@test.com',
            'password' => 'wrongpassword',
        ]);

        $response->assertSessionHas('error');
        $this->assertNull(session('login'));
    }

    /** @test */
    public function users_can_register_and_are_automatically_logged_in()
    {
        $response = $this->post('/register', [
            'username' => 'newuser',
            'email' => 'newuser@test.com',
            'incubator_code' => 'INC-100X',
            'password' => 'password123',
        ]);

        $response->assertRedirect('/dashboard-detail');
        $response->assertSessionHas('success');

        $this->assertDatabaseHas('users', [
            'username' => 'newuser',
            'email' => 'newuser@test.com',
            'incubator_code' => 'INC-100X',
            'role' => 'user',
        ]);

        $this->assertEquals(session('login'), true);
        $this->assertEquals(session('role'), 'user');
        $this->assertEquals(session('username'), 'newuser');
        $this->assertEquals(session('incubator_code'), 'INC-100X');
    }

    /** @test */
    public function admin_can_login_using_username()
    {
        $admin = User::create([
            'name' => 'Admin Test',
            'username' => 'admintest',
            'email' => 'admin@test.com',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
        ]);

        $response = $this->post('/admin', [
            'username_or_email' => 'admintest',
            'password' => 'admin123',
        ]);

        $response->assertRedirect('/admin-dashboard');
        $this->assertEquals(session('login'), true);
        $this->assertEquals(session('role'), 'admin');
        $this->assertEquals(session('username'), 'admintest');
    }

    /** @test */
    public function admin_can_login_using_email()
    {
        $admin = User::create([
            'name' => 'Admin Test',
            'username' => 'admintest',
            'email' => 'admin@test.com',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
        ]);

        $response = $this->post('/admin', [
            'username_or_email' => 'admin@test.com',
            'password' => 'admin123',
        ]);

        $response->assertRedirect('/admin-dashboard');
        $this->assertEquals(session('login'), true);
        $this->assertEquals(session('role'), 'admin');
        $this->assertEquals(session('username'), 'admintest');
    }

    /** @test */
    public function unauthenticated_users_are_redirected_from_dashboards()
    {
        // User dashboard redirects to /login
        $response = $this->get('/dashboard-detail');
        $response->assertRedirect('/login');

        // Admin dashboard redirects to /admin
        $response = $this->get('/admin-dashboard');
        $response->assertRedirect('/admin');
    }

    /** @test */
    public function user_can_logout()
    {
        $this->withSession([
            'login' => true,
            'user_id' => 1,
            'role' => 'user',
            'username' => 'usertest',
            'email' => 'user@test.com',
        ]);

        $response = $this->post('/logout');
        $response->assertRedirect('/');
        $this->assertNull(session('login'));
    }

    /** @test */
    public function admin_can_access_admin_dashboard_with_paginated_logins()
    {
        $admin = User::create([
            'name' => 'Admin Test',
            'username' => 'admintest',
            'email' => 'admin@test.com',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
        ]);

        for ($i = 1; $i <= 15; $i++) {
            \Illuminate\Support\Facades\DB::table('login_users')->insert([
                'username' => 'user' . $i,
                'email' => 'user' . $i . '@test.com',
                'incubator_code' => 'INC-' . $i,
                'role' => 'user',
                'ip_address' => '127.0.0.1',
                'user_agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)',
                'login_at' => now()->subMinutes(15 - $i),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        $response = $this->withSession([
            'login' => true,
            'user_id' => $admin->id,
            'role' => 'admin',
            'username' => 'admintest',
            'email' => 'admin@test.com',
        ])->get('/admin-dashboard');

        $response->assertStatus(200);
        $response->assertSee('Admin Control Panel');
        $response->assertSee('User Terdaftar');
        $response->assertSee('Riwayat Login Pengguna');
        $response->assertSee('15 catatan');
        $response->assertSee('Sebelumnya');
        $response->assertSee('Berikutnya');
        
        $responsePage2 = $this->withSession([
            'login' => true,
            'user_id' => $admin->id,
            'role' => 'admin',
            'username' => 'admintest',
            'email' => 'admin@test.com',
        ])->get('/admin-dashboard?page=2');

        $responsePage2->assertStatus(200);
        $responsePage2->assertSee('11');
    }
}

