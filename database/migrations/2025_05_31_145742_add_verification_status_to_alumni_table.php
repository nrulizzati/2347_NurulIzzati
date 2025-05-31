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
            // Tambahkan kolom status verifikasi
            // Bisa boolean atau string/enum jika ada banyak status (misal: pending, approved, rejected)
            // Untuk kesederhanaan, kita gunakan boolean 'is_verified'
            $table->boolean('is_verified')->default(false)->after('info_kontak_karier'); // Defaultnya belum diverifikasi
            $table->timestamp('verified_at')->nullable()->after('is_verified'); // Waktu diverifikasi
            $table->foreignId('verified_by')->nullable()->constrained('users')->onDelete('set null')->after('verified_at'); // Siapa admin yang memverifikasi
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('alumni', function (Blueprint $table) {
            $table->dropForeign(['verified_by']);
            $table->dropColumn(['is_verified', 'verified_at', 'verified_by']);
        });
    }
};
