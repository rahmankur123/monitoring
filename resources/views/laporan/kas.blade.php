@extends('layouts.app')

@section('content')

<div class="container-fluid">

<h4 class="mb-4 fw-bold text-success">📊 Laporan Kas</h4>

{{-- FILTER --}}
<form method="GET" class="row g-2 mb-3 align-items-end">
    <div class="col-md-3">
        <label class="small text-muted">Bulan</label>
        <input type="month" name="bulan" class="form-control" value="{{ $bulan }}">
    </div>

    <div class="col-md-3">
        <button class="btn btn-success btn-sm">Filter</button>
        <a href="{{ url()->current() }}" class="btn btn-outline-secondary btn-sm">Reset</a>
    </div>
</form>

{{-- EXPORT --}}
<a href="/bendahara/laporan/kas/pdf?bulan={{ $bulan }}" 
   class="btn btn-danger btn-sm mb-3">
   ⬇ Export PDF
</a>

{{-- RINGKASAN --}}
<div class="row mb-4">
    <div class="col-md-4">
        <div class="card shadow-sm border-0">
            <div class="card-body bg-success text-white rounded">
                <small>Total Masuk</small>
                <h5 class="mb-0">Rp {{ number_format($totalMasuk,0,',','.') }}</h5>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card shadow-sm border-0">
            <div class="card-body bg-danger text-white rounded">
                <small>Total Keluar</small>
                <h5 class="mb-0">Rp {{ number_format($totalKeluar,0,',','.') }}</h5>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card shadow-sm border-0">
            <div class="card-body bg-dark text-white rounded">
                <small>Saldo Akhir</small>
                <h5 class="mb-0">
                    Rp {{ number_format($totalMasuk - $totalKeluar,0,',','.') }}
                </h5>
            </div>
        </div>
    </div>
</div>

{{-- TABLE --}}
<div class="card shadow-sm">
<div class="card-body p-0">

<table class="table table-hover table-bordered mb-0">
    <thead style="background:#2e7d32; color:white;">
        <tr class="text-center">
            <th width="120">Tanggal</th>
            <th>Keterangan</th>
            <th width="150">Masuk</th>
            <th width="150">Keluar</th>
            <th width="150">Saldo</th>
        </tr>
    </thead>

    <tbody>
        @php $saldo = 0; @endphp

        @forelse($data as $d)

        @php
            if ($d->tipe == 'masuk') {
                $saldo += $d->jumlah;
            } else {
                $saldo -= $d->jumlah;
            }
        @endphp

        <tr>
            <td class="text-center">
                {{ \Carbon\Carbon::parse($d->tanggal)->format('d-m-Y') }}
            </td>

            <td>{{ $d->keterangan }}</td>

            <td class="text-end text-success">
                @if($d->tipe == 'masuk')
                    +Rp {{ number_format($d->jumlah,0,',','.') }}
                @endif
            </td>

            <td class="text-end text-danger">
                @if($d->tipe == 'keluar')
                    -Rp {{ number_format($d->jumlah,0,',','.') }}
                @endif
            </td>

            <td class="text-end fw-bold">
                Rp {{ number_format($saldo,0,',','.') }}
            </td>
        </tr>

        @empty
        <tr>
            <td colspan="5" class="text-center text-muted py-3">
                Tidak ada data
            </td>
        </tr>
        @endforelse
    </tbody>
</table>

</div>
</div>

{{-- PAGINATION (FIX BIAR GA GEDE) --}}
<div class="d-flex justify-content-between align-items-center mt-3">

    <small class="text-muted">
        Menampilkan {{ $data->firstItem() ?? 0 }} - {{ $data->lastItem() ?? 0 }} 
        dari {{ $data->total() }} data
    </small>

    <div>
        {{ $data->appends(request()->query())->onEachSide(1)->links('pagination::bootstrap-4') }}
    </div>

</div>

</div>

@endsection