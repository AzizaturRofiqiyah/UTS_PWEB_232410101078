@extends('layout.main')

@section('content')
    <div class="container mt-5">
        <h2 class="mb-4">Welcome Admin</h2>
        <div class="card p-4 d-flex align-items-center" style="max-width: 400px; margin: auto;">
            <img src="{{ $user['foto'] }}" alt="Foto admin" class="rounded-circle mb-3" width="120" height="120">
            <p><strong>Nama:</strong> {{ $user['nama'] }}</p>
            <p><strong>Username:</strong> {{ $user['username'] }}</p>
            <p><strong>Email:</strong> {{ $user['email'] }}</p>
            <p><strong>Role:</strong> {{ $user['role'] }}</p>
        </div>
    </div>
@endsection
