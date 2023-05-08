<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BookController extends Controller
{
    public function index(){
        return view('home', [
            'title' => 'Buku',
            'books' => Book::with('author')->latest()->take(5)->get(),
            'books_ran' => Book::with('author')->orderBy(Book::raw('RAND()'))->take(5)->get()
        ]);
    }

    public function all(){
        return view('books', [
            'title' => 'Buku',
            'header_title' => 'Daftar Buku',
            'books' => Book::latest()->filter(request(['search', 'category']))->paginate(20)->withQueryString()
        ]);
    }
    
    public function show(Book $book){
        return view('book', [
            'title' => $book->title,
            'book' => $book
        ]);
    }
}
