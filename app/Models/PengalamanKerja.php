<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengalamanKerja extends Model
{
    use HasFactory;

    protected $table = 'pengalaman_kerjas'; // Eksplisit definisikan nama tabel jika perlu

    protected $fillable = [
        'alumni_id',
        'posisi',
        'nama_perusahaan',
        'lokasi_perusahaan',
        'tanggal_mulai',
        'tanggal_selesai',
        'deskripsi_pekerjaan',
    ];
    
// Untuk casting tanggal ke objek Carbon (otomatis untuk created_at, updated_at)
    protected $casts = [
        'tanggal_mulai' => 'date:Y-m-d', // Format Y-m-d untuk input date HTML
        'tanggal_selesai' => 'date:Y-m-d',
    ];

    public function alumni()
    {
        return $this->belongsTo(Alumni::class);
    }
}