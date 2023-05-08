<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class CollectionController extends Controller
{
    public function index(){
        return view('books', [
            'title' => 'Koleksi',
            'header_title' => 'Koleksi Anda',
            'books' => Book::with('author')->latest()->get()
        ]);
    }
}
