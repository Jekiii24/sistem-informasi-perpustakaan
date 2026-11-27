<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perpustakaan Sederhana - @yield('title', 'Dashboard')</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @stack('styles')
</head>

<body>
    <a class="skip-link" href="#main-content">Lewati ke konten</a>

    @if (!request()->routeIs('login'))

        <div class="app-shell">
            <!-- Sidebar -->
            <aside class="sidebar">
                <div class="sidebar-brand">
                    <span class="sidebar-brand-icon">P</span>
                    <span class="sidebar-brand-text">Siperpus</span>
                </div>
                <nav class="sidebar-nav">
                    <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}"
                        href="{{ route('dashboard') }}">
                        <span class="nav-icon">&square;</span> Dashboard
                    </a>
                    @can('admin')
                        <a class="nav-link {{ request()->routeIs('users.*') ? 'active' : '' }}"
                            href="{{ route('users.index') }}">
                            <span class="nav-icon">&square;</span> User
                        </a>
                    @endcan
                    <a class="nav-link {{ request()->routeIs('categories.*') ? 'active' : '' }}"
                        href="{{ route('categories.index') }}">
                        <span class="nav-icon">&square;</span> Kategori
                    </a>
                    <a class="nav-link {{ request()->routeIs('books.*') ? 'active' : '' }}"
                        href="{{ route('books.index') }}">
                        <span class="nav-icon">&square;</span> Buku
                    </a>
                    <a class="nav-link {{ request()->routeIs('members.*') ? 'active' : '' }}"
                        href="{{ route('members.index') }}">
                        <span class="nav-icon">&square;</span> Anggota
                    </a>
                    <a class="nav-link {{ request()->routeIs('borrowings.*') ? 'active' : '' }}"
                        href="{{ route('borrowings.index') }}">
                        <span class="nav-icon">&square;</span> Peminjaman
                    </a>
                </nav>
                <div class="sidebar-footer">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-ghost">Logout</button>
                    </form>
                </div>
            </aside>

            <!-- Main -->
            <div class="app-main-wrapper">
                <header class="app-topbar">
                    <h1 class="topbar-title">@yield('title', 'Dashboard')</h1>
                    <div class="topbar-user">
                        <span>{{ auth()->user()->name ?? 'Guest' }}</span>
                        <span class="topbar-avatar">{{ strtoupper(substr(auth()->user()->name ?? 'G', 0, 1)) }}</span>
                    </div>
                </header>

                <main class="app-body" id="main-content">
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
        </div>

    @else

        <!-- Guest Content: Login -->
        @yield('content')

    @endif

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
