@extends('layouts.app')

@section('content')

<h4 class="mb-4">Detail Kegiatan</h4>

{{-- DETAIL KEGIATAN --}}
<div class="card shadow-sm mb-4">
    <div class="card-header bg-primary text-white">
        Informasi Kegiatan
    </div>

    <div class="card-body">
        <p><strong>Judul:</strong> {{ $kegiatan->judul }}</p>
        <p><strong>Tanggal:</strong> {{ $kegiatan->tanggal }}</p>
        <p><strong>Deskripsi:</strong> {{ $kegiatan->deskripsi }}</p>
        <p>
            <strong>Status:</strong>
            <span class="badge bg-warning">
                Menunggu Validasi
            </span>
        </p>
    </div>
</div>


{{-- ANGGARAN --}}
<div class="card shadow-sm mb-4">
    <div class="card-header bg-success text-white">
        Detail Anggaran
    </div>

    <div class="card-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Item</th>
                    <th>Qty</th>
                    <th>Harga</th>
                    <th>Total</th>
                </tr>
            </thead>

            <tbody>
                @php $grandTotal = 0; @endphp

                @foreach($kegiatan->anggaran as $a)
                    @php $grandTotal += $a->total; @endphp
                    <tr>
                        <td>{{ $a->nama_item }}</td>
                        <td>{{ $a->qty }}</td>
                        <td>Rp {{ number_format($a->harga) }}</td>
                        <td>Rp {{ number_format($a->total) }}</td>
                    </tr>
                @endforeach

                <tr>
                    <th colspan="3" class="text-end">
                        Total Anggaran
                    </th>
                    <th>
                        Rp {{ number_format($grandTotal) }}
                    </th>
                </tr>
            </tbody>
        </table>
    </div>
</div>


{{-- ACTION --}}
<div class="card shadow-sm">
    <div class="card-header bg-dark text-white">
        Validasi Takmir
    </div>

    <div class="card-body">

        {{-- APPROVE --}}
        <form action="/takmir/kegiatan/{{ $kegiatan->id }}/approve"
              method="POST"
              style="display:inline-block;">
            @csrf

            <button type="submit" class="btn btn-success">
                ✅ Approve
            </button>
        </form>

        {{-- TOMBOL TAMPILKAN REJECT --}}
        <button
            type="button"
            class="btn btn-danger"
            onclick="document.getElementById('formReject').style.display='block'; this.style.display='none';">
            ❌ Reject
        </button>

        {{-- FORM REJECT (AWALNYA HIDDEN) --}}
        <div id="formReject" style="display:none;" class="mt-4">
            <form action="/takmir/kegiatan/{{ $kegiatan->id }}/reject"
                  method="POST">
                @csrf

                <label class="mb-2">
                    Alasan Penolakan
                </label>

                <textarea
                    name="catatan"
                    class="form-control mb-3"
                    rows="4"
                    placeholder="Masukkan alasan penolakan..."
                    required></textarea>

                <button type="submit" class="btn btn-danger">
                    Simpan Penolakan
                </button>
            </form>
        </div>

    </div>
</div>

@endsection