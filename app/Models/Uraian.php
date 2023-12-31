<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Uraian extends Model
{
    use HasFactory;

    protected $fillable = [
        'proyek_id', 'nama_uraian', 'total_biaya'
    ];

    public function proyek()
    {
        return $this->belongsTo(Proyek::class);
    }

    public function rabs()
    {
        return $this->hasMany(Rab::class);
    }

    // public function durasi()
    // {
    //     return $this->hasOne(Durasi::class);
    // }
}
