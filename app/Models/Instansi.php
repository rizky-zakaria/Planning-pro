<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instansi extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_instansi',
        'program_instansi',
        'kegiatan_instansi',
        'lokasi_instansi',
        'tujuan_proyek',
        'tahun_anggaran',
        'dokumen_spk',
    ];

    public function proyeks()
    {
        return $this->hasMany(Proyek::class);
    }

    public function durasi()
    {
        return $this->hasOne(Durasi::class);
    }

    public function uraians()
    {
        return $this->hasManyThrough(Uraian::class, Proyek::class);
    }
}
