@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Anggota</h1>

    <form action="{{ route('members.update', $member->id) }}" method="POST">
        @csrf @method('PUT')

        <div class="mb-3">
            <label>Kode Anggota</label>
            <input type="text" name="member_code" class="form-control" value="{{ $member->member_code }}" required>
        </div>

        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="name" class="form-control" value="{{ $member->name }}" required>
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" value="{{ $member->email }}" required>
        </div>

        <div class="mb-3">
            <label>Telepon</label>
            <input type="text" name="phone" class="form-control" value="{{ $member->phone }}">
        </div>

        <div class="mb-3">
            <label>Alamat</label>
            <textarea name="address" class="form-control" rows="3">{{ $member->address }}</textarea>
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('members.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection