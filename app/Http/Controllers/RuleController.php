<?php

namespace App\Http\Controllers;

use App\Models\Rule;
use App\Models\Gejala;
use App\Models\Diagnosa;
use App\Models\RuleDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RuleController extends Controller
{
    public function index()
    {
        $rules = Rule::with([
            'diagnosa',
            'details.gejala'
        ])->latest()->get();

        return view('rule.index', compact('rules'));
    }

    public function create()
    {
        $diagnosas = Diagnosa::all();
        $gejalas = Gejala::all();

        return view('rule.create', compact(
            'diagnosas',
            'gejalas'
        ));
    }

    public function store(Request $request)
{
    $request->validate([
        'diagnosa_id' => 'required'
    ]);

    DB::transaction(function () use ($request) {

        $rule = Rule::create([
            'diagnosa_id' => $request->diagnosa_id
        ]);

        foreach ($request->rule_details ?? [] as $gejalaId => $data) {

            if (!isset($data['aktif'])) {
                continue;
            }

            RuleDetail::create([
                'rule_id' => $rule->id,
                'gejala_id' => $gejalaId,
                'cf_pakar' => $data['cf']
            ]);
        }
    });

    return redirect()
        ->route('rule.index')
        ->with('success', 'Rule berhasil ditambahkan');
}

    public function edit(string $id)
    {
        $rule = Rule::with('details')->findOrFail($id);

        $diagnosas = Diagnosa::all();
        $gejalas = Gejala::all();

        return view('rule.edit', compact(
            'rule',
            'diagnosas',
            'gejalas'
        ));
    }

    public function update(Request $request, string $id)
{
    DB::transaction(function () use ($request, $id) {

        $rule = Rule::findOrFail($id);

        $rule->update([
            'diagnosa_id' => $request->diagnosa_id
        ]);

        RuleDetail::where('rule_id', $rule->id)->delete();

        foreach ($request->rule_details ?? [] as $gejalaId => $data) {

            if (!isset($data['aktif'])) {
                continue;
            }

            RuleDetail::create([
                'rule_id' => $rule->id,
                'gejala_id' => $gejalaId,
                'cf_pakar' => $data['cf']
            ]);
        }
    });

    return redirect()
        ->route('rule.index')
        ->with('success', 'Rule berhasil diupdate');
}

    public function destroy(string $id)
    {
        Rule::findOrFail($id)->delete();

        return redirect()
            ->route('rule.index')
            ->with('success', 'Rule berhasil dihapus');
    }
}