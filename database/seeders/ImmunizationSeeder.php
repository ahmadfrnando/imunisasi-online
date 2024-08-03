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
        // $vaccines = [
        //     'HB0', 'BCG', 'PCV1', 'PCV2', 'DPTHBHIB1', 'DPTHBHIB2', 'DPTHBHIB3', 'POLIO1', 'POLIO2', 'POLIO3', 'POLIO4', 'IPV1', 'IPV2', 'MR', 'IRL', 'BOOSTER DPTHBHIB', 'BOOSTER MR'
        // ];

        // $ages = [
        //     '0-6 Bulan', '0-6 Bulan', '0-6 Bulan', '0-6 Bulan', '0-6 Bulan', '0-6 Bulan', '0-6 Bulan', '0-6 Bulan', '0-6 Bulan', '0-6 Bulan', '0-6 Bulan', '4 Bulan', '9 Bulan', '9 Bulan', 
        // ];
        
        // foreach ($vaccines as $vaccine) {
        //     DB::table('immunizations')->insert([
        //         'nama_vaksin' => 'HB0',
        //         'usia_balita' => '0-6 Bulan',
        //     ]);
        // }

        DB::table('immunizations')->insert([
            'nama_vaksin' => 'HB0',
            'usia_tepat_terpenuhi' => '0',
            'usia_tidak_dibolehkan' => '1-59',
        ]);
        DB::table('immunizations')->insert([
            'nama_vaksin' => 'BCG',
            'usia_tepat_terpenuhi' => '0-1',
            'usia_masih_dibolehkan' => '2-11',
            'usia_tidak_dibolehkan' => '12-59',
        ]);
        DB::table('immunizations')->insert([
            'nama_vaksin' => 'PCV1',
            'usia_tepat_terpenuhi' => '2',
            'usia_masih_dibolehkan' => '3-11',
            'usia_pemberian_imunisasi_kejar' => '12-59',
            'usia_tidak_dibolehkan' => '0-1',
        ]);
        DB::table('immunizations')->insert([
            'nama_vaksin' => 'PCV2',
            'usia_tepat_terpenuhi' => '3',
            'usia_masih_dibolehkan' => '4-11',
            'usia_pemberian_imunisasi_kejar' => '12-59',
            'usia_tidak_dibolehkan' => '0-2'
        ]);
        DB::table('immunizations')->insert([
            'nama_vaksin' => 'DPTHBHIB1',
            'usia_tepat_terpenuhi' => '2',
            'usia_masih_dibolehkan' => '3-11',
            'usia_pemberian_imunisasi_kejar' => '12-59',
            'usia_tidak_dibolehkan' => '0-1'
        ]);
        DB::table('immunizations')->insert([
            'nama_vaksin' => 'DPTHBHIB2',
            'usia_tepat_terpenuhi' => '3',
            'usia_masih_dibolehkan' => '4-11',
            'usia_pemberian_imunisasi_kejar' => '12-59',
            'usia_tidak_dibolehkan' => '0-2',
        ]);
        DB::table('immunizations')->insert([
            'nama_vaksin' => 'DPTHBHIB3',
            'usia_tepat_terpenuhi' => '4',
            'usia_masih_dibolehkan' => '5-11',
            'usia_pemberian_imunisasi_kejar' => '12-59',
            'usia_tidak_dibolehkan' => '0-3',
        ]);
        DB::table('immunizations')->insert([
            'nama_vaksin' => 'POLIO1',
            'usia_tepat_terpenuhi' => '0-1',
            'usia_masih_dibolehkan' => '2-11',
            'usia_pemberian_imunisasi_kejar' => '12-59',
        ]);
        DB::table('immunizations')->insert([
            'nama_vaksin' => 'POLIO2',
            'usia_tepat_terpenuhi' => '2',
            'usia_masih_dibolehkan' => '3-11',
            'usia_pemberian_imunisasi_kejar' => '12-59',
            'usia_tidak_dibolehkan' => '0-1',
        ]);
        DB::table('immunizations')->insert([
            'nama_vaksin' => 'POLIO3',
            'usia_tepat_terpenuhi' => '3',
            'usia_masih_dibolehkan' => '4-11',
            'usia_pemberian_imunisasi_kejar' => '12-59',
            'usia_tidak_dibolehkan' => '0-2'
        ]);
        DB::table('immunizations')->insert([
            'nama_vaksin' => 'POLIO4',
            'usia_tepat_terpenuhi' => '4',
            'usia_masih_dibolehkan' => '5-11',
            'usia_pemberian_imunisasi_kejar' => '12-59',
            'usia_tidak_dibolehkan' => '0-3'
        ]);
        DB::table('immunizations')->insert([
            'nama_vaksin' => 'IPV1',
            'usia_tepat_terpenuhi' => '4',
            'usia_masih_dibolehkan' => '5-11',
            'usia_pemberian_imunisasi_kejar' => '12-59',
            'usia_tidak_dibolehkan' => '0-3',
        ]);
        DB::table('immunizations')->insert([
            'nama_vaksin' => 'IPV2',
            'usia_tepat_terpenuhi' => '9',
            'usia_masih_dibolehkan' => '10-11',
            'usia_pemberian_imunisasi_kejar' => '12-59',
            'usia_tidak_dibolehkan' => '0-8',
        ]);
        DB::table('immunizations')->insert([
            'nama_vaksin' => 'MR',
            'usia_tepat_terpenuhi' => '9',
            'usia_masih_dibolehkan' => '10-11',
            'usia_pemberian_imunisasi_kejar' => '12-59',
            'usia_tidak_dibolehkan' => '0-8',
        ]);
        DB::table('immunizations')->insert([
            'nama_vaksin' => 'IRL',
        ]);
        DB::table('immunizations')->insert([
            'nama_vaksin' => 'BOOSTER DPTHBHIB',
            'usia_tepat_terpenuhi' => '18',
            'usia_masih_dibolehkan' => '23',
            'usia_pemberian_imunisasi_kejar' => '23-59',
            'usia_tidak_dibolehkan' => '0-12'
        ]);
        DB::table('immunizations')->insert([
            'nama_vaksin' => 'BOOSTER MR',
            'usia_tepat_terpenuhi' => '18',
            'usia_masih_dibolehkan' => '23',
            'usia_pemberian_imunisasi_kejar' => '23-59',
            'usia_tidak_dibolehkan' => '0-12'
        ]);
    }
}