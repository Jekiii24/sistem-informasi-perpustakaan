@extends('layouts.app')

@section('content')
    <div class="page-head">
        <div>
            <h1>Konfirmasi Pengembalian</h1>
            <p class="page-head-sub">Verifikasi fisik item sebelum pengembalian dicatat.</p>
        </div>
    </div>

    <div class="alert alert-info mb-4">
        <p class="mb-1"><strong>Anggota:</strong> {{ $borrowing->member->name }}</p>
        <p class="mb-1"><strong>Tgl Pinjam:</strong> {{ $borrowing->borrow_date->format('d/m/Y') }}</p>
        <p class="mb-0"><strong>Jatuh Tempo:</strong> {{ $borrowing->due_date->format('d/m/Y') }}</p>
    </div>

    <h3 class="section-title">Buku yang Dipinjam</h3>
    <div class="table-wrap mb-4">
        <table class="table align-middle">
            <thead>
                <tr>
                    <th>Judul Buku</th>
                    <th>Jumlah</th>
                </tr>
            </thead>
            <tbody>
                @foreach($borrowing->details as $detail)
                <tr>
                    <td class="serif">{{ $detail->book->title }}</td>
                    <td>{{ $detail->qty }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <form action="{{ route('borrowings.storeReturn', $borrowing->id) }}" method="POST" class="form-shell">
        @csrf

        <div class="alert alert-warning mb-3">
            Apakah Anda yakin seluruh item buku telah dikembalikan dalam kondisi lengkap?
        </div>

        <div class="form-actions">
            <button type="submit" class="btn btn-success">Konfirmasi Pengembalian</button>
            <a href="{{ route('borrowings.index') }}" class="btn btn-secondary">Batal</a>
        </div>
    </form>
@endsection