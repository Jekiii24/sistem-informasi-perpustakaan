@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Daftar Anggota</h1>

    @if(auth()->user()->role === 'admin')
        <a href="{{ route('members.create') }}" class="btn btn-primary">Tambah Anggota</a>
    @endif

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table mt-3">
        <thead>
            <tr>
                <th>Kode Anggota</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Telepon</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($members as $member)
            <tr>
                <td>{{ $member->member_code }}</td>
                <td>{{ $member->name }}</td>
                <td>{{ $member->email }}</td>
                <td>{{ $member->phone }}</td>
                <td>
                    <a href="{{ route('members.show', $member->id) }}" class="btn btn-info btn-sm">Detail</a>
                    @if(auth()->user()->role === 'admin')
                        <a href="{{ route('members.edit', $member->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('members.destroy', $member->id) }}" method="POST" style="display:inline;">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $members->links() }}
</div>
@endsection