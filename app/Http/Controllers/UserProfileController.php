<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Alumni;
use App\Models\User;

class UserProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show()
    {
        $user = Auth::user(); // Data user yang login (dari tabel users)
        $alumni = null; // Inisialisasi variabel $alumni

        if ($user->role === 'admin') {
            // Ambil alumni yang menunggu verifikasi untuk admin
            $alumniMenungguVerifikasi = Alumni::where('is_verified', false)
                                            ->orderBy('created_at', 'desc')
                                            ->paginate(10, ['*'], 'verifikasi_page'); // Nama page khusus untuk pagination
            return view('admin.profile.show', compact('user', 'alumniMenungguVerifikasi'));
        }

        // Jika bukan admin (berarti alumni)
        $alumni = Alumni::where('user_id', $user->id)->with('pengalamanKerja')->first();

        if (!$alumni) {
            return redirect()->route('alumni.create')
                            ->with('info', 'Profil alumni Anda belum lengkap. Silakan lengkapi data Anda.')
                            ->withInput(['nama_lengkap' => $user->name, 'email' => $user->email]);
        }

        // Kirim data user dan data alumni (jika ada) ke view profil
        return view('profile.show', compact('user', 'alumni'));
    }

    // ... (method edit dan update untuk AKUN PENGGUNA, bukan profil alumni) ...
    // Kita akan buat ini nanti jika Anda ingin admin/alumni bisa edit email/password login mereka
    public function edit()
    {
        $user = Auth::user();
        if ($user->role === 'admin') {
            return view('admin.profile.edit', compact('user')); // View edit profil admin
        }
        // Untuk alumni, kita mungkin ingin membedakan edit akun dan edit profil alumni.
        // Atau, biarkan 'alumni.edit' menangani profil alumni, dan buat view baru untuk edit akun user.
        // Untuk saat ini, anggap 'profile.edit' untuk edit data di tabel 'users'.
        return view('profile.edit_account', compact('user')); // Buat view profile.edit_account.blade.php
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', \Illuminate\Validation\Rule::unique('users')->ignore($user->id)],
            // Validasi password jika ada
            // 'current_password' => ['nullable', 'required_with:new_password', 'current_password'],
            // 'new_password' => ['nullable', 'min:8', 'confirmed'],
        ]);

        $user->name = $request->name;
        $user->email = $request->email;

        // if ($request->filled('new_password')) {
        //     $user->password = \Illuminate\Support\Facades\Hash::make($request->new_password);
        // }

        $user->save();

        // Jika nama user diupdate, dan dia adalah alumni, update juga nama_lengkap di profil alumni
        if ($user->role === 'alumni' && $user->alumniProfile && $user->alumniProfile->nama_lengkap !== $user->name) {
            $user->alumniProfile->nama_lengkap = $user->name;
            $user->alumniProfile->save();
        }

        return redirect()->route('profile.show')->with('success', 'Informasi akun berhasil diperbarui.');
    }
}