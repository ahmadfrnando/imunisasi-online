<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // DB::table('users')->insert([
        //     'name' => 'nisa',
        //     'email' => 'admin@gmail.com',
        //     'password' => Hash::make('password'),
        //     'role'=> 'admin'
        // ]);
        DB::table('users')->insert([
            'name' => 'budi',
            'email' => 'petkes@gmail.com',
            'password' => Hash::make('password'),
            'role'=> 'petugas_kesehatan'
        ]);
        DB::table('users')->insert([
            'name' => 'putri',
            'email' => 'petpen@gmail.com',
            'password' => Hash::make('password'),
            'role'=> 'petugas_pendaftaran'
        ]);
        DB::table('users')->insert([
            'name' => 'arjuna',
            'email' => 'leader@gmail.com',
            'password' => Hash::make('password'),
            'role'=> 'kepala_puskesmas'
        ]);
    }
}