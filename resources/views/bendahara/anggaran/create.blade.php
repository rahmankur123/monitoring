@extends('layouts.app')

@section('content')
<h4>Input Anggaran - {{ $kegiatan->judul }}</h4>

<form action="/bendahara/anggaran/store" method="POST">
@csrf

<input type="hidden" name="kegiatan_id" value="{{ $kegiatan->id }}">

<table class="table" id="table-anggaran">
    <tr>
        <th>Item</th>
        <th>Qty</th>
        <th>Harga</th>
        <th>Total</th>
        <th>Aksi</th>
    </tr>

    <tr>
        <td><input type="text" name="nama_item[]" class="form-control"></td>
        <td><input type="number" name="qty[]" class="form-control qty"></td>
        <td><input type="number" name="harga[]" class="form-control harga"></td>
        <td><input type="number" class="form-control total" readonly></td>
        <td><button type="button" class="btn btn-danger btn-sm remove">X</button></td>
    </tr>
</table>

<button type="button" class="btn btn-success" id="add">+ Tambah Item</button>
<br><br>

<button class="btn btn-primary">Simpan</button>
</form>

<script>
document.getElementById('add').addEventListener('click', function () {
    let row = `
    <tr>
        <td><input type="text" name="nama_item[]" class="form-control"></td>
        <td><input type="number" name="qty[]" class="form-control qty"></td>
        <td><input type="number" name="harga[]" class="form-control harga"></td>
        <td><input type="number" class="form-control total" readonly></td>
        <td><button type="button" class="btn btn-danger btn-sm remove">X</button></td>
    </tr>`;
    document.getElementById('table-anggaran').insertAdjacentHTML('beforeend', row);
});

document.addEventListener('input', function(e){
    if(e.target.classList.contains('qty') || e.target.classList.contains('harga')){
        let row = e.target.closest('tr');
        let qty = row.querySelector('.qty').value || 0;
        let harga = row.querySelector('.harga').value || 0;
        row.querySelector('.total').value = qty * harga;
    }
});

document.addEventListener('click', function(e){
    if(e.target.classList.contains('remove')){
        e.target.closest('tr').remove();
    }
});
</script>

@endsection