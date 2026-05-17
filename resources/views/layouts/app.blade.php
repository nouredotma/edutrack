<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'EduTrack') &mdash; EduTrack</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <style>
        .btn-primary-custom { background-color:#6600AA; color:#fff; border:1px solid #6600AA; border-radius:6px; }
        .btn-primary-custom:hover { background-color:#4a007a; border-color:#4a007a; color:#fff; }
        .btn-outline-primary-custom { background-color:#fff; color:#6600AA; border:1px solid #6600AA; border-radius:6px; }
        .btn-outline-primary-custom:hover { background-color:#f3e8ff; color:#6600AA; border-color:#6600AA; }
        .form-control:focus, .form-select:focus { border-color:#6600AA; box-shadow:none; }
        .nav-link.active { font-weight:600; text-decoration:underline; }
        body { background-color:#f8f9fa; color:#111111; }
        .badge-beginner { background-color:#dbeafe; color:#1d4ed8; border:1px solid #93c5fd; }
        .badge-intermediate { background-color:#fef3c7; color:#92400e; border:1px solid #fcd34d; }
        .badge-advanced { background-color:#dcfce7; color:#166534; border:1px solid #86efac; }
        .card { box-shadow:none !important; }
        .table-hover tbody tr:hover { background-color:#f3e8ff; }
        .text-purple { color:#6600AA !important; }
        .page-link { color:#6600AA; box-shadow:none !important; }
        .active > .page-link, .page-link.active { background-color:#6600AA; border-color:#6600AA; color:#fff; }
    </style>
    @stack('styles')
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color:#6600AA">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{ route('home') }}">EduTrack</a>
            <button class="navbar-toggler border rounded" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar" aria-controls="mainNavbar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="mainNavbar">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Home</a>
                    </li>
                    @auth
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('students.*') ? 'active' : '' }}" href="{{ route('students.index') }}">Students</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('activity-logs.*') ? 'active' : '' }}" href="{{ route('activity-logs.index') }}">Activity Log</a>
                        </li>
                    @endauth
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}" href="{{ route('about') }}">About</a>
                    </li>
                </ul>
                <div class="d-flex align-items-lg-center gap-2">
                    @auth
                        <span class="text-white small">{{ auth()->user()->name }}</span>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="btn btn-outline-light btn-sm rounded">Logout</button>
                        </form>
                    @else
                        <a class="btn btn-light btn-sm rounded" href="{{ route('register') }}">Register</a>
                        <a class="btn btn-outline-light btn-sm rounded" href="{{ route('login') }}">Login</a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <main class="py-4">
        <div class="container">
            @if (session('success'))
                <div class="alert alert-success border rounded mb-4" role="alert">
                    <i class="bi bi-check-circle me-2"></i>{{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger border rounded mb-4" role="alert">
                    <i class="bi bi-exclamation-triangle me-2"></i>{{ session('error') }}
                </div>
            @endif

            @yield('content')
        </div>
    </main>

    <footer class="border-top bg-white text-center text-muted py-3 small">EduTrack &copy; {{ date('Y') }} &mdash; Sup'ISI</footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>
</html>
