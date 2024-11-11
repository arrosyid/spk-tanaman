@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="mb-0">Data Tanah</h1>
    <a href="{{ route('tanah.create') }}" class="btn btn-primary">Tambah Tanah</a>
</div>

@if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<!-- Tabel Modern -->
<div class="table-responsive">
    <table class="table table-hover table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Kode Tanah</th>
                <th>Lokasi Tanah</th>
                @foreach ($kriteria as $C)
                <th>{{$C->nama_kriteria}}</th>
                @endforeach
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($result as $key => $value)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $value['kode_tanah'] }}</td>
                    <td>{{ $value['lokasi_tanah'] }}</td>
                    @foreach ($kriteria as $C)
                        <td>{{ collect($value['kriteria'])->where('id_kriteria', $C->id)->first()['nilai'] ?? 'Tidak Ada Data' }}</td>
                    @endforeach
                    <td class="text-center">
                        <a href="{{ route('tanah.edit', $value['id_tanah']) }}" class="btn btn-sm btn-warning">
                            <i class="bi bi-pencil"></i> Edit
                        </a>
                        <form action="{{ route('tanah.destroy', $value['id_tanah']) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus data ini?')">
                                <i class="bi bi-trash"></i> Hapus
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection