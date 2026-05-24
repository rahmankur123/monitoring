@extends('layouts.app')

@section('content')
<h4>Tambah Kegiatan</h4>

<form action="/admin/kegiatan/store" method="POST" enctype="multipart/form-data">
@csrf

<div class="mb-3">
    <label>Judul</label>
    <input type="text" name="judul" class="form-control">
</div>

<div class="mb-3">
    <label>Deskripsi</label>
    <textarea name="deskripsi" class="form-control"></textarea>
</div>

<div class="mb-3">
    <label>Tanggal</label>
    <input type="date" name="tanggal" class="form-control">
</div>

<div class="mb-3">
    <label>Proposal</label>

    <input type="file"
           name="proposal"
           class="form-control"
           accept=".pdf,.doc,.docx">

    <small class="text-muted">
        Format: PDF / DOC / DOCX
    </small>
</div>

<button class="btn btn-primary">Simpan</button>
</form>
@endsection