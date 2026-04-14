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
        // Admin (hanya bisa dibuat via seeder, sesuai proposal)
        User::create([
            'name' => 'Admin Utama',
            'email' => 'admin@jalan.in',
            'password' => Hash::make('password'),
            'role' => 'admin',
            'email_verified_at' => now(),
        ]);

        // Sample Operators
        User::create([
            'name' => 'Ahmad Suhendra',
            'email' => 'ahmad.s@jalan.in',
            'password' => Hash::make('password'),
            'role' => 'operator',
            'email_verified_at' => now(),
        ]);

        User::create([
            'name' => 'Siti Aminah',
            'email' => 'siti.a@jalan.in',
            'password' => Hash::make('password'),
            'role' => 'operator',
            'email_verified_at' => now(),
        ]);

        User::create([
            'name' => 'Budi Cahyo',
            'email' => 'budi.c@jalan.in',
            'password' => Hash::make('password'),
            'role' => 'operator',
            'email_verified_at' => now(),
        ]);

        // Sample regular users
        User::create([
            'name' => 'Marcus Aris',
            'email' => 'marcus.aris@jalan.in',
            'password' => Hash::make('password'),
            'role' => 'user',
            'email_verified_at' => now(),
        ]);

        User::create([
            'name' => 'Siti Nurhaliza',
            'email' => 'siti.n@jalan.in',
            'password' => Hash::make('password'),
            'role' => 'user',
            'email_verified_at' => now(),
        ]);
    }
}
