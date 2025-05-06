@extends('layout.main')

@section('content')
    <div class="container mt-4">
        <h2 class="mb-4">Pengelolaan Buku</h2>
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>Gambar</th>
                    <th>Judul</th>
                    <th>Penulis</th>
                    <th>Stok</th>
                    <th>Kategori</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($books as $index => $book )
                    <tr>
                            <td><img src="{{ $book['gambar'] }}" alt="{{ $book['judul'] }}" width="80" class="img-thumbnail"></td>
                            <td>{{ $book['judul'] }}</td>
                            <td>{{ $book['penulis'] }}</td>
                            <td>
                                <form action="{{ url('/pengelolaan/update/' . $index) }}" method="POST" class="d-flex justtity-content-center">
                                    @csrf
                                    @method('PATCH')
                                    <input type="number" name="stok" value="{{ $book['stok'] }}" class="form-control" min="0" style="width: 80px; margin: auto;">
                            </td>
                            <td>{{ $book['kategori'] }}</td>
                            <td>
                                <input type="hidden" name="username" value="{{ $username }}">
                                <button type="submit" class="btn btn-sm btn-success">Simpan</button>
                            </form>
                        </td>
                    </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
