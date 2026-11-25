# Sistem Informasi Perpustakaan Sederhana

Project Final Mata Kuliah Web Programming - Laravel.

## Fitur Utama
- **Authentication**: Login & Logout dengan sistem Role.
- **Role Management**:
  - **Admin**: Akses penuh ke semua modul (User, Kategori, Buku, Anggota, Transaksi).
  - **Petugas**: Akses modul Kategori (lihat), Buku, Anggota, dan Transaksi.
- **Master Data**: CRUD User, Kategori, Buku, dan Anggota.
- **Borrowing Management**:
  - Pencatatan peminjaman dengan detail buku.
  - Due date otomatis (7 hari).
  - Manajemen stok otomatis (pinjam mengurangi stok, kembali menambah stok).
- **Dashboard**: Statistik ringkasan data perpustakaan.

## Teknologi
- Laravel 13
- PHP 8.5
- MySQL / PostgreSQL
- Tailwind CSS

## Cara Instalasi
1. Clone repository.
2. Jalankan `composer install`.
3. Salin `.env.example` ke `.env` dan atur koneksi database.
4. Jalankan `php artisan key:generate`.
5. Jalankan `php artisan migrate --seed`.
6. Jalankan `npm install && npm run dev` (jika menggunakan frontend asset).
7. Jalankan `php artisan serve`.

## Anggota Kelompok
- [Nama Mahasiswa 1]
- [Nama Mahasiswa 2]
- [Nama Mahasiswa 3]
