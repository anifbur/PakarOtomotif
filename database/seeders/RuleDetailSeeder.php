<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\RuleDetail;

class RuleDetailSeeder extends Seeder
{
    public function run(): void
    {
        /*
        RULE 1
        Ganti Oli Mesin
        */

        RuleDetail::create([
            'rule_id' => 1,
            'gejala_id' => 1,
            'cf_pakar' => 0.9
        ]);

        RuleDetail::create([
            'rule_id' => 1,
            'gejala_id' => 2,
            'cf_pakar' => 0.8
        ]);

        RuleDetail::create([
            'rule_id' => 1,
            'gejala_id' => 3,
            'cf_pakar' => 0.7
        ]);

        /*
        RULE 2
        Ganti Oli Gardan
        */

        RuleDetail::create([
            'rule_id' => 2,
            'gejala_id' => 4,
            'cf_pakar' => 0.6
        ]);

        RuleDetail::create([
            'rule_id' => 2,
            'gejala_id' => 9,
            'cf_pakar' => 0.7
        ]);

        /*
        RULE 3
        Servis CVT
        */

        RuleDetail::create([
            'rule_id' => 3,
            'gejala_id' => 4,
            'cf_pakar' => 0.8
        ]);

        RuleDetail::create([
            'rule_id' => 3,
            'gejala_id' => 6,
            'cf_pakar' => 0.9
        ]);

        RuleDetail::create([
            'rule_id' => 3,
            'gejala_id' => 10,
            'cf_pakar' => 0.8
        ]);

        /*
        RULE 4
        Ganti Roller
        */

        RuleDetail::create([
            'rule_id' => 4,
            'gejala_id' => 4,
            'cf_pakar' => 0.8
        ]);

        RuleDetail::create([
            'rule_id' => 4,
            'gejala_id' => 5,
            'cf_pakar' => 0.9
        ]);

        RuleDetail::create([
            'rule_id' => 4,
            'gejala_id' => 7,
            'cf_pakar' => 0.8
        ]);

        /*
        RULE 5
        Ganti V-Belt
        */

        RuleDetail::create([
            'rule_id' => 5,
            'gejala_id' => 8,
            'cf_pakar' => 0.9
        ]);

        RuleDetail::create([
            'rule_id' => 5,
            'gejala_id' => 9,
            'cf_pakar' => 0.8
        ]);
    }
}