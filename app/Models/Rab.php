<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rab extends Model
{
    use HasFactory;

    protected $fillable = [
        'uraian_id', 'nama_item', 'anggaran',
    ];

    public function uraian()
    {
        return $this->belongsTo(Uraian::class);
    }
}
