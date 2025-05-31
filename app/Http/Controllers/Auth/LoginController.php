<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request; // <-- 1. TAMBAHKAN IMPORT UNTUK REQUEST
use Illuminate\Support\Facades\Auth; // <-- 2. TAMBAHKAN IMPORT UNTUK AUTH (opsional jika sudah dihandle trait)

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = '/alumni'; // Anda bisa set default redirect di sini,
                                        // tapi akan di-override oleh method authenticated()

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        // $this->middleware('auth')->only('logout'); // Baris ini biasanya tidak diperlukan karena
                                                  // route logout sudah dilindungi middleware 'auth'
                                                  // di web.php dan trait AuthenticatesUsers menangani logicnya.
                                                  // Jika ada, tidak apa-apa, tapi bisa juga dihapus jika
                                                  // route logout sudah benar di web.php.
    }

    // 3. TAMBAHKAN ATAU OVERRIDE METHOD INI UNTUK REDIRECT BERDASARKAN ROLE
    /**
     * The user has been authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function authenticated(Request $request, $user)
    {
        if ($user->role === 'admin') {
            // Jika role adalah 'admin'
            return redirect()->route('alumni.index')->with('success', 'Selamat datang kembali, Admin ' . $user->name . '!');
        }

        // Default untuk alumni atau role lain
        // Anda bisa arahkan ke halaman profil alumni jika sudah ada relasinya
        // $alumniProfile = \App\Models\Alumni::where('user_id', $user->id)->first();
        // if ($alumniProfile) {
        //    return redirect()->route('alumni.show', $alumniProfile->id)->with('success', 'Selamat datang, ' . $user->name . '!');
        // }

        // Fallback ke daftar alumni
        return redirect()->route('alumni.index')->with('success', 'Selamat datang, ' . $user->name . '!');
    }

    // Opsional: Jika Anda ingin menggunakan username selain 'email' untuk login
    // public function username()
    // {
    //     return 'username_field_anda';
    // }

    // Opsional: Jika Anda tidak ingin menampilkan form login default dari trait
    // dan ingin menggunakan view kustom Anda (tapi biasanya trait sudah handle ini
    // jika view ada di auth.login)
    // public function showLoginForm()
    // {
    //     return view('auth.login'); // Pastikan view ini ada
    // }
}