<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rule extends Model
{
    protected $fillable = [
        'diagnosa_id'
    ];

    public function diagnosa()
    {
        return $this->belongsTo(Diagnosa::class);
    }

    public function details()
    {
        return $this->hasMany(RuleDetail::class);
    }
}