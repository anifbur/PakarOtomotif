<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Rule;

class RuleSeeder extends Seeder
{
    public function run(): void
    {
        Rule::create([
            'diagnosa_id' => 1 // K01 - Kerusakan Komponen Puli Depan (Front Pulley)
        ]);

        Rule::create([
            'diagnosa_id' => 2 // K02 - Kerusakan dan Degradasi Sabuk Penggerak (V-Belt)
        ]);

        Rule::create([
            'diagnosa_id' => 3 // K03 - Kerusakan Komponen Puli Belakang (Rear Pulley)
        ]);

        Rule::create([
            'diagnosa_id' => 4 // K04 - Kerusakan Mekanis Gir Reduksi (Gardan)
        ]);

        Rule::create([
            'diagnosa_id' => 5 // K05 - Kerusakan dan Kemacetan Unit Kickstarter
        ]);

        Rule::create([
            'diagnosa_id' => 6 // K06 - Kebutuhan Penggantian Oli Gardan Segera
        ]);

        Rule::create([
            'diagnosa_id' => 7 // K07 - Kebocoran Seal Transmisi Gardan
        ]);
        Rule::create([
    'diagnosa_id' => 8 // K08 - Kebutuhan Penggantian Oli Mesin Segera
]);
    }
}