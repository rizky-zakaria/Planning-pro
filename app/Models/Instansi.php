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
    ];

    public function proyeks()
    {
        return $this->hasMany(Proyek::all());
    }
}
