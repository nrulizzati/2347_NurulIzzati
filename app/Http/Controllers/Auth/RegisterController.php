<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Alumni;
use Illuminate\Http\Request; // Pastikan Request diimport
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    // protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    protected function validator(array $data)
    {
        // ... (validasi Anda) ...
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    protected function create(array $data)
    {
        // ... (logika pembuatan user dan alumni Anda) ...
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role' => 'alumni',
        ]);

        // Opsional: Buat profil alumni jika ada datanya
        // if (!empty($data['nim_alumni']) && ...) { ... }

        return $user;
    }

    /**
     * The user has been registered.
     * Override method ini untuk custom redirect setelah registrasi.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function registered(Request $request, $user)
    {
        // Logout pengguna yang baru saja didaftarkan dan di-login-kan oleh trait
        Auth::logout(); // Atau $this->guard()->logout();

        // Redirect ke halaman login dengan pesan sukses registrasi
        return redirect()->route('auth.login')
                         ->with('status', 'Registrasi berhasil! Silakan login dengan akun Anda.');
                         // 'status' biasanya digunakan untuk pesan sukses umum,
                         // cocok untuk ditampilkan di halaman login.
    }
}