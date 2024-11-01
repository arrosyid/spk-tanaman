@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="mb-0">Data Kriteria</h1>
    <a href="{{ route('kriteria.create') }}" class="btn btn-primary">Tambah Kriteria</a>
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
                <th>No</th> <!-- Kolom nomor -->
                <th>Kode Kriteria</th>
                <th>Nama Kriteria</th>
                <th>Type</th>
                <th>Bobot</th>
                <th class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($kriteria as $index => $item)
            <tr>
                <td>{{ $index + 1 }}</td> <!-- Penomoran otomatis -->
                <td>{{ $item->kode_kriteria }}</td>
                <td>{{ $item->nama_kriteria }}</td>
                <td>{{ ucfirst($item->type) }}</td>
                <td>{{ $item->bobot }}</td>
                <td class="text-center">
                    <a href="{{ route('kriteria.edit', $item->id) }}" class="btn btn-sm btn-warning">
                        <i class="bi bi-pencil"></i> Edit
                    </a>
                    <form action="{{ route('kriteria.destroy', $item->id) }}" method="POST" class="d-inline">
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