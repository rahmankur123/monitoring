<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Monitoring Masjid</title>
    <meta name="description" content="Sistem monitoring kegiatan, anggaran, LPJ, evaluasi, dan laporan masjid berbasis Laravel.">
    <meta name="keywords" content="monitoring masjid, sistem masjid, kegiatan masjid, laporan masjid, anggaran masjid">
    <meta name="author" content="Monitoring Masjid">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', sans-serif;
            background: #f8fafc;
            overflow: hidden;
        }

        /* SIDEBAR */
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: 250px;
            height: 100vh;
            background: linear-gradient(180deg, #166534, #14532d);
            color: white;
            padding: 24px 18px;
            overflow-y: auto;
            z-index: 1000;
        }

        .logo {
            font-size: 28px;
            font-weight: 700;
            text-align: center;
            margin-bottom: 24px;
        }

        .user-box {
            background: rgba(255,255,255,0.10);
            border-radius: 14px;
            padding: 14px;
            margin-bottom: 24px;
        }

        .menu-title {
            font-size: 12px;
            text-transform: uppercase;
            color: #bbf7d0;
            margin: 18px 0 8px;
            font-weight: 600;
        }

        .menu-item {
            display: block;
            text-decoration: none;
            color: #ecfdf5;
            padding: 10px 14px;
            border-radius: 10px;
            margin-bottom: 6px;
            transition: 0.2s;
        }

        .menu-item:hover {
            background: rgba(255,255,255,0.12);
            color: white;
            transform: translateX(4px);
        }

        .menu-item.active {
            background: #22c55e;
        }

        /* HEADER */
        .header {
            position: fixed;
            top: 0;
            left: 250px;
            right: 0;
            height: 72px;
            background: white;
            border-bottom: 1px solid #e5e7eb;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 28px;
            z-index: 999;
            box-shadow: 0 2px 8px rgba(0,0,0,0.03);
        }

        /* CONTENT */
        .content {
            margin-left: 250px;
            margin-top: 72px;
            margin-bottom: 58px;
            height: calc(100vh - 130px);
            overflow-y: auto;
            padding: 28px;
            background: #f8fafc;
        }

        /* FOOTER */
        .footer {
            position: fixed;
            left: 250px;
            right: 0;
            bottom: 0;
            height: 58px;
            background: white;
            border-top: 1px solid #e5e7eb;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 14px;
            color: #6b7280;
            z-index: 999;
        }

        .btn-primary {
            background: #16a34a;
            border: none;
            border-radius: 10px;
        }

        .btn-primary:hover {
            background: #15803d;
        }

        .card {
            border: none;
            border-radius: 16px;
            box-shadow: 0 6px 18px rgba(0,0,0,0.04);
        }

        .table {
            background: white;
        }
    </style>
</head>
<body>

    @include('layouts.partials.sidebar')
    @include('layouts.partials.header')

    <div class="content">
        @yield('content')
    </div>

    @include('layouts.partials.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
