<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perpustakaan Sederhana - {{ $title ?? '' }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-dark bg-primary mb-3">
        <div class="container">
            <a class="navbar-brand" href="{{ route('dashboard') }}">Perpustakaan Sederhana</a>
            <a href="{{ route('logout') }}" class="btn btn-sm btn-danger">Logout</a>
        </div>
    </nav>

    <div class="container">
        <div class="row">
            <!-- Sidebar -->
            <aside class="col-md-2">
                <ul class="nav flex-column">
                    <li class="nav-item"><a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a></li>
                    @can('admin')
                        <li class="nav-item"><a class="nav-link" href="{{ route('users.index') }}">User</a></li>
                    @endcan
                    <li class="nav-item"><a class="nav-link" href="{{ route('categories.index') }}">Kategori</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('books.index') }}">Buku</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('members.index') }}">Anggota</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('borrowings.index') }}">Peminjaman</a></li>
                </ul>
            </aside>

            <!-- Content -->
            <main class="col-md-10">
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                @if($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show">
                        <ul class="mb-0">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                @yield('content')
            </main>
        </div>
    </div>

    <footer class="text-center text-muted mt-5 py-3 border-top">
        Sistem Informasi Perpustakaan &bull; Zaki, Rizqi, Zhilan
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>