<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Alumni;
use App\Models\PengalamanKerja;

class PengalamanKerjaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $budi = Alumni::where('nim', '1234567890')->first();
        $ani = Alumni::where('nim', '0987654321')->first();
        $citra = Alumni::where('nim', '1122334455')->first();
        $doni = Alumni::where('nim', '2233445566')->first();
        $eka = Alumni::where('nim', '3344556677')->first();
        $rahmat = Alumni::where('nim', '6060606060')->first();
        $lukman = Alumni::where('nim', '1010101010')->first();


        // Pengalaman Kerja untuk Budi Santoso
        if ($budi) {
            PengalamanKerja::create([
                'alumni_id' => $budi->id,
                'posisi' => 'Junior Programmer', // Sesuai dengan posisi_awal di AlumniSeeder
                'nama_perusahaan' => 'CV Cipta Solusi', // Sesuai dengan perusahaan_awal
                'lokasi_perusahaan' => 'Bandung',
                'tanggal_mulai' => '2020-08-01',
                'tanggal_selesai' => '2021-07-30',
                'deskripsi_pekerjaan' => 'Mengembangkan fitur minor pada aplikasi internal perusahaan dan melakukan maintenance sistem.'
            ]);
            PengalamanKerja::create([
                'alumni_id' => $budi->id,
                'posisi' => 'Software Engineer', // Sesuai dengan pekerjaan_saat_ini
                'nama_perusahaan' => 'PT Teknologi Maju', // Sesuai dengan perusahaan_saat_ini
                'lokasi_perusahaan' => 'Jakarta',
                'tanggal_mulai' => '2021-08-01',
                'tanggal_selesai' => null, // Masih bekerja
                'deskripsi_pekerjaan' => 'Terlibat dalam pengembangan fitur utama aplikasi web berbasis Laravel dan integrasi API pihak ketiga.'
            ]);
        }

        // Pengalaman Kerja untuk Ani Lestari
        if ($ani) {
            PengalamanKerja::create([
                'alumni_id' => $ani->id,
                'posisi' => 'Intern Data Entry', // Sesuai dengan posisi_awal
                'nama_perusahaan' => 'Biro Statistik Lokal', // Sesuai dengan perusahaan_awal
                'lokasi_perusahaan' => 'Surabaya',
                'tanggal_mulai' => '2021-02-01',
                'tanggal_selesai' => '2021-06-30',
                'deskripsi_pekerjaan' => 'Membantu proses input data hasil survei lapangan dan validasi data awal.'
            ]);
            PengalamanKerja::create([
                'alumni_id' => $ani->id,
                'posisi' => 'Data Analyst', // Sesuai dengan pekerjaan_saat_ini
                'nama_perusahaan' => 'Korporasi Data Indonesia', // Sesuai dengan perusahaan_saat_ini
                'lokasi_perusahaan' => 'Jakarta',
                'tanggal_mulai' => '2021-09-01',
                'tanggal_selesai' => null, // Masih bekerja
                'deskripsi_pekerjaan' => 'Melakukan analisis data penjualan, membuat visualisasi data, dan menyusun laporan bulanan untuk manajemen.'
            ]);
        }

        // Pengalaman Kerja untuk Citra Dewi
        if ($citra) {
            PengalamanKerja::create([
                'alumni_id' => $citra->id,
                'posisi' => 'Marketing Staff', // Sesuai dengan posisi_awal
                'nama_perusahaan' => 'UMKM Maju Bersama', // Sesuai dengan perusahaan_awal
                'lokasi_perusahaan' => 'Yogyakarta',
                'tanggal_mulai' => '2019-09-01',
                'tanggal_selesai' => '2020-12-31',
                'deskripsi_pekerjaan' => 'Menangani promosi media sosial dan pembuatan konten untuk produk UMKM.'
            ]);
            PengalamanKerja::create([
                'alumni_id' => $citra->id,
                'posisi' => 'Marketing Specialist', // Sesuai dengan pekerjaan_saat_ini
                'nama_perusahaan' => 'Pasar Digital Nusantara', // Sesuai dengan perusahaan_saat_ini
                'lokasi_perusahaan' => 'Jakarta',
                'tanggal_mulai' => '2021-01-15',
                'tanggal_selesai' => null,
                'deskripsi_pekerjaan' => 'Merencanakan dan mengeksekusi strategi digital marketing, mengelola kampanye iklan, dan analisis performa.'
            ]);
        }

        // Pengalaman Kerja untuk Doni Firmansyah
        if ($doni) {
            PengalamanKerja::create([
                'alumni_id' => $doni->id,
                'posisi' => 'Trainee Engineer', // Sesuai dengan posisi_awal dan perusahaan_awal
                'nama_perusahaan' => 'PT Industri Otomasi',
                'lokasi_perusahaan' => 'Cikarang',
                'tanggal_mulai' => '2022-08-01',
                'tanggal_selesai' => '2023-02-28',
                'deskripsi_pekerjaan' => 'Pelatihan dan asistensi dalam proyek otomasi industri.'
            ]);
             PengalamanKerja::create([
                'alumni_id' => $doni->id,
                'posisi' => 'Automation Engineer', // Sesuai dengan pekerjaan_saat_ini
                'nama_perusahaan' => 'PT Industri Otomasi', // Sesuai dengan perusahaan_saat_ini
                'lokasi_perusahaan' => 'Cikarang',
                'tanggal_mulai' => '2023-03-01',
                'tanggal_selesai' => null,
                'deskripsi_pekerjaan' => 'Merancang dan mengimplementasikan sistem otomasi menggunakan PLC dan SCADA.'
            ]);
        }

        // Pengalaman Kerja untuk Eka Putri
        if ($eka) {
            PengalamanKerja::create([
                'alumni_id' => $eka->id,
                'posisi' => 'Junior Graphic Designer', // Sesuai dengan posisi_awal
                'nama_perusahaan' => 'Agensi Desain Lokal', // Sesuai dengan perusahaan_awal
                'lokasi_perusahaan' => 'Semarang',
                'tanggal_mulai' => '2020-09-01',
                'tanggal_selesai' => '2021-08-31',
                'deskripsi_pekerjaan' => 'Membuat desain grafis untuk berbagai kebutuhan klien.'
            ]);
        }

        // Pengalaman Kerja untuk Rahmat Hidayat
        if ($rahmat) {
             PengalamanKerja::create([
                'alumni_id' => $rahmat->id,
                'posisi' => 'Web Developer', // Sesuai dengan posisi_awal
                'nama_perusahaan' => 'Freelance Projects', // Sesuai dengan perusahaan_awal
                'lokasi_perusahaan' => 'Remote',
                'tanggal_mulai' => '2019-10-01',
                'tanggal_selesai' => '2020-10-30',
                'deskripsi_pekerjaan' => 'Mengerjakan berbagai proyek website untuk klien perorangan dan UMKM.'
            ]);
            PengalamanKerja::create([
                'alumni_id' => $rahmat->id,
                'posisi' => 'Full Stack Developer', // Sesuai dengan pekerjaan_saat_ini
                'nama_perusahaan' => 'PT Solusi Digital Kreatif', // Sesuai dengan perusahaan_saat_ini
                'lokasi_perusahaan' => 'Bandung',
                'tanggal_mulai' => '2020-11-01',
                'tanggal_selesai' => null,
                'deskripsi_pekerjaan' => 'Pengembangan end-to-end aplikasi web, dari backend hingga frontend.'
            ]);
        }

        // Pengalaman Kerja untuk Lukman Hakim
        if ($lukman) {
            PengalamanKerja::create([
                'alumni_id' => $lukman->id,
                'posisi' => 'Intern Android Developer', // Sesuai dengan posisi_awal
                'nama_perusahaan' => 'Software House Kecil', // Sesuai dengan perusahaan_awal
                'lokasi_perusahaan' => 'Malang',
                'tanggal_mulai' => '2021-03-01',
                'tanggal_selesai' => '2021-08-31',
                'deskripsi_pekerjaan' => 'Belajar dan membantu pengembangan aplikasi mobile Android.'
            ]);
        }
    }
}