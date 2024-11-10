@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="mb-0">Subkriteria Tanaman</h1>
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
                <td>{{ $loop->iteration }}</td> <!-- Penomoran otomatis -->
                <td>{{ $item->nama_tanaman }}</td>
                <td class="text-center">
                    <a href="{{ route('subkriteria.detail', $item->id) }}" class="btn btn-sm btn-warning">
                        <i class="bi bi-list"></i> Detail
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection