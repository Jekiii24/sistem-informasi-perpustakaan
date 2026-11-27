<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Informasi Perpustakaan</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        .landing {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .landing-top {
            border-bottom: 1px solid var(--line);
            background: var(--surface);
        }

        .landing-top .bar {
            max-width: 1140px;
            margin: 0 auto;
            padding: 0.9rem 1.5rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 0.7rem;
        }

        .brand-mark {
            width: 34px;
            height: 34px;
            background: var(--primary);
            color: #fff;
            display: grid;
            place-items: center;
            font-weight: 700;
            font-size: 1.1rem;
            border-radius: 8px;
        }

        .brand-name {
            font-weight: 700;
            font-size: 1.02rem;
            letter-spacing: -0.01em;
            color: var(--ink);
        }

        .landing-hero {
            flex: 1;
            display: grid;
            grid-template-columns: 1.15fr 0.85fr;
            gap: 3rem;
            align-items: center;
            max-width: 1140px;
            margin: 0 auto;
            padding: 3.5rem 1.5rem;
            width: 100%;
        }

        .kicker {
            font-size: 0.72rem;
            letter-spacing: 0.2em;
            text-transform: uppercase;
            color: var(--primary);
            margin-bottom: 1.1rem;
        }

        .landing-hero h1 {
            font-size: 3.1rem;
            line-height: 1.08;
            margin-bottom: 1.1rem;
            color: var(--ink);
        }

        .lead {
            font-size: 1.04rem;
            color: var(--ink-light);
            max-width: 34rem;
            margin-bottom: 1.9rem;
        }

        .hero-actions {
            display: flex;
            gap: 0.8rem;
            flex-wrap: wrap;
        }

        .btn {
            padding-block: 0.65rem;
            padding-inline: 1.4rem;
        }

        /* decorative card catalog */
        .catalog {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 0.65rem;
        }

        .catalog-item {
            background: var(--surface);
            border: 1px solid var(--line);
            padding: 0.9rem;
            min-height: 92px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .catalog-item .dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
        }

        .catalog-item .lines span {
            display: block;
            height: 5px;
            background: var(--line);
            margin-bottom: 5px;
        }

        .catalog-item .lines span:nth-child(1) { width: 88%; }
        .catalog-item .lines span:nth-child(2) { width: 62%; }
        .catalog-item .lines span:nth-child(3) { width: 74%; }

        .catalog-item.accent { background: var(--primary-soft); border-color: transparent; }
        .catalog-item.green { background: var(--success-soft); border-color: transparent; }
        .catalog-item.wood { background: var(--wood-soft); border-color: transparent; }

        .features {
            border-top: 1px solid var(--line);
            background: var(--surface);
        }

        .features-inner {
            max-width: 1140px;
            margin: 0 auto;
            padding: 3.25rem 1.5rem;
        }

        .section-head {
            display: flex;
            align-items: baseline;
            justify-content: space-between;
            gap: 1rem;
            margin-bottom: 2rem;
        }

        .section-head h2 {
            font-size: 1.7rem;
            margin: 0;
        }

        .feature-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 1.5rem;
        }

        .feature-card {
            border-top: 2px solid var(--primary);
            padding-top: 1.1rem;
        }

        .feature-card .ico {
            width: 34px;
            height: 34px;
            color: var(--primary);
            margin-bottom: 0.8rem;
        }

        .feature-card h3 {
            font-size: 1.08rem;
            margin-bottom: 0.45rem;
        }

        .feature-card p {
            font-size: 0.9rem;
            color: var(--ink-light);
            margin: 0;
        }

        .steps {
            max-width: 1140px;
            margin: 0 auto;
            padding: 3.25rem 1.5rem;
        }

        .step-row {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 1.25rem;
        }

        .step {
            background: var(--surface);
            border: 1px solid var(--line);
            padding: 1.35rem;
            position: relative;
        }

        .step .num {
            font-size: 2.1rem;
            font-weight: 700;
            color: var(--primary);
            line-height: 1;
            margin-bottom: 0.6rem;
        }

        .step h3 {
            font-size: 1rem;
            margin-bottom: 0.4rem;
        }

        .step p {
            font-size: 0.87rem;
            color: var(--ink-light);
            margin: 0;
        }

        .landing-foot {
            border-top: 1px solid var(--line);
            background: var(--ink);
            color: rgba(255, 255, 255, 0.72);
        }

        .landing-foot .inner {
            max-width: 1140px;
            margin: 0 auto;
            padding: 2.25rem 1.5rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 1rem;
            flex-wrap: wrap;
        }

        .landing-foot .foot-name {
            color: #fff;
            font-size: 1.05rem;
            font-weight: 600;
        }

        @media (max-width: 991.98px) {
            .landing-hero {
                grid-template-columns: 1fr;
                gap: 2.25rem;
                padding-top: 2.5rem;
            }

            .landing-hero h1 {
                font-size: 2.4rem;
            }

            .feature-grid,
            .step-row {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 575.98px) {
            .feature-grid,
            .step-row {
                grid-template-columns: 1fr;
            }

            .catalog {
                grid-template-columns: repeat(3, 1fr);
            }
        }
    </style>
</head>

<body>
    <div class="landing">
        <header class="landing-top">
            <div class="bar">
                <div class="brand">
                    <div class="brand-mark">P</div>
                    <span class="brand-name">Sistem Informasi Perpustakaan</span>
                </div>
                <a href="{{ route('login') }}" class="btn btn-primary">Masuk</a>
            </div>
        </header>

        <main>
            <section class="landing-hero">
                <div>
                    <p class="kicker">Perpustakaan &middot; Katalog &middot; Peminjaman</p>
                    <h1>Wadah pustaka tertata, dalam satu papan.</h1>
                    <p class="lead">
                        Sederhana mencatat koleksi buku, data anggota, dan alur peminjaman
                        dengan tanggal kembali otomatis 7 hari. Dikelola petugas, terbaca oleh siapa pun.
                    </p>
                    <div class="hero-actions">
                        <a href="{{ route('login') }}" class="btn btn-primary">Masuk ke Sistem</a>
                        <a href="#fitur" class="btn btn-outline-secondary">Lihat Fitur</a>
                    </div>
                </div>

                <div class="catalog" aria-hidden="true">
                    <div class="catalog-item">
                        <span class="dot" style="background: var(--stamp)"></span>
                        <div class="lines"><span></span><span></span><span></span></div>
                    </div>
                    <div class="catalog-item accent">
                        <span class="dot" style="background: var(--primary)"></span>
                        <div class="lines"><span></span><span></span><span></span></div>
                    </div>
                    <div class="catalog-item">
                        <span class="dot" style="background: var(--success)"></span>
                        <div class="lines"><span></span><span></span><span></span></div>
                    </div>
                    <div class="catalog-item wood">
                        <span class="dot" style="background: var(--wood)"></span>
                        <div class="lines"><span></span><span></span><span></span></div>
                    </div>
                    <div class="catalog-item">
                        <span class="dot" style="background: var(--primary)"></span>
                        <div class="lines"><span></span><span></span><span></span></div>
                    </div>
                    <div class="catalog-item green">
                        <span class="dot" style="background: var(--success)"></span>
                        <div class="lines"><span></span><span></span><span></span></div>
                    </div>
                </div>
            </section>

            <section class="features" id="fitur">
                <div class="features-inner">
                    <div class="section-head">
                        <h2>Fitur Utama</h2>
                        <a href="{{ route('login') }}" class="btn btn-secondary">Masuk untuk mulai</a>
                    </div>

                    <div class="feature-grid">
                        <div class="feature-card">
                            <svg class="ico" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="1.5" aria-hidden="true">
                                <path d="M4 5h11a2 2 0 0 1 2 2v12H6a2 2 0 0 1-2-2V5z" />
                                <path d="M17 7h3v12H6" />
                            </svg>
                            <h3>Katalog Buku</h3>
                            <p>Simpan judul, ISBN, pengarang, penerbit, kategori, stok, dan foto sampul buku.</p>
                        </div>

                        <div class="feature-card">
                            <svg class="ico" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="1.5" aria-hidden="true">
                                <circle cx="12" cy="8" r="3.4" />
                                <path d="M5 20a7 7 0 0 1 14 0" />
                            </svg>
                            <h3>Data Anggota</h3>
                            <p>Kelola identitas anggota, nomor anggota, dan tanggal bergabung.</p>
                        </div>

                        <div class="feature-card">
                            <svg class="ico" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="1.5" aria-hidden="true">
                                <rect x="3.5" y="5" width="17" height="15" />
                                <path d="M3.5 9h17M8 3.5v3M16 3.5v3" />
                            </svg>
                            <h3>Peminjaman</h3>
                            <p>Catat petugas, anggota, judul, tanggal pinjam, dan jatuh tempo 7 hari.</p>
                        </div>

                        <div class="feature-card">
                            <svg class="ico" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="1.5" aria-hidden="true">
                                <path d="M4 20V9M10 20V4M16 20v-7M22 20H2" />
                            </svg>
                            <h3>Statistik</h3>
                            <p>Empat angka ringkas di dashboard: buku, anggota, kategori, peminjaman.</p>
                        </div>
                    </div>
                </div>
            </section>

            <section class="steps">
                <div class="section-head">
                    <h2>Alur Kerja</h2>
                </div>

                <div class="step-row">
                    <div class="step">
                        <div class="num">01</div>
                        <h3>Tambah Koleksi</h3>
                        <p>Daftarkan buku baru lengkap dengan kategori dan foto sampul.</p>
                    </div>
                    <div class="step">
                        <div class="num">02</div>
                        <h3>Daftarkan Anggota</h3>
                        <p>Catat data peminjam agar identitasnya tersimpan rapi.</p>
                    </div>
                    <div class="step">
                        <div class="num">03</div>
                        <h3>Catat Peminjaman</h3>
                        <p>Pilih judul dan anggota, tentukan tanggal pinjam &amp; jatuh tempo.</p>
                    </div>
                    <div class="step">
                        <div class="num">04</div>
                        <h3>Pengembalian</h3>
                        <p>Simpan pengembalian, stok buku otomatis kembali bertambah.</p>
                    </div>
                </div>
            </section>
        </main>

        <footer class="landing-foot">
            <div class="inner">
                <div>
                    <div class="foot-name">Sistem Informasi Perpustakaan</div>
                    <div>&copy; {{ date('Y') }} &middot; Zaki, Rizqi, Zhilan</div>
                </div>
                <a href="{{ route('login') }}" class="btn btn-primary">Masuk ke Sistem</a>
            </div>
        </footer>
    </div>
</body>

</html>
