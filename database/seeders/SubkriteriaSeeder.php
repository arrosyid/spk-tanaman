<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SubkriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('data_subkriteria')->insert([
            ['id' => '1','id_kriteria' => '1','id_tanaman' => '1','id_kesesuaian' => '1','range' => '2000-3000','created_at' => now()],
            ['id' => '2','id_kriteria' => '1','id_tanaman' => '1','id_kesesuaian' => '2','range' => '1750-2000','created_at' => now()],
            ['id' => '3','id_kriteria' => '1','id_tanaman' => '1','id_kesesuaian' => '3','range' => '1500-1750','created_at' => now()],
            ['id' => '4','id_kriteria' => '1','id_tanaman' => '1','id_kesesuaian' => '4','range' => '<1500','created_at' => now()],
            ['id' => '5','id_kriteria' => '1','id_tanaman' => '1','id_kesesuaian' => '2','range' => '3000-5000','created_at' => now()],
            ['id' => '6','id_kriteria' => '1','id_tanaman' => '1','id_kesesuaian' => '3','range' => '3500-4000','created_at' => now()],
            ['id' => '7','id_kriteria' => '1','id_tanaman' => '1','id_kesesuaian' => '4','range' => '>4000','created_at' => now()],
            ['id' => '8','id_kriteria' => '2','id_tanaman' => '1','id_kesesuaian' => '1','range' => '5.3-6.0','created_at' => now()],
            ['id' => '9','id_kriteria' => '2','id_tanaman' => '1','id_kesesuaian' => '2','range' => '6.0-6.5','created_at' => now()],
            ['id' => '10','id_kriteria' => '2','id_tanaman' => '1','id_kesesuaian' => '3','range' => '>6.5','created_at' => now()],
            ['id' => '11','id_kriteria' => '2','id_tanaman' => '1','id_kesesuaian' => '2','range' => '5.0-5.3','created_at' => now()],
            ['id' => '12','id_kriteria' => '2','id_tanaman' => '1','id_kesesuaian' => '3','range' => '<5','created_at' => now()],
            ['id' => '13','id_kriteria' => '3','id_tanaman' => '1','id_kesesuaian' => '1','range' => '>100','created_at' => now()],
            ['id' => '14','id_kriteria' => '3','id_tanaman' => '1','id_kesesuaian' => '2','range' => '75-100','created_at' => now()],
            ['id' => '15','id_kriteria' => '3','id_tanaman' => '1','id_kesesuaian' => '3','range' => '50-75','created_at' => now()],
            ['id' => '16','id_kriteria' => '3','id_tanaman' => '1','id_kesesuaian' => '4','range' => '<50','created_at' => now()]
        ]);
    }
}
