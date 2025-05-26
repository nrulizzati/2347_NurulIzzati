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
        Schema::create('pengalaman_kerjas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('alumni_id')->constrained('alumni')->onDelete('cascade'); // Foreign key ke tabel alumni
            $table->string('posisi');
            $table->string('nama_perusahaan');
            $table->string('lokasi_perusahaan')->nullable();
            $table->date('tanggal_mulai');
            $table->date('tanggal_selesai')->nullable(); // Nullable jika masih bekerja di sana
            $table->text('deskripsi_pekerjaan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengalaman_kerjas');
    }
};
