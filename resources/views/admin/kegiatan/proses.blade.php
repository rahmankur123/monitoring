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
            <tr>
                <th>Judul</th>
                <th>Tanggal</th>
                <th>Status</th>
            </tr>

            @foreach($menunggu as $k)
            <tr>
                <td>{{ $k->judul }}</td>
                <td>{{ $k->tanggal }}</td>
                <td>
                    <span class="badge bg-warning">
                        Menunggu
                    </span>
                </td>
            </tr>
            @endforeach
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
            <tr>
                <th>Judul</th>
                <th>Tanggal</th>
                <th>Aksi</th>
            </tr>

            @foreach($dijadwalkan as $k)
            <tr>
                <td>{{ $k->judul }}</td>
                <td>{{ $k->tanggal }}</td>
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
            @endforeach
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
            <tr>
                <th>Judul</th>
                <th>Tanggal</th>
                <th>Aksi</th>
            </tr>

            @foreach($berlangsung as $k)
            <tr>
                <td>{{ $k->judul }}</td>
                <td>{{ $k->tanggal }}</td>
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
            @endforeach
        </table>
    </div>
</div>

@endsection