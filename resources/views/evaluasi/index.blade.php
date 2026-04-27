@extends('layouts.app')

@section('content')
<h4>Evaluasi</h4>

<form action="/evaluasi/store" method="POST">
@csrf
<input type="hidden" name="kegiatan_id" value="{{ $kegiatan_id }}">

<textarea name="isi" class="form-control mb-3"></textarea>

<button class="btn btn-primary">Kirim</button>
</form>

<hr>

@foreach($evaluasi as $e)
<div class="card mb-2">
    <div class="card-body">
        <b>{{ $e->role_pengisi }}</b><br>
        {{ $e->isi }}
    </div>
</div>
@endforeach

@endsection