<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>{{ $kegiatan->judul }}</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <style>
        body{
            background:#f8f9fa;
            font-family:'Segoe UI',sans-serif;
        }

        .gold{
            color:#c9a646;
        }

        .carousel-item img{
            height:500px;
            object-fit:cover;
            border-radius:12px;
        }

        .card{
            border:none;
            border-radius:15px;
            box-shadow:0 3px 10px rgba(0,0,0,.05);
        }
    </style>
</head>
<body>

<nav class="navbar navbar-light bg-white shadow-sm">
    <div class="container">

        <a href="/" class="navbar-brand gold fw-bold">
            🕌 Masjid Siti Aisyah
        </a>

        <a href="/" class="btn btn-outline-dark">
            Kembali
        </a>

    </div>
</nav>


<div class="container py-5">

    <h2 class="gold fw-bold">
        {{ $kegiatan->judul }}
    </h2>

    <p class="text-muted">
        {{ \Carbon\Carbon::parse($kegiatan->tanggal)->translatedFormat('d F Y') }}
    </p>

{{-- CAROUSEL FOTO --}}
    <div class="card p-4 mb-4">

        <h5 class="mb-3">
            Dokumentasi Kegiatan
        </h5>

        <div id="galeriCarousel"
             class="carousel slide"
             data-bs-ride="carousel">

            <div class="carousel-inner">

                @foreach($kegiatan->galeri as $g)
                <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                    <img src="{{ asset('storage/'.$g->foto) }}"
                         class="d-block w-100">
                </div>
                @endforeach

            </div>

            <button class="carousel-control-prev"
                    type="button"
                    data-bs-target="#galeriCarousel"
                    data-bs-slide="prev">

                <span class="carousel-control-prev-icon"></span>
            </button>

            <button class="carousel-control-next"
                    type="button"
                    data-bs-target="#galeriCarousel"
                    data-bs-slide="next">

                <span class="carousel-control-next-icon"></span>
            </button>

        </div>
    </div>
    {{-- DESKRIPSI --}}
    <div class="card p-4 mb-4">
        <h5>Deskripsi</h5>
        <p>{{ $kegiatan->deskripsi }}</p>
    </div>

</div>


<footer class="bg-dark text-white text-center py-3">
    © {{ date('Y') }} Sistem Monitoring Masjid
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>