<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Gejala;

class GejalaSeeder extends Seeder
{
    public function run(): void
    {
        $data = [

            ['kode'=>'G01','nama_gejala'=>'KM sejak ganti oli lebih dari 2000 km'],
            ['kode'=>'G02','nama_gejala'=>'Oli mesin berwarna hitam'],
            ['kode'=>'G03','nama_gejala'=>'Mesin terasa kasar'],
            ['kode'=>'G04','nama_gejala'=>'Tarikan motor berat'],
            ['kode'=>'G05','nama_gejala'=>'Ada getaran saat akselerasi'],
            ['kode'=>'G06','nama_gejala'=>'Terdengar suara dari CVT'],
            ['kode'=>'G07','nama_gejala'=>'Motor terasa ngempos'],
            ['kode'=>'G08','nama_gejala'=>'Akselerasi tersendat'],
            ['kode'=>'G09','nama_gejala'=>'KM motor lebih dari 20.000 km'],
            ['kode'=>'G10','nama_gejala'=>'Belum servis CVT lebih dari 8.000 km'],

        ];

        foreach($data as $item){
            Gejala::create($item);
        }
    }
}