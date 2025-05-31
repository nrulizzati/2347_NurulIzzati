@extends('layouts.app')

@section('title', 'Register Akun Baru')

@section('content')
<div class="container py-5"> {{-- Menambahkan padding vertikal seperti login --}}
    <div class="row justify-content-center">
        <div class="col-md-7 col-lg-6 col-xl-5"> {{-- Menyesuaikan lebar kolom --}}
            <div class="card shadow-lg border-0 rounded-lg">
                <div class="card-header bg-primary text-white text-center py-4"> {{-- Diubah ke bg-primary dan padding disamakan --}}
                    <h3 class="fw-light mb-0"><i class="bi bi-person-plus-fill me-2"></i>Buat Akun Baru</h3>
                </div>
                <div class="card-body p-4 p-md-5">
                    <form method="POST" action="{{ route('auth.register') }}">
                        @csrf

                        <div class="form-floating mb-3">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Nama Lengkap Anda">
                            <label for="name"><i class="bi bi-person-fill me-2"></i>Nama Lengkap</label>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-floating mb-3">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="name@example.com">
                            <label for="email"><i class="bi bi-envelope-fill me-2"></i>Alamat Email</label>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-floating mb-3">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">
                            <label for="password"><i class="bi bi-key-fill me-2"></i>Password (min. 8 karakter)</label>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-floating mb-3">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Konfirmasi Password">
                            <label for="password-confirm"><i class="bi bi-shield-lock-fill me-2"></i>Konfirmasi Password</label>
                        </div>

                        {{-- Bagian opsional untuk info alumni dasar bisa Anda aktifkan dan sesuaikan jika perlu --}}

                        <div class="d-grid mt-4 mb-2"> {{-- Menambah margin bottom seperti login --}}
                            <button type="submit" class="btn btn-primary btn-lg fw-bold"> {{-- Diubah ke btn-primary dan ditambah fw-bold --}}
                                <i class="bi bi-person-check-fill me-2"></i>REGISTER
                            </button>
                        </div>
                    </form>
                </div>
                <div class="card-footer text-center py-3 bg-light"> {{-- Menambah bg-light seperti login --}}
                    <div class="small">Sudah punya akun? <a href="{{ route('auth.login') }}" class="fw-bold text-decoration-none">Login di sini!</a></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    .card-header h3 {
        font-size: 1.5rem;
    }
    .form-floating > .form-control:not(:placeholder-shown) ~ label {
        opacity: .85;
        transform: scale(.75) translateY(-0.9rem) translateX(0.15rem);
    }
    .form-floating > label {
        padding: 1rem 0.95rem;
    }
</style>
@endpush