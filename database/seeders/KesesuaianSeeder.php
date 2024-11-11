<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KesesuaianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('data_kesesuaian')->insert([
            [
                'id' => 1,
                'tingkatan' => 'S1',
                'bobot' => 4,
                'created_at' => now()
            ],
            [
                'id' => 2,
                'tingkatan' => 'S2',
                'bobot' => 3,
                'created_at' => now()
            ],
            [
                'id' => 3,
                'tingkatan' => 'S3',
                'bobot' => 2,
                'created_at' => now()
            ],
            [
                'id' => 4,
                'tingkatan' => 'N',
                'bobot' => 1,
                'created_at' => now()
            ],
        ]);
    }
}
