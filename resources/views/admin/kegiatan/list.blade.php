@extends('layouts.app')

@section('content')

<h4 class="mb-3">Realisasi Kegiatan</h4>

<div class="card">
    <div class="card-body">

        <h5 class="mb-3">{{ $kegiatan->judul }}</h5>

        <form action="/bendahara/realisasi/store" method="POST">
        @csrf

        <input type="hidden" name="kegiatan_id" value="{{ $kegiatan->id }}">

        <div class="table-responsive">
            <table class="table table-bordered align-middle">
                <thead class="table-dark text-center">
                    <tr>
                        <th>Item</th>
                        <th width="100">Qty</th>
                        <th width="150">Harga</th>
                        <th width="150">Total</th>
                    </tr>
                </thead>

                <tbody>
                    @php $grandTotal = 0; @endphp

                    @foreach($kegiatan->anggaran as $a)
                    @php 
                        $total = $a->qty * $a->harga;
                        $grandTotal += $total;
                    @endphp
                    <tr>
                        <td>
                            <input type="text" 
                                   name="nama_item[]" 
                                   value="{{ $a->nama_item }}" 
                                   class="form-control" 
                                   readonly>
                        </td>

                        <td>
                            <input type="number" 
                                   name="qty[]" 
                                   value="{{ $a->qty }}" 
                                   class="form-control text-center" 
                                   readonly>
                        </td>

                        <td>
                            <input type="number" 
                                   name="harga[]" 
                                   value="{{ $a->harga }}" 
                                   class="form-control text-end" 
                                   readonly>
                        </td>

                        <td>
                            <input type="number" 
                                   value="{{ $total }}" 
                                   class="form-control text-end bg-light" 
                                   readonly>
                        </td>
                    </tr>
                    @endforeach
                </tbody>

                <tfoot>
                    <tr>
                        <th colspan="3" class="text-end">Total Realisasi</th>
                        <th>
                            <input type="number" 
                                   class="form-control text-end fw-bold bg-light" 
                                   value="{{ $grandTotal }}" 
                                   readonly>
                        </th>
                    </tr>
                </tfoot>
            </table>
        </div>

        <div class="d-flex justify-content-between mt-3">
            <a href="/admin/kegiatan/draft" class="btn btn-secondary">
                ← Kembali
            </a>

        </div>

        </form>

    </div>
</div>

@endsection