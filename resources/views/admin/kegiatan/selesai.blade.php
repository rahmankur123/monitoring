@extends('layouts.app')

@section('content')

<h4 class="mb-4">✅ Kegiatan Selesai & Dibatalkan</h4>

{{-- KEGIATAN SELESAI --}}
<div class="card shadow-sm mb-4">
    <div class="card-header bg-success text-white">
        Kegiatan Selesai
    </div>

    <div class="card-body">
        <table class="table table-bordered table-hover align-middle">
            <thead class="table-success">
                <tr>
                    <th>Judul</th>
                    <th>Tanggal</th>
                    <th>Anggaran</th>
                    <th>Realisasi</th>
                    <th>Selisih</th>
                    <th width="280">Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse($selesai as $k)

                @php
                    $totalAnggaran = $k->anggaran->sum(function($a){
                        return $a->qty * $a->harga;
                    });

                    $totalRealisasi = $k->realisasi->sum(function($r){
                        return $r->qty * $r->harga;
                    });

                    $selisih = $totalAnggaran - $totalRealisasi;
                @endphp

                <tr>
                    <td>{{ $k->judul }}</td>
                    <td>{{ $k->tanggal }}</td>

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
                        <div class="d-flex gap-1 flex-wrap">

                            <a href="/admin/galeri/{{ $k->id }}"
                               class="btn btn-info btn-sm">
                                Galeri
                            </a>

                            <a href="/admin/evaluasi/{{ $k->id }}"
                               class="btn btn-primary btn-sm">
                                Evaluasi
                            </a>

                            <a href="/admin/kegiatan/{{ $k->id }}/detail-selesai"
                               class="btn btn-secondary btn-sm">
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


{{-- KEGIATAN DIBATALKAN --}}
<div class="card shadow-sm">
    <div class="card-header bg-danger text-white">
        Kegiatan Dibatalkan
    </div>

    <div class="card-body">
        <table class="table table-bordered table-hover align-middle">
            <thead class="table-danger">
                <tr>
                    <th>Judul</th>
                    <th>Tanggal</th>
                    <th>Status</th>
                </tr>
            </thead>

            <tbody>
                @forelse($dibatalkan as $k)
                <tr>
                    <td>{{ $k->judul }}</td>
                    <td>{{ $k->tanggal }}</td>
                    <td>
                        <span class="badge bg-danger">
                            Dibatalkan
                        </span>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="3" class="text-center text-muted">
                        Tidak ada kegiatan dibatalkan
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection