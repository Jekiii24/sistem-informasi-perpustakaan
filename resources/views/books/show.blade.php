@extends('layouts.app')

@section('content')
    <div class="page-head">
        <div>
            <h1>{{ $book->title }}</h1>
            <p class="page-head-sub">{{ $book->author }} &mdash; {{ $book->category->name }}</p>
        </div>
        <div class="d-flex gap-2">
            <a href="{{ route('books.index') }}" class="btn btn-secondary">Kembali</a>
            @if(auth()->user()->role === 'admin')
                <a href="{{ route('books.edit', $book->id) }}" class="btn btn-warning">Edit</a>
            @endif
        </div>
    </div>

    <div class="detail-card">
        @if($book->cover_image)
            <div class="mb-3">
                <img src="{{ Storage::url($book->cover_image) }}" alt="Cover {{ $book->title }}"
                    class="img-fluid rounded" style="max-height: 320px;">
            </div>
        @endif
        <dl class="detail-list">
            <div class="detail-row">
                <dt>ISBN</dt>
                <dd class="serif">{{ $book->isbn }}</dd>
            </div>
            <div class="detail-row">
                <dt>Pengarang</dt>
                <dd>{{ $book->author }}</dd>
            </div>
            <div class="detail-row">
                <dt>Penerbit</dt>
                <dd>{{ $book->publisher }}</dd>
            </div>
            <div class="detail-row">
                <dt>Kategori</dt>
                <dd>{{ $book->category->name }}</dd>
            </div>
            <div class="detail-row">
                <dt>Stok</dt>
                <dd>{{ $book->stock }}</dd>
            </div>
            <div class="detail-row">
                <dt>Deskripsi</dt>
                <dd>{{ $book->description ?: '—' }}</dd>
            </div>
        </dl>
    </div>
@endsection