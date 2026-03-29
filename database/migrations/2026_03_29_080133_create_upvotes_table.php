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
        Schema::create('upvotes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete(); // Siapa yang upvote
            $table->foreignId('report_id')->constrained()->cascadeOnDelete(); // Laporan mana yang diupvote
            $table->timestamps();

            // Mencegah 1 user upvote 1 laporan berkali kali
            $table->unique(['user_id', 'report_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('upvotes');
    }
};
