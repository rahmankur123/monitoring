@extends('layouts.app')

@section('content')

<h4 class="mb-4">✅ Kegiatan Selesai</h4>

{{-- SELESAI --}}
<div class="card shadow-sm mb-4">
    <div class="card-header bg-success text-white">
        ✅ Selesai
    </div>

    <div class="card-body">
        <table class="table table-bordered">
            <tr>
                <th>Judul</th>
                <th>Tanggal</th>
                <th>Status</th>
                <th width="250">Aksi</th>
            </tr>

            @forelse($selesai as $k)
            <tr>
                <td>{{ $k->judul }}</td>
                <td>{{ $k->tanggal }}</td>
                <td>
                    <span class="badge bg-success">
                        Selesai
                    </span>
                </td>
                <td>
                    <a href="/takmir/kegiatan/{{ $k->id }}/detail-selesai"
                       class="btn btn-info btn-sm">
                        Detail
                    </a>

                    <a href="/takmir/evaluasi/{{ $k->id }}"
                       class="btn btn-primary btn-sm">
                        Evaluasi
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


{{-- DIBATALKAN --}}
<div class="card shadow-sm">
    <div class="card-header bg-danger text-white">
        ❌ Dibatalkan
    </div>

    <div class="card-body">
        <table class="table table-bordered">
            <tr>
                <th>Judul</th>
                <th>Tanggal</th>
                <th>Status</th>
            </tr>

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
                    Tidak ada data
                </td>
            </tr>
            @endforelse
        </table>
    </div>
</div>

@endsection