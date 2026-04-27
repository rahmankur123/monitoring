<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">

    <title>Sistem Monitoring Kegiatan</title>

    <title>Sistem Monitoring Kegiatan & Anggaran | Transparansi & Akuntabilitas</title>

    <meta name="description" content="Sistem monitoring kegiatan dan anggaran berbasis web dengan pengelolaan transparan, akurat, dan terpercaya. Mendukung efisiensi dalam setiap proses.">

    <meta name="keywords" content="monitoring kegiatan, sistem anggaran, manajemen kegiatan, aplikasi monitoring, sistem informasi, masjid zayed surakarta, kegiatan masjid, laporan kegiatan, transparansi anggaran, monitoring masjid zayed, sistem monitoring kegiatan masjid, aplikasi manajemen kegiatan, sistem informasi kegiatan, laporan anggaran, transparansi kegiatan, monitoring kegiatan berbasis web">

    <meta name="author" content="Sistem Monitoring">

    <meta name="robots" content="index, follow">

    <!-- Open Graph (buat share ke WA, IG, dll) -->
    <meta property="og:title" content="Sistem Monitoring Kegiatan">
    <meta property="og:description" content="Pengelolaan kegiatan dan anggaran secara transparan dan profesional">
    <meta property="og:type" content="website">
    <meta property="og:url" content="http://monitoring.hospital-ink.com">
    <meta property="og:image" content="https://upload.wikimedia.org/wikipedia/commons/3/3f/Masjid_Sheikh_Zayed_Surakarta.jpg">

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Sistem Monitoring Kegiatan">
    <meta name="twitter:description" content="Monitoring kegiatan dan anggaran berbasis web">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f8f9fa;
        }

        .hero {
            background: linear-gradient(rgba(255,255,255,0.8), rgba(255,255,255,0.9)),
                        url('https://upload.wikimedia.org/wikipedia/commons/3/3f/Masjid_Sheikh_Zayed_Surakarta.jpg');
            background-size: cover;
            background-position: center;
            height: 90vh;
            display: flex;
            align-items: center;
        }

        .gold {
            color: #c9a646;
        }
    </style>
    
</head>
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "WebSite",
  "name": "Sistem Monitoring Kegiatan",
  "url": "http://monitoring.hospital-ink.com",
  "description": "Sistem monitoring kegiatan dan anggaran berbasis web dengan pengelolaan transparan dan profesional"
}
</script>

<body>

<!-- NAVBAR -->
<nav class="navbar navbar-light bg-white shadow-sm">
    <div class="container">
        <span class="navbar-brand fw-bold gold">
            Sistem Monitoring
        </span>

        <a href="/login" class="btn btn-outline-dark">
            Masuk
        </a>
    </div>
</nav>

<!-- HERO -->
<section class="hero">
    <div class="container text-center">

        <h1 class="fw-bold gold">
            Sistem Monitoring Kegiatan & Anggaran
        </h1>

        <p class="mt-3 text-dark">
            Pengelolaan kegiatan yang terstruktur, transparan, dan terpercaya  
            untuk mendukung efisiensi dan akuntabilitas.
        </p>

        <a href="/login" class="btn btn-dark mt-3 px-4 py-2">
            Masuk ke Sistem
        </a>

    </div>
</section>

<!-- STATS -->
<section class="py-5 bg-white">
    <div class="container text-center">

        <div class="row">

            <div class="col-md-4">
                <h2 class="gold">{{ $totalKegiatan }}</h2>
                <p>Kegiatan Tercatat</p>
            </div>

            <div class="col-md-4">
                <h2 class="gold">Rp {{ number_format($totalAnggaran) }}</h2>
                <p>Total Anggaran</p>
            </div>

            <div class="col-md-4">
                <h2 class="gold">{{ $kegiatans->count() }}</h2>
                <p>Kegiatan Aktif</p>
            </div>

        </div>

    </div>
</section>

<!-- KEGIATAN -->
<section class="py-5">
    <div class="container">

        <h3 class="text-center mb-4 gold">Kegiatan Terbaru</h3>

        <div class="row">
            @foreach($kegiatans as $kegiatan)
                <div class="col-md-4 mb-3">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body text-center">

                            <h5>{{ $kegiatan->nama ?? 'Kegiatan' }}</h5>

                            <p class="text-muted">
                                Data kegiatan yang tercatat dalam sistem monitoring.
                            </p>

                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</section>

<!-- FOOTER -->
<footer class="bg-dark text-white text-center py-3">
    <small>
        © {{ date('Y') }} Sistem Monitoring Kegiatan  
        <br>
        Transparansi dalam setiap proses
    </small>
</footer>

</body>
</html>