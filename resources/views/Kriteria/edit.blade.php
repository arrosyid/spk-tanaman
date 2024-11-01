@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Edit Kriteria</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('kriteria.update', $kriteria->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="kode_kriteria" class="form-label">Kode Kriteria</label>
                <input type="text" name="kode_kriteria" class="form-control" value="{{ $kriteria->kode_kriteria }}" required>
            </div>

            <div class="mb-3">
                <label for="nama_kriteria" class="form-label">Nama Kriteria</label>
                <input type="text" name="nama_kriteria" class="form-control" value="{{ $kriteria->nama_kriteria }}" required>
            </div>

            <div class="mb-3">
                <label for="type" class="form-label">Type</label>
                <select name="type" class="form-select" required>
                    <option value="benefit" {{ $kriteria->type == 'benefit' ? 'selected' : '' }}>Benefit</option>
                    <option value="cost" {{ $kriteria->type == 'cost' ? 'selected' : '' }}>Cost</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="bobot" class="form-label">Bobot</label>
                <input type="number" step="0.01" name="bobot" class="form-control" value="{{ $kriteria->bobot }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('kriteria.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@endsection