<?php

namespace App\Http\Controllers;

use App\Models\Alumni;
use App\Models\User; 
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class AlumniController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request) 
    {
        $query = Alumni::query(); 

        if (!Auth::check() || Auth::user()->role !== 'admin') {
            $query->where('is_verified', true);
        }

        // Filter berdasarkan nama
        if ($request->filled('search_nama')) {
            $query->where('nama_lengkap', 'like', '%' . $request->search_nama . '%');
        }

        // Filter berdasarkan bidang keahlian utama
        if ($request->filled('search_keahlian')) {
            $query->where('bidang_keahlian_utama', 'like', '%' . $request->search_keahlian . '%');
        }

        // Filter berdasarkan perusahaan saat ini
        if ($request->filled('search_perusahaan')) {
            $query->where('perusahaan_saat_ini', 'like', '%' . $request->search_perusahaan . '%');
        }

        // Filter berdasarkan kesediaan menjadi mentor
        if ($request->filled('search_mentor')) {
            $query->where('bersedia_menjadi_mentor', $request->search_mentor === '1'); // Nilai dari select adalah string '1' atau '0'
        }

        // Jika admin, tampilkan yang belum diverifikasi di atas
        if (Auth::check() && Auth::user()->role === 'admin') {
            $query->orderByRaw('is_verified = false DESC, created_at DESC');
        } else {
            $query->orderBy('created_at', 'desc'); // Atau urutan lain untuk publik
        }

        // Ambil data dengan urutan dan pagination
        $alumni = $query->orderBy('tahun_lulus', 'desc')
                         ->orderBy('nama_lengkap', 'asc')
                         ->paginate(10) // Menampilkan 10 data per halaman
                         ->withQueryString(); // Agar parameter filter tetap ada di link pagination

        return view('alumni.index', compact('alumni'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('alumni.create'); // Hanya menampilkan view form tambah
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // 1. Validasi data input
        $validatedData = $request->validate([
            'nim' => 'required|string|max:20|unique:alumni,nim',
            'nama_lengkap' => 'required|string|max:255',
            'tahun_lulus' => 'required|integer|min:1900|max:' . date('Y'),
            'jurusan' => 'required|string|max:100',
            'email' => 'nullable|email|max:255|unique:alumni,email',
            'nomor_telepon' => 'nullable|string|max:20',
            'pekerjaan_saat_ini' => 'nullable|string|max:255',
            'perusahaan_saat_ini' => 'nullable|string|max:255',
            'link_profil_linkedin' => 'nullable|url|max:255',
            'posisi_awal' => 'nullable|string|max:255',
            'perusahaan_awal' => 'nullable|string|max:255',
            'bidang_keahlian_utama' => 'nullable|string|max:255',
            'sertifikasi_profesional' => 'nullable|string',
            'bersedia_menjadi_mentor' => 'nullable|boolean', // Laravel akan handle konversi '1'/'0'/true/false
            'info_kontak_karier' => 'nullable|string|max:255',
        ]);

        $dataToCreate = $validatedData;
        $dataToCreate['bersedia_menjadi_mentor'] = $request->has('bersedia_menjadi_mentor');

        // PENTING: Isi user_id jika ini adalah alumni yang melengkapi profilnya
        if (Auth::check() && Auth::user()->role === 'alumni') {
            $existingAlumni = Alumni::where('user_id', Auth::id())->first();
            if (!$existingAlumni) {
                $dataToCreate['user_id'] = Auth::id();
            } else {
                return redirect()->route('profile.show')->with('error', 'Anda sudah memiliki profil alumni.');
            }
        }
        // Untuk 'is_verified', 'verified_at', 'verified_by' akan mengambil default database (false, null, null)

        Alumni::create($dataToCreate);

        $message = 'Data alumni berhasil ditambahkan dan sedang menunggu verifikasi admin.';
        if(Auth::check() && Auth::user()->role === 'alumni' && isset($dataToCreate['user_id']) && $dataToCreate['user_id'] == Auth::id()){
            return redirect()->route('profile.show')->with('success', 'Profil alumni Anda berhasil disimpan dan menunggu verifikasi admin.');
        }
        return redirect()->route('alumni.index')->with('success', $message);
    }

    /**
     * Display the specified resource.
     */
    public function show(Alumni $alumni)
    {
        return view('alumni.show', compact('alumni'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Alumni $alumni)
    {
       $loggedInUser = Auth::user();

        // Cek otorisasi: Admin boleh edit semua, alumni hanya boleh edit profilnya sendiri
        // Asumsi ada kolom 'user_id' di tabel 'alumni' yang terhubung ke 'users.id'
        if ($loggedInUser->role === 'admin' || (isset($alumni->user_id) && $loggedInUser->id === $alumni->user_id)) {
            return view('alumni.edit', compact('alumni'));
        }

        // Jika bukan admin dan bukan pemilik profil
        return redirect()->route('alumni.show', $alumni->id)
                        ->with('error', 'Anda tidak memiliki izin untuk mengedit profil alumni ini.');
        // Atau bisa juga menggunakan abort() untuk halaman error standar:
        // abort(403, 'AKSI TIDAK DIIZINKAN.');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Alumni $alumni)
    {
        $loggedInUser = Auth::user();

        // 1. CEK OTORISASI SEBELUM MELAKUKAN APAPUN
        // Hanya admin atau pemilik profil yang boleh mengupdate
        if ($loggedInUser->role !== 'admin' && ( !isset($alumni->user_id) || $loggedInUser->id !== $alumni->user_id) ) {
            return redirect()->route('alumni.show', $alumni->id)
                             ->with('error', 'Anda tidak memiliki izin untuk memperbarui profil alumni ini.');
            // Atau bisa juga menggunakan abort() untuk halaman error standar:
            // abort(403, 'AKSI TIDAK DIIZINKAN.');
        }

        // 2. Validasi data input
        // Perhatikan aturan unique untuk nim dan email: kita perlu mengecualikan record saat ini
        $validatedData = $request->validate([
            'nim' => ['required', 'string', 'max:20', Rule::unique('alumni')->ignore($alumni->id)],
            'nama_lengkap' => ['required', 'string', 'max:255'],
            'tahun_lulus' => ['required', 'integer', 'min:1900', 'max:' . date('Y')],
            'jurusan' => ['required', 'string', 'max:100'],
            // Menggunakan Rule::unique() untuk email alumni, mengabaikan record saat ini
            'email' => ['nullable', 'string', 'email', 'max:255', Rule::unique('alumni')->ignore($alumni->id)],
            'nomor_telepon' => ['nullable', 'string', 'max:20'],
            'pekerjaan_saat_ini' => ['nullable', 'string', 'max:255'],
            'perusahaan_saat_ini' => ['nullable', 'string', 'max:255'],
            'link_profil_linkedin' => ['nullable', 'url', 'max:255'],
            'posisi_awal' => ['nullable', 'string', 'max:255'],
            'perusahaan_awal' => ['nullable', 'string', 'max:255'],
            'bidang_keahlian_utama' => ['nullable', 'string', 'max:255'],
            'sertifikasi_profesional' => ['nullable', 'string'],
            'bersedia_menjadi_mentor' => ['nullable', 'boolean'],
            'info_kontak_karier' => ['nullable', 'string', 'max:255'],
        ]);

        $validatedData['bersedia_menjadi_mentor'] = $request->has('bersedia_menjadi_mentor');

        // OPSIONAL: Sinkronisasi nama ke tabel users jika alumni yang login mengedit profilnya sendiri
        // dan nama_lengkap diubah
        if ($loggedInUser->id === $alumni->user_id && $loggedInUser->name !== $validatedData['nama_lengkap']) {
             $loggedInUser->name = $validatedData['nama_lengkap'];
             $loggedInUser->save();
        }
        // Anda bisa menambahkan logika serupa untuk sinkronisasi email jika diperlukan,
        // tapi itu lebih kompleks karena email login biasanya harus unik di tabel users
        // dan mungkin memerlukan verifikasi email ulang.

        // 3. Update data di database
        $alumni->update($validatedData);

        // 4. Redirect ke halaman show (detail) atau index dengan pesan sukses
        return redirect()->route('alumni.show', $alumni->id)
                         ->with('success', 'Data alumni berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Alumni $alumni)
    {
        // Hapus data alumni dari database
        if (Auth::user()->role !== 'admin') {
            return redirect()->route('alumni.index')
                             ->with('error', 'Hanya Admin yang dapat menghapus data alumni.');
        }

        $alumni->delete();

        return redirect()->route('alumni.index')
                         ->with('success', 'Data alumni berhasil dihapus.');
    }
}