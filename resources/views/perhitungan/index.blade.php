@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-body">
        <h5 class="card-title">Pilih Tahun Penilaian Evaluasi</h5>

        <form method="post" action="{{ route('perhitungan.index') }}">
            @csrf
            @method("GET")

            <div class="row mb-3">
                <label for="bulan" class="col-md-4 col-lg-3 col-form-label">Pilih Tanah</label>
                <div class="col-md-8 col-lg-9">
                    <select name="tanah" id="tanah" class="form-control">
                        <option disabled selected>pilih tanah</option>
                        @foreach ($tanah as $t)
                            <option value="{{ $t->id }}">{{ $t->kode_tanah . ', '. $t->lokasi_tanah }}</option>
                        @endforeach
                    </select>

                    <!-- <input type="number" class="form-control" name="tahun" placeholder="YYYY" min="1999" max="{{date('Y')}}"> -->
                </div>
            </div>
            <div class="row mb-3 text-center">
                <div class="col-sm-12">
                    <button type="submit" style="width: 200px" class="btn btn-primary">Cari Penilaian</button>
                    @if (!empty($tampil_preferensi))
                        <a href="#" class="btn btn-warning" target="_blank">Cetak PDF</a>
                    @endif
                </div>
            </div>
        </form>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <h4 class="card-title">Perhitungan SAW</h4>
    </div>
    <div class="card-body mt-3">
        <h5>Data Tanah</h5>
        @if (isset($pilihTanah))
        <div class="row">
            <div class="col-2">Kode Tanah</div>
            <div class="col-auto">:</div>
            <div class="col-auto">{{ $pilihTanah->kode_tanah }}</div>
        </div>
        <div class="row">
            <div class="col-2">Lokasi Tanah</div>
            <div class="col-auto">:</div>
            <div class="col-auto">{{ $pilihTanah->lokasi_tanah }}</div>
        </div>
        @foreach ($kriteria as $C)
        @php
            $rincianTanah = $pilihTanah->kondisiTanah()->where('id_kriteria', $C->id)->first();
        @endphp
        <div class="row">
            <div class="col-2">{{$rincianTanah->kriteria->kode_kriteria}}</div>
            <div class="col-auto">:</div>
            <div class="col-auto">{{ $rincianTanah->nilai ?? 'Tidak Ada Data' }}</div>
        </div>
        @endforeach

        <hr>
        <h5>Data Alternatif</h5>
        <table class="table table-hover table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>Nama Tanaman</th>
                    @foreach ($kriteria as $C)
                    <th>{{ $C->kode_kriteria }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @foreach ($tanaman as $T)
                <tr>
                    <td>{{ $T->nama_tanaman }}</td>
                    @foreach ($kriteria as $C)
                    <td>{{collect($dataAlternatif)->where('id_tanaman', $T->id)->where('id_kriteria', $C->id)->first()['bobot'] ?? 'Tidak Ada Data'}}</td>
                    @endforeach
                @endforeach
            </tbody>
        </table>
        <hr>
        <h5>Data Normalisasi</h5>
        <table class="table table-hover table-bordered table-striped">
        <thead class="table-dark">
                <tr>
                    <th>Nama Tanaman</th>
                    @foreach ($kriteria as $C)
                    <th>{{ $C->kode_kriteria }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @foreach ($tanaman as $T)
                <tr>
                    <td>{{ $T->nama_tanaman }}</td>
                    @foreach ($kriteria as $C)
                    <td>{{round(collect($normalisasi)->where('id_tanaman', $T->id)->where('id_kriteria', $C->id)->first()['normalisasi'], 3) ?? 'Tidak Ada Data'}}</td>
                    @endforeach
                @endforeach
            </tbody>
        </table>

        <hr>
        <h5>Nilai Preferensi</h5>
        <table class="table table-hover table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>Nama Tanaman</th>
                    <th>Preferensi</th>
                    <th>Kriteria</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($preferensi as $P)
                <tr>
                    <td>{{ $P['nama_tanaman'] }}</td>
                    <td>{{round($P['nilai_preferensi'], 3) ?? 'Tidak Ada Data'}}</td>
                    <td>{{ $P['kriteria'] ?? 'Tidak Ada Data'}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <hr>
        <h5>Rekomendasi</h5>
        <table class="table table-hover table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>Kriteria</th>
                    <th>Tanaman</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kesesuaian as $K)
                <tr>
                    <td>{{ $K['tingkatan'] }}</td>
                    <td>
                        {{collect($preferensi)
                            ->where('kriteria', $K['tingkatan'])
                            ->map(function ($item) { 
                                return $item['nama_tanaman']; 
                            })
                            ->values()
                            ->whenNotEmpty(function ($collection) { // when not empty
                                return $collection->implode(', ');
                            }, function () { // when empty
                                return 'Tidak Ada Data'; 
                            })
                        }}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif
    </div>
</div>
@endsection