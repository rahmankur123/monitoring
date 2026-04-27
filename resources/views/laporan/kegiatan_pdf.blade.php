<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan Kegiatan</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        h3 { text-align:center; }
        table { width:100%; border-collapse: collapse; margin-top:20px; }
        th, td { border:1px solid #000; padding:6px; }
        th { background:#eee; }
    </style>
</head>
<body>

<h3>Laporan Kegiatan Bulan {{ $bulan }}</h3>

<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Judul</th>
            <th>Tanggal</th>
            <th>Total Anggaran</th>
            <th>Total Realisasi</th>
            <th>Status</th>
        </tr>
    </thead>

    <tbody>
        @foreach($kegiatan as $k)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $k->judul }}</td>
            <td>{{ \Carbon\Carbon::parse($k->tanggal)->format('d-m-Y') }}</td>

            <td>
                {{ number_format($k->anggaran->sum(function($a){
                    return $a->qty * $a->harga;
                })) }}
            </td>

            <td>
                {{ number_format($k->realisasi->sum(function($r){
                    return $r->qty * $r->harga;
                })) }}
            </td>

            <td>{{ strtoupper($k->status) }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

</body>
</html>