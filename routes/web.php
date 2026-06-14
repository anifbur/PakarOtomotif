<?php

use Illuminate\Support\Facades\Route;
use App\Services\ExpertSystemService;
use App\Http\Controllers\KonsultasiController;
use App\Http\Controllers\GejalaController;
use App\Http\Controllers\DiagnosaController;
use App\Http\Controllers\RuleController;
use App\Models\Gejala;

/*
|--------------------------------------------------------------------------
| Test Diagnosa
|--------------------------------------------------------------------------
*/

Route::get('/test-diagnosa', function () {

    $service = new ExpertSystemService();

    $hasil = $service->diagnose([
        4 => 1.0,
        5 => 0.8,
        7 => 0.8
    ]);

    return response()->json($hasil);
});

/*
|--------------------------------------------------------------------------
| Sistem Pakar
|--------------------------------------------------------------------------
*/

Route::post('/proses-diagnosa', [KonsultasiController::class, 'proses'])
    ->name('proses.diagnosa');

Route::get('/riwayat-diagnosa', [KonsultasiController::class, 'riwayat']);

Route::get('/riwayat-diagnosa/{id}', [KonsultasiController::class, 'detail']);


Route::resource('gejala', GejalaController::class);


Route::resource('diagnosa', DiagnosaController::class);


Route::resource('rule', RuleController::class);
Route::get('/', function () {

    $gejalas = Gejala::orderBy('kode')->get();

    return view('konsultasi.form', compact('gejalas'));
});

Route::get('/konsultasi', function () {

    $gejalas = Gejala::orderBy('kode')->get();

    return view('konsultasi.form', compact('gejalas'));
});