@extends('layouts.app')

@section('content')
<h4 class="mb-4">📄 Data Anggaran - Draft & Ditolak</h4>

{{-- RINGKASAN --}}
@php
    $totalSelesai = $selesai->count();
    $totalDibatalkan = $dibatalkan->count();
@endphp

<div class="row mb-4">

    <div class="col-md-4">
        <div class="card border-0 shadow-sm bg-light">
            <div class="card-body">
                <h6 class="text-muted">Total Selesai</h6>
                <h3 class="mb-0">{{ $totalSelesai }}</h3>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card border-0 shadow-sm bg-warning bg-opacity-25">
            <div class="card-body">
                <h6 class="text-muted">Total Dibatalkan</h6>
                <h3 class="mb-0">{{ $totalDibatalkan }}</h3>
            </div>
        </div>
    </div>

</div>

<div class="card mb-4 shadow-sm">
    <div class="card-header bg-warning text-dark">
        Selesai
    </div>
    <div class="card-body">

        <table class="table table-bordered table-hover align-middle">
            <thead class="table-danger text-center">
                <tr>
                    <th>Judul</th>
                    <th>Tanggal</th>
                    <th>Anggaran</th>
                    <th>Realisasi</th>
                    <th>Selisih</th>
                    <th width="320">Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse($selesai as $k)

                @php
                    $totalAnggaran = $k->anggaran->sum('total');

                    $totalRealisasi = $k->realisasi->sum(function($r){
                        return $r->qty * $r->harga;
                    });

                    $selisih = $totalAnggaran - $totalRealisasi;

                    // cek apakah sudah ada realisasi
                    $sudahRealisasi = $k->realisasi->count() > 0;

                    // cek apakah sudah ada LPJ
                    $sudahLpj = !empty($k->lpj);
                @endphp

                <tr>
                    <td>{{ $k->judul }}</td>

                    <td>
                        {{ \Carbon\Carbon::parse($k->tanggal)->format('d-m-Y') }}
                    </td>

                    <td>
                        <span class="text-primary fw-bold">
                            Rp {{ number_format($totalAnggaran) }}
                        </span>
                    </td>

                    <td>
                        <span class="text-danger fw-bold">
                            Rp {{ number_format($totalRealisasi) }}
                        </span>
                    </td>

                    <td>
                        @if($selisih >= 0)
                            <span class="text-success fw-bold">
                                + Rp {{ number_format($selisih) }}
                            </span>
                        @else
                            <span class="text-danger fw-bold">
                                - Rp {{ number_format(abs($selisih)) }}
                            </span>
                        @endif
                    </td>

                    <td>
                        <div class="d-flex gap-2 flex-wrap">

                            {{-- REALISASI --}}
                            @if($sudahRealisasi)
                                <a href="/bendahara/realisasi/{{ $k->id }}/edit"
                                class="btn btn-warning btn-sm">
                                    Edit Realisasi
                                </a>
                            @else
                                <a href="/bendahara/realisasi/{{ $k->id }}"
                                class="btn btn-warning btn-sm">
                                    Input Realisasi
                                </a>
                            @endif


                            {{-- LPJ --}}
                            @if($sudahLpj)
                                <a href="/bendahara/lpj/{{ $k->id }}/edit"
                                class="btn btn-secondary btn-sm">
                                    Edit LPJ
                                </a>
                            @else
                                <a href="/bendahara/lpj/{{ $k->id }}"
                                class="btn btn-secondary btn-sm">
                                    Upload LPJ
                                </a>
                            @endif

                            {{-- DETAIL --}}
                            <a href="/bendahara/kegiatan/{{ $k->id }}/detail-selesai"
                               class="btn btn-success btn-sm">
                                Detail
                            </a>

                        </div>
                    </td>

                </tr>

                @empty
                <tr>
                    <td colspan="6" class="text-center text-muted">
                        Belum ada kegiatan selesai
                    </td>
                </tr>
                @endforelse
            </tbody>

        </table>

    </div>
</div>

{{-- ===================== --}}
{{-- Dibatalkan --}}
{{-- ===================== --}}

<div class="card mb-4 shadow-sm">
    <div class="card-header bg-warning text-dark">
        Dibatalkan
    </div>
    <div class="card-body">

        <table class="table table-bordered table-hover align-middle">
            <thead class="table-danger text-center">
                <tr>
                    <th>Judul Kegiatan</th>
                    <th>Tanggal</th>
                </tr>
            </thead>

            <tbody>
                @forelse($dibatalkan as $k)
                <tr>
                    <td>{{ $k->judul }}</td>
                    <td>{{ $k->tanggal }}</td>
                </tr>

                @empty
                <tr>
                    <td colspan="5" class="text-center text-muted">
                        Tidak ada kegiatan dibatalkan
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>

    </div>
</div>

@endsection