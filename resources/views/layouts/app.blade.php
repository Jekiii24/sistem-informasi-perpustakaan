<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perpustakaan Sederhana - @yield('title', 'Dashboard')</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Spectral:ital,wght@0,400;0,600;0,700;1,400&display=swap"
        rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @stack('styles')
</head>

<body>
    <a class="skip-link" href="#main-content">Lewati ke konten</a>

    @if (!request()->routeIs('login'))

        <div class="app-shell">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg">
                <div class="container-fluid px-3 px-lg-4">
                    <a class="navbar-brand" href="{{ route('dashboard') }}">Perpustakaan Sederhana</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Buka menu navigasi">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav ms-auto align-items-lg-center">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('logout') }}"
                                    onclick="return confirm('Yakin logout?')">Logout</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <!-- Main Layout -->
            <div class="app-body">
                <!-- Sidebar -->
                <aside class="sidebar">
                    <p class="sidebar-title">Menu</p>
                    <nav class="sidebar-nav">
                        <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}"
                            href="{{ route('dashboard') }}">Dashboard</a>
                        @can('admin')
                            <a class="nav-link {{ request()->routeIs('users.*') ? 'active' : '' }}"
                                href="{{ route('users.index') }}">User</a>
                        @endcan
                        <a class="nav-link {{ request()->routeIs('categories.*') ? 'active' : '' }}"
                            href="{{ route('categories.index') }}">Kategori</a>
                        <a class="nav-link {{ request()->routeIs('books.*') ? 'active' : '' }}"
                            href="{{ route('books.index') }}">Buku</a>
                        <a class="nav-link {{ request()->routeIs('members.*') ? 'active' : '' }}"
                            href="{{ route('members.index') }}">Anggota</a>
                        <a class="nav-link {{ request()->routeIs('borrowings.*') ? 'active' : '' }}"
                            href="{{ route('borrowings.index') }}">Peminjaman</a>
                    </nav>
                </aside>

                <!-- Content -->
                <main id="main-content">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Berhasil:</strong> {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Tutup"></button>
                        </div>
                    @endif

                    @if($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <ul class="mb-0">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Tutup"></button>
                        </div>
                    @endif

                    @yield('content')
                </main>
            </div>

            <!-- Footer -->
            <footer class="site-footer">
                <span class="footer-mark">Sistem Informasi Perpustakaan Sederhana</span> &bull; Zaki, Rizqi, Zhilan
            </footer>
        </div>

    @else

        <!-- Guest Content: Login -->
        @yield('content')

    @endif

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
