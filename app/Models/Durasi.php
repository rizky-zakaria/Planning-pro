<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Durasi extends Model
{
    use HasFactory;

    protected $fillable = [
        'uraian_id', 'hari'
    ];

    public function uraian()
    {
        return $this->belongsTo(Uraian::class);
    }
}
