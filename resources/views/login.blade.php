@extends('layout.main')

@section('content')
<div class="container mt-5">
    <h2 class="text-center">Login Admin Perpustakaan</h2>

    @if ($errors->any())
        <div class="alert alert-danger mt-3">
            {{ $errors->first() }}
        </div>
    @endif

    <form action="/login" method="POST" class="mt-4">
        @csrf
        <div class="mb-3">
            <label for="username" class="form-label">Username:</label>
            <input type="text" name="username" id="username" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password:</label>
            <input type="password" name="password" id="password" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary w-100">Login</button>
    </form>
</div>
@endsection
