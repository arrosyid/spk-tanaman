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
                'bobot' => 40,
                'created_at' => now()
            ],
            [
                'id' => 2,
                'kode_kriteria' => 'C2',
                'nama_kriteria' => 'pH Tanah',
                'type' => 'benefit',
                'bobot' => 30,
                'created_at' => now()
            ],
            [
                'id' => 3,
                'kode_kriteria' => 'C3',
                'nama_kriteria' => 'Kedalaman(cm)',
                'type' => 'benefit',
                'bobot' => 30,
                'created_at' => now()
            ]
        ]);
    }
}
