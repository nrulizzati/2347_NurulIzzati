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
        Schema::create('alumni', function (Blueprint $table) {
            $table->id(); // Primary Key, Auto Increment
            $table->string('nama_lengkap');
            $table->string('nim')->unique();
            $table->year('tahun_lulus');
            $table->string('jurusan');
            $table->string('email')->unique()->nullable();
            $table->string('nomor_telepon')->nullable();
            $table->string('pekerjaan_saat_ini')->nullable();
            $table->string('perusahaan_saat_ini')->nullable();
            $table->string('link_profil_linkedin')->nullable();
            // $table->string('foto_profil')->nullable(); // Jika mau ada foto
            $table->timestamps(); // created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alumni');
    }
};
