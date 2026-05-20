@extends('layouts.app')

@section('content')
@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show">
        {{ session('success') }}
        <button type="button"
                class="btn-close"
                data-bs-dismiss="alert">
        </button>
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show">
        {{ session('error') }}
        <button type="button"
                class="btn-close"
                data-bs-dismiss="alert">
        </button>
    </div>
@endif

<h4 class="mb-4">⏳ Proses Kegiatan</h4>

{{-- MENUNGGU VALIDASI --}}
<div class="card shadow-sm mb-4">
    <div class="card-header bg-warning">
        Menunggu Validasi
    </div>

    <div class="card-body">
        <table class="table table-bordered">
            <thead class="table-success">
            <tr>
                <th>Judul</th>
                <th>Tanggal</th>
                <th>Status</th>
            </tr>
            </thead>

            <tbody>
                
            @forelse($menunggu as $k)
            <tr>
                <td>{{ $k->judul }}</td>
                <td>{{ \Carbon\Carbon::parse($k->tanggal)->format('d M Y') }}</td>
                <td>
                    <span class="badge bg-warning">
                        Menunggu
                    </span>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="3" class="text-center">
                    Tidak ada kegiatan yang menunggu validasi.
                </td>
            </tr>
            @endforelse
</tbody>
        </table>
    </div>
</div>


{{-- DIJADWALKAN --}}
<div class="card shadow-sm mb-4">
    <div class="card-header bg-info text-white">
        Dijadwalkan
    </div>

    <div class="card-body">
        <table class="table table-bordered">
            <thead class="table-success">
            <tr>
                <th>Judul</th>
                <th>Tanggal</th>
                <th>Aksi</th>
            </tr>
            </thead>

            <tbody>
            @forelse($dijadwalkan as $k)
            <tr>
                <td>{{ $k->judul }}</td>
                <td>{{ \Carbon\Carbon::parse($k->tanggal)->format('d M Y') }}</td>
                <td>
                    <form action="/admin/kegiatan/mulai/{{ $k->id }}"
                          method="POST"
                          style="display:inline">
                        @csrf
                        <button class="btn btn-success btn-sm">
                            Mulai
                        </button>
                    </form>

                    <form action="/admin/kegiatan/batal/{{ $k->id }}"
                          method="POST"
                          style="display:inline">
                        @csrf
                        <button class="btn btn-danger btn-sm">
                            Batal
                        </button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="3" class="text-center">
                    Tidak ada kegiatan yang dijadwalkan.
                </td>
            </tr>
            @endforelse
            </tbody>
        </table>
    </div>
</div>


{{-- BERLANGSUNG --}}
<div class="card shadow-sm">
    <div class="card-header bg-primary text-white">
        Berlangsung
    </div>

    <div class="card-body">
        <table class="table table-bordered">
            <thead class="table-success">
            <tr>
                <th>Judul</th>
                <th>Tanggal</th>
                <th>Aksi</th>
            </tr>
            </thead>

            <tbody>
            @forelse($berlangsung as $k)
            <tr>
                <td>{{ $k->judul }}</td>
                <td>{{ \Carbon\Carbon::parse($k->tanggal)->format('d M Y') }}</td>
                <td>
                    <form action="/admin/kegiatan/selesai/{{ $k->id }}"
                          method="POST">
                        @csrf
                        <button class="btn btn-success btn-sm">
                            Selesai
                        </button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="3" class="text-center">
                    Tidak ada kegiatan yang berlangsung.
                </td>
            </tr>
            @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection