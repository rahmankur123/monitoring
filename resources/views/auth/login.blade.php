<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">

    <title>
        Login | Sistem Monitoring Masjid
    </title>

    <meta name="viewport"
          content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
          rel="stylesheet">

    <style>

        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
        }

        body{
            min-height:100vh;
            font-family:'Poppins',sans-serif;

            background:
            linear-gradient(
                rgba(0,0,0,.68),
                rgba(0,0,0,.72)
            ),
            url('https://images.unsplash.com/photo-1564769625905-50e93615e769');

            background-size:cover;
            background-position:center;

            display:flex;
            justify-content:center;
            align-items:center;

            padding:20px;
        }

        .gold{
            color:#d4af37;
        }

        .login-wrapper{width:100%; max-width:840px; /* diperkecil */ min-height:500px; background:rgba(255,255,255,.08); backdrop-filter:blur(15px); border-radius:22px; overflow:hidden; box-shadow:0 15px 40px rgba(0,0,0,.25); display:flex;
        }

        .left-side{
            flex:1;

            padding:40px;

            color:white;

            display:flex;
            flex-direction:column;
            justify-content:center;

            background:
            linear-gradient(
                rgba(0,0,0,.45),
                rgba(0,0,0,.55)
            );
        }

        .logo{font-size:38px; margin-bottom:10px;
        }

        .title{font-size:24px; font-weight:700; line-height:1.3;
        }

        .desc{margin-top:12px; color:#e5e7eb; line-height:1.6; font-size:12px;
        }

        .feature-list{margin-top:22px; display:grid; grid-template-columns:1fr 1fr; gap:10px;
        }

        .feature-item{display:flex; align-items:flex-start; background:rgba(255,255,255,.08); padding:10px; border-radius:10px; min-height:85px;
        }

        .feature-icon{font-size:16px; margin-right:10px;
        }

        .feature-text h6{margin:0; font-weight:600; font-size:11px; line-height:1.4;
        }

        .feature-text small{color:#d1d5db; font-size:10px; line-height:1.5;
        }

        .right-side{width:300px; background:white; padding:30px; display:flex; flex-direction:column; justify-content:center;
        }

        .login-title{font-size:21px; font-weight:700; margin-bottom:6px; color:#111827;
        }

        .login-subtitle{color:#6b7280; margin-bottom:22px; font-size:12px; line-height:1.6;
        }

        .form-label{font-size:12px; font-weight:600; color:#374151;
        }

        .form-control{height:42px; border-radius:10px; border:1px solid #d1d5db; padding-left:14px; font-size:12px;
        }

        .form-control:focus{
            border-color:#d4af37;
            box-shadow:none;
        }

        .btn-login{height:42px; border:none; border-radius:10px; background:#111827; color:white; font-weight:600; transition:.3s; font-size:12px;
        }

        .btn-login:hover{
            background:#000;
            transform:translateY(-2px);
        }

        .footer-text{margin-top:18px; text-align:center; color:#9ca3af; font-size:11px;
        }

        @media(max-width:992px){

            .login-wrapper{flex-direction:column; max-width:100%;
            }

            .right-side{
                width:100%;
            }

            .left-side{
                padding:35px;
            }

            .title{
                font-size:28px;
            }
            .feature-list{ grid-template-columns:1fr; }

        }

    </style>

</head>

<body>

<div class="login-wrapper">

    {{-- LEFT SIDE --}}
    <div class="left-side">

        <div class="logo">
            🕌
        </div>

        <h1 class="title">
            Sistem Monitoring <br>

            <span class="gold">
                Masjid Siti Aisyah
            </span>

        </h1>

        <p class="desc">

            Platform digital untuk transparansi kegiatan,
            pengelolaan anggaran, dokumentasi kegiatan,
            serta monitoring program dakwah dan sosial masjid
            secara profesional dan terpercaya.

        </p>

        <div class="feature-list">

            <div class="feature-item">

                <div class="feature-icon">
                    📊
                </div>

                <div class="feature-text">

                    <h6>
                        Monitoring Kegiatan
                    </h6>

                    <small>
                        Kelola dan pantau seluruh kegiatan masjid
                    </small>

                </div>

            </div>

            <div class="feature-item">

                <div class="feature-icon">
                    💰
                </div>

                <div class="feature-text">

                    <h6>
                        Transparansi Anggaran
                    </h6>

                    <small>
                        Pengelolaan dana dan laporan keuangan
                    </small>

                </div>

            </div>

            <div class="feature-item">

                <div class="feature-icon">
                    🖼️
                </div>

                <div class="feature-text">

                    <h6>
                        Dokumentasi Kegiatan
                    </h6>

                    <small>
                        Arsip galeri dan aktivitas masjid
                    </small>

                </div>

            </div>

            <div class="feature-item">

                <div class="feature-icon">
                    🤝
                </div>

                <div class="feature-text">

                    <h6>
                        Pelayanan Umat
                    </h6>

                    <small>
                        Mendukung kegiatan sosial dan dakwah
                    </small>

                </div>

            </div>

        </div>

    </div>


    {{-- RIGHT SIDE --}}
    <div class="right-side">

        <h2 class="login-title">
            Selamat Datang
        </h2>

        <p class="login-subtitle">
            Silakan login untuk mengakses
            sistem monitoring masjid.
        </p>

        @if(session('error'))

            <div class="alert alert-danger">

                {{ session('error') }}

            </div>

        @endif

        <form method="POST"
              action="/login">

            @csrf

            <div class="mb-3">

                <label class="form-label mb-2">
                    Email
                </label>

                <input type="email"
                       name="email"
                       class="form-control"
                       placeholder="Masukkan email">

            </div>

            <div class="mb-4">

                <label class="form-label mb-2">
                    Password
                </label>

                <input type="password"
                       name="password"
                       class="form-control"
                       placeholder="Masukkan password">

            </div>

            <button class="btn btn-login w-100">

                Login ke Sistem

            </button>

        </form>

        <div class="footer-text">

            © {{ date('Y') }}
            Masjid Siti Aisyah Surakarta

        </div>

    </div>

</div>

</body>
</html>