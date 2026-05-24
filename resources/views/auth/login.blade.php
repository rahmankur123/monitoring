<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body{
            min-height:100vh;
            background: linear-gradient(135deg, #667eea, #764ba2);
            display:flex;
            justify-content:center;
            align-items:center;
            font-family: 'Segoe UI', sans-serif;
        }

        .login-card{
            background:white;
            padding:35px;
            border-radius:20px;
            box-shadow:0 10px 30px rgba(0,0,0,0.15);
            width:100%;
            max-width:400px;
            animation: fadeIn .5s ease;
        }

        .login-title{
            text-align:center;
            margin-bottom:25px;
            font-weight:700;
            color:#333;
        }

        .form-control{
            border-radius:12px;
            padding:12px;
            border:1px solid #ddd;
            transition:.3s;
        }

        .form-control:focus{
            border-color:#667eea;
            box-shadow:0 0 0 0.2rem rgba(102,126,234,0.2);
        }

        .btn-login{
            background: linear-gradient(135deg, #667eea, #764ba2);
            border:none;
            border-radius:12px;
            padding:12px;
            font-weight:600;
            transition:.3s;
        }

        .btn-login:hover{
            transform:translateY(-2px);
            box-shadow:0 5px 15px rgba(0,0,0,0.2);
        }

        .logo{
            font-size:50px;
            text-align:center;
            margin-bottom:10px;
        }

        @keyframes fadeIn{
            from{
                opacity:0;
                transform:translateY(20px);
            }
            to{
                opacity:1;
                transform:translateY(0);
            }
        }
    </style>
</head>
<body>

<div class="login-card">

    <div class="logo">
        🔐
    </div>

    <h3 class="login-title">Selamat Datang</h3>

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <form method="POST" action="/login">
        @csrf

        <div class="mb-3">
            <label class="mb-2">Email</label>
            <input type="email" name="email" class="form-control" placeholder="Masukkan email">
        </div>

        <div class="mb-3">
            <label class="mb-2">Password</label>
            <input type="password" name="password" class="form-control" placeholder="Masukkan password">
        </div>

        <button class="btn btn-login text-white w-100">
            Login
        </button>
    </form>

</div>

</body>
</html>