<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $accounts = [
            [
                'name' => 'Admin Utama',
                'username' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => '2026ceria',
                'role' => 'admin',
                'incubator_code' => null,
            ],
            [
                'name' => 'Admin Kedua',
                'username' => 'rae',
                'email' => 'raeunyah@gmail.com',
                'password' => 'adminimup',
                'role' => 'admin',
                'incubator_code' => null,
            ],
        ];

        foreach ($accounts as $account) {
            User::updateOrCreate(
                ['username' => $account['username']], // Menggunakan username sebagai pencarian unik agar tidak bentrok duplicate entry
                [
                    'name' => $account['name'],
                    'email' => $account['email'],
                    'password' => Hash::make($account['password']),
                    'role' => $account['role'],
                    'incubator_code' => $account['incubator_code'],
                ]
            );
        }
    }
}
