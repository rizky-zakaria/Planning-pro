<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Durasi extends Model
{
    use HasFactory;

    protected $fillable = [
        'instansi_id',
        'lama_pengerjaan',
        'tanggal_mulai',
        'tanggal_selesai',
        'dokumen_spmk',
        'keterangan',
    ];

    public function instansi()
    {
        return $this->belongsTo(Instansi::class);
    }
}
