<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">

    <title>
        Sistem Monitoring Kegiatan Masjid Siti Aisyah Surakarta
    </title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description"
          content="Website resmi sistem monitoring kegiatan dan anggaran Masjid Siti Aisyah Surakarta.">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
          rel="stylesheet">

    <style>

        body{
            font-family:'Poppins',sans-serif;
            background:#f5f5f5;
            color:#1f2937;
        }

        .gold{
            color:#c9a646;
        }

        .navbar{
            backdrop-filter: blur(10px);
        }

        .hero{
            min-height:100vh;
            display:flex;
            align-items:center;
            background:
            linear-gradient(
                rgba(0,0,0,.65),
                rgba(0,0,0,.7)
            ),
            url('https://images.unsplash.com/photo-1564769625905-50e93615e769');

            background-size:cover;
            background-position:center;
            color:white;
        }

        .hero h1{
            font-size:3.5rem;
            font-weight:700;
            line-height:1.2;
        }

        .hero p{
            font-size:1.1rem;
        }

        .btn-gold{
            background:#c9a646;
            color:white;
            border:none;
        }

        .btn-gold:hover{
            background:#b89534;
            color:white;
        }

        .section-title{
            font-weight:700;
            margin-bottom:15px;
        }

        .section-subtitle{
            color:#6b7280;
            max-width:700px;
            margin:auto;
        }

        .card-hover{
            transition:.3s;
            border:none;
            border-radius:15px;
        }

        .card-hover:hover{
            transform:translateY(-5px);
            box-shadow:0 15px 35px rgba(0,0,0,.1);
        }

        .stat-card{
            background:white;
            border-radius:20px;
        }

        .card-img-top{
            height:220px;
            object-fit:cover;
        }

        footer{
            background:#111827;
            color:white;
        }

    </style>
</head>

<body>

{{-- NAVBAR --}}
<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm fixed-top">
    <div class="container">

        <a class="navbar-brand fw-bold gold" href="/">
            🕌 Masjid Siti Aisyah
        </a>

        <div>

            <a href="/" class="btn btn-outline-light me-2">
                Home
            </a>

            <a href="/about"
               class="btn btn-outline-light me-2">
                Ruang Syiar
            </a>

            <a href="/login"
               class="btn btn-gold">
                Masuk
            </a>

        </div>

    </div>
</nav>


{{-- HERO --}}
<section class="hero">

    <div class="container text-center">

        <h1>
            Sistem Monitoring <br>
            Kegiatan & Anggaran Masjid
        </h1>

        <p class="mt-4 text-light mx-auto"
           style="max-width:700px;">

            Transparansi kegiatan, pengelolaan anggaran,
            dokumentasi, dan laporan masjid secara profesional,
            amanah, dan terpercaya.

        </p>

        <p class="mt-3 text-warning">
            📍 Masjid Siti Aisyah, Surakarta
        </p>

        <div class="mt-4">

            <a href="/login"
               class="btn btn-gold btn-lg px-4 me-2">
                Masuk ke Sistem
            </a>

            <a href="/about"
               class="btn btn-outline-light btn-lg px-4">
                Tentang Masjid
            </a>

        </div>

    </div>

</section>


{{-- TENTANG --}}
<section class="py-5 bg-white">

    <div class="container">

        <div class="text-center mb-5">

            <h2 class="section-title gold">
                Tentang Masjid
            </h2>

            <p class="section-subtitle">
                Masjid Siti Aisyah Surakarta hadir sebagai pusat ibadah,
                dakwah, pendidikan, dan kegiatan sosial masyarakat
                dengan semangat transparansi dan pelayanan umat.
            </p>

        </div>

        <div class="row text-center g-4">

            <div class="col-md-4">
                <div class="card card-hover h-100 p-4 shadow-sm">

                    <h3>🕌</h3>

                    <h5 class="mt-3">
                        Tempat Ibadah
                    </h5>

                    <p class="text-muted">
                        Menjadi tempat sholat berjamaah
                        dan pusat kegiatan keislaman masyarakat.
                    </p>

                </div>
            </div>

            <div class="col-md-4">
                <div class="card card-hover h-100 p-4 shadow-sm">

                    <h3>📚</h3>

                    <h5 class="mt-3">
                        Kajian & Edukasi
                    </h5>

                    <p class="text-muted">
                        Kajian rutin, TPA, pembinaan,
                        dan pendidikan islami.
                    </p>

                </div>
            </div>

            <div class="col-md-4">
                <div class="card card-hover h-100 p-4 shadow-sm">

                    <h3>🤝</h3>

                    <h5 class="mt-3">
                        Sosial Masyarakat
                    </h5>

                    <p class="text-muted">
                        Program sosial, zakat,
                        santunan, dan kegiatan kemanusiaan.
                    </p>

                </div>
            </div>

        </div>

    </div>

</section>


{{-- STATISTIK --}}
<section class="py-5">

    <div class="container">

        <div class="text-center mb-5">

            <h2 class="section-title gold">
                Statistik Sistem
            </h2>

        </div>

        <div class="row justify-content-center">

            <div class="col-md-4">

                <div class="stat-card shadow-sm p-5 text-center">

                    <h1 class="gold fw-bold">
                        {{ $totalKegiatan }}
                    </h1>

                    <p class="text-muted mb-0">
                        Total Kegiatan
                    </p>

                    <small class="text-secondary">
                        Sejak Tahun 2020
                    </small>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- KEGIATAN --}}
<section class="py-5 bg-white">

    <div class="container">

        <div class="text-center mb-5">

            <h2 class="section-title gold">
                Kegiatan Terbaru
            </h2>

            <p class="section-subtitle">
                Dokumentasi dan aktivitas terbaru
                Masjid Siti Aisyah Surakarta.
            </p>

        </div>

        <div class="row">

            @forelse($kegiatans as $kegiatan)

            <div class="col-md-4 mb-4">

                <div class="card card-hover shadow-sm h-100">

                    @if($kegiatan->galeri->first())

                    <img src="{{ asset('storage/'.$kegiatan->galeri->first()->foto) }}"
                         class="card-img-top">

                    @else

                    <img src="https://images.unsplash.com/photo-1519817650390-64a93db51149"
                         class="card-img-top">

                    @endif

                    <div class="card-body d-flex flex-column">

                        <small class="text-muted">
                            {{ \Carbon\Carbon::parse($kegiatan->tanggal)->translatedFormat('d F Y') }}                            
                        </small>

                        <h5 class="mt-2">
                            {{ $kegiatan->judul }}
                        </h5>

                        <p class="text-muted">
                            {{ Str::limit($kegiatan->deskripsi, 100) }}
                        </p>

                        <div class="mt-auto">

                            <a href="/kegiatan/{{ $kegiatan->id }}"
                               class="btn btn-dark btn-sm">
                                Lihat Detail
                            </a>

                        </div>

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

    </div>

</section>


{{-- FOOTER --}}
<footer class="py-4">

    <div class="container text-center">

        <h5 class="gold">
            🕌 Masjid Siti Aisyah
        </h5>

        <p class="mb-1">
            Sistem Monitoring Kegiatan & Anggaran
        </p>

        <small class="text-secondary">
            © {{ date('Y') }} Masjid Siti Aisyah Surakarta
        </small>

    </div>

</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>