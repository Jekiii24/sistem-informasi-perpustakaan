@extends('layouts.app')

@section('content')
    <div class="page-head">
        <div>
            <h1>Manajemen User</h1>
            <p class="page-head-sub">Akun admin dan petugas yang dapat mengakses sistem.</p>
        </div>
        <a href="{{ route('users.create') }}" class="btn btn-primary">Tambah User</a>
    </div>

    <div class="table-wrap">
        <table class="table align-middle">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th class="text-end">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($users as $user)
                    <tr>
                        <td class="serif">{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <span class="badge @if($user->role === 'admin') bg-primary @else bg-secondary @endif">
                                {{ ucfirst($user->role) }}
                            </span>
                        </td>
                        <td class="text-end">
                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="d-inline">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Hapus user ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center muted py-4">Belum ada user.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection