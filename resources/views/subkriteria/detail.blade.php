@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2 class="mb-0">Data Subkriteria Tanaman {{$subkriteria->pluck('tanaman.nama_tanaman')->first()}}</h2>
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
            </tr>
        </thead>
        <tbody>
            @foreach($kriteria as $index => $item)
            <tr>
                <td>{{ $loop->iteration }}</td> <!-- Penomoran otomatis -->
                <td>{{ $item->nama_kriteria }}</td>

                @foreach ($kesesuaian as $k )
                    @php
                        $sub = $subkriteria->where('id_kesesuaian', $k->id)->where('id_kriteria', $item->id);
                        foreach ($sub as $s) {
                            $ranges[] = $s->range;
                        }
                        if (empty($ranges)) {
                            $view = 'Tidak ada data';
                        }else{
                            $view = implode(' <br> ', $ranges);
                            unset($ranges);
                        }
                    @endphp
                        <td>{!! $view !!}</td>
                @endforeach
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection