<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function loginPage()
    {
        return view ('login');
    }

    public function loginProcess(Request $request)
    {
        $username =$request->input('username');
        $password = $request->input('password');

        if ($username === 'admin' && $password === 'admin123') {
            session(['books' => $this->getDefaultBooks()]);
            return redirect('/dashboard?username=' . $username);
        }

        return redirect('/login')->withErrors(['message' => 'username atau password salah']);
    }

    private function getDefaultBooks()
    {
        return [
            [
                'judul' => '5cm',
                'penulis' => 'Donny Dhirgantoro',
                'stok' => 4,
                'kategori' => 'Fiksi',
                'gambar' => 'https://images-na.ssl-images-amazon.com/images/S/compressed.photo.goodreads.com/books/1598061221i/55059013.jpg',
            ],
            [
                'judul' => 'Anatomi tubuh Manusia',
                'penulis' => 'Dr. Jaka Sunardi, M.Kes., AIFO',
                'stok' => 2,
                'kategori' => 'Non-Fiksi',
                'gambar' => 'https://cdn.gramedia.com/uploads/picture_meta/2023/6/15/zwkumgkkwm9er8zvwevvmt.jpg',
            ],
            [
                'judul' => 'One Piece',
                'penulis' => 'Eiichiro Oda',
                'stok' => 3,
                'kategori' => 'Komik',
                'gambar' => 'https://cdn.gramedia.com/uploads/picture_meta/2023/7/18/r6nezrwzruebpygb3couzq.jpg',
            ],
            [
                'judul' => 'Tanah Bangsawan',
                'penulis' => 'Filia Nur',
                'stok' => 2,
                'kategori' => 'Fiksi',
                'gambar' => 'https://images.tokopedia.net/img/cache/700/VqbcmM/2022/11/9/b4a41c97-ab98-4ea2-b671-97dc4f87900c.jpg',
            ],
            [
                'judul' => 'Halte Alam Baka',
                'penulis' => 'Kai Elian',
                'stok' => 2,
                'kategori' => 'Fiksi',
                'gambar' => 'https://image.gramedia.net/rs:fit:0:0/plain/https://cdn.gramedia.com/uploads/product-metas/-a7x10ak42.jpg',
            ],
            [
                'judul' => 'Ikhlas Penuh Luka',
                'penulis' => 'Boy Chandra',
                'stok' => 5,
                'kategori' => 'Fiksi',
                'gambar' => 'https://image.gramedia.net/rs:fit:0:0/plain/https://cdn.gramedia.com/uploads/product-metas/3e3235hnvk.jpg',
            ],
            [
                'judul' => 'Little Book World Classic: The Dream of an Hour and Other Stories',
                'penulis' => 'Kate Chopin',
                'stok' => 7,
                'kategori' => 'Non Fiksi',
                'gambar' => 'https://image.gramedia.net/rs:fit:0:0/plain/https://cdn.gramedia.com/uploads/product-metas/hs-hsorh-0.jpg',
            ]
            ];
    }

    public function dashboard(Request $request)
    {
        $username = $request->query('username');

        $books = session('books');

        if (!$books) {
            $books = $this->getDefaultBooks();
            session(['books' => $books]);
    }

        if ($request->has('kategori') && $request->kategori != '') {
            $books = array_filter($books, function ($book) use ($request) {
                return $book['kategori'] == $request->kategori;
            });
        }

        return view('dashboard', [
            'username' => $username,
            'books' => $books,
        ]);
    }

    public function pengelolaan(Request $request)
    {
        $books = session('books');

        if (!$books) {
            $books = $this->getDefaultBooks();
            session(['books' => $books]);
        }

        return view('pengelolaan', [
            'username' => $request->query('username'),
            'books' => $books,
        ]);
    }

    public function updateStok(Request $request, $index)
    {
        $books =  session('books', []);

        if (isset($books[$index])) {
            $books[$index]['stok'] = $request->input('stok');
            session(['books' => $books]);
        }

        $username = $request->query('username', 'admin');
        return redirect('/pengelolaan?username=admin')->with('success', 'Stok buku berhasil di update!!');

    }

    public function profile(Request $request)
    {
        $user = [
            'nama' => 'Admin perpus',
            'username' => 'admin',
            'email' => 'admin@perpus',
            'role' => 'admin',
            'foto' => 'https://i.pinimg.com/736x/46/95/57/4695579cc3e0c6928801ae1316f66e61.jpg',
        ];
        return view('profile', [
            'user' => $user
        ]);
    }
}
