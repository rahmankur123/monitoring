<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">

    <title>
        Ruang Syiar | Masjid Siti Aisyah
    </title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description"
          content="Tentang Masjid Siti Aisyah Surakarta, pusat dakwah, ibadah, dan kegiatan umat Islam.">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
          rel="stylesheet">

    <style>

        body{
            font-family:'Poppins',sans-serif;
            background:#f8f9fa;
            color:#1f2937;
        }

        .gold{
            color:#c9a646;
        }

        .hero{
            min-height:85vh;
            display:flex;
            align-items:center;
            justify-content:center;
            text-align:center;

            background:
            linear-gradient(
                rgba(0,0,0,.75),
                rgba(0,0,0,.75)
            ),
            url('https://images.unsplash.com/photo-1564769625905-50e93615e769');

            background-size:cover;
            background-position:center;

            color:white;
        }
        .navbar{
            backdrop-filter: blur(10px);
        }

        .hero h1{
            font-size:4rem;
            font-weight:700;
        }

        .hero p{
            font-size:1.2rem;
            max-width:750px;
            margin:auto;
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

        .content-section{
            padding:90px 0;
        }

        .content-box{
            background:white;
            border-radius:25px;
            padding:50px;
            box-shadow:0 10px 40px rgba(0,0,0,.06);
        }

        .section-title{
            font-weight:700;
            margin-bottom:25px;
        }

        .divider{
            width:80px;
            height:4px;
            background:#c9a646;
            border-radius:10px;
            margin-bottom:30px;
        }

        .quote-box{
            background:#f9fafb;
            border-left:5px solid #c9a646;
            padding:25px;
            border-radius:10px;
            margin-bottom:25px;
        }

        .quote-box p{
            font-style:italic;
            margin-bottom:10px;
            color:#374151;
        }

        .feature-card{
            background:white;
            border-radius:20px;
            padding:30px;
            height:100%;
            transition:.3s;
            box-shadow:0 5px 20px rgba(0,0,0,.05);
        }

        .feature-card:hover{
            transform:translateY(-5px);
        }

        .feature-icon{
            font-size:40px;
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

            <a href="/"
               class="btn btn-outline-light me-2">
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

    <div class="container">

        <h1 class="gold">
            Ruang Syiar
        </h1>

        <p class="mt-4">
            Menebar Cahaya Islam, Menghidupkan Sunnah,
            dan Menguatkan Ukhuwah melalui dakwah,
            pendidikan, dan pelayanan umat.
        </p>

    </div>

</section>


{{-- ABOUT --}}
<section class="content-section">

    <div class="container">

        <div class="content-box">

            <h2 class="section-title gold">
                Tentang Kami
            </h2>

            <div class="divider"></div>

            <p>
                Masjid Siti Aisyah hadir sebagai tempat ibadah,
                pusat dakwah, dan ruang bertumbuhnya ukhuwah Islamiyah
                bagi masyarakat.
            </p>

            <p>
                Berlokasi di kawasan Manahan, Solo,
                masjid ini memiliki ciri khas arsitektur modern
                berbentuk kotak yang terinspirasi dari bentuk Ka’bah,
                memberikan kesan sederhana, elegan,
                dan penuh ketenangan bagi setiap jamaah yang datang.
            </p>

            <p>
                Desain minimalis dengan nuansa hitam dan interior
                yang nyaman menjadikan Masjid Siti Aisyah tidak hanya
                indah dipandang, tetapi juga menghadirkan suasana ibadah
                yang khusyuk dan menenangkan hati.
            </p>

            <p>
                Keunikan inilah yang membuat masjid ini dikenal
                sebagai salah satu ikon masjid modern di Surakarta.
            </p>

        </div>

    </div>

</section>


{{-- PROGRAM --}}
<section class="pb-5">

    <div class="container">

        <div class="text-center mb-5">

            <h2 class="gold fw-bold">
                Kegiatan & Syiar Islam
            </h2>

            <p class="text-muted">
                Berbagai program dan kegiatan yang dihadirkan
                untuk kemaslahatan umat.
            </p>

        </div>

        <div class="row g-4">

            <div class="col-md-3">

                <div class="feature-card text-center">

                    <div class="feature-icon">
                        📖
                    </div>

                    <h5 class="mt-3">
                        Kajian Rutin
                    </h5>

                    <p class="text-muted">
                        Kajian keislaman dan pembelajaran sunnah
                        secara rutin.
                    </p>

                </div>

            </div>

            <div class="col-md-3">

                <div class="feature-card text-center">

                    <div class="feature-icon">
                        🕌
                    </div>

                    <h5 class="mt-3">
                        Ibadah Jamaah
                    </h5>

                    <p class="text-muted">
                        Menjadi pusat pelaksanaan ibadah
                        dan kegiatan keagamaan masyarakat.
                    </p>

                </div>

            </div>

            <div class="col-md-3">

                <div class="feature-card text-center">

                    <div class="feature-icon">
                        👦
                    </div>

                    <h5 class="mt-3">
                        Pembinaan Remaja
                    </h5>

                    <p class="text-muted">
                        Pembinaan generasi muda melalui
                        kegiatan positif dan islami.
                    </p>

                </div>

            </div>

            <div class="col-md-3">

                <div class="feature-card text-center">

                    <div class="feature-icon">
                        🤝
                    </div>

                    <h5 class="mt-3">
                        Sosial Umat
                    </h5>

                    <p class="text-muted">
                        Program sosial, bantuan masyarakat,
                        dan kegiatan kemanusiaan.
                    </p>

                </div>

            </div>

        </div>

    </div>

</section>


{{-- DESKRIPSI --}}
<section class="content-section pt-0">

    <div class="container">

        <div class="content-box">

            <p>
                Tidak hanya digunakan untuk shalat berjamaah,
                Masjid Siti Aisyah juga menjadi wadah berbagai
                kegiatan Islami seperti kajian rutin,
                TPA, pembinaan remaja masjid,
                kegiatan sosial, serta program dakwah
                yang bermanfaat bagi umat.
            </p>

            <p>
                Kami percaya bahwa masjid bukan hanya tempat bersujud,
                tetapi juga tempat belajar, berbagi,
                dan mempererat persaudaraan sesama muslim.
            </p>

        </div>

    </div>

</section>


{{-- QUOTES --}}
<section class="pb-5">

    <div class="container">

        <div class="content-box">

            <h2 class="section-title gold">
                Landasan Dakwah
            </h2>

            <div class="divider"></div>

            <div class="quote-box">

                <p>
                    “Barangsiapa membangun masjid karena Allah,
                    maka Allah akan membangunkan baginya
                    rumah di surga.”
                </p>

                <strong>
                    (HR. Bukhari & Muslim)
                </strong>

            </div>

            <div class="quote-box">

                <p>
                    “Sesungguhnya yang memakmurkan masjid-masjid Allah
                    hanyalah orang-orang yang beriman kepada Allah
                    dan hari akhir.”
                </p>

                <strong>
                    (QS. At-Taubah: 18)
                </strong>

            </div>

        </div>

    </div>

</section>


{{-- PENUTUP --}}
<section class="pb-5">

    <div class="container">

        <div class="content-box text-center">

            <h2 class="gold fw-bold mb-4">
                Menjadi Sumber Cahaya dan Keberkahan
            </h2>

            <p class="mx-auto"
               style="max-width:800px;">

                Dengan semangat kebersamaan dan pelayanan umat,
                kami berharap Masjid Siti Aisyah dapat menjadi
                sumber cahaya, ilmu, dan keberkahan
                bagi seluruh masyarakat.

            </p>

            <h4 class="gold mt-5">
                ✨ “Menebar Cahaya Islam,
                Menghidupkan Sunnah,
                dan Menguatkan Ukhuwah.”
            </h4>

        </div>

    </div>

</section>


{{-- FOOTER --}}
<footer class="py-4 text-center">

    <div class="container">

        <h5 class="gold">
            🕌 Masjid Siti Aisyah
        </h5>

        <p class="mb-1">
            Ruang Syiar & Dakwah Umat
        </p>

        <small class="text-secondary">
            © {{ date('Y') }} Masjid Siti Aisyah Surakarta
        </small>

    </div>

</footer>

</body>
</html>