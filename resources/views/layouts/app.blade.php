<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perpustakaan Sederhana - @yield('title', 'Dashboard')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    @stack('styles')
</head>

<body class="d-flex flex-column min-vh-100">

    @if (!request()->routeIs('login'))

        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ route('dashboard') }}">Perpustakaan Sederhana</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a>
                        </li>
                        @can('admin')
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('users.index') }}">User</a>
                            </li>
                        @endcan
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('categories.index') }}">Kategori</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('books.index') }}">Buku</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('members.index') }}">Anggota</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('borrowings.index') }}">Peminjaman</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}"
                                onclick="return confirm('Yakin logout?')">Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Main Layout -->
        <div class="container mt-4">
            <div class="row">
                <!-- Sidebar -->
                <aside class="col-md-3">
                    <nav class="flex-column nav flex-scroll">
                        <a class="nav-link active" href="{{ route('dashboard') }}">Dashboard</a>
                        @can('admin')
                            <a class="nav-link" href="{{ route('users.index') }}">User</a>
                        @endcan
                        <a class="nav-link" href="{{ route('categories.index') }}">Kategori</a>
                        <a class="nav-link" href="{{ route('books.index') }}">Buku</a>
                        <a class="nav-link" href="{{ route('members.index') }}">Anggota</a>
                        <a class="nav-link" href="{{ route('borrowings.index') }}">Peminjaman</a>
                    </nav>
                </aside>

                <!-- Content -->
                <main class="col-md-9">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show">
                            <strong>Berhasil:</strong> {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    @if($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show">
                            <ul class="mb-0">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    @yield('content')
                </main>
            </div>
        </div>

        <!-- Footer -->
        <footer class="text-center text-muted py-3 mt-4 border-top">
            <small>Sistem Informasi Perpustakaan Sederhana &bull; Zaki, Rizqi, Zhilan</small>
        </footer>

    @else

        <!-- Guest Content: Login -->
        @yield('content')

    @endif

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>