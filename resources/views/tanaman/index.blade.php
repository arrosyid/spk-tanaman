@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="mb-0">Data Tanaman</h1>
    <a href="{{ route('tanaman.create') }}" class="btn btn-primary">Tambah tanaman</a>
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
                <th>Nama tanaman</th>
                <th class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tanaman as $index => $item)
            <tr>
                <td>{{ $index + 1 }}</td> <!-- Penomoran otomatis -->
                <td>{{ $item->nama_tanaman }}</td>
                <td class="text-center">
                    <a href="{{ route('tanaman.edit', $item->id) }}" class="btn btn-sm btn-primary">
                        <i class="bi bi-pencil"></i> Edit
                    </a>
                    <a href="{{ route('tanaman.detail', $item->id) }}" class="btn btn-sm btn-warning">
                        <i class="bi bi-list"></i> Detail
                    </a>
                    <form action="{{ route('tanaman.destroy', $item->id) }}" method="POST" class="d-inline">
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