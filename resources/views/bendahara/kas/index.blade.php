@extends('layouts.app')

@section('content')
<h4>Data Kas</h4>

{{-- ===================== --}}
{{-- STATISTIK HARI INI --}}
{{-- ===================== --}}
<div class="row mb-3">

    <div class="col-md-3">
        <div class="card shadow-sm border-0">
            <div class="card-body">
                <small>Transaksi Hari Ini</small>
                <h4>{{ $transaksiHariIni }}</h4>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card shadow-sm border-start border-success border-4">
            <div class="card-body">
                <small>Uang Masuk Hari Ini</small>
                <h5 class="text-success">
                    Rp {{ number_format($masukHariIni,0,',','.') }}
                </h5>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card shadow-sm border-start border-danger border-4">
            <div class="card-body">
                <small>Uang Keluar Hari Ini</small>
                <h5 class="text-danger">
                    Rp {{ number_format($keluarHariIni,0,',','.') }}
                </h5>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card shadow-sm border-start border-primary border-4">
            <div class="card-body">
                <small>Selisih Hari Ini</small>
                <h5 class="text-primary">
                    Rp {{ number_format($selisihHariIni,0,',','.') }}
                </h5>
            </div>
        </div>
    </div>

</div>


{{-- ===================== --}}
{{-- STATISTIK BULAN INI --}}
{{-- ===================== --}}
<div class="row mb-3">

    <div class="col-md-3">
        <div class="card shadow-sm border-0">
            <div class="card-body">
                <small>Transaksi Bulan Ini</small>
                <h4>{{ $transaksiBulanIni }}</h4>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card shadow-sm border-start border-success border-4">
            <div class="card-body">
                <small>Uang Masuk Bulan Ini</small>
                <h5 class="text-success">
                    Rp {{ number_format($masukBulanIni,0,',','.') }}
                </h5>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card shadow-sm border-start border-danger border-4">
            <div class="card-body">
                <small>Uang Keluar Bulan Ini</small>
                <h5 class="text-danger">
                    Rp {{ number_format($keluarBulanIni,0,',','.') }}
                </h5>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card shadow-sm border-start border-primary border-4">
            <div class="card-body">
                <small>Selisih Bulan Ini</small>
                <h5 class="text-primary">
                    Rp {{ number_format($selisihBulanIni,0,',','.') }}
                </h5>
            </div>
        </div>
    </div>

</div>


{{-- ===================== --}}
{{-- SALDO --}}
{{-- ===================== --}}
<div class="card mb-3 shadow">
    <div class="card-body">
        <h5>Saldo Saat Ini</h5>
        <h3 class="text-success">
            Rp {{ number_format($saldo,0,',','.') }}
        </h3>
    </div>
</div>

<a href="/bendahara/kas/create" class="btn btn-primary mb-3">
    Tambah Kas
</a>

<table class="table table-bordered">
    <tr>
        <th>Tanggal</th>
        <th>Keterangan</th>
        <th>Tipe</th>
        <th>Jumlah</th>
    </tr>

    @foreach($kas as $k)
    <tr>
        <td> {{ \Carbon\Carbon::parse($k->tanggal)->format('d M Y') }}</td>
        <td>{{ $k->keterangan }}</td>
        <td>
            @if($k->tipe == 'masuk')
                <span class="badge bg-success">Masuk</span>
            @else
                <span class="badge bg-danger">Keluar</span>
            @endif
        </td>
        <td>
            Rp {{ number_format($k->jumlah,0,',','.') }}
        </td>
    </tr>
    @endforeach
</table>
<div class="d-flex justify-content-between align-items-center mt-3">

    <div class="text-muted">
        Menampilkan
        {{ $kas->firstItem() }}
        -
        {{ $kas->lastItem() }}
        dari
        {{ $kas->total() }}
        transaksi
    </div>

    <div>
        {{ $kas->links() }}
    </div>

</div>
@endsection