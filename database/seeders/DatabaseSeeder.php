<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Report;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // ===== USERS =====
        // Admin (hanya bisa dibuat via seeder, sesuai proposal)
        $admin = User::create([
            'name' => 'Admin Utama',
            'email' => 'admin@jalan.in',
            'password' => Hash::make('password'),
            'role' => 'admin',
            'email_verified_at' => now(),
        ]);

        // Sample Operators
        $operator1 = User::create([
            'name' => 'Ahmad Suhendra',
            'email' => 'ahmad.s@jalan.in',
            'password' => Hash::make('password'),
            'role' => 'operator',
            'email_verified_at' => now(),
        ]);

        $operator2 = User::create([
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
        $user1 = User::create([
            'name' => 'Marcus Aris',
            'email' => 'marcus.aris@jalan.in',
            'password' => Hash::make('password'),
            'role' => 'user',
            'email_verified_at' => now(),
        ]);

        $user2 = User::create([
            'name' => 'Siti Nurhaliza',
            'email' => 'siti.n@jalan.in',
            'password' => Hash::make('password'),
            'role' => 'user',
            'email_verified_at' => now(),
        ]);

        $user3 = User::create([
            'name' => 'Dina Permata',
            'email' => 'dina.p@jalan.in',
            'password' => Hash::make('password'),
            'role' => 'user',
            'email_verified_at' => now(),
        ]);

        // ===== REPORTS (sample data for testing) =====

        // 1. Status: Dilaporkan (baru, belum ditangani)
        Report::create([
            'user_id' => $user1->id,
            'description' => 'Lubang besar muncul di dekat halte bus, berbahaya bagi pengemudi sepeda motor.',
            'photo_path' => '',
            'latitude' => -6.2150,
            'longitude' => 106.8450,
            'damage_type' => 'Pothole',
            'status' => 'Dilaporkan',
            'created_at' => now()->subHours(2),
        ]);

        // 2. Status: Dilaporkan
        Report::create([
            'user_id' => $user2->id,
            'description' => 'Jalan retak memanjang sepanjang 5 meter di dekat perempatan.',
            'photo_path' => '',
            'latitude' => -6.2200,
            'longitude' => 106.8500,
            'damage_type' => null,
            'status' => 'Dilaporkan',
            'created_at' => now()->subHours(5),
        ]);

        // 3. Status: Disurvey
        Report::create([
            'user_id' => $user1->id,
            'description' => 'Permukaan jalan ambles di depan minimarket, kedalaman sekitar 15cm.',
            'photo_path' => '',
            'latitude' => -6.2088,
            'longitude' => 106.8456,
            'damage_type' => 'Pothole',
            'status' => 'Disurvey',
            'operator_id' => $operator1->id,
            'verified_at' => now()->subHours(3),
            'created_at' => now()->subDay(),
        ]);

        // 4. Status: Diproses (sedang diperbaiki)
        Report::create([
            'user_id' => $user3->id,
            'description' => 'Aspal terkelupas di jalur lambat, area seluas 2x3 meter.',
            'photo_path' => '',
            'latitude' => -6.1951,
            'longitude' => 106.8235,
            'damage_type' => 'Pothole',
            'status' => 'Diproses',
            'operator_id' => $operator1->id,
            'verified_at' => now()->subDays(2),
            'created_at' => now()->subDays(3),
        ]);

        // 5. Status: Diproses
        Report::create([
            'user_id' => $user2->id,
            'description' => 'Keretakan parah di jalan utama dekat sekolah, membahayakan pejalan kaki.',
            'photo_path' => '',
            'latitude' => -6.2350,
            'longitude' => 106.8600,
            'damage_type' => 'Crack',
            'status' => 'Diproses',
            'operator_id' => $operator2->id,
            'verified_at' => now()->subDays(4),
            'created_at' => now()->subDays(5),
        ]);

        // 6. Status: Selesai (sudah diperbaiki)
        Report::create([
            'user_id' => $user1->id,
            'description' => 'Lubang jalan di persimpangan sudah diperbaiki oleh tim dinas PU.',
            'photo_path' => '',
            'latitude' => -6.1750,
            'longitude' => 106.8270,
            'damage_type' => 'Pothole',
            'status' => 'Selesai',
            'operator_id' => $operator1->id,
            'verified_at' => now()->subDays(7),
            'completed_at' => now()->subDays(1),
            'evidence_photo_path' => '',
            'created_at' => now()->subDays(8),
        ]);

        // 7. Status: Tidak Valid (foto bukan kerusakan jalan)
        Report::create([
            'user_id' => $user3->id,
            'description' => 'Foto yang diunggah bukan foto kerusakan jalan.',
            'photo_path' => '',
            'latitude' => -6.2500,
            'longitude' => 106.8800,
            'damage_type' => null,
            'status' => 'Tidak Valid',
            'operator_id' => $operator2->id,
            'rejection_note' => 'Foto tidak menunjukkan kerusakan jalan, melainkan foto pemandangan.',
            'created_at' => now()->subDays(2),
        ]);

        // 8. Status: Dilaporkan (another one)
        Report::create([
            'user_id' => $user2->id,
            'description' => 'Ada genangan air yang tidak surut di jalan, kemungkinan pipa bocor di bawah aspal.',
            'photo_path' => '',
            'latitude' => -6.2300,
            'longitude' => 106.8350,
            'damage_type' => null,
            'status' => 'Dilaporkan',
            'created_at' => now()->subMinutes(30),
        ]);

        // 9. Status: Selesai
        Report::create([
            'user_id' => $user3->id,
            'description' => 'Trotoar rusak di sepanjang jalan menuju stasiun, sudah diperbaiki.',
            'photo_path' => '',
            'latitude' => -6.1850,
            'longitude' => 106.8100,
            'damage_type' => 'Crack',
            'status' => 'Selesai',
            'operator_id' => $operator2->id,
            'verified_at' => now()->subDays(10),
            'completed_at' => now()->subDays(3),
            'evidence_photo_path' => '',
            'created_at' => now()->subDays(12),
        ]);

        // 10. Status: Disurvey
        Report::create([
            'user_id' => $user1->id,
            'description' => 'Lubang kecil di bahu jalan, mulai membesar karena hujan deras kemarin.',
            'photo_path' => '',
            'latitude' => -6.2020,
            'longitude' => 106.8680,
            'damage_type' => 'Pothole',
            'status' => 'Disurvey',
            'operator_id' => $operator1->id,
            'verified_at' => now()->subHours(8),
            'created_at' => now()->subDays(1)->subHours(4),
        ]);
    }
}
