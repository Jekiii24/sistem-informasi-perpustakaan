@extends('layouts.app')

@section('content')
    <div class="page-head">
        <div>
            <h1>Daftar Kategori</h1>
            <p class="page-head-sub">Kelola klasifikasi koleksi perpustakaan.</p>
        </div>
        @if(auth()->user()->role === 'admin')
            <a href="{{ route('categories.create') }}" class="btn btn-primary">Tambah Kategori</a>
        @endif
    </div>

    <div class="table-wrap">
        <table class="table align-middle">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Deskripsi</th>
                    <th>Jumlah Buku</th>
                    @if(auth()->user()->role === 'admin')
                        <th class="text-end">Aksi</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @forelse($categories as $cat)
                    <tr>
                        <td class="serif">{{ $cat->name }}</td>
                        <td>{{ $cat->description }}</td>
                        <td>{{ $cat->books_count }}</td>
                        @if(auth()->user()->role === 'admin')
                            <td class="text-end">
                                <a href="{{ route('categories.edit', $cat->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('categories.destroy', $cat->id) }}" method="POST" class="d-inline">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Hapus kategori ini?')">Hapus</button>
                                </form>
                            </td>
                        @endif
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center muted py-4">Belum ada kategori.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection