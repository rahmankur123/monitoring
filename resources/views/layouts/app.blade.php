<!DOCTYPE html>
<html>
<head>
    <title>Monitoring Masjid</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
    /* RESET */
body {
    margin: 0;
    background: #f0fdf4;
    font-family: 'Segoe UI', sans-serif;
}

/* SIDEBAR */
.sidebar {
    width: 250px;
    min-height: 100vh;
    background: linear-gradient(180deg, #166534, #14532d);
    color: #ecfdf5;
    padding: 20px;
}

/* CONTENT */
.content {
    background: #f9fafb;
    min-height: 100vh;
}

/* LOGO */
.logo {
    text-align: center;
    font-weight: bold;
    margin-bottom: 20px;
}

/* USER */
.user-box {
    background: rgba(255,255,255,0.1);
    padding: 10px;
    border-radius: 10px;
    margin-bottom: 20px;
}

/* TITLE */
.menu-title {
    font-size: 12px;
    text-transform: uppercase;
    margin-top: 15px;
    margin-bottom: 8px;
    color: #bbf7d0;
}

/* MENU */
.menu-item {
    display: block;
    padding: 8px 12px;
    border-radius: 8px;
    color: #ecfdf5;
    text-decoration: none;
    transition: 0.2s;
}

.menu-item:hover {
    background: rgba(255,255,255,0.15);
    transform: translateX(5px);
}

/* ACTIVE MENU (biar keliatan keren) */
.menu-item.active {
    background: #22c55e;
    color: white;
}

/* BUTTON FIX */
.btn-primary {
    background: #16a34a;
    border: none;
}

.btn-primary:hover {
    background: #15803d;
}
    </style>
</head>
<body>

<div class="d-flex">

    {{-- SIDEBAR --}}
    @include('layouts.partials.sidebar')

    {{-- CONTENT --}}
    <div class="content p-4 w-100">
        @yield('content')
    </div>

</div>

</body>
</html>