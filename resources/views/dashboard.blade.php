@extends('layouts.app')

@section('content')

<h3 class="mb-4">Dashboard</h3>

<div class="row g-3 mb-4">

    <div class="col-md-3">
        <div class="card shadow-sm border-0 bg-primary text-white">
            <div class="card-body">
                <h6>Total Kegiatan</h6>
                <h3>{{ $totalKegiatan ?? 0 }}</h3>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card shadow-sm border-0 bg-warning text-dark">
            <div class="card-body">
                <h6>Menunggu Validasi</h6>
                <h3>{{ $menunggu ?? 0 }}</h3>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card shadow-sm border-0 bg-success text-white">
            <div class="card-body">
                <h6>Kegiatan Selesai</h6>
                <h3>{{ $selesai ?? 0 }}</h3>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card shadow-sm border-0 bg-danger text-white">
            <div class="card-body">
                <h6>Ditolak / Batal</h6>
                <h3>{{ $ditolak ?? 0 }}</h3>
            </div>
        </div>
    </div>

</div>

<div class="card shadow-sm">
    <div class="card-header bg-dark text-white">
        Kegiatan Terbaru
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Judul</th>
                    <th>Tanggal</th>
                    <th>Status</th>
                </tr>
            </thead>

            <tbody>
                @forelse($latestKegiatan ?? [] as $k)
                <tr>
                    <td>{{ $k->judul }}</td>
                    <td>{{ $k->tanggal }}</td>
                    <td>{{ $k->status }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="3" class="text-center text-muted">
                        Belum ada data
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection