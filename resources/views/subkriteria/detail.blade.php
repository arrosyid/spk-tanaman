@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="mb-0">Data Subkriteria Tanaman</h1>
    <a href="{{ route('subkriteria.index') }}" class="btn btn-primary">Edit</a>
</div>

@if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<!-- Tabel Modern -->
<div class="table-responsive">
    <table class="table table-hover table-bordered table-striped align-middle">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Kriteria</th>
                @foreach ($kesesuaian as $k)
                    <th>{{ $k->tingkatan }}</th>
                @endforeach
                <th class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($kriteria as $index => $item)
            <tr>
                <td>{{ $loop->iteration }}</td> <!-- Penomoran otomatis -->
                <td>{{ $item->nama_kriteria }}</td>

                @foreach ($kesesuaian as $k )
                    @php
                        $sub = $subkriteria->where('id_kesesuaian', $k->id)->where('id_kriteria', $item->id)->first();
                    @endphp
                        <td>{{ $sub ? $sub->upper . '-' . $sub->lowwer : 'Tidak ada data' }}</td>
                @endforeach
                <!-- button edit -->
                <td><a href="#" class="btn btn-sm btn-warning">Edit</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection