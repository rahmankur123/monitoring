@extends('layouts.app')

@section('content')

<h4 class="mb-3">
    Data Kegiatan 
    @if($status)
        - {{ ucfirst(str_replace('_',' ',$status)) }}
    @endif
</h4>

<table class="table table-bordered table-striped">
    <thead class="table-dark">
        <tr>
            <th>Judul</th>
            <th>Tanggal</th>
            <th>Status</th>
            <th width="250">Aksi</th>
        </tr>
    </thead>

    <tbody>
        @forelse($kegiatan as $k)
        <tr>
            <td>{{ $k->judul }}</td>
            <td>{{ $k->tanggal }}</td>

            <td>
                <span class="badge 
                    @if($k->status == 'menunggu_validasi') bg-warning
                    @elseif($k->status == 'disetujui') bg-info
                    @elseif($k->status == 'selesai') bg-success
                    @endif
                ">
                    {{ $k->status }}
                </span>
            </td>

            <td>

                {{-- MENUNGGU VALIDASI --}}
                @if($k->status == 'menunggu_validasi')

                    <a href="/takmir/kegiatan/{{ $k->id }}" 
                       class="btn btn-info btn-sm">
                       Detail
                    </a>

                    <form action="/takmir/kegiatan/detail/{{ $k->id }}" method="GET" style="display:inline">
                        @csrf
                        <button class="btn btn-success btn-sm">Lihat</button>
                    </form>

                @endif


                {{-- DISETUJUI --}}
                @if($k->status == 'disetujui')

                    <a href="/takmir/kegiatan/{{ $k->id }}" 
                       class="btn btn-info btn-sm">
                       Lihat
                    </a>

                @endif


                {{-- SELESAI --}}
                @if($k->status == 'selesai')

                    <a href="/takmir/kegiatan/detail-selesai/{{ $k->id }}" 
                       class="btn btn-info btn-sm">
                       Detail
                    </a>

                    <a href="/takmir/evaluasi/{{ $k->id }}" 
                       class="btn btn-primary btn-sm">
                       Evaluasi
                    </a>

                @endif

            </td>
        </tr>
        @empty
        <tr>
            <td colspan="4" class="text-center text-muted">
                Tidak ada data
            </td>
        </tr>
        @endforelse
    </tbody>
</table>

@endsection