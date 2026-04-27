@extends('layouts.app')

@section('content')
<h4>Detail Realisasi</h4>

<p><strong>Kegiatan:</strong> {{ $kegiatan->judul }}</p>

<a href="/bendahara/realisasi" class="btn btn-secondary mb-3">Kembali</a>

<table class="table table-bordered">
    <tr>
        <th>No</th>
        <th>Item</th>
        <th>Qty</th>
        <th>Harga</th>
        <th>Total</th>
    </tr>

    @foreach($realisasi as $i => $r)
    <tr>
        <td>{{ $i+1 }}</td>
        <td>{{ $r->nama_item }}</td>
        <td>{{ $r->qty }}</td>
        <td>Rp {{ number_format($r->harga,0,',','.') }}</td>
        <td>Rp {{ number_format($r->total,0,',','.') }}</td>
    </tr>
    @endforeach

    <tr>
        <th colspan="4">Total</th>
        <th>Rp {{ number_format($total,0,',','.') }}</th>
    </tr>
</table>
@endsection