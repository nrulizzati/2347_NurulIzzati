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
        Schema::table('alumni', function (Blueprint $table) {
            $table->string('posisi_awal')->nullable()->after('link_profil_linkedin');
            $table->string('perusahaan_awal')->nullable()->after('posisi_awal');
            $table->string('bidang_keahlian_utama')->nullable()->after('perusahaan_awal');
            $table->text('sertifikasi_profesional')->nullable()->after('bidang_keahlian_utama');
            $table->boolean('bersedia_menjadi_mentor')->default(false)->after('sertifikasi_profesional');
            $table->string('info_kontak_karier')->nullable()->after('bersedia_menjadi_mentor');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('alumni', function (Blueprint $table) {
            $table->dropColumn([
                'posisi_awal',
                'perusahaan_awal',
                'bidang_keahlian_utama',
                'sertifikasi_profesional',
                'bersedia_menjadi_mentor',
                'info_kontak_karier',
            ]);
        });
    }
};
