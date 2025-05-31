<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Import Controllers
use App\Http\Controllers\AlumniController;
use App\Http\Controllers\PengalamanKerjaController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Admin\AlumniVerificationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    if (Auth::check()) {
        return redirect()->route('alumni.index');
    }
    return redirect()->route('auth.login');
})->name('home');


// Grup Route untuk Autentikasi
Route::prefix('auth')->name('auth.')->group(function () {
    Route::middleware('guest')->group(function () {
        Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
        Route::post('/register', [RegisterController::class, 'register']);
        Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
        Route::post('/login', [LoginController::class, 'login']);
    });

    Route::middleware('auth')->group(function () {
        Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    });
});


// Grup Route yang Memerlukan Autentikasi
Route::middleware('auth')->group(function () {
    // Resource untuk Alumni
    Route::resource('alumni', AlumniController::class)->parameters([
        'alumni' => 'alumni'
    ]);

    // Nested Resource untuk Pengalaman Kerja, di bawah Alumni
    Route::resource('alumni.pengalamanKerja', PengalamanKerjaController::class)
        ->parameters(['alumni' => 'alumni'])
        ->except(['index', 'show'])
        ->shallow();

    // Route untuk Profil Pengguna (Profil Saya)
    Route::get('/profil-saya', [UserProfileController::class, 'show'])->name('profile.show');
    Route::get('/profil-saya/edit', [UserProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profil-saya', [UserProfileController::class, 'update'])->name('profile.update');

    // Route untuk Aksi Verifikasi Alumni oleh Admin
    Route::patch('/admin/alumni/{alumni}/verify', [AlumniVerificationController::class, 'verify'])->name('admin.alumni.verify');
    // Jika Anda implementasi reject:
    Route::patch('/admin/alumni/{alumni}/reject', [AlumniVerificationController::class, 'reject'])->name('admin.alumni.reject');
});