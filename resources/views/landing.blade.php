<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">

    <title>
        Sistem Monitoring Kegiatan Masjid Siti Aisyah Surakarta
    </title>

    <meta name="description"
          content="Website resmi sistem monitoring kegiatan dan anggaran Masjid Siti Aisyah Surakarta. Transparansi kegiatan, laporan anggaran, dan dokumentasi kegiatan masjid.">

    <meta name="keywords"
          content="Masjid Siti Aisyah Surakarta, monitoring kegiatan masjid, laporan kegiatan masjid, anggaran masjid, transparansi masjid">

    <meta name="author" content="Sistem Monitoring">
    <meta name="robots" content="index, follow">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Open Graph --}}
    <meta property="og:title"
          content="Sistem Monitoring Kegiatan Masjid Siti Aisyah">

    <meta property="og:description"
          content="Informasi kegiatan, anggaran, dan laporan Masjid Siti Aisyah Surakarta">

    <meta property="og:type" content="website">

    <meta property="og:url"
          content="http://monitoring.hospital-ink.com">

    <meta property="og:image"
          content="https://images.unsplash.com/photo-1564769625905-50e93615e769">

    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <style>
        body{
            background:#f8f9fa;
            font-family:'Segoe UI', sans-serif;
        }

        .gold{
            color:#c9a646;
        }

        .hero{
            min-height:90vh;
            display:flex;
            align-items:center;
            background:
            linear-gradient(
                rgba(255,255,255,.85),
                rgba(255,255,255,.92)
            ),
            url('https://images.unsplash.com/photo-1564769625905-50e93615e769');
            background-size:cover;
            background-position:center;
        }

        .hero h1{
            font-size:3rem;
            font-weight:700;
        }

        .card-hover{
            transition:.3s;
        }

        .card-hover:hover{
            transform:translateY(-5px);
            box-shadow:0 10px 25px rgba(0,0,0,.1);
        }

        .section-title{
            font-weight:700;
            margin-bottom:30px;
        }

        footer{
            background:#1f2937;
            color:white;
        }
    </style>
</head>

<body>

{{-- NAVBAR --}}
<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm sticky-top">
    <div class="container">

        <a class="navbar-brand fw-bold gold" href="/">
            🕌 Masjid Siti Aisyah
        </a>

        <a href="/login" class="btn btn-outline-dark">
            Masuk
        </a>

    </div>
</nav>


{{-- HERO --}}
<section class="hero">
    <div class="container text-center">

        <h1 class="gold">
            Sistem Monitoring Kegiatan & Anggaran
        </h1>

        <p class="lead mt-3 text-dark">
            Transparansi kegiatan, pengelolaan anggaran,
            serta dokumentasi masjid secara profesional
            dan terpercaya.
        </p>

        <p class="text-muted">
            📍 Masjid Siti Aisyah, Surakarta
        </p>

        <a href="/login"
           class="btn btn-dark btn-lg px-4 mt-3">
            Masuk ke Sistem
        </a>

    </div>
</section>


{{-- PROFIL MASJID --}}
<section class="py-5 bg-white">
    <div class="container">

        <h3 class="text-center gold section-title">
            Tentang Masjid
        </h3>

        <p class="text-center mx-auto"
           style="max-width:800px;">
            Masjid Siti Aisyah Surakarta merupakan pusat
            kegiatan ibadah, kajian Islam, pendidikan,
            dan aktivitas sosial masyarakat.
            Sistem monitoring ini hadir untuk mendukung
            transparansi pengelolaan kegiatan serta
            akuntabilitas penggunaan anggaran.
        </p>

        <div class="row mt-5 text-center">

            <div class="col-md-4">
                <h5>🕌 Tempat Ibadah</h5>
                <p class="text-muted">
                    Sholat berjamaah dan kegiatan keislaman.
                </p>
            </div>

            <div class="col-md-4">
                <h5>📚 Kajian & Edukasi</h5>
                <p class="text-muted">
                    Kajian rutin, pendidikan, dan pembinaan.
                </p>
            </div>

            <div class="col-md-4">
                <h5>🤝 Sosial Masyarakat</h5>
                <p class="text-muted">
                    Santunan, zakat, dan kegiatan sosial.
                </p>
            </div>

        </div>

    </div>
</section>


{{-- STATISTIK --}}
<section class="py-5">
    <div class="container">

        <h3 class="text-center gold section-title">
            Statistik Sistem
        </h3>


        <div class="row d-flex justify-content-center">

            <div class="col-md-12 mb-4">
                <div class="card p-4 w-75 mx-auto card-hover text-center h-100">
                    <h2 class="gold">
                        {{ $totalKegiatan }}
                    </h2>
                    <p class="text-muted">
                        Total Kegiatan
                    </p>
                    <small class="text-secondary">
                        Sejak 2020  
                    </small>
                </div>
            </div>
            


    </div>
</section>


{{-- KEGIATAN TERBARU --}}
<section class="py-5 bg-white">
    <div class="container">

        <h3 class="text-center gold section-title">
            Kegiatan Terbaru
        </h3>

        <div class="row">

            @forelse($kegiatans as $kegiatan)
            <div class="col-md-4 mb-4">

                <div class="card shadow-sm h-100">

                    {{-- FOTO COVER --}}
                    <img src="{{ asset('storage/'.$kegiatan->galeri->first()->foto) }}"
                        class="card-img-top"
                        style="height:220px; object-fit:cover;">

                    <div class="card-body">

                        <h5>
                            {{ $kegiatan->judul }}
                        </h5>

                        <small class="text-muted">
                            {{ $kegiatan->tanggal }}
                        </small>

                        <p class="mt-2">
                            {{ Str::limit($kegiatan->deskripsi, 80) }}
                        </p>

                        <a href="/kegiatan/{{ $kegiatan->id }}"
                        class="btn btn-dark btn-sm">
                        Lihat Detail
                        </a>

                    </div>

                </div>

            </div>
            @empty
            <div class="col-12">
                <div class="alert alert-info text-center">
                    Belum ada kegiatan yang ditampilkan.
                </div>
            </div>
            @endforelse

</div>
</section>


{{-- FOOTER --}}
<footer class="py-4 text-center">
    <div class="container">

        <small>
            © {{ date('Y') }}
            Sistem Monitoring Kegiatan Masjid Siti Aisyah
        </small>

        <br>

        <small class="text-secondary">
            Transparansi dalam setiap proses
        </small>

    </div>
</footer>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>