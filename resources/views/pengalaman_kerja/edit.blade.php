@extends('layouts.app')

@section('title', 'Edit Pengalaman Kerja - ' . $pengalamanKerja->posisi)

@section('content')
<div class="card shadow-sm">
    <div class="card-header">
        <h1 class="mb-0">Edit Pengalaman Kerja</h1>
        <h5 class="mb-0 text-muted">Untuk Alumni: {{ $pengalamanKerja->alumni->nama_lengkap }} ({{ $pengalamanKerja->alumni->nim }})</h5>
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

        {{-- Karena route di-shallow, kita tidak perlu $alumni->id di action --}}
        <form action="{{ route('pengalamanKerja.update', $pengalamanKerja->id) }}" method="POST">
            @csrf
            @method('PUT') {{-- Method spoofing untuk UPDATE --}}

            <div class="row g-3">
                <div class="col-md-12">
                    <label for="posisi" class="form-label">Posisi <span class="text-danger">*</span></label>
                    <input type="text" name="posisi" id="posisi" class="form-control @error('posisi') is-invalid @enderror" value="{{ old('posisi', $pengalamanKerja->posisi) }}" required>
                    @error('posisi') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="col-md-6">
                    <label for="nama_perusahaan" class="form-label">Nama Perusahaan <span class="text-danger">*</span></label>
                    <input type="text" name="nama_perusahaan" id="nama_perusahaan" class="form-control @error('nama_perusahaan') is-invalid @enderror" value="{{ old('nama_perusahaan', $pengalamanKerja->nama_perusahaan) }}" required>
                    @error('nama_perusahaan') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="col-md-6">
                    <label for="lokasi_perusahaan" class="form-label">Lokasi Perusahaan (Opsional)</label>
                    <input type="text" name="lokasi_perusahaan" id="lokasi_perusahaan" class="form-control" value="{{ old('lokasi_perusahaan', $pengalamanKerja->lokasi_perusahaan) }}">
                </div>
                <div class="col-md-6">
                    <label for="tanggal_mulai" class="form-label">Tanggal Mulai <span class="text-danger">*</span></label>
                    <input type="date" name="tanggal_mulai" id="tanggal_mulai" class="form-control @error('tanggal_mulai') is-invalid @enderror" value="{{ old('tanggal_mulai', $pengalamanKerja->tanggal_mulai ? \Carbon\Carbon::parse($pengalamanKerja->tanggal_mulai)->format('Y-m-d') : '') }}" required>
                    @error('tanggal_mulai') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="col-md-6">
                    <label for="tanggal_selesai" class="form-label">Tanggal Selesai (Kosongkan jika masih bekerja)</label>
                    <input type="date" name="tanggal_selesai" id="tanggal_selesai" class="form-control @error('tanggal_selesai') is-invalid @enderror" value="{{ old('tanggal_selesai', $pengalamanKerja->tanggal_selesai ? \Carbon\Carbon::parse($pengalamanKerja->tanggal_selesai)->format('Y-m-d') : '') }}">
                    @error('tanggal_selesai') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
                <div class="col-12">
                    <label for="deskripsi_pekerjaan" class="form-label">Deskripsi Pekerjaan (Opsional)</label>
                    <textarea name="deskripsi_pekerjaan" id="deskripsi_pekerjaan" class="form-control" rows="4">{{ old('deskripsi_pekerjaan', $pengalamanKerja->deskripsi_pekerjaan) }}</textarea>
                </div>
            </div>

            <hr class="my-4">
            <div class="d-flex justify-content-end">
                {{-- Tombol batal kembali ke halaman detail alumni --}}
                <a href="{{ route('alumni.show', $pengalamanKerja->alumni_id) }}" class="btn btn-outline-secondary me-2">
                    <i class="bi bi-x-circle-fill me-2"></i>Batal
                </a>
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-arrow-clockwise me-2"></i>Update Pengalaman
                </button>
            </div>
        </form>
    </div>
</div>
@endsection