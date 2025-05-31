<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\PengalamanKerja;

class Alumni extends Model
{
   use HasFactory;

   protected $table = 'alumni';

    protected $fillable = [
        'nama_lengkap',
        'nim',
        'tahun_lulus',
        'jurusan',
        'email',
        'nomor_telepon',
        'pekerjaan_saat_ini',
        'perusahaan_saat_ini',
        'link_profil_linkedin',
        // 'foto_profil',
        'posisi_awal',
        'perusahaan_awal',
        'bidang_keahlian_utama',
        'sertifikasi_profesional',
        'bersedia_menjadi_mentor',
        'info_kontak_karier',
        'is_verified',
        'verified_at',
        'verified_by',
    ];

    protected $casts = [
    'bersedia_menjadi_mentor' => 'boolean',
    'tahun_lulus' => 'integer', 
    'is_verified' => 'boolean',
    'verified_at' => 'datetime',
    ];

    public function pengalamanKerja()
    {
        return $this->hasMany(PengalamanKerja::class)->orderBy('tanggal_mulai', 'desc');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function verifier()
    {
        return $this->belongsTo(User::class, 'verified_by');
    }
}
