@extends('layouts.app')

@section('title', 'Profil Saya - ' . $user->name)

@section('content')
<div class="container py-4">
    <div class="row"> {{-- Baris utama untuk dua kolom --}}

        {{-- Kolom KIRI: Informasi Akun Login --}}
        <div class="col-lg-4 mb-4 mb-lg-0">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0"><i class="bi bi-person-circle me-2"></i>Informasi Akun Login</h4>
                </div>
                <div class="card-body">
                    <dl class="row">
                        <dt class="col-sm-4 text-muted">Nama:</dt>
                        <dd class="col-sm-8">{{ $user->name }}</dd>

                        <dt class="col-sm-4 text-muted">Email:</dt>
                        <dd class="col-sm-8">{{ $user->email }}</dd>

                        <dt class="col-sm-4 text-muted">Role:</dt>
                        <dd class="col-sm-8"><span class="badge {{ $user->role == 'admin' ? 'bg-danger' : 'bg-info text-dark' }}">{{ Str::ucfirst($user->role) }}</span></dd>

                        <dt class="col-sm-4 text-muted">Terdaftar:</dt>
                        <dd class="col-sm-8">{{ $user->created_at->isoFormat('LLLL') }}</dd>
                    </dl>
                    <a href="{{ route('profile.edit') }}" class="btn btn-outline-primary btn-sm mt-2 w-100">
                        <i class="bi bi-pencil-square me-1"></i> Edit Akun & Password
                    </a>
                </div>
            </div>
        </div>

        {{--Sip, saya paham sekarang! Anda ingin halaman "Profil Saya" untuk **alumni Kolom KANAN: Profil Alumni & Karier (HANYA JIKA ROLE USER ADALAH 'alumni') --}}
        @if($user->role == 'alumni')
            <div class="col-lg-** memiliki tata letak dua kolom seperti halaman profil admin, di mana:
*   **Kolom kiri:** Informasi Ak8">
                <div class="card shadow-sm">
                    <div class="card-header bg-un Login (Nama, Email, Role, tombol Edit Akun).
*   **Kolom kanan:** Card "Profilprimary text-white d-flex justify-content-between align-items-center">
                        <h4 class="mb-0"><i class="bi bi-briefcase-fill me-2"></i>Profil Alumni & Kari Alumni & Karier Saya" yang berisi semua detail alumni dari tabel `alumni` (NIM, jurusan, pekerjaan, dller Saya</h4>
                        @if($alumni) {{-- Jika data alumni ($alumni dari tabel alumni) sudah ada --}}
                            <a href="{{ route('alumni.edit', $alumni->id) }}" class=".) dan daftar pengalaman kerja. Jika profil alumni belum ada, di kolom kanan ini akan muncul ajakan untuk melengkapi profilbtn btn-warning btn-sm py-1 px-2">
                                <i class="bi bi-pencil.

Ini adalah desain yang sangat baik dan konsisten! Kode untuk `resources/views/profile/show.blade-fill me-1"></i> Edit Detail Alumni
                            </a>
                        @endif
                    </div>
                    <div class.php` yang saya berikan di respons sebelumnya **sudah dirancang untuk mencapai tata letak dua kolom ini.**="card-body">
                        @if($alumni) {{-- Jika $alumni (data dari tabel alumni) ada --}}
                            {{-- Tampilkan Detail Alumni di sini --}}
                            <h5 class="text-muted mb-3">

**Mari kita pastikan lagi kode `resources/views/profile/show.blade.php` Anda persis seperti iniData Pribadi Alumni</h5>
                            <dl class="row">
                                <dt class="col-sm-4:**
(Ini adalah kode yang sama dari respons saya sebelumnya, saya hanya menampilkannya lagi untuk konfirmasi).

