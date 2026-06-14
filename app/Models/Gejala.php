<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gejala extends Model
{
    protected $fillable = [
        'kode',
        'nama_gejala'
    ];

    public function ruleDetails()
    {
        return $this->hasMany(RuleDetail::class);
    }
}