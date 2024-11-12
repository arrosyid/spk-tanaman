<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TanahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('data_tanah')->insert([
            [
                'id' => 1,
                'kode_tanah' => 'T1',
                'lokasi_tanah' => 'jember',
                'created_at' => now()
            ],
            [
                'id' => 2,
                'kode_tanah' => 'T2',
                'lokasi_tanah' => 'Bu Vanni',
                'created_at' => now()
            ],
        ]);

        DB::table('kondisi_tanah')->insert([
            [
                'id_tanah' => 1,
                'id_kriteria' => 1,
                'nilai' => 1700,
                'created_at' => now(),
            ],
            [
                'id_tanah' => 1,
                'id_kriteria' => 2,
                'nilai' => 6.7,
                'created_at' => now(),
            ],
            [
                'id_tanah' => 1,
                'id_kriteria' => 3,
                'nilai' => 110,
                'created_at' => now(),
            ],
            [
                'id_tanah' => 2,
                'id_kriteria' => 1,
                'nilai' => 4000,
                'created_at' => now(),
            ],
            [
                'id_tanah' => 2,
                'id_kriteria' => 2,
                'nilai' => 5.2,
                'created_at' => now(),
            ],
            [
                'id_tanah' => 2,
                'id_kriteria' => 3,
                'nilai' => 105,
                'created_at' => now(),
            ],
        ]);
    }
}
