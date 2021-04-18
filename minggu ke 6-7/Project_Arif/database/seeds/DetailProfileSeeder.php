<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DetailProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //insert data ke table pawai
        DB::table('detail_profile')->insert([
            'address'=> 'Probolinggo',
            'nomor_tlp'=> '082332152918',
            'ttl'=> '2002-01-31',
            'foto'=> 'picture.png'
        ]);
    }
}
