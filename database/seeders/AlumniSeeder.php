<?php

namespace Database\Seeders;

use App\Models\Alumni;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AlumniSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $alumniData = [
            [
                'nim' => '1234567890', 'nama_lengkap' => 'Budi Santoso', 'tahun_lulus' => 2020, 'jurusan' => 'Teknik Informatika',
                'email' => 'budi.santoso@example.com', 'nomor_telepon' => '081234567890', 'pekerjaan_saat_ini' => 'Software Engineer',
                'perusahaan_saat_ini' => 'PT Teknologi Maju', 'link_profil_linkedin' => 'https://linkedin.com/in/budisantoso',
                'posisi_awal' => 'Junior Programmer', 'perusahaan_awal' => 'CV Cipta Solusi', 'bidang_keahlian_utama' => 'Web Development, Backend API',
                'sertifikasi_profesional' => 'AWS Certified Developer, Oracle Java Programmer', 'bersedia_menjadi_mentor' => true, 'info_kontak_karier' => 'budi.mentor@example.com',
            ],
            [
                'nim' => '0987654321', 'nama_lengkap' => 'Ani Lestari', 'tahun_lulus' => 2021, 'jurusan' => 'Sistem Informasi',
                'email' => 'ani.lestari@example.com', 'nomor_telepon' => '087654321098', 'pekerjaan_saat_ini' => 'Data Analyst',
                'perusahaan_saat_ini' => 'Korporasi Data Indonesia', 'link_profil_linkedin' => 'https://linkedin.com/in/anilestari',
                'posisi_awal' => 'Intern Data Entry', 'perusahaan_awal' => 'Biro Statistik Lokal', 'bidang_keahlian_utama' => 'Data Analysis, SQL, Python',
                'sertifikasi_profesional' => 'Google Data Analytics Professional Certificate', 'bersedia_menjadi_mentor' => false, 'info_kontak_karier' => null,
            ],
            [
                'nim' => '1122334455', 'nama_lengkap' => 'Citra Dewi', 'tahun_lulus' => 2019, 'jurusan' => 'Manajemen Bisnis',
                'email' => 'citra.dewi@example.com', 'nomor_telepon' => '081122334455', 'pekerjaan_saat_ini' => 'Marketing Specialist',
                'perusahaan_saat_ini' => 'Pasar Digital Nusantara', 'link_profil_linkedin' => 'https://linkedin.com/in/citradewi',
                'posisi_awal' => 'Marketing Staff', 'perusahaan_awal' => 'UMKM Maju Bersama', 'bidang_keahlian_utama' => 'Digital Marketing, SEO, Content Creation',
                'sertifikasi_profesional' => 'HubSpot Content Marketing Certified', 'bersedia_menjadi_mentor' => true, 'info_kontak_karier' => 'citra.dewi.career@example.com',
            ],
            [
                'nim' => '2233445566', 'nama_lengkap' => 'Doni Firmansyah', 'tahun_lulus' => 2022, 'jurusan' => 'Teknik Elektro',
                'email' => 'doni.firmansyah@example.com', 'nomor_telepon' => '082233445566', 'pekerjaan_saat_ini' => 'Automation Engineer',
                'perusahaan_saat_ini' => 'PT Industri Otomasi', 'link_profil_linkedin' => 'https://linkedin.com/in/donifirmansyah',
                'posisi_awal' => 'Trainee Engineer', 'perusahaan_awal' => 'PT Industri Otomasi', 'bidang_keahlian_utama' => 'PLC, SCADA, IoT',
                'sertifikasi_profesional' => 'Certified Automation Professional (CAP)', 'bersedia_menjadi_mentor' => true, 'info_kontak_karier' => '082233445566 (WA)',
            ],
            [
                'nim' => '3344556677', 'nama_lengkap' => 'Eka Putri', 'tahun_lulus' => 2020, 'jurusan' => 'Desain Komunikasi Visual',
                'email' => 'eka.putri@example.com', 'nomor_telepon' => '083344556677', 'pekerjaan_saat_ini' => 'UI/UX Designer',
                'perusahaan_saat_ini' => 'Startup Kreatif Indonesia', 'link_profil_linkedin' => 'https://linkedin.com/in/ekaputri',
                'posisi_awal' => 'Junior Graphic Designer', 'perusahaan_awal' => 'Agensi Desain Lokal', 'bidang_keahlian_utama' => 'UI Design, UX Research, Prototyping',
                'sertifikasi_profesional' => 'Nielsen Norman Group UX Certification', 'bersedia_menjadi_mentor' => false, 'info_kontak_karier' => null,
            ],
            [
                'nim' => '4455667788', 'nama_lengkap' => 'Fajar Nugraha', 'tahun_lulus' => 2018, 'jurusan' => 'Teknik Sipil',
                'email' => 'fajar.nugraha@example.com', 'nomor_telepon' => '084455667788', 'pekerjaan_saat_ini' => 'Site Manager',
                'perusahaan_saat_ini' => 'PT Konstruksi Jaya', 'link_profil_linkedin' => 'https://linkedin.com/in/fajarnugraha',
                'posisi_awal' => 'Field Engineer', 'perusahaan_awal' => 'Kontraktor Bangunan', 'bidang_keahlian_utama' => 'Manajemen Proyek Konstruksi, Struktur Bangunan',
                'sertifikasi_profesional' => 'Ahli K3 Konstruksi', 'bersedia_menjadi_mentor' => true, 'info_kontak_karier' => 'fajar.nugraha.career@example.com',
            ],
            [
                'nim' => '5566778899', 'nama_lengkap' => 'Gita Wulandari', 'tahun_lulus' => 2021, 'jurusan' => 'Akuntansi',
                'email' => 'gita.wulandari@example.com', 'nomor_telepon' => '085566778899', 'pekerjaan_saat_ini' => 'Auditor',
                'perusahaan_saat_ini' => 'Kantor Akuntan Publik XYZ', 'link_profil_linkedin' => 'https://linkedin.com/in/gitawulandari',
                'posisi_awal' => 'Junior Auditor', 'perusahaan_awal' => 'Kantor Akuntan Publik XYZ', 'bidang_keahlian_utama' => 'Audit Keuangan, Pajak',
                'sertifikasi_profesional' => 'Certified Public Accountant (CPA)', 'bersedia_menjadi_mentor' => true, 'info_kontak_karier' => null,
            ],
            [
                'nim' => '6677889900', 'nama_lengkap' => 'Hadi Pratama', 'tahun_lulus' => 2019, 'jurusan' => 'Ilmu Komputer',
                'email' => 'hadi.pratama@example.com', 'nomor_telepon' => '086677889900', 'pekerjaan_saat_ini' => 'DevOps Engineer',
                'perusahaan_saat_ini' => 'Cloud Services Provider', 'link_profil_linkedin' => 'https://linkedin.com/in/hadipratama',
                'posisi_awal' => 'System Administrator', 'perusahaan_awal' => 'Data Center Lokal', 'bidang_keahlian_utama' => 'CI/CD, Kubernetes, AWS',
                'sertifikasi_profesional' => 'AWS Certified DevOps Engineer', 'bersedia_menjadi_mentor' => false, 'info_kontak_karier' => 'hadi.pratama@example.com',
            ],
            [
                'nim' => '7788990011', 'nama_lengkap' => 'Indah Permatasari', 'tahun_lulus' => 2022, 'jurusan' => 'Sastra Inggris',
                'email' => 'indah.permatasari@example.com', 'nomor_telepon' => '087788990011', 'pekerjaan_saat_ini' => 'Content Writer',
                'perusahaan_saat_ini' => 'Media Online Terkini', 'link_profil_linkedin' => 'https://linkedin.com/in/indahpermatasari',
                'posisi_awal' => 'Proofreader', 'perusahaan_awal' => 'Penerbit Buku', 'bidang_keahlian_utama' => 'Creative Writing, SEO Writing, Editing',
                'sertifikasi_profesional' => null, 'bersedia_menjadi_mentor' => true, 'info_kontak_karier' => 'indah.writer@example.com',
            ],
            [
                'nim' => '8899001122', 'nama_lengkap' => 'Joko Susilo', 'tahun_lulus' => 2017, 'jurusan' => 'Teknik Mesin',
                'email' => 'joko.susilo@example.com', 'nomor_telepon' => '088899001122', 'pekerjaan_saat_ini' => 'Mechanical Design Engineer',
                'perusahaan_saat_ini' => 'PT Manufaktur Presisi', 'link_profil_linkedin' => 'https://linkedin.com/in/jokosusilo',
                'posisi_awal' => 'Drafter', 'perusahaan_awal' => 'Bengkel Fabrikasi', 'bidang_keahlian_utama' => 'CAD/CAM, Product Design, Material Science',
                'sertifikasi_profesional' => 'SolidWorks Certified Professional', 'bersedia_menjadi_mentor' => true, 'info_kontak_karier' => null,
            ],
            [
                'nim' => '9900112233', 'nama_lengkap' => 'Kartika Sari', 'tahun_lulus' => 2020, 'jurusan' => 'Psikologi',
                'email' => 'kartika.sari@example.com', 'nomor_telepon' => '089900112233', 'pekerjaan_saat_ini' => 'HR Recruiter',
                'perusahaan_saat_ini' => 'Perusahaan Konsultan SDM', 'link_profil_linkedin' => 'https://linkedin.com/in/kartikasari',
                'posisi_awal' => 'HR Staff', 'perusahaan_awal' => 'Perusahaan Retail', 'bidang_keahlian_utama' => 'Talent Acquisition, Interviewing, HRD',
                'sertifikasi_profesional' => 'Certified Human Resource Professional (CHRP)', 'bersedia_menjadi_mentor' => false, 'info_kontak_karier' => 'kartika.hr@example.com',
            ],
            [
                'nim' => '1010101010', 'nama_lengkap' => 'Lukman Hakim', 'tahun_lulus' => 2021, 'jurusan' => 'Teknik Informatika',
                'email' => 'lukman.hakim@example.com', 'nomor_telepon' => '081010101010', 'pekerjaan_saat_ini' => 'Mobile Developer (Android)',
                'perusahaan_saat_ini' => 'Game Studio Mobile', 'link_profil_linkedin' => 'https://linkedin.com/in/lukmanhakim',
                'posisi_awal' => 'Intern Android Developer', 'perusahaan_awal' => 'Software House Kecil', 'bidang_keahlian_utama' => 'Android (Kotlin/Java), Mobile UI/UX',
                'sertifikasi_profesional' => 'Associate Android Developer', 'bersedia_menjadi_mentor' => true, 'info_kontak_karier' => null,
            ],
            [
                'nim' => '2020202020', 'nama_lengkap' => 'Mega Utami', 'tahun_lulus' => 2019, 'jurusan' => 'Hubungan Internasional',
                'email' => 'mega.utami@example.com', 'nomor_telepon' => '082020202020', 'pekerjaan_saat_ini' => 'Diplomat Muda',
                'perusahaan_saat_ini' => 'Kementerian Luar Negeri', 'link_profil_linkedin' => 'https://linkedin.com/in/megautami',
                'posisi_awal' => 'Staf Kedutaan', 'perusahaan_awal' => 'Kementerian Luar Negeri', 'bidang_keahlian_utama' => 'Diplomasi, Politik Internasional',
                'sertifikasi_profesional' => null, 'bersedia_menjadi_mentor' => false, 'info_kontak_karier' => 'mega.utami.diplomat@example.com',
            ],
            [
                'nim' => '3030303030', 'nama_lengkap' => 'Nina Fitriani', 'tahun_lulus' => 2022, 'jurusan' => 'Farmasi',
                'email' => 'nina.fitriani@example.com', 'nomor_telepon' => '083030303030', 'pekerjaan_saat_ini' => 'Apoteker',
                'perusahaan_saat_ini' => 'Apotek Sehat Sentosa', 'link_profil_linkedin' => 'https://linkedin.com/in/ninafitriani',
                'posisi_awal' => 'Asisten Apoteker', 'perusahaan_awal' => 'Klinik Pratama', 'bidang_keahlian_utama' => 'Obat-obatan, Konseling Pasien',
                'sertifikasi_profesional' => 'Sertifikat Kompetensi Apoteker', 'bersedia_menjadi_mentor' => true, 'info_kontak_karier' => null,
            ],
            [
                'nim' => '4040404040', 'nama_lengkap' => 'Omar Abdullah', 'tahun_lulus' => 2018, 'jurusan' => 'Arsitektur',
                'email' => 'omar.abdullah@example.com', 'nomor_telepon' => '084040404040', 'pekerjaan_saat_ini' => 'Arsitek Proyek',
                'perusahaan_saat_ini' => 'Biro Arsitek Ternama', 'link_profil_linkedin' => 'https://linkedin.com/in/omarabdullah',
                'posisi_awal' => 'Junior Arsitek', 'perusahaan_awal' => 'Studio Desain Arsitektur', 'bidang_keahlian_utama' => 'Desain Bangunan, AutoCAD, SketchUp',
                'sertifikasi_profesional' => 'Sertifikat Keahlian Arsitek (SKA)', 'bersedia_menjadi_mentor' => false, 'info_kontak_karier' => 'omar.architect@example.com',
            ],
            [
                'nim' => '5050505050', 'nama_lengkap' => 'Putri Ayu', 'tahun_lulus' => 2021, 'jurusan' => 'Teknik Industri',
                'email' => 'putri.ayu@example.com', 'nomor_telepon' => '085050505050', 'pekerjaan_saat_ini' => 'Supply Chain Analyst',
                'perusahaan_saat_ini' => 'Perusahaan Logistik Global', 'link_profil_linkedin' => 'https://linkedin.com/in/putriayu',
                'posisi_awal' => 'Logistics Staff', 'perusahaan_awal' => 'Distributor Barang Konsumsi', 'bidang_keahlian_utama' => 'Supply Chain Management, Inventory Control, Logistics',
                'sertifikasi_profesional' => 'Certified Supply Chain Professional (CSCP)', 'bersedia_menjadi_mentor' => true, 'info_kontak_karier' => null,
            ],
             [
                'nim' => '6060606060', 'nama_lengkap' => 'Rahmat Hidayat', 'tahun_lulus' => 2019, 'jurusan' => 'Teknik Informatika',
                'email' => 'rahmat.hidayat@example.com', 'nomor_telepon' => '086060606060', 'pekerjaan_saat_ini' => 'Full Stack Developer',
                'perusahaan_saat_ini' => 'PT Solusi Digital Kreatif', 'link_profil_linkedin' => 'https://linkedin.com/in/rahmathidayat',
                'posisi_awal' => 'Web Developer', 'perusahaan_awal' => 'Freelance Projects', 'bidang_keahlian_utama' => 'PHP (Laravel), JavaScript (React), MySQL',
                'sertifikasi_profesional' => null, 'bersedia_menjadi_mentor' => true, 'info_kontak_karier' => 'rahmat.dev@example.com',
            ],
            [
                'nim' => '7070707070', 'nama_lengkap' => 'Siska Amelia', 'tahun_lulus' => 2022, 'jurusan' => 'Sistem Informasi',
                'email' => 'siska.amelia@example.com', 'nomor_telepon' => '087070707070', 'pekerjaan_saat_ini' => 'IT Support Specialist',
                'perusahaan_saat_ini' => 'Bank Nasional Indonesia', 'link_profil_linkedin' => 'https://linkedin.com/in/siskaamelia',
                'posisi_awal' => 'Helpdesk IT', 'perusahaan_awal' => 'Perusahaan Jasa IT', 'bidang_keahlian_utama' => 'Troubleshooting, Networking, ITIL',
                'sertifikasi_profesional' => 'CompTIA A+', 'bersedia_menjadi_mentor' => false, 'info_kontak_karier' => null,
            ],
            [
                'nim' => '8080808080', 'nama_lengkap' => 'Taufik Ibrahim', 'tahun_lulus' => 2017, 'jurusan' => 'Manajemen Keuangan',
                'email' => 'taufik.ibrahim@example.com', 'nomor_telepon' => '088080808080', 'pekerjaan_saat_ini' => 'Financial Analyst',
                'perusahaan_saat_ini' => 'Sekuritas Investasi Amanah', 'link_profil_linkedin' => 'https://linkedin.com/in/taufikibrahim',
                'posisi_awal' => 'Finance Staff', 'perusahaan_awal' => 'Koperasi Simpan Pinjam', 'bidang_keahlian_utama' => 'Analisis Keuangan, Investasi, Pasar Modal',
                'sertifikasi_profesional' => 'Chartered Financial Analyst (CFA) Level I', 'bersedia_menjadi_mentor' => true, 'info_kontak_karier' => 'taufik.finance@example.com',
            ],
            [
                'nim' => '9090909090', 'nama_lengkap' => 'Vina Maharani', 'tahun_lulus' => 2020, 'jurusan' => 'Ilmu Komunikasi',
                'email' => 'vina.maharani@example.com', 'nomor_telepon' => '089090909090', 'pekerjaan_saat_ini' => 'Public Relations Officer',
                'perusahaan_saat_ini' => 'Hotel Bintang Lima', 'link_profil_linkedin' => 'https://linkedin.com/in/vinamaharani',
                'posisi_awal' => 'PR Intern', 'perusahaan_awal' => 'Event Organizer', 'bidang_keahlian_utama' => 'Media Relations, Corporate Communication, Event Management',
                'sertifikasi_profesional' => null, 'bersedia_menjadi_mentor' => true, 'info_kontak_karier' => null,
            ],
        ];

        foreach ($alumniData as $data) {
            Alumni::create($data);
        }
    }
}