<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Diagnosa extends Model
{
    protected $fillable = [
        'kode',
        'nama_diagnosa',
        'solusi'
    ];

    public function rules()
    {
        return $this->hasMany(Rule::class);
    }
}