@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Tambah Tanah</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('tanah.update', $dataTanah->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="kode_tanah" class="form-label">Kode Tanah</label>
                <input type="text" name="kode_tanah" placeholder="Masukkan Kode Tanah" value="{{$dataTanah->kode_tanah}}" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="nama_tanah" class="form-label">Lokasi Tanah</label>
                <input type="text" name="lokasi_tanah" placeholder="Masukkan Lokasi Tanah" value="{{$dataTanah->lokasi_tanah}}" class="form-control" required>
            </div>
            <hr>
            <h3>Masukkan Kondisi Tanah</h3>
            <p>Masukkan kondisi tanah sesuai dengan kriteria</p>
            <div class="mb-3">
                <label for="nama_tanah" class="form-label">Bulan</label>
                <input type="month" name="bulan" placeholder="Masukkan Bulan Kondisi" value="{{$dataTanah->kondisiTanah->first()->bulan}}" class="form-control" required>
            </div>

            @foreach ($kriteria as $C)
            <div class="mb-3">
                <label class="form-label">{{$C->nama_kriteria}}</label>
                <input type="text" name="kriteria[{{$C->id}}]" placeholder="Masukkan {{$C->nama_kriteria}}" value="{{$dataTanah->kondisiTanah->where('id_kriteria', $C->id)->first()->nilai ?? ''}}" class="form-control" required>
            </div>
            @endforeach

            <button type="submit" class="btn btn-success">Simpan</button>
            <a href="{{ route('tanah.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@endsection