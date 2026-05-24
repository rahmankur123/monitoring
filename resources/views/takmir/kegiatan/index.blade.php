@extends('layouts.app')

@section('content')

<h4 class="mb-4">📋 Validasi Kegiatan</h4>

@if(session('success'))
<div class="alert alert-success alert-dismissible fade show">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
</div>
@endif

{{-- MENUNGGU VALIDASI --}}
<div class="card shadow-sm mb-4">
    <div class="card-header bg-warning">
        ⏳ Menunggu Validasi
    </div>

    <div class="card-body">
        <table class="table table-bordered">
            <tr>
                <th>Judul</th>
                <th>Tanggal</th>
                <th>Proposal</th>
                <th>Status</th>
                <th width="200">Aksi</th>
            </tr>

            @forelse($menunggu as $k)
            <tr>
                <td>{{ $k->judul }}</td>
                <td>{{ \Carbon\Carbon::parse($k->tanggal)->format('d M Y') }}</td>
                <td>
                    @if($k->proposal)
                        <a href="{{ asset('storage/'.$k->proposal) }}" target="_blank" class="btn btn-sm btn-info">
                            Lihat Proposal
                        </a>
                    @else
                        <span class="text-muted">Tidak ada proposal</span>
                    @endif
                </td>
                <td>
                    <span class="badge bg-warning">
                        Menunggu
                    </span>
                </td>
                <td>
                    <a href="/takmir/kegiatan/detail/{{ $k->id }}"
                       class="btn btn-info btn-sm">
                        Detail
                    </a>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4" class="text-center text-muted">
                    Tidak ada data
                </td>
            </tr>
            @endforelse
        </table>
    </div>
</div>


{{-- DITOLAK --}}
<div class="card shadow-sm">
    <div class="card-header bg-danger text-white">
        ❌ Ditolak
    </div>

    <div class="card-body">
        <table class="table table-bordered">
            <tr>
                <th>Judul</th>
                <th>Tanggal</th>
                <th>Proposal</th>
                <th>Catatan</th>
                <th>Status</th>
            </tr>

            @forelse($ditolak as $k)
            <tr>
                <td>{{ $k->judul }}</td>
                <td>{{ \Carbon\Carbon::parse($k->tanggal)->format('d M Y') }}</td>
                <td>
                    @if($k->proposal)
                        <a href="{{ asset('storage/'.$k->proposal) }}" target="_blank" class="btn btn-sm btn-info">
                            Lihat Proposal
                        </a>
                    @else
                        <span class="text-muted">Tidak ada proposal</span>
                    @endif
                </td>
                <td>{{ $k->catatan_takmir ?? '-' }}</td>
                <td>
                    <span class="badge bg-danger">
                        Ditolak
                    </span>
                    <a href="/takmir/kegiatan/detail/{{ $k->id }}"
                       class="btn btn-info btn-sm">
                        Detail
                    </a>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4" class="text-center text-muted">
                    Tidak ada data
                </td>
            </tr>
            @endforelse
        </table>
    </div>
</div>

@endsection