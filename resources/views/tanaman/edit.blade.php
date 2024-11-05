@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Edit Tanaman</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('tanaman.update', $tanaman->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="nama_tanaman" class="form-label">Nama Tanaman</label>
                <input type="text" name="nama_tanaman" class="form-control" value="{{ $tanaman->nama_tanaman }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('tanaman.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@endsection