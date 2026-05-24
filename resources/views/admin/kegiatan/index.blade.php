@extends('layouts.app')

@section('content')

<h4 class="mb-4">📄 Draft & Ditolak</h4>

<a href="/admin/kegiatan/create" class="btn btn-primary mb-3">
    + Tambah Kegiatan
</a>

{{-- DRAFT --}}
<div class="card shadow-sm mb-4">
    <div class="card-header bg-secondary text-white">
        Draft
    </div>

    <div class="card-body">
        <table class="table table-bordered table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th class="col-md-4">Judul</th>
                    <th class="col-md-2">Tanggal</th>
                    <th>Proposal</th>
                    <th class="col-md-2">Status Anggaran</th>
                    <th class="col-md-4" width="250">Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse($draft as $k)
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
                        @if($k->anggaran_count > 0)
                            <span class="badge bg-success">Sudah Ada</span>
                        @else
                            <span class="badge bg-danger">Belum Ada</span>
                        @endif
                    </td>

                    <td>
                        <a href="/admin/kegiatan/edit/{{ $k->id }}"
                           class="btn btn-warning btn-sm">
                            Edit
                        </a>

                        @if($k->anggaran_count > 0)
                            <a href="/admin/kegiatan/{{ $k->id }}/anggaran"
                               class="btn btn-info btn-sm">
                                Lihat Anggaran
                            </a>

                            <form action="/admin/kegiatan/submit/{{ $k->id }}"
                                  method="POST"
                                  style="display:inline">
                                @csrf
                                <button class="btn btn-primary btn-sm">
                                    Ajukan
                                </button>
                            </form>
                        @else
                            <button class="btn btn-secondary btn-sm" disabled>
                                Belum Ada Anggaran
                            </button>
                        @endif

                        <form action="/admin/kegiatan/{{ $k->id }}"
                              method="POST"
                              style="display:inline"
                              onsubmit="return confirm('Yakin ingin menghapus kegiatan ini?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-center text-muted">
                        Tidak ada data draft
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>


{{-- DITOLAK --}}
<div class="card shadow-sm">
    <div class="card-header bg-danger text-white">
        Ditolak
    </div>

    <div class="card-body">
        <table class="table table-bordered table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th>Judul</th>
                    <th>Tanggal</th>
                    <th>Proposal</th>
                    <th>Catatan Takmir</th>
                    <th>Status Anggaran</th>
                    <th width="250">Aksi</th>
                </tr>
            </thead>

            <tbody>
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

                    <td>
                        <span class="text-danger">
                            {{ $k->catatan_takmir ?? '-' }}
                        </span>
                    </td>

                    <td>
                        @if($k->anggaran_count > 0)
                            <span class="badge bg-success">Sudah Ada</span>
                        @else
                            <span class="badge bg-danger">Belum Ada</span>
                        @endif
                    </td>

                    <td>
                        <a href="/admin/kegiatan/edit/{{ $k->id }}"
                           class="btn btn-warning btn-sm">
                            Edit
                        </a>

                        @if($k->anggaran_count > 0)
                            <a href="/admin/kegiatan/{{ $k->id }}/anggaran"
                               class="btn btn-info btn-sm">
                                Lihat Anggaran
                            </a>
                        @endif
                        <form action="/admin/kegiatan/submit/{{ $k->id }}"
                                  method="POST"
                                  style="display:inline">
                                @csrf
                                <button class="btn btn-primary btn-sm">
                                    Ajukan
                                </button>
                            </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center text-muted">
                        Tidak ada data ditolak
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection