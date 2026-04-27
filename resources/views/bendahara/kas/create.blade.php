@extends('layouts.app')

@section('content')
<h4>Tambah Kas Masuk</h4>

<form action="/bendahara/kas/store" method="POST">
@csrf

<div class="mb-3">
    <label>Tanggal</label>
    <input type="date" name="tanggal" class="form-control">
</div>

<div class="mb-3">
    <label>Keterangan</label>
    <input type="text" name="keterangan" class="form-control">
</div>

<div class="mb-3">
    <label >Tipe</label>
    <select name="tipe" class="form-control">
        <option value="masuk">Masuk</option>
        <option value="keluar">Keluar</option>
    </select>
</div>

<div class="mb-3">
    <label>Jumlah</label>
    <input type="number" name="jumlah" class="form-control">
</div>

<button class="btn btn-primary">Simpan</button>
</form>
@endsection