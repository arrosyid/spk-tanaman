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

            <hr>
            <h4><strong>Masukkan Subkriteria Tanaman</strong></h4>
            <p>masukkan nilai subkriteria dengan menentukan rentang nilai seperti <b>100-200</b> atau <b>>100</b> atau <b>>1.5-4.5</b></p>
            <hr>
            @foreach ($kriteria as $C)
            <h5>Kriteria {{$C->nama_kriteria}}</h5>
            <div id="group-container-{{ $C->id }}">
                @php
                    $loopCriteria = $subkriteria->where('id_kriteria', $C->id)->max('loop');
                    //dd($loopCriteria);
                @endphp
                @for ($i = 1; $i <= $loopCriteria; $i++) 
                <div class="subkriteria-group-template border rounded p-3 mb-3">
                    @foreach ($kesesuaian as $k)
                    <div class="row g-3 align-items-center">
                        <div class="col-1 mb-3">
                            <label class="col-form-label">{{$k->tingkatan}}</label>
                        </div>
                        <div class="col">
                            @php
                                $sub =$subkriteria->where('id_kriteria', $C->id)->where('id_kesesuaian', $k->id)->where('loop', $i)->first()
                            @endphp
                            <input type="text" name="kriteria[][{{$C->id}}][{{$k->id}}]" value="{{$sub->range ?? ''}}" id="subkriteria-primary-0" placeholder="Masukkan Rentang Nilai Subkriteria {{$C->nama_kriteria}}" class="form-control">
                            <input type="hidden" name="id[][{{$C->id}}][{{$k->id}}]" value="{{$sub->id ?? ''}}" id="id">
                            <input type="hidden" name="loop[][{{$C->id}}][{{$k->id}}]" value="{{$i}}" id="loop">
                        </div>
                    </div>
                    @endforeach
                    <!-- <button type="button" onclick="removeSubkriteriaGroup(this)" id="remove-subkriteria" class="btn btn-danger btn-sm {{$i > 1 ? '' : 'd-none'}}">Hapus</button> -->
                    <button type="button" onclick="deleteSubkriteria({{ $C->id . ', ' . $subkriteria->pluck('id_tanaman')->first() . ', ' . $i}}, this)" id="remove-subkriteria" class="btn btn-danger btn-sm {{$i > 1 ? '' : 'd-none'}}">Hapus</button>
                </div>
                @endfor
            </div>
            <!-- @if ($subkriteria->where('id_kriteria', $C->id)->where('loop', 2)->count() != 0)
            onload
            @endif -->
            <button type="button" onclick="addSubkriteriaGroup({{ $C->id }})" class="btn btn-primary btn-sm mb-3">Tambah Kelompok Subkriteria {{$C->nama_kriteria}}</button>
            <hr>
            @endforeach
            <button type="submit" class="btn btn-success">Update</button>
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
        // menghitung grup kriteria keberapa
        let count = container.querySelectorAll('.subkriteria-group-template').length;
        // persiapkan template untuk clone
        const clone = template.cloneNode(true);

        // Atur semua input dalam kloning menjadi kosong
        const inputs = clone.querySelectorAll('input');

        console.log(inputs.length);
        inputs.forEach(input => {
            input.setAttribute('value', ``);
        }); // Mengosongkan nilai setiap input

        // mengisi value untuk loop
        const loops = clone.querySelectorAll('#loop');
        loops.forEach(loop => {
            loop.setAttribute('value', count + 1);
        })
        // tampilkan tombol remove
        clone.querySelector('#remove-subkriteria').classList.remove('d-none');
        // Append the cloned template to the container
        container.appendChild(clone);
    }

    // function removeSubkriteriaGroup(button) {
    //     // Remove the specific group container
    //     button.closest('.subkriteria-group-template').remove();
    // }

    function deleteSubkriteria(idKriteria, idTanaman, loop, button) {
        if (confirm('Apakah Anda yakin ingin menghapus data ini?')) {
            fetch(`/tanaman/deletejson/${idKriteria}/${idTanaman}/${loop}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                },
            })
            .then(response => response.json())
            .then(data => {
                if (data.message === 'Data berhasil dihapus') {
                    alert(data.message);
                    button.closest('.subkriteria-group-template').remove();
                } else {
                    alert('Gagal menghapus data');
                }
            })
            .catch(() => alert('Terjadi kesalahan saat menghapus data'));
        }
    }


</script>
@endpush