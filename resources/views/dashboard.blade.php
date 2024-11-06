@extends('layouts.app')

@section('content')
<h1>Sistem Pendukung Keputusan Pemilihan Tanaman Perkebunan</h1>

<div class="card">
    <div class="card-header">
        <h4>Data Subkriteria</h4>
    </div>
    <div class="card-body">
        <table class="table table-hover table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>Tingkat Kesesuaian</th>
                    <th>Bobot</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kesesuaian as $key => $value)
                    <tr>
                        <td>{{ $value->tingkatan }}</td>
                        <td>{{ $value->bobot }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection