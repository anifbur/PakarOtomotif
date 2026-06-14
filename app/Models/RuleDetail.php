<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RuleDetail extends Model
{
    protected $fillable = [
        'rule_id',
        'gejala_id',
        'cf_pakar'
    ];

    public function rule()
    {
        return $this->belongsTo(Rule::class);
    }

    public function gejala()
    {
        return $this->belongsTo(Gejala::class);
    }
}