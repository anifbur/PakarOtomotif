<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Konsultasi extends Model
{
    protected $fillable = [
        'nama_user',
        'hasil_diagnosa',
        'nilai_cf'
    ];

    public function details()
    {
        return $this->hasMany(KonsultasiDetail::class);
    }
}