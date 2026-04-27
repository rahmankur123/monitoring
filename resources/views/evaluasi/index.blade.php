@extends('layouts.app')

@section('content')

<h4 class="mb-4">📝 Evaluasi Kegiatan</h4>

<div class="card shadow-sm">
    <div class="card-body">

        {{-- FORM INPUT --}}
        <form action="{{ url(auth()->user()->role.'/evaluasi/store') }}" method="POST">
            @csrf

            <input type="hidden"
                   name="kegiatan_id"
                   value="{{ $kegiatan->id }}">

            <div class="mb-3">
                <label class="form-label fw-bold">
                    Tambah Evaluasi
                </label>

                <textarea name="isi"
                          class="form-control"
                          rows="5"
                          placeholder="Tulis evaluasi kegiatan di sini..."
                          required></textarea>
            </div>

            <button class="btn btn-primary">
                Simpan Evaluasi
            </button>

            
<button type="button" class="btn btn-secondary" onclick="window.history.back()">Kembali</button>
        </form>

    </div>
</div>


{{-- DATA EVALUASI SEBELUMNYA --}}
<div class="card shadow-sm mt-4">
    <div class="card-header bg-warning">
        Evaluasi Sebelumnya
    </div>

    <div class="card-body">

        @forelse($evaluasi as $e)

        <div class="border rounded p-3 mb-3">

            <div class="d-flex justify-content-between align-items-center mb-2">
                <div>
                    <b>{{ $e->role_pengisi }}</b>
                </div>

                {{-- tombol hapus --}}
                <form action="/evaluasi/delete/{{ $e->id }}"
                      method="POST"
                      onsubmit="return confirm('Yakin hapus evaluasi ini?')">

                    @csrf
                    @method('DELETE')

                    <button class="btn btn-sm btn-danger">
                        Hapus
                    </button>
                </form>
            </div>

            <div>
                {{ $e->isi }}
            </div>

        </div>

        @empty

        <div class="text-muted text-center">
            Belum ada evaluasi
        </div>

        @endforelse

    </div>
</div>

@endsection