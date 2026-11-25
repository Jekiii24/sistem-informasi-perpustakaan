blade
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $member->name }}</h1>

    <div class="card mb-4">
        <div class="card-body">
            <table class="table table-borderless">
                <tr>
                    <td><strong>Kode Anggota</strong></td>
                    <td>{{ $member->member_code }}</td>
                </tr>
                <tr>
                    <td><strong>Email</strong></td>
                    <td>{{ $member->email }}</td>
                </tr>
                <tr>
                    <td><strong>Telepon</strong></td>
                    <td>{{ $member->phone }}</td>
                </tr>
                <tr>
                    <td><strong>Alamat</strong></td>
                    <td>{{ $member->address }}</td>
                </tr>
            </table>
        </div>
    </div>

    <h3>Riwayat Peminjaman</h3>
    @if($borrowings->count() > 0)
        <table class="table">
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
                        <ul>
                        @foreach($borrow->details as $detail)
                            <li>{{ $detail->book->title }} ({{ $detail->qty }})</li>
                        @endforeach
                        </ul>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Belum ada riwayat peminjaman.</p>
    @endif

    <a href="{{ route('members.index') }}" class="btn btn-secondary">Kembali</a>
    @if(auth()->user()->role === 'admin')
        <a href="{{ route('members.edit', $member->id) }}" class="btn btn-warning">Edit</a>
    @endif
</div>
@endsection