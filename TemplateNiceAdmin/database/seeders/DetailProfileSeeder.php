<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DetailProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //insert data ke table pegawai
        DB::table('detail_profile')->insert([
            'address'=>'Jember',
            'nomot_tlp' => '085785305301',
            'ttl'=>'2004-07-23',
            'foto'=>'picture.png'
        ]);
    }
}
