<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Diagnosa;

class DiagnosaSeeder extends Seeder
{
    public function run(): void
    {
        $data = [

            [
                'kode'=>'D01',
                'nama_diagnosa'=>'Ganti Oli Mesin',
                'solusi'=>'Segera lakukan penggantian oli mesin.'
            ],

            [
                'kode'=>'D02',
                'nama_diagnosa'=>'Ganti Oli Gardan',
                'solusi'=>'Lakukan penggantian oli gardan.'
            ],

            [
                'kode'=>'D03',
                'nama_diagnosa'=>'Servis CVT',
                'solusi'=>'Lakukan pembersihan dan servis CVT.'
            ],

            [
                'kode'=>'D04',
                'nama_diagnosa'=>'Ganti Roller CVT',
                'solusi'=>'Roller CVT perlu diperiksa dan diganti.'
            ],

            [
                'kode'=>'D05',
                'nama_diagnosa'=>'Ganti V-Belt',
                'solusi'=>'V-Belt perlu diperiksa dan diganti.'
            ],

            [
                'kode'=>'D06',
                'nama_diagnosa'=>'Tidak Perlu Tindakan',
                'solusi'=>'Motor masih dalam kondisi baik.'
            ],

        ];

        foreach($data as $item){
            Diagnosa::create($item);
        }
    }
}