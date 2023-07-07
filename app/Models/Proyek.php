<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proyek extends Model
{
    use HasFactory;

    protected $fillable = [
        'instansi_id', 'nama_proyek',
    ];

    public function instansi()
    {
        return $this->belongsTo(Instansi::class);
    }

    public function uraians()
    {
        return $this->hasMany(Uraian::class);
    }
}
