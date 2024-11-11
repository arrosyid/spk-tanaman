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
            [
                'id' => 1,
                'nama_tanaman' => 'Kopi Robusta',
                'created_at' => now()
            ]
        ]);
    }
}
