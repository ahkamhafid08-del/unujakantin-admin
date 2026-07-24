<!DOCTYPE html>
<html lang="id">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login Admin</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <style>

        body{
            font-family:'Poppins',sans-serif;
            background: radial-gradient(circle at top left, #3B82F6 0%, #1D4ED8 45%, #1E3A8A 100%);
            min-height: 100vh;
        }

        .login-wrapper{
            width: 900px;
            max-width: 95%;
            border-radius: 24px;
            overflow: hidden;
            box-shadow: 0 25px 60px rgba(0,0,0,.35);
        }

        /* Sisi kiri - branding */
        .brand-side{
            background: linear-gradient(160deg, #1E3A8A 0%, #2563EB 60%, #3B82F6 100%);
            color: #fff;
            padding: 3rem 2.5rem;
            position: relative;
            overflow: hidden;
        }

        .brand-side::before{
            content:"";
            position:absolute;
            width:280px;
            height:280px;
            background: rgba(255,255,255,.08);
            border-radius:50%;
            top:-80px;
            right:-80px;
        }

        .brand-side::after{
            content:"";
            position:absolute;
            width:180px;
            height:180px;
            background: rgba(255,255,255,.06);
            border-radius:50%;
            bottom:-60px;
            left:-40px;
        }

        .logo-circle{
            width:72px;
            height:72px;
            border-radius:18px;
            background: rgba(255,255,255,.15);
            display:flex;
            align-items:center;
            justify-content:center;
            font-size:32px;
            margin-bottom:1.5rem;
            backdrop-filter: blur(4px);
        }

        .brand-title{
            font-weight:800;
            letter-spacing:.5px;
            font-size:1.6rem;
        }

        .brand-desc{
            color: rgba(255,255,255,.8);
            font-size:.92rem;
            font-weight:300;
            line-height:1.6;
        }

        .feature-item{
            display:flex;
            align-items:center;
            gap:.7rem;
            font-size:.88rem;
            color: rgba(255,255,255,.85);
            margin-bottom:.8rem;
        }

        .feature-item i{
            background: rgba(255,255,255,.15);
            width:28px;
            height:28px;
            border-radius:8px;
            display:flex;
            align-items:center;
            justify-content:center;
            font-size:.8rem;
        }

        /* Sisi kanan - form */
        .form-side{
            background:#fff;
            padding: 3rem 3rem;
        }

        .form-title{
            font-weight:700;
            font-size:1.5rem;
            color:#1E293B;
        }

        .form-subtitle{
            color:#94A3B8;
            font-size:.9rem;
            margin-bottom:2rem;
        }

        .input-group-custom{
            position:relative;
            margin-bottom:1.3rem;
        }

        .input-group-custom .icon{
            position:absolute;
            left:16px;
            top:50%;
            transform:translateY(-50%);
            color:#94A3B8;
            font-size:1rem;
            z-index:2;
        }

        .input-group-custom input{
            padding:.85rem 1rem .85rem 2.7rem;
            border-radius:12px;
            border:1.5px solid #E2E8F0;
            font-size:.95rem;
            transition: all .2s ease;
        }

        .input-group-custom input:focus{
            border-color:#2563EB;
            box-shadow:0 0 0 4px rgba(37,99,235,.1);
        }

        .toggle-password{
            position:absolute;
            right:16px;
            top:50%;
            transform:translateY(-50%);
            color:#94A3B8;
            cursor:pointer;
            z-index:2;
            background:none;
            border:none;
        }

        .btn-login{
            background: linear-gradient(135deg, #2563EB, #1D4ED8);
            border:none;
            border-radius:12px;
            padding:.85rem;
            font-weight:600;
            letter-spacing:.3px;
            transition: all .2s ease;
        }

        .btn-login:hover{
            transform: translateY(-2px);
            box-shadow:0 10px 20px rgba(37,99,235,.3);
        }

        .form-footer{
            text-align:center;
            font-size:.82rem;
            color:#94A3B8;
            margin-top:1.5rem;
        }

        @media (max-width: 768px){
            .brand-side{ display:none; }
            .form-side{ padding: 2.5rem 1.8rem; }
        }

    </style>

</head>

<body>

<div class="container-fluid vh-100 d-flex justify-content-center align-items-center">

    <div class="login-wrapper d-flex bg-white">

        {{-- Sisi Kiri: Branding --}}
        <div class="brand-side col-5 d-none d-md-flex flex-column justify-content-between">

            <div>
                <div class="logo-circle">🏪</div>
                <div class="brand-title">UNUJAKANTIN</div>
                <p class="brand-desc mt-2">
                    Panel administrasi untuk mengelola antrean kantin Universitas Nurul Jadid dengan cepat dan efisien.
                </p>
            </div>

            <div>
                <div class="feature-item">
                    <i class="bi bi-check-lg"></i> Kelola antrean secara real-time
                </div>
                <div class="feature-item">
                    <i class="bi bi-check-lg"></i> Pantau transaksi kantin
                </div>
                <div class="feature-item">
                    <i class="bi bi-check-lg"></i> Laporan otomatis & akurat
                </div>
            </div>

        </div>

        {{-- Sisi Kanan: Form Login --}}
        <div class="form-side col-md-7 col-12 d-flex flex-column justify-content-center">

            <div class="form-title">Selamat Datang 👋</div>
            <p class="form-subtitle">Masuk ke akun admin untuk melanjutkan</p>

            {{-- Pesan Error --}}
            @if(session('error'))
                <div class="alert alert-danger rounded-3 py-2 px-3 small">
                    <i class="bi bi-exclamation-circle me-1"></i>{{ session('error') }}
                </div>
            @endif

            <form method="POST" action="{{ url('/login') }}">

                @csrf

                <div class="input-group-custom">
                    <i class="bi bi-envelope icon"></i>
                    <input
                        type="email"
                        name="email"
                        class="form-control"
                        placeholder="Email"
                        required>
                </div>

                <div class="input-group-custom">
                    <i class="bi bi-lock icon"></i>
                    <input
                        type="password"
                        name="password"
                        id="passwordField"
                        class="form-control"
                        placeholder="Password"
                        required>
                    <button type="button" class="toggle-password" onclick="togglePassword()">
                        <i class="bi bi-eye" id="toggleIcon"></i>
                    </button>
                </div>

                <button type="submit" class="btn btn-login text-white w-100 mt-2">
                    Masuk <i class="bi bi-arrow-right ms-1"></i>
                </button>

            </form>

            <p class="form-footer">
                &copy; {{ date('Y') }} UNUJAKANTIN &mdash; Universitas Nurul Jadid
            </p>

        </div>

    </div>

</div>

<script>
    function togglePassword() {
        const field = document.getElementById('passwordField');
        const icon = document.getElementById('toggleIcon');
        if (field.type === 'password') {
            field.type = 'text';
            icon.classList.replace('bi-eye', 'bi-eye-slash');
        } else {
            field.type = 'password';
            icon.classList.replace('bi-eye', 'bi-eye');
            icon.classList.replace('bi-eye-slash', 'bi-eye');
        }
    }
</script>

</body>
</html>