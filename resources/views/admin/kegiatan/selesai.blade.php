@extends('layouts.app')

@section('content')

<h4 class="mb-4">✅ Kegiatan Selesai</h4>

<div class="card shadow-sm">
    <div class="card-body">

        <table class="table table-bordered table-hover align-middle">
            <thead class="table-success">
                <tr>
                    <th>Judul</th>
                    <th>Tanggal</th>
                    <th width="280">Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse($kegiatan as $k)
                <tr>
                    <td>{{ $k->judul }}</td>
                    <td>{{ $k->tanggal }}</td>

                    <td>
                        <a href="/admin/galeri/{{ $k->id }}"
                           class="btn btn-info btn-sm">
                            Galeri
                        </a>

                        <a href="/admin/evaluasi/{{ $k->id }}"
                           class="btn btn-primary btn-sm">
                            Evaluasi
                        </a>

                        <a href="/admin/kegiatan/detail-selesai/{{ $k->id }}"
                           class="btn btn-secondary btn-sm">
                            Detail
                        </a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="3" class="text-center text-muted">
                        Belum ada kegiatan selesai
                    </td>
                </tr>
                @endforelse
            </tbody>

        </table>

    </div>
</div>

@endsection