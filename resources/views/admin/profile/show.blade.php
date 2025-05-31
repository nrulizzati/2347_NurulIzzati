@extends('layouts.app')

@section('title', 'Profil Admin - ' . $user->name)

@section('content')
<div class="container py-4">
    <div class="row">
        <div class="col-lg-4 mb-4 mb-lg-0">
            {{-- Card Informasi Akun Admin --}}
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0"><i class="bi bi-person-circle me-2"></i>Informasi Akun Admin</h4>
                </div>
                <div class="card-body">
                    <dl class="row">
                        <dt class="col-sm-4 text-muted">Nama:</dt>
                        <dd class="col-sm-8">{{ $user->name }}</dd>

                        <dt class="col-sm-4 text-muted">Email:</dt>
                        <dd class="col-sm-8">{{ $user->email }}</dd>

                        <dt class="col-sm-4 text-muted">Role:</dt>
                        <dd class="col-sm-8"><span class="badge bg-danger">{{ Str::upper($user->role) }}</span></dd>

                        <dt class="col-sm-4 text-muted">Terdaftar:</dt>
                        <dd class="col-sm-8">{{ $user->created_at->isoFormat('LLLL') }}</dd>
                    </dl>
                    <a href="{{ route('profile.edit') }}" class="btn btn-outline-primary btn-sm mt-2 w-100">
                        <i class="bi bi-pencil-square me-1"></i> Edit Akun & Password
                    </a>
                </div>
            </div>
        </div>

        <div class="col-lg-8">
            {{-- CARD BARU UNTUK VERIFIKASI ALUMNI --}}
            <div class="card shadow-sm">
                <div class="card-header bg-warning text-dark">
                    <h4 class="mb-0"><i class="bi bi-patch-check-fill me-2"></i>Alumni Menunggu Verifikasi</h4>
                </div>
                <div class="card-body">
                    @if($alumniMenungguVerifikasi->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-sm table-hover align-middle">
                                <thead class="table-light">
                                    <tr>
                                        <th>Nama Lengkap</th>
                                        <th>NIM</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($alumniMenungguVerifikasi as $alum)
                                        <tr>
                                            <td>
                                                <a href="{{ route('alumni.show', $alum->id) }}" target="_blank" title="Lihat Detail Alumni">
                                                    <strong>{{ $alum->nama_lengkap }}</strong>
                                                </a>
                                                <br><small class="text-muted">{{ $alum->jurusan }} - Lulus {{ $alum->tahun_lulus }}</small>
                                            </td>
                                            <td>{{ $alum->nim }}</td>
                                            <td class="text-center">
                                                <form action="{{ route('admin.alumni.verify', $alum->id) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button type="submit" class="btn btn-success btn-sm" title="Verifikasi Alumni Ini">
                                                        <i class="bi bi-check-lg"></i> Verifikasi
                                                    </button>
                                                </form>
                                                {{-- Tambahkan tombol reject jika Anda sempat buat logicnya --}}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        @if($alumniMenungguVerifikasi->hasPages())
                        <div class="mt-3 d-flex justify-content-center">
                            {{ $alumniMenungguVerifikasi->appends(request()->except('verifikasi_page'))->links() }}
                        </div>
                        @endif
                    @else
                        <p class="text-muted fst-italic mb-0">Tidak ada data alumni yang menunggu verifikasi saat ini.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection