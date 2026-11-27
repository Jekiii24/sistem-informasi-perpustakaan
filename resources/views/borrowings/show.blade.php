@extends('layouts.app')

@section('content')
    <div class="page-head">
        <div>
            <h1>Detail Peminjaman</h1>
            <p class="page-head-sub">{{ $borrowing->member->name }} &mdash; {{ $borrowing->borrow_date->format('d/m/Y') }}
            </p>
        </div>
        <div class="d-flex gap-2">
            <a href="{{ route('borrowings.index') }}" class="btn btn-secondary">Kembali</a>
            @if($borrowing->status === 'borrowed' && in_array(auth()->user()->role, ['admin', 'petugas']))
                <a href="{{ route('borrowings.returnBook', $borrowing->id) }}" class="btn btn-success">Kembalikan</a>
            @endif
        </div>
    </div>

    <div class="detail-card mb-4">
        <dl class="detail-list">
            <div class="detail-row">
                <dt>Anggota</dt>
                <dd>{{ $borrowing->member->name }}</dd>
            </div>
            <div class="detail-row">
                <dt>Petugas</dt>
                <dd>{{ $borrowing->user->name }}</dd>
            </div>
            <div class="detail-row">
                <dt>Tanggal Pinjam</dt>
                <dd>{{ $borrowing->borrow_date->format('d/m/Y') }}</dd>
            </div>
            <div class="detail-row">
                <dt>Jatuh Tempo</dt>
                <dd>{{ $borrowing->due_date->format('d/m/Y') }}</dd>
            </div>
            <div class="detail-row">
                <dt>Tanggal Kembali</dt>
                <dd>{{ $borrowing->return_date ? $borrowing->return_date->format('d/m/Y') : '—' }}</dd>
            </div>
            <div class="detail-row">
                <dt>Status</dt>
                <dd>
                    <span class="badge @if($borrowing->status === 'borrowed') bg-warning @else bg-success @endif">
                        {{ ucfirst($borrowing->status) }}
                    </span>
                </dd>
            </div>
        </dl>
    </div>

    <h3 class="section-title">Detail Buku</h3>
    <div class="table-wrap">
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
@endsection