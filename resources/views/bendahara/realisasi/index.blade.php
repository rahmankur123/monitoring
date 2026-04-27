@extends('layouts.app')

@section('content')
<h4>Data Realisasi</h4>

<table class="table table-bordered">
    <tr>
        <th>Judul</th>
        <th>Tanggal</th>
        <th>Status</th>
        <th>Status Realisasi</th>
        <th>Total</th>
        <th>Aksi</th>
    </tr>

    @foreach($kegiatan as $k)
    <tr>
        <td>{{ $k->judul }}</td>
        <td>{{ $k->tanggal }}</td>
        <td>{{ $k->status }}</td>

        <td>
            @if($k->realisasi->count() > 0)
                <span class="badge bg-success">Sudah</span>
            @else
                <span class="badge bg-danger">Belum</span>
            @endif
        </td>

        <td>
            Rp {{ number_format($k->realisasi->sum('total'),0,',','.') }}
        </td>

        <td>
            @if($k->realisasi->count() > 0)
                <a href="/bendahara/realisasi/{{ $k->id }}/list" class="btn btn-info btn-sm">Lihat</a>
            @else
                <a href="/bendahara/realisasi/{{ $k->id }}" class="btn btn-primary btn-sm">Input</a>
            @endif
        </td>
    </tr>
    @endforeach
</table>
@endsection