<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INFOLEND</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        :root {
            --primary: #2563eb;
            --dark: #0f172a;
            --border: #e2e8f0;
        }

        body {
            min-height: 100vh;
            background: linear-gradient(135deg, #f8fafc 0%, #eef4ff 100%);
            color: #1e293b;
            font-family: Inter, system-ui, sans-serif;
            overflow-x: hidden;
        }

        .app-navbar {
            background: rgba(15, 23, 42, .96);
            backdrop-filter: blur(12px);
        }

        .navbar-brand-icon {
            width: 38px;
            height: 38px;
            border-radius: 12px;
            background: linear-gradient(135deg, #2563eb, #38bdf8);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            color: white;
        }

        .nav-link {
            font-weight: 500;
            border-radius: 10px;
            padding: 8px 14px !important;
            margin: 2px;
            transition: all .25s ease;
        }

        .nav-link:hover,
        .nav-link.active {
            background: rgba(255,255,255,.12);
            transform: translateY(-1px);
        }

        .main-wrapper {
            padding: 32px 0;
        }

        .content-card {
            background: rgba(255,255,255,.92);
            border: 1px solid var(--border);
            border-radius: 22px;
            box-shadow: 0 20px 45px rgba(15, 23, 42, .08);
            padding: 28px;
            transition: all .25s ease;
        }

        .content-card:hover {
            box-shadow: 0 24px 55px rgba(15,23,42,.10);
        }

        .dropdown-menu {
            border: 0;
            border-radius: 16px;
            box-shadow: 0 15px 35px rgba(15, 23, 42, .15);
        }

        .dropdown-item {
            border-radius: 10px;
            padding: 10px 14px;
        }

        .btn {
            border-radius: 12px;
            font-weight: 600;
        }

        .form-control,
        .form-select {
            border-radius: 12px;
            padding: 10px 14px;
        }

        .table {
            vertical-align: middle;
        }

        .table thead th {
            background: #f1f5f9;
            color: #334155;
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: .04em;
        }

        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f5f9;
        }

        ::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 999px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #94a3b8;
        }

        @media (max-width: 768px) {
            .content-card {
                padding: 20px;
                border-radius: 18px;
            }
        }
    </style>
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark app-navbar shadow-sm sticky-top">
    <div class="container">

        <a class="navbar-brand fw-bold d-flex align-items-center gap-2" href="/dashboard">
            <span class="navbar-brand-icon">
                <i class="bi bi-projector"></i>
            </span>
            <span>INFOLEND</span>
        </a>

        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse mt-3 mt-lg-0" id="navbarNav">
            <ul class="navbar-nav ms-auto align-items-lg-center gap-lg-1">

                @auth
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('dashboard') ? 'active' : '' }}" href="/dashboard">
                            <i class="bi bi-speedometer2 me-1"></i>
                            Dashboard
                        </a>
                    </li>

                    @if(auth()->user()->role == 'admin')
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('infokus*') ? 'active' : '' }}" href="/infokus">
                                <i class="bi bi-display me-1"></i>
                                Kelola Infokus
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('peminjaman*') ? 'active' : '' }}" href="/peminjaman">
                                <i class="bi bi-journal-check me-1"></i>
                                Semua Peminjaman
                            </a>
                        </li>
                    @endif

                    @if(auth()->user()->role == 'user')
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('infokus*') ? 'active' : '' }}" href="/infokus">
                                <i class="bi bi-display me-1"></i>
                                Daftar Infokus
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('peminjaman*') ? 'active' : '' }}" href="/peminjaman">
                                <i class="bi bi-calendar-check me-1"></i>
                                Peminjaman Saya
                            </a>
                        </li>
                    @endif

                    <li class="nav-item dropdown ms-lg-2">
                        <a class="nav-link dropdown-toggle d-flex align-items-center gap-2"
                           href="#"
                           role="button"
                           data-bs-toggle="dropdown">
                            <i class="bi bi-person-circle"></i>
                            {{ auth()->user()->name }}
                        </a>

                        <ul class="dropdown-menu dropdown-menu-end">
                            <li>
                                <a class="dropdown-item" href="/profile">
                                    <i class="bi bi-person me-2"></i>
                                    Profile
                                </a>
                            </li>

                            <li>
                                <hr class="dropdown-divider">
                            </li>

                            <li>
                                <form action="/logout" method="POST">
                                    @csrf
                                    <button type="submit" class="dropdown-item text-danger">
                                        <i class="bi bi-box-arrow-right me-2"></i>
                                        Logout
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </li>
                @endauth

                @guest
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('login') ? 'active' : '' }}" href="/login">
                            <i class="bi bi-box-arrow-in-right me-1"></i>
                            Login
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="btn btn-primary ms-lg-2 px-4" href="/register">
                            Register
                        </a>
                    </li>
                @endguest

            </ul>
        </div>

    </div>
</nav>

<main class="main-wrapper">
    <div class="container">
        <div class="content-card">
            {{ $slot }}
        </div>
    </div>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>