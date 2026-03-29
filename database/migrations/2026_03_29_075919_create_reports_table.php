<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete(); // Relasi ke pelapor
            $table->string('photo_path'); // Path foto kerusakan dari Android/Web
            $table->decimal('latitude', 10, 8); // Titik koordinat untuk geolokasi
            $table->decimal('longitude', 11, 8); // Titik koordinat untuk geolokasi
            $table->string('damage_type')->nullable(); // Hasil deteksi YOLO26
            $table->enum('status', ['Dilaporkan', 'Sedang Disurvei', 'Dijadwalkan', 'Sedang Diperbaiki', 'Selesai'])->default('Dilaporkan');
            $table->text('description')->nullable(); // Deskripsi opsional dari pelapor

            // Untuk fitur Operator Manajemen Status & Unggah Bukti Perbaikan
            $table->string('evidence_photo_path')->nullable(); // Foto bukti jalanny sudah diperbaiki

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reports');
    }
};