``` text-muted">NIM:</dt>
                                <dd class="col-sm-8">{{ $alumnihtml
@extends('layouts.app')

@section('title', 'Profil Saya - ' . $user->name)

->nim }}</dd>
                                <dt class="col-sm-4 text-muted">Nama Lengkap Alumni:</dt>
                                <dd class="col-sm-8">{{ $alumni->nama_lengkap }}</dd@section('content')
<div class="container py-4">
    <div class="row">
        {{-->
                                {{-- ... (field alumni lainnya seperti tahun lulus, jurusan, email kontak alumni, dll.) ... --}}
                                Kolom Kiri untuk Informasi Akun Login (Selalu Tampil) --}}
        <div class="col-lg-4 mb-4 mb-lg-0">
            <div class="card shadow-sm">
                < <dt class="col-sm-4 text-muted">Email Kontak Alumni:</dt>
                                <dd class="col-div class="card-header bg-primary text-white">
                    <h4 class="mb-0"><sm-8">{{ $alumni->email ?? '-' }}</dd>
                                {{-- ... tambahkan semua field darii class="bi bi-person-circle me-2"></i>Informasi Akun Login</h4>
                </div>
                <div tabel alumni yang relevan ... --}}
                            </dl>

                            <hr class="my-3">
                            <h5 class="text-muted mb-3">Informasi Karier Tambahan</h5>
                             <dl class=" class="card-body">
                    <dl class="row">
                        <dt class="col-sm-4 text-muted">Nama:</dt>
                        <dd class="col-sm-8">{{ $user->name }}</dd>

                        <dt class="col-sm-4 text-muted">Email:</dt>
                        <row">
                                <dt class="col-sm-4 text-muted">Pekerjaan Saat Ini:</dt>
                                <dd class="col-sm-8">{{ $alumni->pekerjaan_saat_ini ?? '-' }}</dd>
                                <dt class="col-sm-4 text-muted">Perusahaan Saat Ini:</dt>
                                <dd class="col-sm-8">{{ $alumni->perusahaan_saatdd class="col-sm-8">{{ $user->email }}</dd>

                        <dt class="col-sm-4 text-muted">Role:</dt>
                        <dd class="col-sm-8"><span class="badge {{ $user->role == 'admin' ? 'bg-danger' : 'bg-info text-dark' }}">{{ Str::ucfirst($user->role) }}</span></dd>

                        <dt class="col-sm-4 text-muted">Terdaftar:</dt>
                        <dd class="col-sm-8">{{ $user->created_at->isoFormat('LLLL') }}</dd>
                    </dl>
                    <a href="{{ route('profile.edit') }}" class="btn btn-outline-primary btn-sm mt-2 w-100">
                        <i class="bi bi-pencil-square me-1">_ini ?? '-' }}</dd>
                                <dt class="col-sm-4 text-muted">Posisi Awal:</dt>
                                <dd class="col-sm-8">{{ $alumni->posisi_awal ?? '-' }}</dd>
                                <dt class="col-sm-4 text-muted">Perusahaan Awal:</dt>
                                <dd class="col-sm-8">{{ $alumni->perusahaan_awal ?? '-' }}</dd>
                                <dt class="col-sm-4 text-muted">Bidang Keahlian Utama:</dt>
                                <dd class="col-sm-8">{{ $alumni->bidang_keahlian_utama ?? '-' }}</dd>
                                <dt class="col-sm-4 text-muted">Sertifikasi Profesional:</dt>
                                <dd class="col-sm-8">
                                     @if($alumni->sertifikasi_profesional)
                                        @foreach(explode(',', $alumni->sertifikasi_profesional) as $sertifikasi)
                                            <span class="badge bg-secondary me-1 mb-1">{{ trim($sertifikasi) }}</span>
                                        @endforeach
                                    @else
                                        -
                                    @endif
                                </dd>
                                <dt class="col-sm-4 text-muted">Bersedia Menjadi Mentor:</dt>
                                <dd class="col-sm-8">
                                    @if($alumni->bersedia_menjadi_mentor)
                                        <</i> Edit Akun & Password
                    </a>
                </div>
            </div>
        </div>

        {{-- Kolom Kanan: HANYA TAMPIL JIKA ROLE USER ADALAH 'alumni' --}}
        @if($user->role == 'alumni')
            <div class="col-lg-8">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                        <h4 class="mb-0"><i class="bi bi-briefcase-fill me-2"></i>Profil Alumni & Karier Saya</h4>
                        {{-- Tombol Edit Profil Alumni hanya muncul jika data alumni sudah ada --}}
                        @if($alumni) {{-- $alumni adalah data dari tabel alumni untuk user ini --}}
                            <a href="{{ route('alumni.edit', $alumni->id) }}" class="btn btn-warning btn-sm py-1 px-2">
                                <i class="bi bi-pencil-fill me-1"></i> Edit Detail Alumni
                            </a>
                        @endif
                    </div>
                    <div class="card-body">
                        @if($alumni) {{-- Jika data alumni ($alumni dari tabel alumni) ADA --}}
                            {{-- Tampilkan Detail Alumni di sini --}}
                            <dl class="row">
                                <dt class="col-sm-4 text-muted">NIM:</dt>
                                <dd class="col-sm-8">{{ $alumni->nim }}</dd>

                                <dt class="col-sm-4 text-muted">Nama Lengkap Alumni:</dt>
                                <dd class="col-sm-8">{{ $alumni->nama_lengkap }}</dd>

                                <dt class="col-sm-4 text-muted">Tahun Lulus:</dt>
                                <dd class="col-sm-8">{{ $alumni->tahun_lulus }}</dd>

                                <dt class="col-sm-4 text-muted">Jurusan:</dt>
                                <dd class="col-sm-8">{{ $alumni->jurusan }}</dd>

                                <dt class="col-sm-4 text-muted">Email Kontak Alumni:</dt>
                                <dd class="col-sm-8">{{ $alumni->email ?? '-' }}</dd>

                                <dt class="col-sm-4 text-muted pt-2 border-top mt-2">Pekerjaan Saat Ini:</dt>
                                <dd class="col-sm-8 pt-2 border-top mt-2">{{ $alumni->pekerjaan_saat_ini ?? '-' }}</dd>
                                <dt class="col-sm-4 text-muted">Perusahaan Saat Inispan class="badge bg-success"><i class="bi bi-check-circle-fill me-1"></i> Ya</span>
                                    @else
                                        <span class="badge bg-danger"><i class="bi bi-x-circle-fill me-1"></i> Tidak</span>
                                    @endif
                                </dd>
                                 <dt class="col-sm-4 text-muted">Info Kontak Karier:</dt>
                                 <dd class="col-sm-8">{{ $alumni->info_kontak_karier ?? '-' }}</dd>
                            </dl>


                            <hr class="my-3">
                            <h5 class="text-primary mb-2">Riwayat Pekerjaan Saya</h5>
                            @if($alumni->pengalamanKerja && $alumni->pengalamanKerja->count() > 0)
                                <ul class="list-group list-group-flush">
                                    @foreach($alumni->pengalamanKerja as $pk)
                                        {{-- ... (tampilan item pengalaman kerja seperti sebelumnya) ... --}}
                                        <li class="list-group-item px-0 py-2">
                                            <div class="d-flex w-100 justify-content-between">
                                                <h6 class="mb-1 fw-semibold">{{ $pk->posisi }}</h6>
                                                <small class="text-muted">
                                                    {{ \Carbon\Carbon::parse($pk->tanggal_mulai)->isoFormat('MMM YYYY') }} -
                                                    {{ $pk->tanggal_selesai ? \Carbon\Carbon::parse($pk->tanggal_selesai)->isoFormat('MMM YYYY') : 'Sekarang' }}
                                                </small>
                                            </div>
                                            <p class="mb-1 small">
                                                <strong>{{ $pk->nama_perusahaan }}</strong>
                                                {{ $pk->lokasi_perusahaan ? ' - ' . $pk->lokasi_perusahaan : '' }}
                                            </p>
                                            <div class="mt-1">
                                                <a href="{{ route('pengalamanKerja.edit', $pk->id) }}" class="btn btn-outline-warning btn-sm py-0 px-1 me-1" title="Edit Pengalaman Kerja">
                                                    <i class="bi bi-pencil-square"></i>
                                                </a>
                                                <form action="{{ route('pengalamanKerja.destroy', $pk->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus pengalaman \'{{ $pk->posisi }}\'?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-outline-danger btn-sm py-0 px-1" title="Hapus Pengalaman Kerja">
                                                        <i class="bi bi-trash3"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            @else
                                <p class="fst-italic text-muted">Anda belum menambahkan data pengalaman kerja.</p>
                            @endif
                            <div class="mt-3">
                                <a href="{{ route('alumni.pengalamanKerja.create', $alumni->id) }}" class="btn btn-outline-primary btn-sm">
                                    <i class="bi bi-plus-circle me-1"></i> Tambah Pengalaman Kerja
                                </a>
                            </div>

                        <!-- @else {{-- Jika $alumni (data dari tabel alumni) TIDAK ada --}}
                            <div class="alert alert-info" role="alert">
                                <i class="bi bi-info-circle-fill me-2"></i>Profil alumni Anda belum lengkap.
                                <a href="{{ route('alumni.create', ['prefill_nama' => urlencode($user->name), 'prefill_email_kontak' => urlencode($user->email)]) }}" class="btn btn-success btn-sm ms-3">
                                    <i class="bi bi-pencil-fill me-1"></i>Lengkapi Profil Alumni Sekarang
                                </a>
                            </div>
                        @endif -->
                    </div>
                </div>
            </div>
        @endif {{-- Akhir dari if($user->role == 'alumni') --}}
    </div> {{-- Akhir dari .row --}}
</div> {{-- Akhir dari .container --}}
@endsection