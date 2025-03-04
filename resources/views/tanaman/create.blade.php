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
            <h4><strong>Masukkan Subkriteria Tanaman</strong></h4>
            <p>masukkan nilai subkriteria dengan menentukan rentang nilai seperti <b>100-200</b> atau <b>>100</b> atau <b>>1.5-4.5</b></p>
            <hr>
            @foreach ($kriteria as $C)
            <h5>Kriteria {{$C->nama_kriteria}}</h5>
            <!-- template -->
            <div id="group-container-{{ $C->id }}">
                <div class="subkriteria-group-template border rounded p-3 mb-3">
                    @foreach ($kesesuaian as $k)
                    <div class="row g-3 align-items-center">
                        <div class="col-1 mb-3">
                            <label class="col-form-label">{{$k->tingkatan}}</label>
                        </div>
                        <div class="col">
                            <input type="text" name="kriteria[][{{$C->id}}][{{$k->id}}]" id="subkriteria-primary-0" placeholder="Masukkan Rentang Nilai Subkriteria {{$C->nama_kriteria}}" class="form-control">
                            <input type="hidden" name="loop[][{{$C->id}}][{{$k->id}}]" value="1" id="loop">
                        </div>
                    </div>
                    @endforeach
                    <button type="button" onclick="removeSubkriteriaGroup(this)" id="remove-subkriteria" class="btn btn-danger btn-sm d-none">Hapus</button>
                </div>
            </div>
            <button type="button" onclick="addSubkriteriaGroup({{ $C->id }})" class="btn btn-primary btn-sm mb-3">Tambah Kelompok Subkriteria {{$C->nama_kriteria}}</button>
            <hr>
            @endforeach
            <button type="submit" class="btn btn-success">Simpan</button>
            <a href="{{ route('tanaman.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script>
    function addSubkriteriaGroup(kriteriaId) {
        const container = document.getElementById(`group-container-${kriteriaId}`);
        // Get the template and clone it
        const template = container.querySelector('.subkriteria-group-template');
        // menghitung index
        const nextIndex = container.querySelectorAll('.subkriteria-group-template').length + 1;
        const clone = template.cloneNode(true);

        const loopElement = clone.querySelector('#loop');
        if (loopElement) {
            loopElement.setAttribute('id', `loop-${nextIndex}`);
            loopElement.setAttribute('value', nextIndex);
        }
        // Generate a unique index based on the current time for dynamic name attribute
        clone.querySelector('#remove-subkriteria').classList.remove('d-none');

        // Append the cloned template to the container
        container.appendChild(clone);
    }

    function removeSubkriteriaGroup(button) {
        // Remove the specific group container
        button.closest('.subkriteria-group-template').remove();
    }
</script>
@endpush