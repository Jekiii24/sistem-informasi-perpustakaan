@extends('layouts.app')

@section('content')
    <div class="page-head">
        <div>
            <h1>Detail Anggota</h1>
            <p class="page-head-sub">{{ $member->name }} &mdash; {{ $member->member_code }}</p>
        </div>
        <div class="d-flex gap-2">
            <a href="{{ route('members.index') }}" class="btn btn-secondary">Kembali</a>
            @if(auth()->user()->role === 'admin')
                <a href="{{ route('members.edit', $member->id) }}" class="btn btn-warning">Edit</a>
            @endif
        </div>
    </div>

    <div class="detail-card mb-4">
        <dl class="detail-list">
            <div class="detail-row">
                <dt>Email</dt>
                <dd>{{ $member->email }}</dd>
            </div>
            <div class="detail-row">
                <dt>Telepon</dt>
                <dd>{{ $member->phone ?: '—' }}</dd>
            </div>
            <div class="detail-row">
                <dt>Alamat</dt>
                <dd>{{ $member->address ?: '—' }}</dd>
            </div>
        </dl>
    </div>

    <h3 class="section-title">Riwayat Peminjaman</h3>
    @if($borrowings->count() > 0)
        <div class="table-wrap">
            <table class="table align-middle">
                <thead>
                    <tr>
                        <th>Tanggal Pinjam</th>
                        <th>Jatuh Tempo</th>
                        <th>Status</th>
                        <th>Buku</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($borrowings as $borrow)
                    <tr>
                        <td>{{ $borrow->borrow_date->format('d/m/Y') }}</td>
                        <td>{{ $borrow->due_date->format('d/m/Y') }}</td>
                        <td>
                            <span class="badge @if($borrow->status === 'borrowed') bg-warning @else bg-success @endif">
                                {{ ucfirst($borrow->status) }}
                            </span>
                        </td>
                        <td>
                            <ul class="mb-0 ps-3">
                            @foreach($borrow->details as $detail)
                                <li>{{ $detail->book->title }} ({{ $detail->qty }})</li>
                            @endforeach
                            </ul>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <p class="muted">Anggota ini belum memiliki riwayat peminjaman.</p>
    @endif
@endsection