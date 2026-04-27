@extends('layouts.app')

@section('content')
<h4>Data Kas</h4>

<div class="card mb-3">
    <div class="card-body">
        <h5>Saldo Saat Ini</h5>
        <h3>Rp {{ number_format($saldo,0,',','.') }}</h3>
    </div>
</div>

<a href="/bendahara/kas/create" class="btn btn-primary mb-3">Tambah Kas</a>

<table class="table table-bordered">
    <tr>
        <th>Tanggal</th>
        <th>Keterangan</th>
        <th>Tipe</th>
        <th>Jumlah</th>
    </tr>

    @foreach($kas as $k)
    <tr>
        <td>{{ $k->tanggal }}</td>
        <td>{{ $k->keterangan }}</td>
        <td>
            @if($k->tipe == 'masuk')
                <span class="badge bg-success">Masuk</span>
            @else
                <span class="badge bg-danger">Keluar</span>
            @endif
        </td>
        <td>Rp {{ number_format($k->jumlah,0,',','.') }}</td>
    </tr>
    @endforeach
</table>
@endsection