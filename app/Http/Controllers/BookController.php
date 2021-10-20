<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        return view('Books.index', [
            'books' => Book::latest()->filter(request(['search']))->paginate(5)->withQueryString()
        ]);
    }

    public function detail(Book $book)
    {
        return view('Books.show', [
            'book' => $book
        ]);
    }
}
