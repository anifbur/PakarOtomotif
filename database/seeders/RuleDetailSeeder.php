<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\RuleDetail;

class RuleDetailSeeder extends Seeder
{
    public function run(): void
    {
        /*
        RULE 1 (K01 - Kerusakan Komponen Puli Depan)
        IF G02 AND G03 AND G04 AND G05 AND G08 AND G10
        */
        $rule1 = [2,3,4,5,8,10];
        foreach($rule1 as $id){
            RuleDetail::create(['rule_id'=>1,'gejala_id'=>$id,'cf_pakar'=>0.9]);
        }

        /*
        RULE 2 (K02 - Kerusakan Sabuk Penggerak / V-Belt)
        IF G01 AND G06
        */
        $rule2 = [1,6];
        foreach($rule2 as $id){
            RuleDetail::create(['rule_id'=>2,'gejala_id'=>$id,'cf_pakar'=>0.9]);
        }

        /*
        RULE 3 (K03 - Kerusakan Komponen Puli Belakang)
        IF G02 AND G03 AND G04 AND G05 AND G07 AND G08 AND G09
        */
        $rule3 = [2,3,4,5,7,8,9];
        foreach($rule3 as $id){
            RuleDetail::create(['rule_id'=>3,'gejala_id'=>$id,'cf_pakar'=>0.9]);
        }

        /*
        RULE 4 (K04 - Kerusakan Mekanis Gir Reduksi)
        IF G13 AND G19
        */
        $rule4 = [13,19];
        foreach($rule4 as $id){
            RuleDetail::create(['rule_id'=>4,'gejala_id'=>$id,'cf_pakar'=>0.9]);
        }

        /*
        RULE 5 (K05 - Kerusakan Unit Kickstarter)
        IF G11 AND G12
        */
        $rule5 = [11,12];
        foreach($rule5 as $id){
            RuleDetail::create(['rule_id'=>5,'gejala_id'=>$id,'cf_pakar'=>0.9]);
        }

        /*
        RULE 6 (K06 - Kebutuhan Ganti Oli Gardan)
        IF G13 AND G14 AND G15 AND G16 AND G17 AND G18
        */
        $rule6 = [13,14,15,16,17,18];
        foreach($rule6 as $id){
            RuleDetail::create(['rule_id'=>6,'gejala_id'=>$id,'cf_pakar'=>0.9]);
        }

        /*
        RULE 7 (K07 - Kebocoran Seal Transmisi Gardan)
        IF G13 AND G20
        */
        $rule7 = [13,20];
        foreach($rule7 as $id){
            RuleDetail::create(['rule_id'=>7,'gejala_id'=>$id,'cf_pakar'=>0.9]);
        }

        /*
RULE 8 (K08 - Kebutuhan Penggantian Oli Mesin Segera)

IF G21 AND G22 AND G23 AND G24 AND G25
*/

$rule8 = [21,22,23,24,25];

foreach($rule8 as $id){
    RuleDetail::create([
        'rule_id'=>8,
        'gejala_id'=>$id,
        'cf_pakar'=>0.9
    ]);
}
    }
}