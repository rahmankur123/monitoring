@extends('layouts.app')

@section('content')

<h4 class="mb-4">📄 Data Anggaran - Draft & Ditolak</h4>

{{-- RINGKASAN --}}
@php
    $totalDraft = $draft->count();
    $totalDitolak = $ditolak->count();
    $totalSudahAnggaran =
        $draft->where('anggaran_count', '>', 0)->count()
        + $ditolak->where('anggaran_count', '>', 0)->count();
@endphp

<div class="row mb-4">

    <div class="col-md-4">
        <div class="card border-0 shadow-sm bg-light">
            <div class="card-body">
                <h6 class="text-muted">Total Draft</h6>
                <h3 class="mb-0">{{ $totalDraft }}</h3>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card border-0 shadow-sm bg-warning bg-opacity-25">
            <div class="card-body">
                <h6 class="text-muted">Total Ditolak</h6>
                <h3 class="mb-0">{{ $totalDitolak }}</h3>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card border-0 shadow-sm bg-success bg-opacity-25">
            <div class="card-body">
                <h6 class="text-white">Sudah Input Anggaran</h6>
                <h3 class="mb-0 text-white">{{ $totalSudahAnggaran }}</h3>
            </div>
        </div>
    </div>

</div>

{{-- ===================== --}}
{{-- TABEL DRAFT --}}
{{-- ===================== --}}

<div class="card mb-4 shadow-sm">
    <div class="card-header bg-warning text-dark">
        Draft
    </div>
    <div class="card-body">

        <table class="table table-bordered table-hover align-middle">
            <thead class="table-secondary text-center">
                <tr>
                    <th>Judul Kegiatan</th>
                    <th>Tanggal</th>
                    <th>Status Anggaran</th>
                    <th width="220">Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse($draft as $k)
                <tr>
                    <td>{{ $k->judul }}</td>
                    <td>{{ $k->tanggal }}</td>

                    <td class="text-center">
                        @if($k->anggaran_count > 0)
                            <span class="badge bg-success">
                                Sudah Ada
                            </span>
                        @else
                            <span class="badge bg-danger">
                                Belum Ada
                            </span>
                        @endif
                    </td>

                    <td>
                        <div class="d-flex gap-1 flex-wrap">

                            @if($k->anggaran_count > 0)
                                <a href="/bendahara/anggaran/{{ $k->id }}/edit"
                                   class="btn btn-warning btn-sm">
                                    Lihat Anggaran
                                </a>
                            @else
                                <a href="/bendahara/anggaran/{{ $k->id }}/create"
                                   class="btn btn-primary btn-sm">
                                    Input Anggaran
                                </a>
                            @endif

                        </div>
                    </td>
                </tr>

                @empty
                <tr>
                    <td colspan="4" class="text-center text-muted">
                        Tidak ada kegiatan draft
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>

    </div>
</div>

{{-- ===================== --}}
{{-- TABEL DITOLAK --}}
{{-- ===================== --}}

{{-- MENUNGGU VALIDASI --}}
<div class="card mb-4 shadow-sm">
    <div class="card-header bg-warning text-dark">
        Menunggu Validasi
    </div>
    <div class="card-body">

        <table class="table table-bordered table-hover align-middle">
            <thead class="table-secondary text-center">
            <tr>
                <th>Judul</th>
                <th>Tanggal</th>
                <th>Status</th>
            </tr>
            </thead>

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


{{-- ===================== --}}
{{-- TABEL DITOLAK --}}
{{-- ===================== --}}

<div class="card mb-4 shadow-sm">
    <div class="card-header bg-warning text-dark">
        Ditolak
    </div>
    <div class="card-body">

    <div class="card-body">

        <table class="table table-bordered table-hover align-middle">
            <thead class="table-danger text-center">
                <tr>
                    <th>Judul Kegiatan</th>
                    <th>Tanggal</th>
                    <th>Status Anggaran</th>
                    <th>Catatan Takmir</th>
                    <th width="220">Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse($ditolak as $k)
                <tr>
                    <td>{{ $k->judul }}</td>
                    <td>{{ $k->tanggal }}</td>

                    <td class="text-center">
                        @if($k->anggaran_count > 0)
                            <span class="badge bg-success">
                                Sudah Ada
                            </span>
                        @else
                            <span class="badge bg-danger">
                                Belum Ada
                            </span>
                        @endif
                    </td>

                    <td>
                        <span class="text-danger fw-semibold">
                            {{ $k->catatan_takmir ?? '-' }}
                        </span>
                    </td>

                    <td>
                        <div class="d-flex gap-1 flex-wrap">

                            @if($k->anggaran_count > 0)
                                <a href="/bendahara/anggaran/{{ $k->id }}/edit"
                                   class="btn btn-warning btn-sm">
                                    Lihat Anggaran
                                </a>
                            @else
                                <a href="/bendahara/anggaran/{{ $k->id }}/create"
                                   class="btn btn-primary btn-sm">
                                    Input Anggaran
                                </a>
                            @endif

                        </div>
                    </td>
                </tr>

                @empty
                <tr>
                    <td colspan="5" class="text-center text-muted">
                        Tidak ada kegiatan ditolak
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>

    </div>
</div>

@endsection