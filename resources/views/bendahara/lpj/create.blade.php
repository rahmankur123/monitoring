@extends('layouts.app')

@section('content')
<h4>Upload LPJ</h4>

<form action="/bendahara/lpj/store" method="POST" enctype="multipart/form-data">
@csrf

<input type="hidden" name="kegiatan_id" value="{{ $kegiatan->id }}">

<input type="file" name="file" class="form-control mb-3" accept="application/pdf">

<button class="btn btn-primary">Upload</button>
<button type="button" class="btn btn-secondary" onclick="window.history.back()">Kembali</button>
</form>
@endsection