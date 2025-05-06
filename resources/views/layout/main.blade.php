<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>UTS PWEB 232410101078</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">📚Perpustakaan</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarContent">
                @unless (request()->is('login'))
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('dashboard*') ? 'active' : ''}}" href="/dashboard?username=admin">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('pengelolaan*') ? 'active' : ''}}" href="/pengelolaan?username=admin">Pengelolaan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('profile*') ? 'active' : ''}}" href="/profile?username=admin">Profil</a>
                        </li>
                    </ul>
                    <span class="navbar-text text-white">Admin</span>
                @else
                <span class="navbar-text text-white">Login Admin</span>
                @endunless
            </div>
        </div>
    </nav>

    <div class="container">
        @yield('content')
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @include('components.footer')
</body>
</html>
