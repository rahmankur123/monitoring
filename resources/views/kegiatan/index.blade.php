@extends('layouts.app')

@section('content')

<h3 class="mb-4">Detail Kegiatan Selesai</h3>

<div class="card mb-4">
    <div class="card-body">
        <h5>{{ $kegiatan->judul }}</h5>
        <p>{{ $kegiatan->deskripsi }}</p>
        <p><b>Tanggal:</b> {{ $kegiatan->tanggal }}</p>
    </div>
</div>


{{-- ANGGARAN --}}
<div class="card mb-4">
    <div class="card-header bg-primary text-white">Anggaran</div>
    <div class="card-body">
        <table class="table table-bordered">
            <tr>
                <th>Item</th>
                <th>Qty</th>
                <th>Harga</th>
                <th>Total</th>
            </tr>

            @php $totalAnggaran = 0; @endphp
            @foreach($kegiatan->anggaran as $a)
            @php $total = $a->qty * $a->harga; $totalAnggaran += $total; @endphp
            <tr>
                <td>{{ $a->nama_item }}</td>
                <td>{{ $a->qty }}</td>
                <td>{{ $a->harga }}</td>
                <td>{{ $total }}</td>
            </tr>
            @endforeach

            <tr>
                <th colspan="3">Total</th>
                <th>{{ $totalAnggaran }}</th>
            </tr>
        </table>
    </div>
</div>


{{-- REALISASI --}}
<div class="card mb-4">
    <div class="card-header bg-success text-white">Realisasi</div>
    <div class="card-body">
        <table class="table table-bordered">
            <tr>
                <th>Item</th>
                <th>Qty</th>
                <th>Harga</th>
                <th>Total</th>
            </tr>

            @php $totalRealisasi = 0; @endphp
            @foreach($kegiatan->realisasi as $r)
            @php $total = $r->qty * $r->harga; $totalRealisasi += $total; @endphp
            <tr>
                <td>{{ $r->nama_item }}</td>
                <td>{{ $r->qty }}</td>
                <td>{{ $r->harga }}</td>
                <td>{{ $total }}</td>
            </tr>
            @endforeach

            <tr>
                <th colspan="3">Total</th>
                <th>{{ $totalRealisasi }}</th>
            </tr>
        </table>
    </div>
</div>


{{-- GALERI --}}
<div class="card mb-4">
    <div class="card-header bg-info text-white">Galeri</div>
    <div class="card-body">
        <div class="row">
            @foreach($kegiatan->galeri as $g)
            <div class="col-md-3 mb-3">
                <img src="{{ asset('storage/'.$g->foto) }}" class="img-fluid rounded">
            </div>
            @endforeach
        </div>
    </div>
</div>


{{-- LPJ --}}
<div class="card mb-4">
    <div class="card-header bg-secondary text-white">LPJ</div>
    <div class="card-body">
        @if($kegiatan->lpj)
            <a href="{{ asset('storage/'.$kegiatan->lpj->file) }}" target="_blank" class="btn btn-dark">
                Download LPJ
            </a>
        @else
            <span class="text-muted">Belum ada LPJ</span>
        @endif
    </div>
</div>


{{-- EVALUASI --}}
<div class="card mb-4">
    <div class="card-header bg-warning">Evaluasi</div>
    <div class="card-body">

        @foreach($kegiatan->evaluasi as $e)
            <div class="mb-3 p-3 border rounded">
                <b>{{ $e->role }}</b>
                <p>{{ $e->catatan }}</p>
            </div>
        @endforeach

        @if($kegiatan->evaluasi->isEmpty())
            <span class="text-muted">Belum ada evaluasi</span>
        @endif

    </div>
</div>

@endsection