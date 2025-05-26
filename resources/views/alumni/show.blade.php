@extends('layouts.app')

@section('title', 'Detail Alumni - ' . $alumni->nama_lengkap)

@section('content')
<div class="card shadow-sm">
    <div class="card-header">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="mb-0">Detail Alumni: <span class="fw-normal">{{ $alumni->nama_lengkap }}</span></h2>
            <div>
                <a href="{{ route('alumni.edit', $alumni) }}" class="btn btn-warning btn-sm">
                    <i class="bi bi-pencil-square me-1"></i> Edit
                </a>
                <a href="{{ route('alumni.index') }}" class="btn btn-outline-secondary btn-sm">
                    <i class="bi bi-arrow-left-circle-fill me-1"></i> Kembali ke Daftar
                </a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <dl class="row mt-3">
            <dt class="col-sm-3 text-muted">NIM:</dt>
            <dd class="col-sm-9">{{ $alumni->nim }}</dd>

            <dt class="col-sm-3 text-muted">Nama Lengkap:</dt>
            <dd class="col-sm-9">{{ $alumni->nama_lengkap }}</dd>

            <dt class="col-sm-3 text-muted">Tahun Lulus:</dt>
            <dd class="col-sm-9">{{ $alumni->tahun_lulus }}</dd>

            <dt class="col-sm-3 text-muted">Jurusan:</dt>
            <dd class="col-sm-9">{{ $alumni->jurusan }}</dd>

            <dt class="col-sm-3 text-muted pt-2">Email:</dt>
            <dd class="col-sm-9 pt-2">{{ $alumni->email ?? '-' }}</dd>

            <dt class="col-sm-3 text-muted pt-2">Nomor Telepon:</dt>
            <dd class="col-sm-9 pt-2">{{ $alumni->nomor_telepon ?? '-' }}</dd>

            <dt class="col-sm-3 text-muted pt-2">Pekerjaan Saat Ini:</dt>
            <dd class="col-sm-9 pt-2">{{ $alumni->pekerjaan_saat_ini ?? '-' }}</dd>

            <dt class="col-sm-3 text-muted pt-2">Perusahaan Saat Ini:</dt>
            <dd class="col-sm-9 pt-2">{{ $alumni->perusahaan_saat_ini ?? '-' }}</dd>

            <dt class="col-sm-3 text-muted pt-2">Link Profil LinkedIn:</dt>
            <dd class="col-sm-9 pt-2">
                @if($alumni->link_profil_linkedin)
                    <a href="{{ $alumni->link_profil_linkedin }}" target="_blank" rel="noopener noreferrer">{{ $alumni->link_profil_linkedin }}</a>
                @else
                    -
                @endif
            </dd>

            <dt class="col-sm-3 text-muted pt-2 border-top mt-3">Posisi Awal:</dt>
            <dd class="col-sm-9 pt-2 border-top mt-3">{{ $alumni->posisi_awal ?? '-' }}</dd>

            <dt class="col-sm-3 text-muted pt-2">Perusahaan Awal:</dt>
            <dd class="col-sm-9 pt-2">{{ $alumni->perusahaan_awal ?? '-' }}</dd>

            <dt class="col-sm-3 text-muted pt-2">Bidang Keahlian Utama:</dt>
            <dd class="col-sm-9 pt-2">{{ $alumni->bidang_keahlian_utama ?? '-' }}</dd>

            <dt class="col-sm-3 text-muted pt-2">Sertifikasi Profesional:</dt>
            <dd class="col-sm-9 pt-2">
                @if($alumni->sertifikasi_profesional)
                    @foreach(explode(',', $alumni->sertifikasi_profesional) as $sertifikasi)
                        <span class="badge bg-secondary me-1 mb-1">{{ trim($sertifikasi) }}</span>
                    @endforeach
                @else
                    -
                @endif
            </dd>

            <dt class="col-sm-3 text-muted pt-2">Bersedia Menjadi Mentor:</dt>
            <dd class="col-sm-9 pt-2">
                @if($alumni->bersedia_menjadi_mentor)
                    <span class="badge bg-success"><i class="bi bi-check-circle-fill me-1"></i> Ya</span>
                @else
                    <span class="badge bg-danger"><i class="bi bi-x-circle-fill me-1"></i> Tidak</span>
                @endif
            </dd>

            <dt class="col-sm-3 text-muted pt-2">Info Kontak Karier:</dt>
            <dd class="col-sm-9 pt-2">{{ $alumni->info_kontak_karier ?? '-' }}</dd>

            <dt class="col-sm-3 text-muted pt-2 border-top mt-3">Riwayat Pekerjaan:</dt>
            <dd class="col-sm-9 pt-2 border-top mt-3">
                @if($alumni->pengalamanKerja->count() > 0)
                    <ul class="list-group list-group-flush mb-0">
                        @foreach($alumni->pengalamanKerja as $pk)
                            <li class="list-group-item px-0 py-2">
                                <div class="d-flex w-100 justify-content-between">
                                    <h5 class="mb-1 fw-semibold">{{ $pk->posisi }}</h5>
                                    <small class="text-muted">
                                        {{ \Carbon\Carbon::parse($pk->tanggal_mulai)->isoFormat('MMM YYYY') }} -
                                        {{ $pk->tanggal_selesai ? \Carbon\Carbon::parse($pk->tanggal_selesai)->isoFormat('MMM YYYY') : 'Sekarang' }}
                                    </small>
                                </div>
                                <p class="mb-1">
                                    <strong>{{ $pk->nama_perusahaan }}</strong>
                                    {{ $pk->lokasi_perusahaan ? ' - ' . $pk->lokasi_perusahaan : '' }}
                                </p>
                                @if($pk->deskripsi_pekerjaan)
                                    <small class="text-muted fst-italic">{{ Str::limit($pk->deskripsi_pekerjaan, 200) }}</small>
                                @endif
                                {{-- Tombol Edit/Hapus Pengalaman Kerja --}}
                                <div class="mt-2">
                                    {{-- Tombol Edit --}}
                                    <a href="{{ route('pengalamanKerja.edit', $pk->id) }}" class="btn btn-outline-warning btn-sm py-0 px-1 me-1" title="Edit Pengalaman Kerja">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                    {{-- Form Hapus --}}
                                    <form action="{{ route('pengalamanKerja.destroy', $pk->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Anda yakin ingin menghapus pengalaman kerja sebagai \'{{ $pk->posisi }}\' di \'{{ $pk->nama_perusahaan }}\'?')">
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
                    <p class="fst-italic mb-0">Belum ada data pengalaman kerja.</p>
                @endif
                {{-- Tombol untuk menambah pengalaman kerja baru untuk alumni ini --}}
                <div class="mt-3">
                    <a href="{{ route('alumni.pengalamanKerja.create', $alumni->id) }}" class="btn btn-outline-primary btn-sm">
                        <i class="bi bi-plus-circle me-1"></i> Tambah Pengalaman Kerja
                    </a>
                </div>
            </dd>

            <dt class="col-sm-3 text-muted pt-2 border-top mt-3">Dibuat Pada:</dt>
            <dd class="col-sm-9 pt-2 border-top mt-3">
                @if($alumni->created_at)
                    {{ $alumni->created_at->format('d F Y, H:i:s') }} ({{ $alumni->created_at->diffForHumans() }})
                @else
                    -
                @endif
            </dd>

            <dt class="col-sm-3 text-muted pt-2">Diperbarui Pada:</dt>
            <dd class="col-sm-9 pt-2">
                @if($alumni->updated_at)
                    {{ $alumni->updated_at->format('d F Y, H:i:s') }} ({{ $alumni->updated_at->diffForHumans() }})
                @else
                    -
                @endif
            </dd>
        </dl>
    </div>
    <div class="card-footer text-muted">
        Data terakhir diperbarui: {{ $alumni->updated_at ? $alumni->updated_at->diffForHumans() : 'Belum pernah' }}
    </div>
</div>
@endsection