<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Collection;
use Illuminate\Http\Request;

class CollectionController extends Controller
{
    public function index(){
        return view('books', [
            'title' => 'Koleksi',
            'css_name' => ['navbar', 'books'],
            'header_title' => 'Koleksi Anda',
            'books' => Book::with('author')
                        ->whereIn('id', Collection::where('user_id', auth()->user()->id)
                                            ->pluck('book_id')
                                            ->toArray())
                        ->get()
        ]);
    }

    public function rate(Request $request, Book $book)
    {
        $rules = [];
        if($request->rate != $book->rate){
            $rules['rate'] = 'required|numeric|min:0|max:5';
        }
        
        $validated = $request->validate($rules);
        
        Collection::where('book_id', $book->id)->where('user_id', auth()->user()->id)->update($validated);
        $col = Collection::where('book_id', $book->id)->where('rate', '>', 0);
        $total = $col->count();
        if($total > 0){
            $book->rating = (double) $col->sum('rate')/(1.0 * $total);
        }else{
            $book->rating = (double) $col->sum('rate');
        }
        $book->save();
        
        return redirect('/book/'.$book->slug)->with('rated', 'Rating berhasil di-upload!');
    }
}
