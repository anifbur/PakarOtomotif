<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Rule;

class RuleSeeder extends Seeder
{
    public function run(): void
    {
        Rule::create([
            'diagnosa_id' => 1 // Ganti Oli Mesin
        ]);

        Rule::create([
            'diagnosa_id' => 2 // Ganti Oli Gardan
        ]);

        Rule::create([
            'diagnosa_id' => 3 // Servis CVT
        ]);

        Rule::create([
            'diagnosa_id' => 4 // Ganti Roller CVT
        ]);

        Rule::create([
            'diagnosa_id' => 5 // Ganti V-Belt
        ]);
    }
}