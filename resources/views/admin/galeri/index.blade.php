@extends('layouts.app')

@section('content')

<h4 class="mb-4">📸 Galeri Kegiatan</h4>

<div class="card shadow-sm">
    <div class="card-body">

        {{-- FORM UPLOAD --}}
        <form action="/admin/galeri/store" 
              method="POST" 
              enctype="multipart/form-data">

            @csrf

            <input type="hidden" 
                   name="kegiatan_id" 
                   value="{{ $kegiatan->id }}">

            <div class="mb-3">
                <label class="form-label fw-bold">
                    Upload Foto Baru
                </label>

                <input type="file"
                       name="foto[]"
                       multiple
                       accept="image/*"
                       class="form-control">
            </div>

            <button class="btn btn-primary">
                Simpan Foto
            </button>

            <a href="/admin/kegiatan/selesai"
               class="btn btn-secondary">
                Kembali
            </a>

        </form>

    </div>
</div>


{{-- FOTO SEBELUMNYA --}}
<div class="card shadow-sm mt-4">
    <div class="card-header bg-info text-white">
        Foto Sebelumnya
    </div>

    <div class="card-body">

        <div class="row">

            @forelse($galeri as $g)
            <div class="col-md-3 mb-4">

                <div class="card border-0 shadow-sm">
                    <img src="{{ asset('storage/' . $g->foto) }}"
                         class="img-fluid rounded-top"
                         style="height:200px; object-fit:cover;">

                    <div class="card-body text-center">

                        {{-- tombol hapus --}}
                        <form action="/admin/galeri/delete/{{ $g->id }}"
                              method="POST"
                              onsubmit="return confirm('Yakin hapus foto ini?')">

                            @csrf

                            <button class="btn btn-danger btn-sm">
                                Hapus
                            </button>

                        </form>

                    </div>
                </div>

            </div>
            @empty

            <div class="col-12 text-center text-muted">
                Belum ada foto galeri
            </div>

            @endforelse

        </div>

    </div>
</div>

@endsection