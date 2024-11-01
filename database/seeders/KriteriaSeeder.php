<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('data_kriteria')->insert([
            [
                'id' => 1,
                'kode_kriteria' => 'C1',
                'nama_kriteria' => 'Curah Hujan',
                'type' => 'benefit',
                'bobot' => 30
            ],
            [
                'id' => 2,
                'kode_kriteria' => 'C2',
                'nama_kriteria' => 'Kelembaban',
                'type' => 'benefit',
                'bobot' => 30
            ],
            [
                'id' => 3,
                'kode_kriteria' => 'C3',
                'nama_kriteria' => 'Kedalaman tanah',
                'type' => 'benefit',
                'bobot' => 40
            ]
        ]);
    }
}
