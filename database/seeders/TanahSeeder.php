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
            ['id' => '1','kode_tanah' => 'DL1','lokasi_tanah' => 'Lahan Atirogo','created_at' => now()],
            ['id' => '2','kode_tanah' => 'DL2','lokasi_tanah' => 'Lahan Rembangan','created_at' => now()],
            ['id' => '3','kode_tanah' => 'DL3','lokasi_tanah' => 'Kebun Teh Gambir','created_at' => now()],
            ['id' => '4','kode_tanah' => 'DL4','lokasi_tanah' => 'Kebun Teh Gambir','created_at' => now()],
            ['id' => '5','kode_tanah' => 'DL5','lokasi_tanah' => 'Kebun Teh Gambir','created_at' => now()],
            ['id' => '6','kode_tanah' => 'DL5','lokasi_tanah' => 'Kebun Teh Gambir','created_at' => now()],
            ['id' => '7','kode_tanah' => 'DL7','lokasi_tanah' => 'Kebun Teh Gambir','created_at' => now()],
            ['id' => '8','kode_tanah' => 'DL8','lokasi_tanah' => 'Kebun Dawuhan','created_at' => now()],
            ['id' => '9','kode_tanah' => 'DL9','lokasi_tanah' => 'Kebun Dawuhan','created_at' => now()],
            ['id' => '10','kode_tanah' => 'DL10','lokasi_tanah' => 'Kebun Senduro','created_at' => now()],
            ['id' => '11','kode_tanah' => 'DL11','lokasi_tanah' => 'Lahan Tempurejo','created_at' => now()],
            ['id' => '12','kode_tanah' => 'DL12','lokasi_tanah' => 'Kebun Teh Gambir','created_at' => now()],
            ['id' => '13','kode_tanah' => 'DL13','lokasi_tanah' => 'Kebun Renteng PTPN XII','created_at' => now()],
            ['id' => '14','kode_tanah' => 'DL14','lokasi_tanah' => 'Lahan Pertanian Polije','created_at' => now()],
            ['id' => '15','kode_tanah' => 'DL15','lokasi_tanah' => 'Pusat Penelitian Kopi dan Kakao Indonesia (Puslitkoka) di Desa Nogorasi','created_at' => now()],
            ['id' => '16','kode_tanah' => 'DL16','lokasi_tanah' => 'Lahan Ijen','created_at' => now()],
            ['id' => '17','kode_tanah' => 'DL17','lokasi_tanah' => 'Lahan Sucopangecok','created_at' => now()],
            ['id' => '18','kode_tanah' => 'DL18','lokasi_tanah' => 'Lahan Wonosari','created_at' => now()],
            ['id' => '19','kode_tanah' => 'DL19','lokasi_tanah' => 'Lahan Semboro','created_at' => now()],
            ['id' => '20','kode_tanah' => 'DL20','lokasi_tanah' => 'Lahan Sempol','created_at' => now()]
        ]);

        DB::table('kondisi_tanah')->insert([
            ['id_kriteria' => '1','id_tanah' => '1','nilai' => '1780','bulan' => '2025-01','created_at' => now()],
            ['id_kriteria' => '2','id_tanah' => '1','nilai' => '5.5','bulan' => '2025-01','created_at' => now()],
            ['id_kriteria' => '3','id_tanah' => '1','nilai' => '100','bulan' => '2025-01','created_at' => now()],

            ['id_kriteria' => '1','id_tanah' => '2','nilai' => '2100','bulan' => '2025-01','created_at' => now()],
            ['id_kriteria' => '2','id_tanah' => '2','nilai' => '5.7','bulan' => '2025-01','created_at' => now()],
            ['id_kriteria' => '3','id_tanah' => '2','nilai' => '105','bulan' => '2025-01','created_at' => now()],

            ['id_kriteria' => '1','id_tanah' => '3','nilai' => '3000','bulan' => '2025-01','created_at' => now()],
            ['id_kriteria' => '2','id_tanah' => '3','nilai' => '5.4','bulan' => '2025-01','created_at' => now()],
            ['id_kriteria' => '3','id_tanah' => '3','nilai' => '105','bulan' => '2025-01','created_at' => now()],

            ['id_kriteria' => '1','id_tanah' => '4','nilai' => '3000','bulan' => '2025-01','created_at' => now()],
            ['id_kriteria' => '2','id_tanah' => '4','nilai' => '5.2','bulan' => '2025-01','created_at' => now()],
            ['id_kriteria' => '3','id_tanah' => '4','nilai' => '105','bulan' => '2025-01','created_at' => now()],

            ['id_kriteria' => '1','id_tanah' => '5','nilai' => '4000','bulan' => '2025-01','created_at' => now()],
            ['id_kriteria' => '2','id_tanah' => '5','nilai' => '5.2','bulan' => '2025-01','created_at' => now()],
            ['id_kriteria' => '3','id_tanah' => '5','nilai' => '105','bulan' => '2025-01','created_at' => now()],

            ['id_kriteria' => '1','id_tanah' => '6','nilai' => '4000','bulan' => '2025-01','created_at' => now()],
            ['id_kriteria' => '2','id_tanah' => '6','nilai' => '4.6','bulan' => '2025-01','created_at' => now()],
            ['id_kriteria' => '3','id_tanah' => '6','nilai' => '105','bulan' => '2025-01','created_at' => now()],

            ['id_kriteria' => '1','id_tanah' => '7','nilai' => '3500','bulan' => '2025-01','created_at' => now()],
            ['id_kriteria' => '2','id_tanah' => '7','nilai' => '4.6','bulan' => '2025-01','created_at' => now()],
            ['id_kriteria' => '3','id_tanah' => '7','nilai' => '105','bulan' => '2025-01','created_at' => now()],

            ['id_kriteria' => '1','id_tanah' => '8','nilai' => '1300','bulan' => '2025-01','created_at' => now()],
            ['id_kriteria' => '2','id_tanah' => '8','nilai' => '5.7','bulan' => '2025-01','created_at' => now()],
            ['id_kriteria' => '3','id_tanah' => '8','nilai' => '100','bulan' => '2025-01','created_at' => now()],

            ['id_kriteria' => '1','id_tanah' => '9','nilai' => '1200','bulan' => '2025-01','created_at' => now()],
            ['id_kriteria' => '2','id_tanah' => '9','nilai' => '5.7','bulan' => '2025-01','created_at' => now()],
            ['id_kriteria' => '3','id_tanah' => '9','nilai' => '100','bulan' => '2025-01','created_at' => now()],

            ['id_kriteria' => '1','id_tanah' => '10','nilai' => '1700','bulan' => '2025-01','created_at' => now()],
            ['id_kriteria' => '2','id_tanah' => '10','nilai' => '5','bulan' => '2025-01','created_at' => now()],
            ['id_kriteria' => '3','id_tanah' => '10','nilai' => '100','bulan' => '2025-01','created_at' => now()],

            ['id_kriteria' => '1','id_tanah' => '11','nilai' => '1500','bulan' => '2025-01','created_at' => now()],
            ['id_kriteria' => '2','id_tanah' => '11','nilai' => '5.7','bulan' => '2025-01','created_at' => now()],
            ['id_kriteria' => '3','id_tanah' => '11','nilai' => '100','bulan' => '2025-01','created_at' => now()],

            ['id_kriteria' => '1','id_tanah' => '12','nilai' => '2500','bulan' => '2025-01','created_at' => now()],
            ['id_kriteria' => '2','id_tanah' => '12','nilai' => '4.7','bulan' => '2025-01','created_at' => now()],
            ['id_kriteria' => '3','id_tanah' => '12','nilai' => '100','bulan' => '2025-01','created_at' => now()],

            ['id_kriteria' => '1','id_tanah' => '13','nilai' => '2700','bulan' => '2025-01','created_at' => now()],
            ['id_kriteria' => '2','id_tanah' => '13','nilai' => '5','bulan' => '2025-01','created_at' => now()],
            ['id_kriteria' => '3','id_tanah' => '13','nilai' => '100','bulan' => '2025-01','created_at' => now()],

            ['id_kriteria' => '1','id_tanah' => '14','nilai' => '1800','bulan' => '2025-01','created_at' => now()],
            ['id_kriteria' => '2','id_tanah' => '14','nilai' => '6.2','bulan' => '2025-01','created_at' => now()],
            ['id_kriteria' => '3','id_tanah' => '14','nilai' => '100','bulan' => '2025-01','created_at' => now()],

            ['id_kriteria' => '1','id_tanah' => '15','nilai' => '2000','bulan' => '2025-01','created_at' => now()],
            ['id_kriteria' => '2','id_tanah' => '15','nilai' => '6','bulan' => '2025-01','created_at' => now()],
            ['id_kriteria' => '3','id_tanah' => '15','nilai' => '100','bulan' => '2025-01','created_at' => now()],

            ['id_kriteria' => '1','id_tanah' => '16','nilai' => '2200','bulan' => '2025-01','created_at' => now()],
            ['id_kriteria' => '2','id_tanah' => '16','nilai' => '5.3','bulan' => '2025-01','created_at' => now()],
            ['id_kriteria' => '3','id_tanah' => '16','nilai' => '100','bulan' => '2025-01','created_at' => now()],

            ['id_kriteria' => '1','id_tanah' => '17','nilai' => '2000','bulan' => '2025-01','created_at' => now()],
            ['id_kriteria' => '2','id_tanah' => '17','nilai' => '5','bulan' => '2025-01','created_at' => now()],
            ['id_kriteria' => '3','id_tanah' => '17','nilai' => '100','bulan' => '2025-01','created_at' => now()],

            ['id_kriteria' => '1','id_tanah' => '18','nilai' => '1200','bulan' => '2025-01','created_at' => now()],
            ['id_kriteria' => '2','id_tanah' => '18','nilai' => '5.8','bulan' => '2025-01','created_at' => now()],
            ['id_kriteria' => '3','id_tanah' => '18','nilai' => '100','bulan' => '2025-01','created_at' => now()],

            ['id_kriteria' => '1','id_tanah' => '19','nilai' => '1800','bulan' => '2025-01','created_at' => now()],
            ['id_kriteria' => '2','id_tanah' => '19','nilai' => '6','bulan' => '2025-01','created_at' => now()],
            ['id_kriteria' => '3','id_tanah' => '19','nilai' => '100','bulan' => '2025-01','created_at' => now()],
            
            ['id_kriteria' => '1','id_tanah' => '20','nilai' => '1500','bulan' => '2025-01','created_at' => now()],
            ['id_kriteria' => '2','id_tanah' => '20','nilai' => '6','bulan' => '2025-01','created_at' => now()],
            ['id_kriteria' => '3','id_tanah' => '20','nilai' => '100','bulan' => '2025-01','created_at' => now()],
        ]);
    }
}
