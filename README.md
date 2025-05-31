# Sistem Informasi Alumni dan Jejaring Karier

## Informasi Pengembang
*   **Nama:** Nurul Izzati
*   **NPM:** 2308107010047
*   **Repository:** [https://github.com/nrulizzati/2347_NurulIzzati.git](https://github.com/nrulizzati/2347_NurulIzzati.git)
*   **Tugas:** Proyek Mini 4 - Pemrograman Berbasis Web

## Deskripsi Singkat Aplikasi

Aplikasi web berbasis Laravel ini berfungsi sebagai Sistem Informasi Alumni dan Jejaring Karier. Sistem ini mengelola data alumni, riwayat karier, dan pengalaman kerja. Fitur utama meliputi CRUD data alumni & pengalaman kerja, autentikasi dengan peran Admin dan Alumni, serta pencarian alumni. Admin dapat memverifikasi data alumni baru, sementara alumni mengelola profil pribadinya.

## Penjelasan Kode dan User Interface

*   **Backend (Laravel/PHP):** Menggunakan arsitektur MVC.
    *   **Models:** `User`, `Alumni`, `PengalamanKerja` untuk representasi data dan relasi.
    *   **Controllers:** `AlumniController`, `PengalamanKerjaController`, `UserProfileController`, dan controller untuk Autentikasi (`LoginController`, `RegisterController`) serta Verifikasi Admin.
    *   **Routes:** Didefinisikan di `web.php` dengan proteksi middleware `auth`.
*   **Frontend (Blade/Bootstrap 5):**
    *   Antarmuka responsif dengan navigasi yang jelas.
    *   Halaman daftar alumni dengan tabel, pagination, dan filter.
    *   Form CRUD dengan validasi.
    *   Halaman "Profil Saya" menampilkan info akun login dan detail profil alumni (jika ada/role alumni), serta fitur verifikasi untuk admin.
*   **Database (MySQL):** Menyimpan data pengguna, alumni, dan pengalaman kerja. Skema dibuat melalui Migrations, data awal diisi dengan Seeders.

## Cara Instalasi Aplikasi

1.  **Prasyarat:** PHP, Composer, Node.js & NPM, MySQL.
2.  **Clone Repository:**
    ```bash
    git clone https://github.com/nrulizzati/2347_NurulIzzati.git
    cd 2347_NurulIzzati
    ```
3.  **Instal Dependensi:**
    ```bash
    composer install
    npm install
    ```
4.  **Setup Environment:**
    *   Salin `.env.example` menjadi `.env`.
        ```bash
        cp .env.example .env
        ```
    *   Generate application key:
        ```bash
        php artisan key:generate
        ```
    *   Konfigurasi koneksi database (DB_DATABASE, DB_USERNAME, DB_PASSWORD) di file `.env`. Pastikan database sudah dibuat.

5.  **Migrasi dan Seed Database:**
    ```bash
    php artisan migrate:fresh --seed
    ```
    (Perintah ini akan membuat tabel dan mengisi data awal, termasuk akun admin)

6.  **Compile Aset Frontend:**
    ```bash
    npm run dev
    ```

7.  **Jalankan Server Pengembangan:**
    ```bash
    php artisan serve
    ```
    Aplikasi akan berjalan di `http://127.0.0.1:8000`.

8.  **Akun Admin Default:**
    *   **Email:** `admin@example.com`
    *   **Password:** `password`

---