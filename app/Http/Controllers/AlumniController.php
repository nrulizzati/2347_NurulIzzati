<?php

namespace App\Http\Controllers;

use App\Models\Alumni;
use Illuminate\Http\Request;

class AlumniController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request) 
    {
        $query = Alumni::query(); 

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

        $validatedData['bersedia_menjadi_mentor'] = $request->has('bersedia_menjadi_mentor');

        // 2. Simpan data ke database
        Alumni::create($validatedData); // Menggunakan mass assignment karena $fillable sudah diatur di model

        // 3. Redirect ke halaman index dengan pesan sukses
        return redirect()->route('alumni.index')
                         ->with('success', 'Data alumni berhasil ditambahkan.');
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
        return view('alumni.edit', compact('alumni')); 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Alumni $alumni)
    {
        // 1. Validasi data input
        // Perhatikan aturan unique untuk nim dan email: kita perlu mengecualikan record saat ini
        $validatedData = $request->validate([
            'nim' => 'required|string|max:20|unique:alumni,nim,' . $alumni->id,
            'nama_lengkap' => 'required|string|max:255',
            'tahun_lulus' => 'required|integer|min:1900|max:' . date('Y'),
            'jurusan' => 'required|string|max:100',
            'email' => 'nullable|email|max:255|unique:alumni,email,' . $alumni->id,
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

        $validatedData['bersedia_menjadi_mentor'] = $request->has('bersedia_menjadi_mentor');
        
        // 2. Update data di database
        $alumni->update($validatedData); // Menggunakan mass assignment

        // 3. Redirect ke halaman show (detail) atau index dengan pesan sukses
        return redirect()->route('alumni.show', $alumni->id)
                         ->with('success', 'Data alumni berhasil diperbarui.');
        // Atau bisa juga redirect ke index:
        // return redirect()->route('alumni.index')->with('success', 'Data alumni berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Alumni $alumni)
    {
        // Hapus data alumni dari database
        $alumni->delete();

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('alumni.index')
                         ->with('success', 'Data alumni berhasil dihapus.');
    }
}
