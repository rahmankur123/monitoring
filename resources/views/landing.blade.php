<!DOCTYPE html>
<html>
<head>
    <title>Sistem Monitoring Kegiatan</title>
    <meta name="description" content="Sistem monitoring kegiatan, anggaran, LPJ, evaluasi, dan laporan masjid berbasis Laravel.">
    <meta name="keywords" content="monitoring masjid, sistem masjid, kegiatan masjid, laporan masjid, anggaran masjid">
    <meta name="author" content="Monitoring Masjid">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">

    <h1 class="text-center">Sistem Monitoring Kegiatan</h1>
    <p class="text-center">Pantau kegiatan dan anggaran secara real-time</p>

    <div class="row text-center mt-4">
        <div class="col">
            <h3>{{ $totalKegiatan }}</h3>
            <p>Total Kegiatan</p>
        </div>
        <div class="col">
            <h3>Rp {{ number_format($totalAnggaran) }}</h3>
            <p>Total Anggaran</p>
        </div>
    </div>

    <hr>

    <h4>Kegiatan Terbaru</h4>
    <ul>
        @foreach($kegiatans as $kegiatan)
            <li>{{ $kegiatan->nama ?? 'Kegiatan' }}</li>
        @endforeach
    </ul>

    <div class="text-center mt-4">
        <a href="/login" class="btn btn-primary">Login</a>
    </div>

</div>

</body>
</html>