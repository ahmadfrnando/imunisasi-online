<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ImmunizationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {   
        $vaccines = [
            'HB0', 'BCG', 'PVC1', 'PCV2', 'DPTHBHIB1', 'DPTHBHIB2', 'DPTHBHIB3', 'POLIO1', 'POLIO2', 'POLIO3', 'POLIO4', 'IPV1', 'IPV2', 'MR', 'IRL', 'BOOSTER DPTHBHIB', 'BOOSTER MR'
        ];
        foreach ($vaccines as $vaccine) {
            DB::table('immunizations')->insert([
                'nama_vaksin' => $vaccine
            ]);
        }
    }
}