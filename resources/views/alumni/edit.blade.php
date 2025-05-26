@extends('layouts.app')

@section('title', 'Edit Alumni: ' . $alumni->nama_lengkap)

@section('content')
<div class="card shadow-sm">
    <div class="card-header">
        <h1 class="mb-0">Edit Alumni: <span class="fw-normal">{{ $alumni->nama_lengkap }}</span></h1>
    </div>
    <div class="card-body">
        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Whoops!</strong> Ada beberapa masalah dengan input Anda:
                <ul class="mb-0 mt-2">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <form action="{{ route('alumni.update', $alumni->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row g-3">
                <div class="col-md-6">
                    <label for="nim" class="form-label">NIM <span class="text-danger">*</span></label>
                    <input type="text" name="nim" id="nim" class="form-control @error('nim') is-invalid @enderror" value="{{ old('nim', $alumni->nim) }}" required>
                    @error('nim') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-6">
                    <label for="nama_lengkap" class="form-label">Nama Lengkap <span class="text-danger">*</span></label>
                    <input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control @error('nama_lengkap') is-invalid @enderror" value="{{ old('nama_lengkap', $alumni->nama_lengkap) }}" required>
                    @error('nama_lengkap') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-6">
                    <label for="tahun_lulus" class="form-label">Tahun Lulus <span class="text-danger">*</span></label>
                    <input type="number" name="tahun_lulus" id="tahun_lulus" class="form-control @error('tahun_lulus') is-invalid @enderror" value="{{ old('tahun_lulus', $alumni->tahun_lulus) }}" required min="1900" max="{{ date('Y') }}">
                    @error('tahun_lulus') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-6">
                    <label for="jurusan" class="form-label">Jurusan <span class="text-danger">*</span></label>
                    <input type="text" name="jurusan" id="jurusan" class="form-control @error('jurusan') is-invalid @enderror" value="{{ old('jurusan', $alumni->jurusan) }}" required>
                    @error('jurusan') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-6">
                    <label for="email" class="form-label">Email (Opsional)</label>
                    <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $alumni->email) }}">
                    @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-6">
                    <label for="nomor_telepon" class="form-label">Nomor Telepon (Opsional)</label>
                    <input type="text" name="nomor_telepon" id="nomor_telepon" class="form-control @error('nomor_telepon') is-invalid @enderror" value="{{ old('nomor_telepon', $alumni->nomor_telepon) }}">
                    @error('nomor_telepon') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <div class="col-12">
                    <label for="pekerjaan_saat_ini" class="form-label">Pekerjaan Saat Ini (Opsional)</label>
                    <input type="text" name="pekerjaan_saat_ini" id="pekerjaan_saat_ini" class="form-control" value="{{ old('pekerjaan_saat_ini', $alumni->pekerjaan_saat_ini) }}">
                </div>

                <div class="col-12">
                    <label for="perusahaan_saat_ini" class="form-label">Perusahaan Saat Ini (Opsional)</label>
                    <input type="text" name="perusahaan_saat_ini" id="perusahaan_saat_ini" class="form-control" value="{{ old('perusahaan_saat_ini', $alumni->perusahaan_saat_ini) }}">
                </div>

                <div class="col-12">
                    <label for="link_profil_linkedin" class="form-label">Link Profil LinkedIn (Opsional)</label>
                    <input type="url" name="link_profil_linkedin" id="link_profil_linkedin" class="form-control @error('link_profil_linkedin') is-invalid @enderror" value="{{ old('link_profil_linkedin', $alumni->link_profil_linkedin) }}">
                    @error('link_profil_linkedin') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
            </div>

            <hr class="my-4">
            <h5 class="mb-3 text-primary">Informasi Karier Tambahan</h5>

            <div class="row g-3">
                <div class="col-md-6">
                    <label for="posisi_awal" class="form-label">Posisi Awal Setelah Lulus (Opsional)</label>
                    <input type="text" name="posisi_awal" id="posisi_awal" class="form-control" value="{{ old('posisi_awal', $alumni->posisi_awal) }}">
                </div>
                <div class="col-md-6">
                    <label for="perusahaan_awal" class="form-label">Perusahaan Awal (Opsional)</label>
                    <input type="text" name="perusahaan_awal" id="perusahaan_awal" class="form-control" value="{{ old('perusahaan_awal', $alumni->perusahaan_awal) }}">
                </div>
                <div class="col-md-6">
                    <label for="bidang_keahlian_utama" class="form-label">Bidang Keahlian Utama (Opsional)</label>
                    <input type="text" name="bidang_keahlian_utama" id="bidang_keahlian_utama" class="form-control" value="{{ old('bidang_keahlian_utama', $alumni->bidang_keahlian_utama) }}" placeholder="Contoh: Web Development, Data Analysis">
                </div>
                <div class="col-md-6">
                    <label for="info_kontak_karier" class="form-label">Info Kontak Karier (Email/WA, Opsional)</label>
                    <input type="text" name="info_kontak_karier" id="info_kontak_karier" class="form-control" value="{{ old('info_kontak_karier', $alumni->info_kontak_karier) }}">
                </div>
                <div class="col-12">
                    <label for="sertifikasi_profesional" class="form-label">Sertifikasi Profesional (Pisahkan dengan koma, Opsional)</label>
                    <textarea name="sertifikasi_profesional" id="sertifikasi_profesional" class="form-control" rows="3">{{ old('sertifikasi_profesional', $alumni->sertifikasi_profesional) }}</textarea>
                </div>
                <div class="col-12">
                    <div class="form-check mt-2">
                        <input class="form-check-input" type="checkbox" name="bersedia_menjadi_mentor" id="bersedia_menjadi_mentor" value="1" {{ old('bersedia_menjadi_mentor', $alumni->bersedia_menjadi_mentor) ? 'checked' : '' }}>
                        <label class="form-check-label" for="bersedia_menjadi_mentor">
                            Bersedia menjadi mentor / dihubungi untuk urusan karier
                        </label>
                    </div>
                </div>
            </div>

            <hr class="my-4">

            <div class="d-flex justify-content-end">
                <a href="{{ route('alumni.show', $alumni->id) }}" class="btn btn-outline-secondary me-2">
                     <i class="bi bi-x-circle-fill me-2"></i>Batal
                </a>
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-arrow-clockwise me-2"></i>Update Data
                </button>
            </div>
        </form>
    </div>
</div>
@endsection