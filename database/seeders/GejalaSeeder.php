<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Gejala;

class GejalaSeeder extends Seeder
{
    public function run(): void
    {
        $data = [

            ['kode'=>'G01','nama_gejala'=>'Roda belakang tidak berputar saat mesin dihidupkan'],
            ['kode'=>'G02','nama_gejala'=>'Terdengar suara gemericik / desis kasar dari blok CVT'],
            ['kode'=>'G03','nama_gejala'=>'Akselerasi awal loyo dan tarikan gas terasa berat'],
            ['kode'=>'G04','nama_gejala'=>'Laju kendaraan tersendat-sendat pada kecepatan konstan'],
            ['kode'=>'G05','nama_gejala'=>'Getaran kuat pada bodi dan stang saat tarikan awal (gredek)'],
            ['kode'=>'G06','nama_gejala'=>'Tenaga tetap lemah meskipun puli depan baru diganti'],
            ['kode'=>'G07','nama_gejala'=>'Terdengar suara benturan logam kasar di area CVT'],
            ['kode'=>'G08','nama_gejala'=>'Tenaga motor melemah signifikan pada putaran tengah-atas'],
            ['kode'=>'G09','nama_gejala'=>'Putaran tengah bergetar disertai suara raungan mesin kasar'],
            ['kode'=>'G10','nama_gejala'=>'Putaran mesin tidak stabil meskipun gir reduksi halus'],
            ['kode'=>'G11','nama_gejala'=>'Kickstarter macet atau tidak dapat ditekan sama sekali'],
            ['kode'=>'G12','nama_gejala'=>'Kickstarter terasa berat dan lambat kembali ke posisi atas'],
            ['kode'=>'G13','nama_gejala'=>'Terdengar suara dengung keras di poros roda belakang'],
            ['kode'=>'G14','nama_gejala'=>'Getaran kuat terasa di bagian dek belakang saat jalan menurun'],
            ['kode'=>'G15','nama_gejala'=>'Suhu transmisi belakang meningkat drastis (overheat)'],
            ['kode'=>'G16','nama_gejala'=>'Tercium bau gosong atau terbakar dari area roda belakang'],
            ['kode'=>'G17','nama_gejala'=>'Warna oli gardan berubah menjadi hitam pekat atau keruh'],
            ['kode'=>'G18','nama_gejala'=>'Konsistensi oli gardan encer dan mengandung serpihan logam'],
            ['kode'=>'G19','nama_gejala'=>'Bearing poros gir reduksi terasa longgar atau oblak'],
            ['kode'=>'G20','nama_gejala'=>'Muncul rembesan atau tetesan oli di sekitar seal gardan'],
            [
    'kode'=>'G21',
    'nama_gejala'=>'Jarak tempuh sejak ganti oli mesin sudah melebihi interval servis'
],

[
    'kode'=>'G22',
    'nama_gejala'=>'Oli mesin berwarna hitam pekat dan encer'
],

[
    'kode'=>'G23',
    'nama_gejala'=>'Mesin terasa lebih kasar dibanding biasanya'
],

[
    'kode'=>'G24',
    'nama_gejala'=>'Tarikan motor terasa lebih berat terutama saat akselerasi awal'
],

[
    'kode'=>'G25',
    'nama_gejala'=>'Suara mesin terdengar lebih berisik saat putaran rendah'
],

        ];

        foreach($data as $item){
            Gejala::create($item);
        }
    }
}