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
                'email' => 'admin@inkubator.test',
                'password' => '2026ceria',
                'role' => 'admin',
                'incubator_code' => null,
            ],
            [
                'name' => 'Admin Kedua',
                'username' => 'admin2',
                'email' => 'admin2@inkubator.test',
                'password' => '2026ceria2',
                'role' => 'admin',
                'incubator_code' => null,
            ],
            [
                'name' => 'User Inkubator 1',
                'username' => 'user',
                'email' => 'user@inkubator.test',
                'password' => 'user123',
                'role' => 'user',
                'incubator_code' => 'INC-001X',
            ],
            [
                'name' => 'User Inkubator 2',
                'username' => 'user2',
                'email' => 'user2@inkubator.test',
                'password' => 'user2123',
                'role' => 'user',
                'incubator_code' => 'INC-002X',
            ],
        ];

        foreach ($accounts as $account) {
            User::updateOrCreate(
                ['email' => $account['email']],
                [
                    'name' => $account['name'],
                    'username' => $account['username'],
                    'password' => Hash::make($account['password']),
                    'role' => $account['role'],
                    'incubator_code' => $account['incubator_code'],
                ]
            );
        }
    }
}
