<?php

use App\Http\Controllers\PengalamanKerjaController;
use App\Http\Controllers\AlumniController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('alumni', AlumniController::class)->parameters([
    'alumni' => 'alumni' 
]);

Route::resource('alumni.pengalamanKerja', PengalamanKerjaController::class)
    ->parameters(['alumni' => 'alumni'])
    ->except(['index', 'show']) // Kita tampilkan di detail alumni, jadi index & show tidak perlu route terpisah
    ->shallow(); // Membuat route untuk action edit, update, destroy tidak nested