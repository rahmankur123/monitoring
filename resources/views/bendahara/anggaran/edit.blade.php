@extends('layouts.app')

@section('content')
<h4>Anggaran - {{ $kegiatan->judul }}</h4>

<form action="/bendahara/anggaran/update" method="POST">
@csrf

<input type="hidden" name="kegiatan_id" value="{{ $kegiatan->id }}">

<table class="table" id="table">
    <tr>
        <th>Item</th>
        <th>Qty</th>
        <th>Harga</th>
        <th>Total</th>
        <th>Aksi</th>
    </tr>

    @foreach($kegiatan->anggaran as $a)
    <tr>
        <td><input type="text" name="nama_item[]" value="{{ $a->nama_item }}" class="form-control"></td>
        <td><input type="number" name="qty[]" value="{{ $a->qty }}" class="form-control qty"></td>
        <td><input type="number" name="harga[]" value="{{ $a->harga }}" class="form-control harga"></td>
        <td><input type="number" value="{{ $a->total }}" class="form-control total" readonly></td>
        <td><button type="button" class="btn btn-danger remove">X</button></td>
    </tr>
    @endforeach
</table>

<button type="button" class="btn btn-success" id="add">+ Tambah</button>
<br><br>

<button class="btn btn-primary">Update Anggaran</button>
<button type="button" class="btn btn-secondary" onclick="window.history.back()">Kembali</button>
</form>

<script>
// tambah row
document.getElementById('add').addEventListener('click', function () {
    let row = `
    <tr>
        <td><input type="text" name="nama_item[]" class="form-control"></td>
        <td><input type="number" name="qty[]" class="form-control qty"></td>
        <td><input type="number" name="harga[]" class="form-control harga"></td>
        <td><input type="number" class="form-control total" readonly></td>
        <td><button type="button" class="btn btn-danger remove">X</button></td>
    </tr>`;
    document.getElementById('table').insertAdjacentHTML('beforeend', row);
});

// auto hitung
document.addEventListener('input', function(e){
    if(e.target.classList.contains('qty') || e.target.classList.contains('harga')){
        let row = e.target.closest('tr');
        let qty = row.querySelector('.qty').value || 0;
        let harga = row.querySelector('.harga').value || 0;
        row.querySelector('.total').value = qty * harga;
    }
});

// hapus
document.addEventListener('click', function(e){
    if(e.target.classList.contains('remove')){
        e.target.closest('tr').remove();
    }
});
</script>

@endsection