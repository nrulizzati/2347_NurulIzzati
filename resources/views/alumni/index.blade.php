@extends('layouts.app')

@section('title', 'Daftar Alumni')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="mb-0">Daftar Alumni</h1>
    <a href="{{ route('alumni.create') }}" class="btn btn-success">
        <i class="bi bi-plus-circle-fill me-2"></i>Tambah Alumni Baru
    </a>
</div>

<div class="card shadow-sm mb-4">
    <div class="card-body p-3">
        <form action="{{ route('alumni.index') }}" method="GET" class="row g-2 align-items-end">
            <div class="col-md-3">
                <label for="search_nama" class="form-label form-label-sm">Nama Alumni</label>
                <input type="text" name="search_nama" id="search_nama" class="form-control form-control-sm" placeholder="Cari Nama..." value="{{ request('search_nama') }}">
            </div>
            <div class="col-md-3">
                <label for="search_keahlian" class="form-label form-label-sm">Bidang Keahlian</label>
                <input type="text" name="search_keahlian" id="search_keahlian" class="form-control form-control-sm" placeholder="Cari Keahlian..." value="{{ request('search_keahlian') }}">
            </div>
            <div class="col-md-3">
                <label for="search_perusahaan" class="form-label form-label-sm">Perusahaan Saat Ini</label>
                <input type="text" name="search_perusahaan" id="search_perusahaan" class="form-control form-control-sm" placeholder="Cari Perusahaan..." value="{{ request('search_perusahaan') }}">
            </div>
            <div class="col-md-2">
                <label for="search_mentor" class="form-label form-label-sm">Mentor?</label>
                <select name="search_mentor" id="search_mentor" class="form-select form-select-sm">
                    <option value="">Semua</option>
                    <option value="1" {{ request('search_mentor') == '1' ? 'selected' : '' }}>Ya</option>
                    <option value="0" {{ request('search_mentor') == '0' && request('search_mentor') !== null ? 'selected' : '' }}>Tidak</option>
                </select>
            </div>
            <div class="col-md-1 d-flex align-items-end">
                <button type="submit" class="btn btn-primary btn-sm w-100"><i class="bi bi-search"></i></button>
            </div>
        </form>
    </div>
</div>

<div class="card shadow-sm">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover table-striped table-bordered align-middle">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">NIM</th>
                        <th scope="col">Nama Lengkap</th>
                        <th scope="col">Tahun Lulus</th>
                        <th scope="col">Jurusan</th>
                        <th scope="col">Pekerjaan Saat Ini</th>
                        <th scope="col" class="text-center" style="width: 230px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($alumni as $index => $item)
                        <tr>
                            <td>{{ ($alumni->currentPage() - 1) * $alumni->perPage() + $loop->iteration }}</td>
                            <td>{{ $item->nim }}</td>
                            <td>{{ $item->nama_lengkap }}</td>
                            <td>{{ $item->tahun_lulus }}</td>
                            <td>{{ $item->jurusan }}</td>
                            <td>{{ $item->pekerjaan_saat_ini ?? '-' }}</td>
                            <td class="text-center">
                                <div class="mb-1"> {{-- Baris pertama untuk Detail dan Edit --}}
                                    <a href="{{ route('alumni.show', $item) }}" class="btn btn-info btn-sm" title="Detail" style="min-width: 80px;">
                                        <i class="bi bi-eye-fill"></i> Detail
                                    </a>
                                    <a href="{{ route('alumni.edit', $item) }}" class="btn btn-warning btn-sm ms-1" title="Edit" style="min-width: 80px;">
                                        <i class="bi bi-pencil-square"></i> Edit
                                    </a>
                                </div>
                                <div> {{-- Baris kedua untuk Hapus --}}
                                    <form action="{{ route('alumni.destroy', $item) }}" method="POST" class="d-inline-block w-100" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data alumni {{ $item->nama_lengkap }}?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm w-100" title="Hapus" style="max-width: 165px;"> {{-- Sesuaikan max-width agar mirip dengan gabungan Detail+Edit --}}
                                            <i class="bi bi-trash3-fill"></i> Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center fst-italic py-4">Belum ada data alumni.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($alumni->hasPages())
        <div class="mt-3 d-flex justify-content-center">
            {{ $alumni->links() }}
        </div>
        @endif
    </div>
</div>
@endsection

@section('scripts')
{{-- <script>
    // Contoh script jika diperlukan
    console.log('Halaman daftar alumni dimuat.');
</script> --}}
@endsection