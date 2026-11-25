blade
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Anggota</h1>

    <form action="{{ route('members.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Kode Anggota</label>
            <input type="text" name="member_code" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Telepon</label>
            <input type="text" name="phone" class="form-control">
        </div>

        <div class="mb-3">
            <label>Alamat</label>
            <textarea name="address" class="form-control" rows="3"></textarea>
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('members.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection