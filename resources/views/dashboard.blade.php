@extends('layouts.app')

@section('content')

<div class="dashboard-header mb-4">
    <h2 class="fw-bold text-dark mb-2">
        📊 Dashboard Kegiatan Masjid
    </h2>
    <p class="text-muted mb-0">
        Transparansi kegiatan, pengelolaan anggaran, LPJ, realisasi dana, serta dokumentasi masjid secara profesional dan terpercaya.
    </p>
</div>

<div class="welcome-card mb-4">
    <div class="d-flex align-items-center">
        <div class="welcome-icon me-3">
            👋
        </div>
        <div>
            <h5 class="mb-1">
                Selamat datang, <strong>{{ auth()->user()->name }}</strong>
            </h5>
            <small class="text-muted">
                Berikut adalah ringkasan kegiatan yang sedang berlangsung hari ini.
            </small>
        </div>
    </div>
</div>

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
    <div class="card-header bg-success text-white">
        Kegiatan Terbaru
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped">
            <thead class="table-success text-center">
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