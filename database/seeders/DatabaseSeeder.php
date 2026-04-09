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
        // Membuat Akun Administrator
        User::create([
            'name' => 'Super Admin Jalan.In',
            'email' => 'admin@jalanin.com',
            'password' => Hash::make('password'),
            'role' => 'admin', // Menggunakan role 'admin' sesuai migrasi
        ]);

        // Membuat Akun Operator
        User::create([
            'name' => 'Petugas Lapangan',
            'email' => 'operator@jalanin.com',
            'password' => Hash::make('password'),
            'role' => 'operator', // Menggunakan role 'operator' sesuai migrasi
        ]);
    }
}
