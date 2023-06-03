<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;

class BookController extends Controller
{
    public function index(){
        return view('home', [
            'title' => 'Buku',
            'css_name' => ['navbar', 'books'],
            'books' => Book::with('author')->latest()->take(5)->get(),
            'books_rate' => Book::with('author')->orderBy('rating', 'desc')->take(5)->get(),
            'books_ran' => Book::with('author')->orderBy(Book::raw('RAND()'))->take(5)->get()
        ]);
    }

    public function all(){
        if(request('category')){
            $cat = " Kategori ".((Category::where('slug', request('category'))->get())[0])->name;
        }else{
            $cat = "";
        }
        return view('books', [
            'title' => 'Buku',
            'css_name' => ['navbar', 'books'],
            'header_title' => 'Daftar Buku'.$cat,
            'books' => Book::latest()->filter(request(['search', 'category']))->paginate(20)->withQueryString()
        ]);
    }
    
    public function show(Book $book){
        return view('book', [
            'css_name' => ['navbar', 'book'],
            'title' => $book->title,
            'book' => $book
        ]);
    }
}
