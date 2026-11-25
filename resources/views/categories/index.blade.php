@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Daftar Kategori</h1>

    @if(auth()->user()->role === 'admin')
        <a href="{{ route('categories.create') }}" class="btn btn-primary">Tambah Kategori</a>
    @endif

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table mt-3">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Deskripsi</th>
                <th>Jumlah Buku</th>
                @if(auth()->user()->role === 'admin')
                    <th>Aksi</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $cat)
            <tr>
                <td>{{ $cat->name }}</td>
                <td>{{ $cat->description }}</td>
                <td>{{ $cat->books->count() }}</td>
                @if(auth()->user()->role === 'admin')
                <td>
                    <a href="{{ route('categories.edit', $cat->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('categories.destroy', $cat->id) }}" method="POST" style="display:inline;">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                </td>
                @endif
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
