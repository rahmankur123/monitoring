@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <h3 class="mb-4 fw-bold text-success">
        📊 Laporan Kegiatan
    </h3>

    {{-- FILTER --}}
    <div class="card shadow-sm border-0 mb-4">
        <div class="card-body">

            <form method="GET" class="row g-3 align-items-end">

                <div class="col-md-3">
                    <label class="form-label fw-semibold">
                        Filter Bulan
                    </label>
                    <input
                        type="month"
                        name="bulan"
                        class="form-control"
                        value="{{ $bulan }}"
                    >
                </div>

                <div class="col-md-3">
                    <label class="form-label fw-semibold">
                        Status Kegiatan
                    </label>
                    <select name="status" class="form-control">
                        <option value="selesai" {{ $status == 'selesai' ? 'selected' : '' }}>
                            Selesai
                        </option>
                        <option value="berlangsung" {{ $status == 'berlangsung' ? 'selected' : '' }}>
                            Berlangsung
                        </option>
                        <option value="disetujui" {{ $status == 'disetujui' ? 'selected' : '' }}>
                            Dijadwalkan
                        </option>
                        <option value="menunggu_validasi" {{ $status == 'menunggu_validasi' ? 'selected' : '' }}>
                            Menunggu Validasi
                        </option>
                        <option value="all" {{ $status == 'all' ? 'selected' : '' }}>
                            Semua
                        </option>
                    </select>
                </div>

                <div class="col-md-6">
                    <button class="btn btn-success px-4">
                        Filter
                    </button>

                    <a href="{{ url()->current() }}"
                       class="btn btn-outline-secondary px-4">
                        Reset
                    </a>

                    <a href="/bendahara/laporan/kegiatan/pdf?bulan={{ $bulan }}"
                       class="btn btn-danger px-4">
                        Export PDF
                    </a>
                </div>

            </form>

        </div>
    </div>


    {{-- SUMMARY --}}
    @php
        $totalAnggaranAll = 0;
        $totalRealisasiAll = 0;
    @endphp

    @foreach($kegiatan as $k)
        @php
            $anggaranTemp = $k->anggaran->sum(fn($a) => $a->qty * $a->harga);
            $realisasiTemp = $k->realisasi->sum(fn($r) => $r->qty * $r->harga);

            $totalAnggaranAll += $anggaranTemp;
            $totalRealisasiAll += $realisasiTemp;
        @endphp
    @endforeach

    <div class="row mb-4">

        <div class="col-md-4">
            <div class="card shadow-sm border-0 bg-success text-white">
                <div class="card-body">
                    <small>Total Anggaran</small>
                    <h4 class="mb-0 fw-bold">
                        Rp {{ number_format($totalAnggaranAll) }}
                    </h4>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow-sm border-0 bg-danger text-white">
                <div class="card-body">
                    <small>Total Realisasi</small>
                    <h4 class="mb-0 fw-bold">
                        Rp {{ number_format($totalRealisasiAll) }}
                    </h4>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow-sm border-0 bg-dark text-white">
                <div class="card-body">
                    <small>Selisih Total</small>
                    <h4 class="mb-0 fw-bold">
                        Rp {{ number_format($totalAnggaranAll - $totalRealisasiAll) }}
                    </h4>
                </div>
            </div>
        </div>

    </div>


    {{-- TABLE --}}
    <div class="card shadow-sm border-0">
        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-bordered table-hover align-middle">

                    <thead class="table-success text-center">
                        <tr>
                            <th width="22%">Judul</th>
                            <th width="12%">Tanggal</th>
                            <th width="14%">Status</th>
                            <th width="16%">Anggaran</th>
                            <th width="16%">Realisasi</th>
                            <th width="20%">Selisih</th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse($kegiatan as $k)

                        @php
                            $anggaran = $k->anggaran->sum(fn($a) => $a->qty * $a->harga);
                            $realisasi = $k->realisasi->sum(fn($r) => $r->qty * $r->harga);
                            $selisih = $anggaran - $realisasi;
                        @endphp

                        <tr>
                            <td class="fw-semibold">
                                {{ $k->judul }}
                            </td>

                            <td class="text-center">
                                {{ \Carbon\Carbon::parse($k->tanggal)->format('d-m-Y') }}
                            </td>

                            <td class="text-center">
                                <span class="badge
                                    @if($k->status == 'selesai') bg-success
                                    @elseif($k->status == 'berlangsung') bg-primary
                                    @elseif($k->status == 'disetujui') bg-info
                                    @elseif($k->status == 'menunggu_validasi') bg-warning text-dark
                                    @else bg-secondary
                                    @endif
                                ">
                                    {{ ucfirst(str_replace('_', ' ', $k->status)) }}
                                </span>
                            </td>

                            <td class="text-end text-primary fw-bold">
                                Rp {{ number_format($anggaran) }}
                            </td>

                            <td class="text-end text-danger fw-bold">
                                Rp {{ number_format($realisasi) }}
                            </td>

                            <td class="text-end fw-bold">
                                @if($selisih > 0)
                                    <span class="text-success">
                                        + Rp {{ number_format($selisih) }}
                                    </span>
                                @elseif($selisih < 0)
                                    <span class="text-danger">
                                        - Rp {{ number_format(abs($selisih)) }}
                                    </span>
                                @else
                                    <span class="text-muted">
                                        Rp 0
                                    </span>
                                @endif
                            </td>
                        </tr>

                        @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted py-4">
                                Tidak ada data kegiatan
                            </td>
                        </tr>
                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>
    </div>


    {{-- PAGINATION --}}
    <div class="d-flex justify-content-between align-items-center mt-4 flex-wrap">

        <div class="text-muted">
            Menampilkan
            {{ $kegiatan->firstItem() ?? 0 }}
            -
            {{ $kegiatan->lastItem() ?? 0 }}
            dari
            {{ $kegiatan->total() }}
            data
        </div>

        <div>
            {{ $kegiatan->appends(request()->query())->links() }}
        </div>

    </div>

</div>

@endsection