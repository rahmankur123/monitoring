@extends('layouts.app')

@section('content')

<h4 class="mb-4">⏳ Proses Kegiatan</h4>

{{-- DIJADWALKAN --}}
<div class="card shadow-sm mb-4">
    <div class="card-header bg-info text-white">
        📅 Dijadwalkan
    </div>

    <div class="card-body">
        <table class="table table-bordered">
            <tr>
                <th>Judul</th>
                <th>Tanggal</th>
                <th>Status</th>
                <th width="200">Aksi</th>
            </tr>

            @forelse($dijadwalkan as $k)
            <tr>
                <td>{{ $k->judul }}</td>
                <td>{{ $k->tanggal }}</td>
                <td>
                    <span class="badge bg-info">
                        Disetujui
                    </span>
                </td>
                <td>
                    <a href="/takmir/kegiatan/detail/{{ $k->id }}"
                       class="btn btn-info btn-sm">
                        Lihat
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


{{-- BERLANGSUNG --}}
<div class="card shadow-sm">
    <div class="card-header bg-primary text-white">
        ▶️ Berlangsung
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
                <td>
                    <span class="badge bg-primary">
                        Berlangsung
                    </span>
                </td>
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