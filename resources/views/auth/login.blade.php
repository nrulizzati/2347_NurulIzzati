@extends('layouts.app')

@section('title', 'Login Akun')

@section('content')
<div class="container py-5"> {{-- Menambahkan padding atas dan bawah pada container utama --}}
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5 col-xl-4"> {{-- Sedikit menyesuaikan lebar kolom untuk layar berbeda --}}
            <div class="card shadow-lg border-0 rounded-lg">
                <div class="card-header bg-primary text-white text-center py-4"> {{-- Menambah padding vertikal --}}
                    <h3 class="fw-light mb-0"> <i class="bi bi-box-arrow-in-right me-2"></i>Login ke Akun Anda</h3>
                </div>
                <div class="card-body p-4 p-md-5"> {{-- Menambah padding lebih besar --}}
                    @if (session('status'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('status') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                     @if (session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="bi bi-exclamation-triangle-fill me-2"></i>{{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    @error('email') {{-- Menampilkan error umum di atas form jika ada dari controller (misal kredensial salah) --}}
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="bi bi-exclamation-triangle-fill me-2"></i>{{ $message }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @enderror


                    <form method="POST" action="{{ route('auth.login') }}">
                        @csrf

                        <div class="form-floating mb-3">
                            <input id="email" type="email" class="form-control @error('email_specific') is-invalid @enderror" name="email" value="{{ old('email', request()->get('email')) }}" required autocomplete="email" autofocus placeholder="name@example.com">
                            <label for="email"><i class="bi bi-envelope-fill me-2"></i>Alamat Email</label>
                            @error('email_specific') {{-- Ganti nama error jika ingin spesifik per field --}}
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-floating mb-3">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">
                            <label for="password"><i class="bi bi-key-fill me-2"></i>Password</label>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label" for="remember">
                                    Ingat Saya
                                </label>
                            </div>
                            @if (Route::has('password.request')) {{-- Pastikan route password.request ada --}}
                                <div>
                                    <a class="small text-decoration-none" href="{{-- route('password.request') --}}">Lupa Password?</a>
                                </div>
                            @endif
                        </div>


                        <div class="d-grid mt-4 mb-2">
                            <button type="submit" class="btn btn-primary btn-lg fw-bold">
                                <i class="bi bi-box-arrow-in-right me-2"></i>LOGIN
                            </button>
                        </div>
                    </form>
                </div>
                <div class="card-footer text-center py-3 bg-light">
                    <div class="small">Belum punya akun? <a href="{{ route('auth.register') }}" class="fw-bold text-decoration-none">Register di sini!</a></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles') {{-- Contoh jika ingin menambahkan CSS spesifik hanya untuk halaman ini --}}
<style>
    .card-header h3 {
        font-size: 1.5rem; /* Sesuaikan ukuran font header */
    }
    .form-floating > .form-control:not(:placeholder-shown) ~ label {
        opacity: .85;
        transform: scale(.75) translateY(-0.9rem) translateX(0.15rem); /* Sedikit penyesuaian posisi label floating */
    }
    .form-floating > label {
        padding: 1rem 0.95rem; /* Padding label floating agar ikon tidak tertutup */
    }
</style>
@endpush