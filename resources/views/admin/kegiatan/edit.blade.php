@extends('layouts.app')

@section('content')
<h4>Edit Kegiatan</h4>

<form action="/admin/kegiatan/update/{{ $kegiatan->id }}" method="POST" enctype="multipart/form-data">
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
<div class="mb-3">
    <label>Ganti Proposal</label>

    <input type="file"
           name="proposal"
           class="form-control"
           accept=".pdf,.doc,.docx">

    @if($kegiatan->proposal)
        <a href="{{ asset('storage/'.$kegiatan->proposal) }}"
           target="_blank"
           class="btn btn-sm btn-info mt-2">
            Lihat Proposal Lama
        </a>
    @endif
</div>
<button class="btn btn-primary">Update</button>
</form>
@endsection