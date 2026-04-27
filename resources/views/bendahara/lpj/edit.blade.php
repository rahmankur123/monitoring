{{-- resources/views/bendahara/lpj/edit.blade.php --}}

@extends('layouts.app')

@section('content')

<h4 class="mb-4">Edit LPJ - {{ $kegiatan->judul }}</h4>

<div class="card shadow-sm">
    <div class="card-body">

        {{-- ALERT --}}
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        {{-- FILE LPJ SAAT INI --}}
        <div class="mb-4">
            <label class="form-label fw-bold">File LPJ Saat Ini</label>

            @if($kegiatan->lpj)
                <div class="border rounded p-3 bg-light">

                    <p class="mb-2">
                        File tersimpan:
                        <b>{{ basename($kegiatan->lpj->file) }}</b>
                    </p>

                    <a href="{{ asset('storage/' . $kegiatan->lpj->file) }}"
                       target="_blank"
                       class="btn btn-dark btn-sm">
                        Lihat / Download File
                    </a>

                    <form action="/bendahara/lpj/delete/{{ $kegiatan->lpj->id }}"
                          method="POST"
                          class="d-inline">
                        @csrf
                        <button class="btn btn-danger btn-sm"
                                onclick="return confirm('Hapus file LPJ ini?')">
                            Hapus LPJ
                        </button>
                    </form>

                </div>
            @else
                <div class="text-muted">
                    Belum ada file LPJ
                </div>
            @endif
        </div>


        {{-- FORM UPDATE LPJ --}}
        <form action="/bendahara/lpj/update/{{ $kegiatan->id }}"
              method="POST"
              enctype="multipart/form-data">

            @csrf

            <div class="mb-3">
                <label class="form-label fw-bold">
                    Upload File LPJ Baru
                </label>

                <input type="file"
                       name="file"
                       class="form-control"
                       accept=".pdf,.doc,.docx,.xls,.xlsx"
                       required>

                <small class="text-muted">
                    Format: PDF, DOC, DOCX, XLS, XLSX
                </small>
            </div>

            <button class="btn btn-primary">
                Update LPJ
            </button>

            <a href="/bendahara/anggaran/selesai"
               class="btn btn-secondary">
                Kembali
            </a>

        </form>

    </div>
</div>

@endsection