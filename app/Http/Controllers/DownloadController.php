<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DownloadController extends Controller
{
    public function index(Book $book)
    {
        return response()->download(public_path('storage\\'.$book->book_file));
    }
}
