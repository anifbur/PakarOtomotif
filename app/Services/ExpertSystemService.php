<?php

namespace App\Services;

use App\Models\Rule;

class ExpertSystemService
{
    public function diagnose(array $inputGejala)
    {
        $hasil = [];

        $rules = Rule::with([
            'diagnosa',
            'details'
        ])->get();

        foreach ($rules as $rule) {

            $cfCombine = null;
            $jumlahGejalaCocok = 0;
            $totalRuleGejala = $rule->details->count();

            foreach ($rule->details as $detail) {

                if (isset($inputGejala[$detail->gejala_id])) {

                    $jumlahGejalaCocok++;

                    $cfUser = $inputGejala[$detail->gejala_id];
                    $cfRule = $detail->cf_pakar;

                    $cf = $cfUser * $cfRule;

                    if ($cfCombine === null) {
                        $cfCombine = $cf;
                    } else {
                        $cfCombine =
                            $cfCombine +
                            ($cf * (1 - $cfCombine));
                    }
                }
            }

            /*
             * Forward Chaining
             * Minimal 50% rule terpenuhi
             */

            if (
                $jumlahGejalaCocok > 0 &&
                ($jumlahGejalaCocok / $totalRuleGejala) >= 0.5
            ) {

                $hasil[] = [
                    'diagnosa_id' => $rule->diagnosa->id,
                    'diagnosa' => $rule->diagnosa->nama_diagnosa,
                    'solusi' => $rule->diagnosa->solusi,
                    'cf' => round($cfCombine * 100, 2)
                ];
            }
        }

        usort($hasil, function ($a, $b) {
            return $b['cf'] <=> $a['cf'];
        });

        return $hasil;
    }
}