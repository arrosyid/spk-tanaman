@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Tambah tanaman</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('tanaman.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="nama_tanaman" class="form-label">Nama tanaman</label>
                <input type="text" name="nama_tanaman" class="form-control" required>
            </div>
            
            <button type="submit" class="btn btn-success">Simpan</button>
            <a href="{{ route('tanaman.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@endsection