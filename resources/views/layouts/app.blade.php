<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Sistem Informasi Alumni')</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">


    <!-- Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

    <style>
        :root {
            --bs-primary-rgb: 13, 110, 253; /* Bootstrap default blue, bisa diganti */
            --bs-secondary-rgb: 108, 117, 125;
            --custom-blue: #005A9C; /* Biru yang lebih gelap untuk aksen */
            --custom-light-blue: #E6F0FF; /* Biru muda untuk background atau highlight */
            --custom-dark-text: #333;
            --custom-light-text: #777;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f0f4f8; /* Latar belakang sedikit kebiruan/abu-abu */
            color: var(--custom-dark-text);
            padding-top: 50px; /* Space untuk fixed navbar */
        }

        .navbar-custom {
            background-color: var(--custom-blue) !important; /* Navbar Biru Tua */
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .navbar-custom .navbar-brand,
        .navbar-custom .nav-link {
            color: #ffffff !important; /* Teks Navbar Putih */
            font-weight: 500;
        }
        .navbar-custom .nav-link:hover,
        .navbar-custom .nav-link.active {
            color: #e0e0e0 !important; /* Warna hover/active lebih soft */
        }
        .navbar-custom .navbar-toggler-icon {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='rgba%28255, 255, 255, 1%29' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
        }


        .main-container {
            background-color: #ffffff; 
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.08);
        }

        .card {
            border: none; /* Hapus border default card */
            border-radius: 12px; /* Border radius lebih besar */
            box-shadow: 0 4px 12px rgba(0,0,0,0.08); /* Shadow lebih soft */
            margin-bottom: 2rem;
        }
        .card-header {
            background-color: var(--custom-light-blue); /* Header card biru muda */
            color: var(--custom-blue); /* Teks header card biru tua */
            border-bottom: 1px solid #dee2e6;
            font-weight: 600;
            padding: 1rem 1.25rem;
            border-top-left-radius: 12px;
            border-top-right-radius: 12px;
        }
        .card-body {
            padding: 1.5rem;
        }
        .card-footer {
            background-color: #f8f9fa;
            border-top: 1px solid #dee2e6;
            border-bottom-left-radius: 12px;
            border-bottom-right-radius: 12px;
        }

        .table {
            margin-bottom: 0; /* Hapus margin bawah default tabel di dalam card */
        }
        .table thead th {
            background-color: var(--custom-blue); /* Header tabel biru tua */
            color: #ffffff;
            border-color: #004a80; /* Border header tabel lebih gelap sedikit */
            font-weight: 600;
            vertical-align: middle;
        }
        .table-hover tbody tr:hover {
            background-color: var(--custom-light-blue) !important; /* Hover row biru muda */
            color: var(--custom-blue);
        }
        .table td, .table th {
            vertical-align: middle;
        }

        .btn-primary {
            background-color: var(--custom-blue);
            border-color: var(--custom-blue);
            font-weight: 500;
        }
        .btn-primary:hover {
            background-color: #004a80;
            border-color: #004a80;
        }
        .btn-success {
            font-weight: 500;
        }
        .btn-info {
            background-color: #17a2b8; /* Default info, bisa disesuaikan */
            border-color: #17a2b8;
            color: white;
            font-weight: 500;
        }
         .btn-info:hover {
            background-color: #138496;
            border-color: #117a8b;
        }
        .btn-warning {
            font-weight: 500;
        }
        .btn-danger {
            font-weight: 500;
        }
        .btn-outline-secondary {
            font-weight: 500;
        }
        .btn-sm i {
            margin-right: 0.3rem;
        }
        .btn i {
             margin-right: 0.4rem;
        }

        .form-label {
            font-weight: 500;
            color: var(--custom-light-text);
        }
        .form-control:focus {
            border-color: var(--custom-blue);
            box-shadow: 0 0 0 0.25rem rgba(var(--bs-primary-rgb), 0.25);
        }

        h1, h2, h3, h4, h5, h6 {
            color: var(--custom-blue); /* Judul utama biru tua */
            font-weight: 600;
        }
        .page-title {
            font-size: 2rem;
            margin-bottom: 1.5rem;
            color: var(--custom-blue);
        }
        .main-container h1 { 
             color: var(--custom-dark-text); 
        }

        .alert {
            border-left-width: 5px;
            border-radius: 8px;
        }
        .alert-success {
            border-left-color: var(--bs-success);
        }
        .alert-danger {
            border-left-color: var(--bs-danger);
        }

        dl dt {
            font-weight: 500;
        }

    </style>
    @yield('styles')
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-custom fixed-top">
            <div class="container-fluid px-4">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <i class="bi bi-people-fill me-2"></i>Sistem Alumni
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('alumni.index') ? 'active' : '' }}" href="{{ route('alumni.index') }}">
                                <i class="bi bi-list-ul me-1"></i>Daftar Alumni
                            </a>
                        </li>
                        @auth
                            @if(Auth::user()->role == 'admin')
                                <li class="nav-item">
                                    <a class="nav-link {{ request()->routeIs('alumni.create') ? 'active' : '' }}" href="{{ route('alumni.create') }}">
                                        <i class="bi bi-person-plus-fill me-1"></i>Tambah Alumni
                                    </a>
                                </li>
                            @endif
                        @endauth
                    </ul>

                    <!-- Right Side Of Navbar (jika perlu login nanti) -->
                    <ul class="navbar-nav ms-auto">
                        @guest
                            @if (Route::has('auth.login'))
                                <li class="nav-item">
                                    <a class="nav-link {{ request()->routeIs('auth.login') ? 'active' : '' }}" href="{{ route('auth.login') }}">
                                        <i class="bi bi-box-arrow-in-right me-1"></i>Login
                                    </a>
                                </li>
                            @endif
                            @if (Route::has('auth.register'))
                                <li class="nav-item">
                                    <a class="nav-link {{ request()->routeIs('auth.register') ? 'active' : '' }}" href="{{ route('auth.register') }}">
                                        <i class="bi bi-person-plus-fill me-1"></i>Register
                                    </a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="bi bi-person-circle me-1"></i>{{ Auth::user()->name }}
                                    @if(Auth::user()->role == 'admin') <span class="badge bg-danger ms-1">Admin</span> @endif
                                </a>
                                <div class="dropdown-menu dropdown-menu-end animate slideIn" aria-labelledby="navbarDropdown"> {{-- Menambahkan animasi dropdown Bootstrap --}}
                                    <a class="dropdown-item" href="{{ route('profile.show') }}"> {{-- Pastikan route profile.show sudah ada --}}
                                        <i class="bi bi-person-badge me-2"></i>Profil Saya
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{ route('auth.logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <i class="bi bi-box-arrow-right me-2"></i>Logout
                                    </a>
                                    <form id="logout-form" action="{{ route('auth.logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            <div class="container-fluid px-4 main-container"> {{-- Menggunakan container-fluid untuk lebar penuh dengan padding --}}
              @if (session('success'))
                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                      <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
              @endif
              @if (session('error'))
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                      <i class="bi bi-exclamation-triangle-fill me-2"></i>{{ session('error') }}
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
              @endif

              @yield('content')
            </div>
        </main>
    </div>

    <!-- Bootstrap JS Bundle CDN (termasuk Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    @yield('scripts')
</body>
</html>