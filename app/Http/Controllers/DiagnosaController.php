<?php

namespace App\Http\Controllers;

use App\Models\Diagnosa;
use Illuminate\Http\Request;

class DiagnosaController extends Controller
{
    public function index()
    {
        $diagnosas = Diagnosa::latest()->paginate(10);

        return view('diagnosa.index', compact('diagnosas'));
    }

    public function create()
    {
        return view('diagnosa.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode' => 'required|unique:diagnosas,kode',
            'nama_diagnosa' => 'required',
            'solusi' => 'required'
        ]);

        Diagnosa::create($request->all());

        return redirect()
            ->route('diagnosa.index')
            ->with('success', 'Diagnosa berhasil ditambahkan');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $diagnosa = Diagnosa::findOrFail($id);

        return view('diagnosa.edit', compact('diagnosa'));
    }

    public function update(Request $request, string $id)
    {
        $diagnosa = Diagnosa::findOrFail($id);

        $request->validate([
            'kode' => 'required|unique:diagnosas,kode,' . $id,
            'nama_diagnosa' => 'required',
            'solusi' => 'required'
        ]);

        $diagnosa->update($request->all());

        return redirect()
            ->route('diagnosa.index')
            ->with('success', 'Diagnosa berhasil diupdate');
    }

    public function destroy(string $id)
    {
        $diagnosa = Diagnosa::findOrFail($id);

        $diagnosa->delete();

        return redirect()
            ->route('diagnosa.index')
            ->with('success', 'Diagnosa berhasil dihapus');
    }
}