@extends('layouts.app')

@section('content')
<h4>Edit Kegiatan</h4>

<form action="/admin/kegiatan/update/{{ $kegiatan->id }}" method="POST">
@csrf

<div class="mb-3">
    <label>Judul</label>
    <input type="text" name="judul" value="{{ $kegiatan->judul }}" class="form-control">
</div>

<div class="mb-3">
    <label>Deskripsi</label>
    <textarea name="deskripsi" class="form-control">{{ $kegiatan->deskripsi }}</textarea>
</div>

<div class="mb-3">
    <label>Tanggal</label>
    <input type="date" name="tanggal" value="{{ $kegiatan->tanggal }}" class="form-control">
</div>

<button class="btn btn-primary">Update</button>
</form>
@endsection