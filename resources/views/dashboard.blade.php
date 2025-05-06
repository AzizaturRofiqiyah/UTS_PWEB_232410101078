@extends('layout.main')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Welcome Admin!!</h2>
    <table class="table table-boardered text-center align-middle">
    <thead class="table-dark">
        <tr>
            <th>Gambar</th>
            <th>Judul</th>
            <th>Penulis</th>
            <th>Stok</th>
            <th>Kategori</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($books as $book)
            @if(isset($book['gambar'], $book['judul'], $book['penulis'], $book['kategori']))
                <tr>
                    <td><img src="{{ $book['gambar'] }}" alt="{{ $book['judul'] }}" width="80" class="img-thumbnail"></td>
                    <td>{{ $book['judul'] }}</td>
                    <td>{{ $book['penulis'] }}</td>
                    <td>{{ $book['stok'] }}</td>
                    <td>{{ $book['kategori'] }}</td>
                </tr>
            @else
                <tr>
                    <td  colspan="5" class="text-danget">Data buku tidak lengkap</td>
                </tr>
            @endif
        @empty
            <tr>
                <td colspan="5" class="text-center">Buku belum Tersedia, Silahkan cek Secara Berkala</td>
            </tr>
        @endforelse
    </tbody>
    </table>

</div>
@endsection
