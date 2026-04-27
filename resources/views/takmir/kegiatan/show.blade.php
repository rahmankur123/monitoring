@extends('layouts.app')

@section('content')
<h4>Detail Kegiatan</h4>

<p><strong>Judul:</strong> {{ $kegiatan->judul }}</p>
<p><strong>Tanggal:</strong> {{ $kegiatan->tanggal }}</p>
<p><strong>Deskripsi:</strong> {{ $kegiatan->deskripsi }}</p>

<h5>Anggaran</h5>

<table class="table table-bordered">
    <tr>
        <th>Item</th>
        <th>Qty</th>
        <th>Harga</th>
        <th>Total</th>
    </tr>

    @foreach($kegiatan->anggaran as $a)
    <tr>
        <td>{{ $a->nama_item }}</td>
        <td>{{ $a->qty }}</td>
        <td>{{ $a->harga }}</td>
        <td>{{ $a->total }}</td>
    </tr>
    @endforeach
</table>

<hr>

{{-- APPROVE --}}
<form action="/takmir/kegiatan/{{ $kegiatan->id }}/approve" method="POST" style="display:inline">
@csrf
<button class="btn btn-success">Approve</button>
</form>

{{-- REJECT --}}
<form action="/takmir/kegiatan/{{ $kegiatan->id }}/reject" method="POST" style="display:inline">
@csrf
<input type="text" name="catatan" placeholder="Alasan penolakan" required>
<button class="btn btn-danger">Reject</button>
</form>

@endsection