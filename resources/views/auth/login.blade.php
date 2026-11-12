@extends('layouts.app')

@section('title', 'Login')

@section('content')

    <style>
        body {
            background: #f1f5f9;
            min-height: 100vh;
        }

        .login-wrapper {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 30px 15px;
        }

        .login-card {
            width: 100%;
            max-width: 1000px;
            min-height: 570px;
            background: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 15px 45px rgba(15, 23, 42, 0.10);
        }

        .login-brand {
            background: linear-gradient(145deg, #0f172a, #1e40af);
            color: white;
            padding: 55px 45px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            height: 100%;
        }

        .brand-icon {
            font-size: 55px;
            margin-bottom: 25px;
        }

        .brand-title {
            font-size: 30px;
            font-weight: 700;
            line-height: 1.4;
        }

        .brand-description {
            color: #cbd5e1;
            line-height: 1.8;
            margin-top: 15px;
        }

        .login-form {
            padding: 65px 55px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .login-heading {
            font-size: 29px;
            font-weight: 700;
            color: #0f172a;
        }

        .login-subheading {
            color: #64748b;
            margin-bottom: 35px;
        }

        .form-label {
            font-weight: 600;
            color: #334155;
            font-size: 14px;
        }

        .form-control {
            padding: 12px 15px;
            border-radius: 9px;
            border: 1px solid #cbd5e1;
        }

        .form-control:focus {
            border-color: #2563eb;
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.12);
        }

        .btn-login {
            background: #1e40af;
            color: white;
            padding: 13px;
            border-radius: 9px;
            font-weight: 600;
            border: none;
            transition: 0.2s;
        }

        .btn-login:hover {
            background: #1d4ed8;
            color: white;
        }

        .login-footer {
            color: #94a3b8;
            font-size: 12px;
            margin-top: 35px;
            text-align: center;
        }

        @media (max-width: 767px) {
            .login-brand {
                padding: 35px 30px;
                min-height: 260px;
            }

            .brand-title {
                font-size: 24px;
            }

            .brand-icon {
                font-size: 40px;
                margin-bottom: 10px;
            }

            .login-form {
                padding: 40px 25px;
            }
        }
    </style>

    <div class="login-wrapper">
        <div class="login-card">
            <div class="row g-0 h-100">

                <!-- Bagian Branding -->
                <div class="col-md-5">
                    <div class="login-brand">

                        <div class="brand-icon">
                            &#128218;
                        </div>

                        <h1 class="brand-title">
                            Sistem Informasi Perpustakaan
                        </h1>

                        <p class="brand-description">
                            Selamat datang di sistem informasi
                            perpustakaan. Kelola koleksi buku,
                            anggota, dan transaksi peminjaman
                            dalam satu platform.
                        </p>

                        <div class="mt-4">
                            <small class="text-light opacity-75">
                                Perpustakaan Sederhana
                            </small>
                        </div>

                    </div>
                </div>

                <!-- Bagian Form Login -->
                <div class="col-md-7">
                    <div class="login-form">

                        <h2 class="login-heading">
                            Selamat Datang!
                        </h2>

                        <p class="login-subheading">
                            Silakan masuk menggunakan akun Anda.
                        </p>

                        @if(session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        @if($errors->any())
                            <div class="alert alert-danger">
                                {{ $errors->first() }}
                            </div>
                        @endif

                        <form action="{{ url('/login') }}" method="POST">
                            @csrf

                            <div class="mb-4">
                                <label for="email" class="form-label">
                                    Alamat Email
                                </label>

                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                                    name="email" placeholder="Masukkan email Anda" value="{{ old('email') }}"
                                    autocomplete="username" required autofocus>

                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="password" class="form-label">
                                    Password
                                </label>

                                <input type="password" class="form-control" id="password" name="password"
                                    placeholder="Masukkan password Anda" autocomplete="current-password" required>
                            </div>

                            <button type="submit" class="btn btn-login w-100">
                                Masuk ke Sistem
                            </button>

                        </form>

                        <div class="login-footer">
                            &copy; {{ date('Y') }} Sistem Informasi Perpustakaan.
                            All Rights Reserved.
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection