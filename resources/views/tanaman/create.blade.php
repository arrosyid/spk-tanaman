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
                <input type="text" name="nama_tanaman" placeholder="Masukkan Nama Tanaman" class="form-control" required>
            </div>
            <hr>
            <h4><strong>Masukkan Kriteria</strong></h4>
            @foreach ($kriteria as $C)
            <br>
            <h5>Kriteria {{$C->nama_kriteria}}</h5>
                @foreach ($kesesuaian as $k)
                <div class="row g-3 align-items-center">
                    <div class="col-1 mb-3">
                        <label for="input-{{$C->id}}-{{$k->id}}" class="col-form-label">{{$k->tingkatan}}</label>
                    </div>
                    <div class="col-auto">
                        <input type="number" name="kriteria[{{$C->id}}][{{$k->id}}][lower]" placeholder="Lower Value (Terendah)" class="form-control" required>
                    </div>
                    <div class="col-auto">
                        <span class="form-text"> - </span>
                    </div>
                    <div class="col-auto">
                        <input type="number" name="kriteria[{{$C->id}}][{{$k->id}}][upper]" placeholder="Upper Value (Tertinggi)" class="form-control" required>
                    </div>
                </div>
                @endforeach
            @endforeach
            
            <button type="submit" class="btn btn-success">Simpan</button>
            <a href="{{ route('tanaman.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@endsection