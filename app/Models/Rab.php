<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rab extends Model
{
    use HasFactory;

    protected $fillable = [
        'uraian_id',
        'nama_item',
        'harga_satuan',
        'volume',
        'satuan',
        'harga_total_per_item'
    ];

    public function uraian()
    {
        return $this->belongsTo(Uraian::class);
    }
}
