@extends('layouts.app')

@section('content')
<h1>Sistem Pendukung Keputusan Pemilihan Tanaman Perkebunan</h1>

<div class="card">
    <div class="card-header">
        <h4>Data Subkriteria</h4>
    </div>
    <div class="card-body">
        <table class="table table-hover table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>Tingkat Kesesuaian</th>
                    <th>Bobot</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kesesuaian as $key => $value)
                    <tr>
                        <td>{{ $value->tingkatan }}</td>
                        <td>{{ $value->bobot }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <form action="{{ route('dashboard') }}" method="get" class="mt-4 mb-4">
            @csrf
            @method("GET")
            <label for="type" class="form-label">Grafik Kesesuaian Tanah</label>
            <div class="row">
                <div class="col-auto">
                    <select name="tanah" id="tanah" class="form-select">
                        <option value="" disabled selected>pilih jenis tanah</option>
                        @foreach ($tanah as $T)
                        <option value="{{ $T->id }}" {{ isset($pilihTanah) && $pilihTanah->id == $T->id ? 'selected' : '' }}>{{ $T->kode_tanah . ', '. $T->lokasi_tanah }}</option>
                        @endforeach
                    </select>
                    <input type="hidden" name="dashboard" value="1">
                </div>
                <div class="col-auto">
                    <button type="submit" class="btn btn-primary">Cari Grafik</button>
                </div>
            </div>
        </form>
        <canvas id="myChart" width="400" height="200"><p>Hello Fallback World</p></canvas>
    </div>
</div>
@endsection

@push('scripts')
    <script type="module">
        const ctx = document.getElementById('myChart').getContext('2d');
        const myChart = new Chart(ctx, {
            type: 'bar', // Jenis chart (bar, line, pie, dll.)
            data: {
                labels: @json(isset($preferensi) ? $preferensi->pluck('nama_tanaman') : [''] ),
                datasets: [{
                    label: 'Nilai Preferensi',
                    data: @json(isset($preferensi) ? $preferensi->pluck('nilai_preferensi') : [''] ),
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: true,
                        position: 'top',
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
@endpush