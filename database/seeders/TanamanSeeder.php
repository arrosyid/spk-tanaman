<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TanamanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('data_tanaman')->insert([
            array('id' => '1','nama_tanaman' => 'Kopi Robusta','created_at' => now()),
            array('id' => '2','nama_tanaman' => 'Kelapa Sawit','created_at' => now()),
            array('id' => '3','nama_tanaman' => 'Karet','created_at' => now()),
            array('id' => '4','nama_tanaman' => 'Kakao','created_at' => now()),
            array('id' => '5','nama_tanaman' => 'Cengkeh','created_at' => now()),
            array('id' => '6','nama_tanaman' => 'Pala','created_at' => now()),
            array('id' => '7','nama_tanaman' => 'Kayu Manis','created_at' => now()),
            array('id' => '8','nama_tanaman' => 'Kopi Arabika','created_at' => now()),
            array('id' => '9','nama_tanaman' => 'Teh','created_at' => now())
        ]);
    }
}
