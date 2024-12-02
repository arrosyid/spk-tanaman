<?php

namespace App\Http\Controllers;

use App\Models\DataTanah;
use App\Models\DataTanaman;
use App\Models\DataKriteria;
use Illuminate\Http\Request;
use App\Models\DataKesesuaian;
use App\Models\DataSubkriteria;

class PerhitunganController extends Controller
{
    //Perhitungan SAW
    public function index(Request $request)
    {
        $kriteria = DataKriteria::all();
        $tanah = DataTanah::all();
        // dd($request->all());
        if ($request->all() != null) {
            $pilihTanah = DataTanah::where('id', $request->tanah)->first();
            $tanaman = DataTanaman::all();
            // Data Aleternatif
            $dataAlternatif = $this->convert($tanaman, $pilihTanah->kondisiTanah);

            // Data Normalisasi
            $normalisasi = $this->normalisasi($dataAlternatif, $kriteria);

            // Data Preferensi
            $preferensi = $this->nilaiPreferensi($normalisasi, $tanaman);
            $preferensi = collect($preferensi)->sortByDesc('nilai_preferensi');

            $kesesuaian = DataKesesuaian::all();

            return view('perhitungan.index', compact(['kriteria', 'kesesuaian', 'tanah', 'pilihTanah', 'tanaman', 'dataAlternatif', 'normalisasi', 'preferensi']));
        }else{
            return view('perhitungan.index', compact(['kriteria', 'tanah']));
        }
    }

    private function convert($tanaman, $kondisiTanah) 
    {
        $tanaman = DataTanaman::all();
        $result = [];
        foreach ($tanaman as $index => $T) {
            foreach ($kondisiTanah as $key => $kriteriaTanah) {
                $subkriteria = $T->subkriteria()->where('id_kriteria', $kriteriaTanah->id_kriteria)->get();
                $alternatif = [
                    'id_kriteria' => $kriteriaTanah->id_kriteria,
                    'id_tanaman' => $T->id,
                    'type' => $kriteriaTanah->kriteria->type,
                    'nilai' => $kriteriaTanah->nilai,
                    'nama_tanaman' => $T->nama_tanaman,
                    'range' => $T->subkriteria()->where('id_kriteria', $kriteriaTanah->id_kriteria)->pluck('range')->toArray(),
                    'bobot' => $this->convertBobot($subkriteria, $kriteriaTanah->nilai)
                ];
                // dump($alternatif);
                array_push($result, $alternatif);
            }
        }
        // dd();
        return $result;
    }

    private function convertBobot($subkriteria, $nilai) {
        $bobot = null;
    
        // Pisahkan subkriteria ke dalam 3 kategori (rentang, <, >) untuk diurutkan secara manual
        $rangeKriteria = [];
        $lessThanKriteria = [];
        $greaterThanKriteria = [];
    
        foreach ($subkriteria as $sub) {
            if (strpos($sub->range, "<") !== false) {
                $lessThanKriteria[] = $sub;
            } elseif (strpos($sub->range, ">") !== false) {
                $greaterThanKriteria[] = $sub;
            } elseif (strpos($sub->range, "-") !== false) {
                $rangeKriteria[] = $sub;
            }
        }
    
        // Prioritaskan pengecekan rentang terlebih dahulu
        foreach ($rangeKriteria as $sub) {
            list($min, $max) = explode('-', $sub->range);
            $min = (double) $min;
            $max = (double) $max;
    
            // Menangani anomali jika min > max
            if ($min > $max) {
                list($min, $max) = [$max, $min];
            }
    
            if ($nilai >= $min && $nilai <= $max) {
                $bobot = $sub->kesesuaian->bobot;
                return $bobot;
            }
        }
    
        // Kemudian cek kondisi lebih kecil ("<")
        foreach ($lessThanKriteria as $sub) {
            $limit = (double) str_replace("<", "", $sub->range);
            if ($nilai < $limit) {
                $bobot = $sub->kesesuaian->bobot;
                return $bobot;
            }
        }
    
        // Terakhir, cek kondisi lebih besar (">")
        foreach ($greaterThanKriteria as $sub) {
            $limit = (double) str_replace(">", "", $sub->range);
            if ($nilai > $limit) {
                $bobot = $sub->kesesuaian->bobot;
                return $bobot;
            }
        }
        return $bobot;
    }
    
    private function normalisasi($dataAlternatif, $kriteria) {
        // dd($dataAlternatif);
        // Looping setiap kriteria
        foreach ($kriteria as $C) {
            // mencari nilai maximum tiap kriteria
            $max[$C->id] = collect($dataAlternatif)->where('id_kriteria', $C->id)->max('bobot');
            // mencari nilai minimum tiap kriteria
            $min[$C->id] = collect($dataAlternatif)->where('id_kriteria', $C->id)->min('bobot');
        }

        // mencari nilai normalisasi
        foreach ($dataAlternatif as $key => $alternatif) {
            // cek benefit atau cost
            $normalisasi = 0;
            if ($alternatif['type'] == 'Benefit' || $alternatif['type'] == 'benefit') {
                $normalisasi = $alternatif['bobot'] / $max[$alternatif['id_kriteria']];
            }else if ($alternatif['type'] == 'Cost' || $alternatif['type'] == 'cost') {
                $normalisasi = $alternatif['bobot'] / $min[$alternatif['id_kriteria']];
            }
            $result[$key] = [
                'id_kriteria' => $alternatif['id_kriteria'],
                'id_tanaman' => $alternatif['id_tanaman'],
                'normalisasi' => $normalisasi,
                'bobot_kriteria' => $kriteria->where('id', $alternatif['id_kriteria'])->first()['bobot'] / 100
            ];
        }
        // mengembalikan hasil perhitungan normalisasi
        return $result;
    }

    private function nilaiPreferensi($normalisasi, $tanaman) {
        $normalisasi = collect($normalisasi)->groupBy('id_tanaman');
        $result = [];
        // mengalikan bobot dengan hasil normalisasi untuk mendapatkan nilai preferensi
        foreach ($normalisasi as $key => $normal) {
            foreach ($normal as $k => $N) {
                // cara menggunakan forech yg tepat untuk method collect() karena dgn tanda panah tidak dapat dijalankan
                $butir_preferensi[$k] = $N['bobot_kriteria'] * $N['normalisasi'];
                $id_tanaman = $N['id_tanaman'];
            }
            // Hitung nilai preferensi
            $nilai_preferensi = array_sum($butir_preferensi);

            $kriteria = '';
            if (0.75 <= $nilai_preferensi && $nilai_preferensi <= 1) {
                $kriteria = 'S1';
            }elseif (0.5 <= $nilai_preferensi && $nilai_preferensi < 0.75) {
                $kriteria = 'S2';
            }elseif (0.25 <= $nilai_preferensi && $nilai_preferensi < 0.5) {
                $kriteria = 'S3';
            }elseif (0 <= $nilai_preferensi && $nilai_preferensi < 0.25) {
                $kriteria = 'N';
            }
            // data hasil preferensi
            $preferensi = [
                'nilai_preferensi' => $nilai_preferensi,
                'id_tanaman' => $id_tanaman,
                'nama_tanaman' => $tanaman->where('id', $id_tanaman)->first()['nama_tanaman'],
                'kriteria' => $kriteria
            ];
            array_push($result, $preferensi);
        }
        return $result;
    }
}
