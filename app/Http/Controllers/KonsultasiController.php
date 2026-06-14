<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Konsultasi;
use App\Models\KonsultasiDetail;
use App\Services\ExpertSystemService;
use App\Models\Diagnosa;
class KonsultasiController extends Controller
{
   public function proses(Request $request)
{
    $request->validate([
        'nama_user' => 'required'
    ]);

    $inputGejala = [];

    foreach ($request->gejala ?? [] as $id => $nilai) {

        if ($nilai !== '') {
            $inputGejala[$id] = (float) $nilai;
        }
    }

    if (empty($inputGejala)) {
        return back()->with(
            'error',
            'Pilih minimal satu gejala'
        );
    }

    $service = new ExpertSystemService();

    $hasilDiagnosa = $service->diagnose($inputGejala);

    if (empty($hasilDiagnosa)) {

        return back()->with(
            'error',
            'Tidak ditemukan diagnosa yang sesuai'
        );
    }

    $terbaik = $hasilDiagnosa[0];

    $konsultasi = Konsultasi::create([
        'nama_user'      => $request->nama_user,
        'hasil_diagnosa' => $terbaik['diagnosa'],
        'nilai_cf'       => $terbaik['cf']
    ]);

    foreach ($inputGejala as $gejalaId => $cfUser) {

        KonsultasiDetail::create([
            'konsultasi_id' => $konsultasi->id,
            'gejala_id'     => $gejalaId,
            'cf_user'       => $cfUser
        ]);
    }

    return view(
        'konsultasi.hasil',
        [
            'hasil' => $hasilDiagnosa
        ]
    );
}

    public function riwayat()
{
    $riwayat = Konsultasi::latest()->get();

    return view(
        'konsultasi.riwayat',
        compact('riwayat')
    );
}

    public function detail($id)
    {
        return Konsultasi::with([
            'details.gejala'
        ])->findOrFail($id);
    }
}