@extends('layouts.app')

@section('content')
<h4>Galeri</h4>

<form action="/admin/galeri/store" method="POST" enctype="multipart/form-data">
@csrf

<input type="hidden" name="kegiatan_id" value="{{ $kegiatan_id }}">

<input type="file" name="foto[]" multiple class="form-control mb-3">

<button class="btn btn-primary">Upload</button>
</form>

<div class="row">
@foreach($galeri as $g)
    <div class="col-md-3">
        <img src="{{ asset('storage/'.$g->foto) }}" class="img-fluid" accept="image/*">
    </div>
@endforeach
</div>

@endsection