<?php

namespace App\Http\Controllers\Admin; 

use App\Http\Controllers\Controller;
use App\Models\Alumni;
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Auth;

class AlumniVerificationController extends Controller
{
    // Middleware untuk memastikan hanya admin yang bisa akses semua method di controller ini
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (Auth::check() && Auth::user()->role === 'admin') {
                return $next($request);
            }
            abort(403, 'AKSES DITOLAK. HANYA UNTUK ADMIN.');
            return null; // Untuk analisis statis
        });
    }

    /**
     * Verifikasi profil alumni.
     *
     * @param  \App\Models\Alumni  $alumni
     * @return \Illuminate\Http\RedirectResponse
     */
    public function verify(Alumni $alumni)
    {
        if (!$alumni->is_verified) {
            $alumni->is_verified = true;
            $alumni->verified_at = now();
            $alumni->verified_by = Auth::id(); // ID admin yang memverifikasi
            $alumni->save();

            //Kirim notifikasi ke alumni bahwa profilnya sudah diverifikasi
            if ($alumni->user) {
                $alumni->user->notify(new YourAlumniProfileVerifiedNotification($alumni));
            }

            return redirect()->route('profile.show')->with('success', 'Alumni "' . $alumni->nama_lengkap . '" berhasil diverifikasi.');
        }
        return redirect()->route('profile.show')->with('info', 'Alumni "' . $alumni->nama_lengkap . '" sudah diverifikasi sebelumnya.');
    }

    public function reject(Alumni $alumni)
    {
        // Logika untuk menolak verifikasi
        // Misalnya, hapus data alumni atau set status lain
        // $alumni->delete();
        // atau $alumni->update(['is_verified' => false, 'some_rejection_reason_column' => 'Alasan penolakan']);
        return redirect()->route('profile.show')->with('success', 'Verifikasi untuk alumni "' . $alumni->nama_lengkap . '" telah ditolak.');
    }
}