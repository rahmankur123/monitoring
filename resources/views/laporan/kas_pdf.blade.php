<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan Kas</title>

    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
            color: #2d3748;
            margin: 0;
            padding: 0;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
            border-bottom: 2px solid #16a34a;
            padding-bottom: 15px;
        }

        .header h2 {
            margin: 0;
            color: #166534;
            font-size: 22px;
        }

        .header h4 {
            margin: 5px 0;
            color: #374151;
            font-size: 15px;
        }

        .header p {
            margin: 3px 0;
            font-size: 11px;
            color: #6b7280;
        }

        .summary {
            margin-top: 15px;
            margin-bottom: 20px;
        }

        .summary-table {
            width: 100%;
            border-collapse: collapse;
        }

        .summary-table td {
            border: 1px solid #d1d5db;
            padding: 10px;
            font-weight: bold;
            text-align: center;
        }

        .masuk {
            background: #dcfce7;
            color: #166534;
        }

        .keluar {
            background: #fee2e2;
            color: #991b1b;
        }

        .saldo {
            background: #dbeafe;
            color: #1d4ed8;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th {
            background: #166534;
            color: white;
            border: 1px solid #14532d;
            padding: 8px;
            font-size: 12px;
        }

        td {
            border: 1px solid #d1d5db;
            padding: 7px;
            font-size: 11px;
        }

        .text-right {
            text-align: right;
        }

        .text-center {
            text-align: center;
        }

        .row-masuk {
            background: #f0fdf4;
        }

        .row-keluar {
            background: #fef2f2;
        }

        tfoot th {
            background: #111827;
            color: white;
            padding: 10px;
        }

        .footer {
            margin-top: 30px;
            font-size: 11px;
            color: #6b7280;
        }

        .signature {
            margin-top: 50px;
            width: 100%;
        }

        .signature td {
            border: none;
            text-align: center;
            padding-top: 40px;
        }
    </style>
</head>
<body>

    {{-- HEADER --}}
    <div class="header">
        <h2>🕌 SISTEM MONITORING MASJID</h2>
        <h4>Laporan Kas Bulan {{ \Carbon\Carbon::parse($bulan)->translatedFormat('F Y') }}</h4>
        <p>Monitoring Keuangan Masjid Berbasis Laravel</p>
        <p>Tanggal Cetak: {{ now()->format('d-m-Y H:i') }}</p>
    </div>


    {{-- TOTAL --}}
    @php
        $saldo = 0;
        $totalMasuk = 0;
        $totalKeluar = 0;
    @endphp

    @foreach($data as $d)
        @php
            if ($d['tipe'] == 'masuk') {
                $totalMasuk += $d['jumlah'];
            } else {
                $totalKeluar += $d['jumlah'];
            }
        @endphp
    @endforeach

    {{-- SUMMARY --}}
    <div class="summary">
        <table class="summary-table">
            <tr>
                <td class="masuk">
                    TOTAL MASUK<br>
                    Rp {{ number_format($totalMasuk) }}
                </td>

                <td class="keluar">
                    TOTAL KELUAR<br>
                    Rp {{ number_format($totalKeluar) }}
                </td>

                <td class="saldo">
                    SALDO AKHIR<br>
                    Rp {{ number_format($totalMasuk - $totalKeluar) }}
                </td>
            </tr>
        </table>
    </div>


    {{-- DETAIL TABLE --}}
    <table>
        <thead>
            <tr>
                <th width="15%">Tanggal</th>
                <th width="35%">Keterangan</th>
                <th width="15%">Masuk</th>
                <th width="15%">Keluar</th>
                <th width="20%">Saldo</th>
            </tr>
        </thead>

        <tbody>

            @php $saldo = 0; @endphp

            @foreach($data as $d)

                @php
                    if ($d['tipe'] == 'masuk') {
                        $saldo += $d['jumlah'];
                    } else {
                        $saldo -= $d['jumlah'];
                    }
                @endphp

                <tr class="{{ $d['tipe'] == 'masuk' ? 'row-masuk' : 'row-keluar' }}">
                    <td class="text-center">
                        {{ \Carbon\Carbon::parse($d['tanggal'])->format('d-m-Y') }}
                    </td>

                    <td>
                        {{ $d['keterangan'] }}
                    </td>

                    <td class="text-right">
                        @if($d['tipe'] == 'masuk')
                            {{ number_format($d['jumlah']) }}
                        @endif
                    </td>

                    <td class="text-right">
                        @if($d['tipe'] == 'keluar')
                            {{ number_format($d['jumlah']) }}
                        @endif
                    </td>

                    <td class="text-right">
                        {{ number_format($saldo) }}
                    </td>
                </tr>

            @endforeach

        </tbody>

        <tfoot>
            <tr>
                <th colspan="2">TOTAL AKHIR</th>
                <th class="text-right">
                    {{ number_format($totalMasuk) }}
                </th>
                <th class="text-right">
                    {{ number_format($totalKeluar) }}
                </th>
                <th class="text-right">
                    {{ number_format($totalMasuk - $totalKeluar) }}
                </th>
            </tr>
        </tfoot>
    </table>


    {{-- TANDA TANGAN --}}
    <table class="signature">
        <tr>
            <td>
                Mengetahui,<br>
                Takmir Masjid
                <br><br><br><br>
                ___________________
            </td>

            <td>
                Bendahara
                <br><br><br><br><br>
                ___________________
            </td>
        </tr>
    </table>


    {{-- FOOTER --}}
    <div class="footer">
        Dokumen ini dibuat secara otomatis oleh Sistem Monitoring Masjid.
    </div>

</body>
</html>