@extends('layouts.app')

@section('content')
<h4 class="mb-4">📄 Data Kegiatan</h4>

{{-- RINGKASAN --}}
@php
    $totalMenunggu = $menunggu->count();
    $totalDijadwalkan = $dijadwalkan->count();
    $totalBerlangsung = $berlangsung->count();
@endphp

<div class="row mb-4">

    <div class="col-md-4">
        <div class="card border-0 shadow-sm bg-light">
            <div class="card-body">
                <h6 class="text-muted">Total Menunggu</h6>
                <h3 class="mb-0">{{ $totalMenunggu }}</h3>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card border-0 shadow-sm bg-warning bg-opacity-25">
            <div class="card-body">
                <h6 class="text-muted">Total Dijadwalkan</h6>
                <h3 class="mb-0">{{ $totalDijadwalkan }}</h3>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card border-0 shadow-sm bg-success bg-opacity-25">
            <div class="card-body">
                <h6 class="text-white">Total Berlangsung</h6>
                <h3 class="mb-0 text-white">{{ $totalBerlangsung }}</h3>
            </div>
        </div>
    </div>

</div>

{{-- MENUNGGU VALIDASI --}}
<div class="card mb-4 shadow-sm">
    <div class="card-header bg-warning text-dark">
        Menunggu Validasi
    </div>
    <div class="card-body">

        <table class="table table-bordered">
            <tr>
                <th>Judul</th>
                <th>Tanggal</th>
                <th>Status</th>
            </tr>

            @forelse($menunggu as $k)
            <tr>
                <td>{{ $k->judul }}</td>
                <td>{{ $k->tanggal }}</td>
                <td><span class="badge bg-warning">Menunggu</span></td>
            </tr>
            @empty
            <tr>
                <td colspan="3" class="text-center text-muted">
                    Tidak ada data
                </td>
            </tr>
            @endforelse
        </table>

    </div>
</div>

{{-- DIJADWALKAN --}}
<div class="card mb-4 shadow-sm">
    <div class="card-header bg-info text-white">
        Dijadwalkan
    </div>
    <div class="card-body">

        <table class="table table-bordered">
            <tr>
                <th>Judul</th>
                <th>Tanggal</th>
                <th>Status</th>
            </tr>

            @forelse($dijadwalkan as $k)
            <tr>
                <td>{{ $k->judul }}</td>
                <td>{{ $k->tanggal }}</td>
                <td><span class="badge bg-info">Dijadwalkan</span></td>
            </tr>
            @empty
            <tr>
                <td colspan="3" class="text-center text-muted">
                    Tidak ada data
                </td>
            </tr>
            @endforelse
        </table>

    </div>
</div>

{{-- BERLANGSUNG --}}
<div class="card shadow-sm">
    <div class="card-header bg-primary text-white">
        Berlangsung
    </div>
    <div class="card-body">

        <table class="table table-bordered">
            <tr>
                <th>Judul</th>
                <th>Tanggal</th>
                <th>Status</th>
            </tr>

            @forelse($berlangsung as $k)
            <tr>
                <td>{{ $k->judul }}</td>
                <td>{{ $k->tanggal }}</td>
                <td><span class="badge bg-primary">Berlangsung</span></td>
            </tr>
            @empty
            <tr>
                <td colspan="3" class="text-center text-muted">
                    Tidak ada data
                </td>
            </tr>
            @endforelse
        </table>

    </div>
</div>

@endsection