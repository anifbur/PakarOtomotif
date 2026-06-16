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
                'kode'=>'K01',
                'nama_diagnosa'=>'Kerusakan Komponen Puli Depan (Front Pulley)',
                'solusi'=>'Periksa dan ganti komponen puli depan jika diperlukan.'
            ],

            [
                'kode'=>'K02',
                'nama_diagnosa'=>'Kerusakan dan Degradasi Sabuk Penggerak (V-Belt)',
                'solusi'=>'Segera lakukan pemeriksaan dan penggantian V-Belt.'
            ],

            [
                'kode'=>'K03',
                'nama_diagnosa'=>'Kerusakan Komponen Puli Belakang (Rear Pulley)',
                'solusi'=>'Periksa dan ganti komponen puli belakang jika diperlukan.'
            ],

            [
                'kode'=>'K04',
                'nama_diagnosa'=>'Kerusakan Mekanis Gir Reduksi (Gardan)',
                'solusi'=>'Lakukan pemeriksaan dan perbaikan pada gir reduksi gardan.'
            ],

            [
                'kode'=>'K05',
                'nama_diagnosa'=>'Kerusakan dan Kemacetan Unit Kickstarter',
                'solusi'=>'Periksa dan perbaiki mekanisme kickstarter.'
            ],

            [
                'kode'=>'K06',
                'nama_diagnosa'=>'Kebutuhan Penggantian Oli Gardan Segera',
                'solusi'=>'Segera lakukan penggantian oli gardan.'
            ],

            [
                'kode'=>'K07',
                'nama_diagnosa'=>'Kebocoran Seal Transmisi Gardan',
                'solusi'=>'Periksa dan ganti seal transmisi gardan yang bocor.'
            ],
            [
    'kode'=>'K08',
    'nama_diagnosa'=>'Kebutuhan Penggantian Oli Mesin Segera',
    'solusi'=>'Segera lakukan penggantian oli mesin sesuai spesifikasi pabrikan dan lakukan pengecekan kondisi mesin.'
],

        ];

        foreach($data as $item){
            Diagnosa::create($item);
        }
    }
}