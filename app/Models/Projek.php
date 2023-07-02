<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projek extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_projek',
    ];

    public function uraians()
    {
        return $this->hasMany(Uraian::class);
    }
}
