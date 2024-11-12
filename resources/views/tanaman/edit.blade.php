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
                <input type="text" name="nama_tanaman" placeholder="Masukkan Nama Tanaman" value="{{ $tanaman->nama_tanaman }}" class="form-control" required>
            </div>

            <!-- <hr>
            <h4><strong>Masukkan Subkriteria Tanaman</strong></h4>
            <p>masukkan nilai subkriteria dengan menentukan rentang nilai seperti <b>100-200</b> atau <b>>100</b> atau <b>>1.5-4.5</b></p>
            <hr>
            @foreach ($kriteria as $C)
            <h5>Kriteria {{$C->nama_kriteria}}</h5>
            <div id="group-container-{{ $C->id }}">
                <div class="subkriteria-group-template border rounded p-3 mb-3">
                    @foreach ($kesesuaian as $k)
                    <div class="row g-3 align-items-center">
                        <div class="col-1 mb-3">
                            <label class="col-form-label">{{$k->tingkatan}}</label>
                        </div>
                        <div class="col">
                            <input type="text" name="kriteria[{{$C->id}}][{{$k->id}}][range]" value="{{$tanaman->subkriteria->where('id_kriteria', $C->id)->where('id_kesesuaian', $k->id)->first()->range ?? ''}}" id="subkriteria-primary-0" placeholder="Masukkan Rentang Nilai Subkriteria {{$C->nama_kriteria}}" class="form-control">
                            <input type="hidden" name="kriteria[{{$C->id}}][{{$k->id}}][id]" value="{{$tanaman->subkriteria->where('id_kriteria', $C->id)->where('id_kesesuaian', $k->id)->first()->id ?? ''}}" id="id-subkriteria-primary">
                        </div>
                    </div>
                    @endforeach
                    <button type="button" onclick="removeSubkriteriaGroup(this)" id="remove-subkriteria" class="btn btn-danger btn-sm d-none">Hapus</button>
                </div>
            </div>
            <button type="button" onclick="addSubkriteriaGroup({{ $C->id }})" class="btn btn-primary btn-sm mb-3">Tambah Kelompok Subkriteria {{$C->nama_kriteria}}</button>
            <hr>
            @endforeach -->
            <button type="submit" class="btn btn-success">Update</button>
            <a href="{{ route('tanaman.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@endsection


@push('scripts')
<!-- <script>
    function addSubkriteriaGroup(kriteriaId) {
        const container = document.getElementById(`group-container-${kriteriaId}`);
        // Get the template and clone it
        const template = container.querySelector('.subkriteria-group-template');
        const clone = template.cloneNode(true);

        // Atur semua input dalam kloning menjadi kosong
        const inputs = clone.querySelectorAll('input');
        inputs.forEach(input => {
            input.value = '';
            input.name = `kriteria[input][${kriteriaId}]`;
            console.log(input.name.);
        }); // Mengosongkan nilai setiap input


        clone.querySelector('#remove-subkriteria').classList.remove('d-none');
        // Append the cloned template to the container
        container.appendChild(clone);
    }

    function removeSubkriteriaGroup(button) {
        // Remove the specific group container
        button.closest('.subkriteria-group-template').remove();
    }
</script> -->
@endpush