<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KonsultasiDetail extends Model
{
    protected $fillable = [
        'konsultasi_id',
        'gejala_id',
        'cf_user'
    ];

    public function konsultasi()
    {
        return $this->belongsTo(Konsultasi::class);
    }

    public function gejala()
    {
        return $this->belongsTo(Gejala::class);
    }
}