<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DokumenKontrak extends Model
{
    use HasFactory;

    protected $fillable = [
        'dokumen',
        'proyek_id'
    ];

    public function proyek()
    {
        return $this->belongsTo(Proyek::class);
    }
}
