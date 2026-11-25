@extends('layouts.app')

@section('title', 'Login')

@push('styles')
    <style>
        body {
            background: var(--paper);
        }

        .login-page {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem 1rem;
        }

        .login-card {
            width: 100%;
            max-width: 920px;
            display: grid;
            grid-template-columns: 5fr 7fr;
            background: var(--surface);
            border: 1px solid var(--line);
            border-radius: var(--radius);
            overflow: hidden;
            box-shadow: 0 1px 0 var(--line);
        }

        .login-aside {
            background: var(--ink);
            color: var(--paper);
            padding: 3rem 2.5rem;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .login-aside .aside-rule {
            width: 48px;
            height: 3px;
            background: var(--accent);
            margin-bottom: 1.5rem;
        }

        .login-aside h1 {
            color: var(--paper);
            font-size: 1.9rem;
            line-height: 1.25;
            margin-bottom: 0.9rem;
        }

        .login-aside p {
            color: rgba(250, 250, 248, 0.72);
            font-size: 0.92rem;
            line-height: 1.7;
            margin: 0;
        }

        .login-aside .aside-code {
            margin-top: 2rem;
            font-family: var(--font-serif);
            font-size: 0.8rem;
            letter-spacing: 0.18em;
            color: rgba(250, 250, 248, 0.4);
        }

        .login-main {
            padding: 3rem 2.75rem;
        }

        .login-main h2 {
            font-size: 1.6rem;
            margin-bottom: 0.35rem;
        }

        .login-main .login-sub {
            color: var(--muted);
            font-size: 0.9rem;
            margin-bottom: 1.75rem;
        }

        .login-main .btn {
            padding-block: 0.65rem;
        }

        .login-foot {
            margin-top: 1.75rem;
            color: var(--muted);
            font-size: 0.78rem;
            text-align: center;
        }

        @media (max-width: 767.98px) {
            .login-card {
                grid-template-columns: 1fr;
            }

            .login-aside {
                padding: 2rem 1.75rem;
            }

            .login-aside h1 {
                font-size: 1.5rem;
            }

            .login-aside .aside-code {
                display: none;
            }

            .login-main {
                padding: 2rem 1.75rem;
            }
        }
    </style>
@endpush

@section('content')
    <div class="login-page">
        <div class="login-card">
            <div class="login-aside">
                <div class="aside-rule"></div>
                <h1>Sistem Informasi Perpustakaan</h1>
                <p>Kelola koleksi buku, anggota, dan transaksi peminjaman dalam satu tempat yang tertata.</p>
                <span class="aside-code">025 . 1 — KATALOG</span>
            </div>

            <div class="login-main">
                <h2>Selamat datang</h2>
                <p class="login-sub">Masuk menggunakan akun Anda untuk melanjutkan.</p>

                @if(session('status'))
                    <div class="alert alert-success" role="alert">{{ session('status') }}</div>
                @endif

                @if($errors->any())
                    <div class="alert alert-danger" role="alert">{{ $errors->first() }}</div>
                @endif

                <form action="{{ url('/login') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="email" class="form-label">Alamat Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                            name="email" placeholder="nama@contoh.id" value="{{ old('email') }}" autocomplete="username"
                            required autofocus>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password"
                            placeholder="Masukkan password" autocomplete="current-password" required>
                    </div>

                    <button type="submit" class="btn btn-primary w-100">Masuk ke Sistem</button>
                </form>

                <div class="login-foot">&copy; {{ date('Y') }} Sistem Informasi Perpustakaan</div>
            </div>
        </div>
    </div>
@endsection
