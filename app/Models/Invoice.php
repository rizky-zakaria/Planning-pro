<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'invoice',
        'status',
        'tanggal',
        'proyek_id',
    ];

    public function proyek()
    {
        return $this->belongsTo(Proyek::class);
    }
}
