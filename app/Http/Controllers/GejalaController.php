<?php

namespace App\Http\Controllers;

use App\Models\Gejala;
use Illuminate\Http\Request;

class GejalaController extends Controller
{
    public function index()
    {
        $gejalas = Gejala::latest()->paginate(10);

        return view('gejala.index', compact('gejalas'));
    }

    public function create()
    {
        return view('gejala.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode' => 'required|unique:gejalas,kode',
            'nama_gejala' => 'required'
        ]);

        Gejala::create($request->all());

        return redirect()
            ->route('gejala.index')
            ->with('success', 'Data gejala berhasil ditambahkan');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $gejala = Gejala::findOrFail($id);

        return view('gejala.edit', compact('gejala'));
    }

    public function update(Request $request, string $id)
    {
        $gejala = Gejala::findOrFail($id);

        $request->validate([
            'kode' => 'required|unique:gejalas,kode,' . $id,
            'nama_gejala' => 'required'
        ]);

        $gejala->update($request->all());

        return redirect()
            ->route('gejala.index')
            ->with('success', 'Data gejala berhasil diupdate');
    }

    public function destroy(string $id)
    {
        $gejala = Gejala::findOrFail($id);

        $gejala->delete();

        return redirect()
            ->route('gejala.index')
            ->with('success', 'Data gejala berhasil dihapus');
    }
}