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
        html, body { height:100%; }
        body { background-color:#f8f9fa; color:#111111; overflow:hidden; }
        .badge-beginner { background-color:#dbeafe; color:#1d4ed8; border:1px solid #93c5fd; }
        .badge-intermediate { background-color:#fef3c7; color:#92400e; border:1px solid #fcd34d; }
        .badge-advanced { background-color:#dcfce7; color:#166534; border:1px solid #86efac; }
        .card { box-shadow:none !important; }
        .table-hover tbody tr:hover { background-color:#f3e8ff; }
        .text-purple { color:#6600AA !important; }
        .page-link { color:#6600AA; box-shadow:none !important; }
        .active > .page-link, .page-link.active { background-color:#6600AA; border-color:#6600AA; color:#fff; }
        .app-shell { height:100vh; display:flex; overflow:hidden; }
        .app-sidebar { width:260px; height:100vh; background:#fff; border-right:1px solid #dee2e6; flex-shrink:0; display:flex; flex-direction:column; overflow:hidden; }
        .app-main { height:100vh; min-width:0; flex:1; display:flex; flex-direction:column; overflow:hidden; }
        .app-content { flex:1; min-height:0; overflow-y:auto; }
        .sidebar-nav { min-height:0; }
        .sidebar-auth { margin-top:auto; }
        .sidebar-link { color:#111111; text-decoration:none; }
        .sidebar-link:hover { background-color:#f3e8ff; color:#6600AA; }
        .sidebar-link.active { background-color:#f3e8ff; color:#6600AA; font-weight:600; border-left:4px solid #6600AA; }
        @media (max-width: 991.98px) {
            .app-shell { flex-direction:column; }
            .app-sidebar { width:100%; height:auto; border-right:0; border-bottom:1px solid #dee2e6; overflow:visible; }
            .app-main { height:auto; min-height:0; flex:1; }
            .sidebar-nav { display:flex; gap:.5rem; overflow-x:auto; padding-bottom:.25rem; }
            .sidebar-auth { margin-top:1rem; }
            .sidebar-link { white-space:nowrap; }
        }
    </style>
    @stack('styles')
</head>
<body>
    <div class="app-shell">
        <aside class="app-sidebar p-3">
            <a class="d-flex align-items-center gap-2 text-decoration-none mb-4" href="{{ route('home') }}">
                <span class="rounded d-inline-flex align-items-center justify-content-center text-white" style="width:38px;height:38px;background-color:#6600AA">
                    <i class="bi bi-mortarboard-fill"></i>
                </span>
                <span>
                    <span class="d-block fw-bold" style="color:#6600AA">EduTrack</span>
                    <span class="d-block text-muted small">Student Management</span>
                </span>
            </a>

            <div class="sidebar-nav d-lg-grid gap-2">
                <a class="sidebar-link rounded px-3 py-2 {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">
                    <i class="bi bi-house-door me-2"></i>Home
                </a>
                @auth
                    <a class="sidebar-link rounded px-3 py-2 {{ request()->routeIs('students.*') ? 'active' : '' }}" href="{{ route('students.index') }}">
                        <i class="bi bi-people me-2"></i>Students
                    </a>
                    <a class="sidebar-link rounded px-3 py-2 {{ request()->routeIs('activity-logs.*') ? 'active' : '' }}" href="{{ route('activity-logs.index') }}">
                        <i class="bi bi-clock-history me-2"></i>Activity Log
                    </a>
                @endauth
            </div>

            <div class="sidebar-auth border rounded p-3">
                @auth
                    <p class="text-muted small mb-1">Logged in as</p>
                    <p class="fw-semibold mb-3">{{ auth()->user()->name }}</p>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="btn btn-outline-primary-custom btn-sm rounded w-100">Logout</button>
                    </form>
                @else
                    <p class="text-muted small mb-3">Access your workspace</p>
                    <div class="d-grid gap-2">
                        <a class="btn btn-primary-custom btn-sm rounded" href="{{ route('login') }}">Login</a>
                        <a class="btn btn-outline-primary-custom btn-sm rounded" href="{{ route('register') }}">Register</a>
                    </div>
                @endauth
            </div>
        </aside>

        <div class="app-main">
            <main class="app-content py-4">
                <div class="container-fluid px-4">
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
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>
</html>
