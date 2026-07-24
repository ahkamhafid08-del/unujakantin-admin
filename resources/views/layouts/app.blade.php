<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>UNUJAKANTIN Admin Panel</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- DataTables -->
    <link rel="stylesheet"
    href="https://cdn.datatables.net/1.13.8/css/dataTables.bootstrap5.min.css">

    <!-- css -->
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">   

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    <style>
        * {
            font-family: 'Poppins', sans-serif;
        }

        body {
            background: #f4f7fc;
            margin: 0;
            padding: 0;
        }

        .sidebar {
            width: 260px;
            min-height: 100vh;
            background: #2563EB;
            color: white;
            box-shadow: 3px 0 10px rgba(0, 0, 0, .08);
        }

        .sidebar a {
            color: white;
            text-decoration: none;
            display: block;
            padding: 14px 22px;
            transition: .25s;
            border-left: 4px solid transparent;
        }

        .sidebar a:hover {
            background: rgba(255, 255, 255, .15);
            border-left: 4px solid white;
        }

        .content {
            flex: 1;
            background: #f4f7fc;
            min-height: 100vh;
            padding: 25px;
        }

        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 5px 18px rgba(0, 0, 0, .08);
        }

        .table th {
            background: #2563EB;
            color: white;
            vertical-align: middle;
        }

        .table td {
            vertical-align: middle;
        }

        .btn {
            border-radius: 10px;
        }

        .badge {
            font-size: .85rem;
            padding: 7px 12px;
        }
    </style>

</head>

<body>

    <div class="d-flex">

        {{-- Sidebar --}}
        @include('partials.sidebar')

        <div class="content">

            {{-- Navbar --}}
            @include('partials.navbar')

            {{-- Content --}}
            @yield('content')

            {{-- Footer --}}
            @include('partials.footer')

        </div>

    </div>

    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    {{-- Notifikasi Berhasil --}}
    @if(session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: '{{ session("success") }}',
                timer: 1800,
                showConfirmButton: false
            });
        </script>
    @endif

    {{-- Notifikasi Gagal --}}
    @if(session('error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: '{{ session("error") }}'
            });
        </script>
    @endif

    <!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<!-- DataTables -->
<script src="https://cdn.datatables.net/1.13.8/js/jquery.dataTables.min.js"></script>

<script src="https://cdn.datatables.net/1.13.8/js/dataTables.bootstrap5.min.js"></script>

</body>

</html>