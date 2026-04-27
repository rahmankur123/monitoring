<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan Kegiatan</title>

    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
            margin: 0;
            padding: 25px;
            color: #1f2937;
            background: #ffffff;
        }

        /* HEADER */
        .header {
            text-align: center;
            margin-bottom: 20px;
            border-bottom: 3px solid #16a34a;
            padding-bottom: 15px;
        }

        .header h2 {
            margin: 0;
            color: #166534;
            font-size: 22px;
        }

        .header h3 {
            margin: 5px 0;
            color: #374151;
            font-size: 16px;
        }

        .header p {
            margin: 2px 0;
            font-size: 11px;
            color: #6b7280;
        }

        /* INFO BOX */
        .info-box {
            width: 100%;
            margin-bottom: 20px;
        }

        .info-box td {
            padding: 6px;
            border: none;
            font-size: 12px;
        }

        .label {
            font-weight: bold;
            width: 180px;
            color: #111827;
        }

        /* TABLE */
        table {
            width: 100%;
            border-collapse: collapse;
        }

        .main-table {
            margin-top: 10px;
        }

        .main-table th {
            background: #16a34a;
            color: white;
            border: 1px solid #d1d5db;
            padding: 8px;
            text-align: center;
            font-size: 12px;
        }

        .main-table td {
            border: 1px solid #d1d5db;
            padding: 8px;
            font-size: 11px;
            vertical-align: top;
        }

        .main-table tbody tr:nth-child(even) {
            background: #f9fafb;
        }

        .text-center {
            text-align: center;
        }

        .text-right {
            text-align: right;
        }

        .status {
            font-weight: bold;
            text-transform: uppercase;
        }

        .status-selesai {
            color: #15803d;
        }

        .status-berlangsung {
            color: #2563eb;
        }

        .status-disetujui {
            color: #0891b2;
        }

        .status-menunggu_validasi {
            color: #d97706;
        }

        /* FOOTER TOTAL */
        .summary {
            margin-top: 20px;
        }

        .summary th {
            background: #dcfce7;
            border: 1px solid #d1d5db;
            padding: 8px;
            text-align: left;
        }

        .summary td {
            border: 1px solid #d1d5db;
            padding: 8px;
            font-weight: bold;
        }

        /* FOOTER */
        .footer {
            margin-top: 35px;
            text-align: right;
            font-size: 12px;
        }

        .signature {
            margin-top: 60px;
            font-weight: bold;
        }
    </style>
</head>
<body>

    {{-- HEADER --}}
    <div class="header">
        <h2>LAPORAN KEGIATAN MASJID</h2>
        <h3>Bulan {{ \Carbon\Carbon::parse($bulan)->translatedFormat('F Y') }}</h3>
        <p>Sistem Monitoring Kegiatan dan Keuangan Masjid</p>
        <p>Dicetak pada: {{ now()->format('d-m-Y H:i') }}</p>
    </div>


    {{-- INFO --}}
    <table class="info-box">
        <tr>
            <td class="label">Periode Laporan</td>
            <td>: {{ \Carbon\Carbon::parse($bulan)->translatedFormat('F Y') }}</td>
        </tr>
        <tr>
            <td class="label">Jumlah Kegiatan</td>
            <td>: {{ $kegiatan->count() }} kegiatan</td>
        </tr>
        <tr>
            <td class="label">Status Dominan</td>
            <td>: Monitoring Kegiatan Bulanan</td>
        </tr>
    </table>


    {{-- HITUNG TOTAL --}}
    @php
        $totalAnggaranAll = 0;
        $totalRealisasiAll = 0;
    @endphp


    {{-- TABEL --}}
    <table class="main-table">
        <thead>
            <tr>
                <th width="5%">No</th>
                <th width="25%">Judul Kegiatan</th>
                <th width="12%">Tanggal</th>
                <th width="18%">Total Anggaran</th>
                <th width="18%">Total Realisasi</th>
                <th width="12%">Selisih</th>
                <th width="10%">Status</th>
            </tr>
        </thead>

        <tbody>
            @forelse($kegiatan as $k)

                @php
                    $anggaran = $k->anggaran->sum(function($a){
                        return $a->qty * $a->harga;
                    });

                    $realisasi = $k->realisasi->sum(function($r){
                        return $r->qty * $r->harga;
                    });

                    $selisih = $anggaran - $realisasi;

                    $totalAnggaranAll += $anggaran;
                    $totalRealisasiAll += $realisasi;
                @endphp

                <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>

                    <td>
                        <strong>{{ $k->judul }}</strong>
                    </td>

                    <td class="text-center">
                        {{ \Carbon\Carbon::parse($k->tanggal)->format('d-m-Y') }}
                    </td>

                    <td class="text-right">
                        Rp {{ number_format($anggaran, 0, ',', '.') }}
                    </td>

                    <td class="text-right">
                        Rp {{ number_format($realisasi, 0, ',', '.') }}
                    </td>

                    <td class="text-right">
                        Rp {{ number_format($selisih, 0, ',', '.') }}
                    </td>

                    <td class="text-center status status-{{ $k->status }}">
                        {{ strtoupper(str_replace('_', ' ', $k->status)) }}
                    </td>
                </tr>

            @empty
                <tr>
                    <td colspan="7" class="text-center">
                        Tidak ada data kegiatan pada periode ini
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>


    {{-- RINGKASAN --}}
    <table class="summary">
        <tr>
            <th width="40%">Total Anggaran Keseluruhan</th>
            <td>
                Rp {{ number_format($totalAnggaranAll, 0, ',', '.') }}
            </td>
        </tr>

        <tr>
            <th>Total Realisasi Keseluruhan</th>
            <td>
                Rp {{ number_format($totalRealisasiAll, 0, ',', '.') }}
            </td>
        </tr>

        <tr>
            <th>Total Selisih</th>
            <td>
                Rp {{ number_format($totalAnggaranAll - $totalRealisasiAll, 0, ',', '.') }}
            </td>
        </tr>
    </table>


    {{-- TTD --}}
    <div class="footer">
        <p>{{ now()->translatedFormat('d F Y') }}</p>
        <p>Mengetahui,</p>

        <div class="signature">
            _______________________
        </div>

        <p>Pengurus Masjid</p>
    </div>

</body>
</html>