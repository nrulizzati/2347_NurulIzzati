<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User; // Import model User
use Illuminate\Support\Facades\Hash; // Import Hash facade

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Cek apakah user admin sudah ada untuk menghindari duplikasi jika seeder dijalankan berkali-kali
        if (!User::where('email', 'admin@example.com')->exists()) {
            User::create([
                'name' => 'Administrator',
                'email' => 'admin@example.com',
                'password' => Hash::make('admin123'), // GANTI DENGAN PASSWORD YANG AMAN!
                'role' => 'admin',
                'email_verified_at' => now(), // Opsional: langsung set email terverifikasi
            ]);
            $this->command->info('User Admin berhasil dibuat.');
        } else {
            $this->command->info('User Admin sudah ada.');
        }
    }
}