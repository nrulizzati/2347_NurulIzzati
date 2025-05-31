@extends('layouts.app')

@section('title', 'Edit Profil Admin - ' . $user->name)

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-7">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white"> {{-- Diubah ke bg-primary --}}
                    <h4 class="mb-0"><i class="bi bi-shield-lock-fill me-2"></i>Edit Profil Akun Admin</h4>
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
                     @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ route('profile.update') }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-floating mb-3">
                            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $user->name) }}" required placeholder="Nama Lengkap">
                            <label for="name"><i class="bi bi-person-fill me-2"></i>Nama Lengkap</label>
                            @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="form-floating mb-3">
                            <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $user->email) }}" required placeholder="Alamat Email">
                            <label for="email"><i class="bi bi-envelope-fill me-2"></i>Alamat Email</label>
                            @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <hr class="my-4">
                        <h5 class="text-primary mb-3">Ganti Password (Kosongkan jika tidak ingin diubah)</h5>
                        <div class="form-floating mb-3">
                            <input type="password" name="current_password" id="current_password" class="form-control @error('current_password') is-invalid @enderror" placeholder="Password Saat Ini">
                            <label for="current_password">Password Saat Ini</label>
                            @error('current_password') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" name="new_password" id="new_password" class="form-control @error('new_password') is-invalid @enderror" placeholder="Password Baru">
                            <label for="new_password">Password Baru (min. 8 karakter)</label>
                            @error('new_password') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" name="new_password_confirmation" id="new_password_confirmation" class="form-control" placeholder="Konfirmasi Password Baru">
                            <label for="new_password_confirmation">Konfirmasi Password Baru</label>
                        </div>

                        <hr class="my-4">
                        <div class="d-flex justify-content-end">
                            <a href="{{ route('profile.show') }}" class="btn btn-outline-secondary me-2">
                                 <i class="bi bi-x-circle-fill me-2"></i>Batal
                            </a>
                            <button type="submit" class="btn btn-primary"> {{-- Diubah ke btn-primary --}}
                                <i class="bi bi-save-fill me-2"></i>Update Akun Admin
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection