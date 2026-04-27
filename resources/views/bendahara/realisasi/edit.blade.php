@extends('layouts.app')

@section('content')

<h4 class="mb-4">Edit Realisasi - {{ $kegiatan->judul }}</h4>

<form action="/bendahara/realisasi/update/{{ $kegiatan->id }}" method="POST">
    @csrf

    <div class="card shadow-sm">
        <div class="card-body">

            <table class="table table-bordered align-middle" id="tableRealisasi">
                <thead class="table-warning">
                    <tr>
                        <th>Item</th>
                        <th width="120">Qty</th>
                        <th width="180">Harga</th>
                        <th width="180">Total</th>
                        <th width="150">Aksi</th>
                    </tr>
                </thead>

                <tbody>

                    {{-- DATA LAMA --}}
                    @foreach($kegiatan->realisasi as $r)
                    <tr>
                        <td>
                            <input type="text"
                                   name="nama_item[]"
                                   value="{{ $r->nama_item }}"
                                   class="form-control"
                                   required>
                        </td>

                        <td>
                            <input type="number"
                                   name="qty[]"
                                   value="{{ $r->qty }}"
                                   class="form-control qty"
                                   required>
                        </td>

                        <td>
                            <input type="number"
                                   name="harga[]"
                                   value="{{ $r->harga }}"
                                   class="form-control harga"
                                   required>
                        </td>

                        <td>
                            <input type="number"
                                   class="form-control total"
                                   value="{{ $r->qty * $r->harga }}"
                                   readonly>
                        </td>

                        <td>
                            <button type="button"
                                    class="btn btn-danger btn-sm removeRow">
                                Hapus
                            </button>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>

            <div class="d-flex gap-2">

                {{-- TAMBAH BARANG --}}
                <button type="button"
                        class="btn btn-success"
                        id="addRow">
                    + Tambah Barang
                </button>

                {{-- SIMPAN --}}
                <button type="submit"
                        class="btn btn-primary">
                    Update Realisasi
                </button>

            </div>

        </div>
    </div>
</form>

<script>

document.getElementById('addRow').addEventListener('click', function () {

    let row = `
        <tr>
            <td>
                <input type="text"
                       name="nama_item[]"
                       class="form-control"
                       required>
            </td>

            <td>
                <input type="number"
                       name="qty[]"
                       class="form-control qty"
                       required>
            </td>

            <td>
                <input type="number"
                       name="harga[]"
                       class="form-control harga"
                       required>
            </td>

            <td>
                <input type="number"
                       class="form-control total"
                       readonly>
            </td>

            <td>
                <button type="button"
                        class="btn btn-danger btn-sm removeRow">
                    Hapus
                </button>
            </td>
        </tr>
    `;

    document.querySelector('#tableRealisasi tbody')
        .insertAdjacentHTML('beforeend', row);
});


// AUTO HITUNG TOTAL
document.addEventListener('input', function (e) {

    if (
        e.target.classList.contains('qty') ||
        e.target.classList.contains('harga')
    ) {
        let row = e.target.closest('tr');

        let qty = row.querySelector('.qty').value || 0;
        let harga = row.querySelector('.harga').value || 0;

        row.querySelector('.total').value = qty * harga;
    }
});


// HAPUS ROW
document.addEventListener('click', function (e) {
    if (e.target.classList.contains('removeRow')) {
        e.target.closest('tr').remove();
    }
});

</script>

@endsection