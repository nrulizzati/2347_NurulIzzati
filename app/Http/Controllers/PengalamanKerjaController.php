<?php

namespace App\Http\Controllers;

use App\Models\Alumni;
use App\Models\PengalamanKerja;
use Illuminate\Http\Request;

class PengalamanKerjaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Alumni $alumni)
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Alumni $alumni)
    {
        return view('pengalaman_kerja.create', compact('alumni'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Alumni $alumni)
    {
        $validatedData = $request->validate([
            'posisi' => 'required|string|max:255',
            'nama_perusahaan' => 'required|string|max:255',
            'lokasi_perusahaan' => 'nullable|string|max:255',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'nullable|date|after_or_equal:tanggal_mulai',
            'deskripsi_pekerjaan' => 'nullable|string',
        ]);

        // Tambahkan alumni_id ke data yang divalidasi
        // $validatedData['alumni_id'] = $alumni->id;
        // PengalamanKerja::create($validatedData);

        // Cara lain menggunakan relasi:
        $alumni->pengalamanKerja()->create($validatedData);

        return redirect()->route('alumni.show', $alumni->id)
                        ->with('success', 'Pengalaman kerja berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Alumni $alumni, PengalamanKerja $pengalamanKerja)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Alumni $alumni, PengalamanKerja $pengalamanKerja)
    {
        // Kita mungkin butuh data alumni untuk ditampilkan di view, jadi kita load relasinya
        // $pengalamanKerja->load('alumni'); // Sebenarnya tidak perlu jika sudah ada alumni_id dan Anda bisa query Alumni jika mau

        return view('pengalaman_kerja.edit', compact('pengalamanKerja'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Alumni $alumni, PengalamanKerja $pengalamanKerja)
    {
        $validatedData = $request->validate([
            'posisi' => 'required|string|max:255',
            'nama_perusahaan' => 'required|string|max:255',
            'lokasi_perusahaan' => 'nullable|string|max:255',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'nullable|date|after_or_equal:tanggal_mulai',
            'deskripsi_pekerjaan' => 'nullable|string',
        ]);

        // Jika tanggal_selesai kosong, pastikan nilainya null di database, bukan string kosong
        if (empty($validatedData['tanggal_selesai'])) {
            $validatedData['tanggal_selesai'] = null;
        }

        $pengalamanKerja->update($validatedData);

        // Redirect kembali ke halaman detail alumni setelah update
        return redirect()->route('alumni.show', $pengalamanKerja->alumni_id)
                         ->with('success', 'Pengalaman kerja berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Alumni $alumni, PengalamanKerja $pengalamanKerja)
    {
        $alumniId = $pengalamanKerja->alumni_id; // Simpan alumni_id sebelum dihapus untuk redirect
        $pengalamanKerja->delete();

        // Redirect kembali ke halaman detail alumni setelah hapus
        return redirect()->route('alumni.show', $alumniId)
                         ->with('success', 'Pengalaman kerja berhasil dihapus.');
    }
}
