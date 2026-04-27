<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan Kas</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        h3 { text-align:center; }
        table { width:100%; border-collapse: collapse; margin-top:20px; }
        th, td { border:1px solid #000; padding:5px; }
        th { background:#eee; }
        .text-right { text-align:right; }
    </style>
</head>
<body>

<h3>Laporan Kas Bulan {{ $bulan }}</h3>

<table>
    <thead>
        <tr>
            <th>Tanggal</th>
            <th>Keterangan</th>
            <th>Masuk</th>
            <th>Keluar</th>
            <th>Saldo</th>
        </tr>
    </thead>
    <tbody>

        @php 
            $saldo = 0;
            $totalMasuk = 0;
            $totalKeluar = 0;
        @endphp

        @foreach($data as $d)

        @php
            if ($d['tipe'] == 'masuk') {
                $saldo += $d['jumlah'];
                $totalMasuk += $d['jumlah'];
            } else {
                $saldo -= $d['jumlah'];
                $totalKeluar += $d['jumlah'];
            }
        @endphp

        <tr>
            <td>{{ \Carbon\Carbon::parse($d['tanggal'])->format('d-m-Y') }}</td>
            <td>{{ $d['keterangan'] }}</td>

            <td class="text-right">
                @if($d['tipe']=='masuk') {{ number_format($d['jumlah']) }} @endif
            </td>

            <td class="text-right">
                @if($d['tipe']=='keluar') {{ number_format($d['jumlah']) }} @endif
            </td>

            <td class="text-right">{{ number_format($saldo) }}</td>
        </tr>

        @endforeach

    </tbody>

    <tfoot>
        <tr>
            <th colspan="2">TOTAL</th>
            <th class="text-right">{{ number_format($totalMasuk) }}</th>
            <th class="text-right">{{ number_format($totalKeluar) }}</th>
            <th class="text-right">{{ number_format($totalMasuk - $totalKeluar) }}</th>
        </tr>
    </tfoot>
</table>

</body>
</html>