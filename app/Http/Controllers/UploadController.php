<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Contracts\Cache\Store;

class UploadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('upload.index', [
            'title' => 'Upload',
            'css_name' => ['navbar', 'books'],
            'books' => Book::where('author_id', auth()->user()->id)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('upload.create', [
            'title' => 'Upload',
            'css_name' => ['navbar'],
            'categories' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required|unique:books',
            'isbn' => 'required|unique:books|numeric|min_digits:8',
            'price' => 'required|numeric|min_digits:4',
            'categories' => 'required',
            'cover' => 'required|image|file|max:102400',
            'desc' => 'required'
        ]);
        $validated['author_id'] = auth()->user()->id;
        $validated['page'] = 50;
        $category_book = $validated['categories'];
        $validated['published_at'] = now();
        $validated['cover'] = $request->file('cover')->store('cover-images');
        unset($validated['categories']);
        
        $book = Book::create($validated);
        $book->category()->sync($category_book);

        return redirect('/upload')->with('success', 'Berhasil Mengupload Buku!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $upload)
    {
        return view('book', [
            'title' => $upload->title,
            'css_name' => ['navbar'],
            'book' => $upload
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $upload)
    {
        return view('upload.edit', [
            'title' => 'Upload',
            'css_name' => ['navbar'],
            'categories' => Category::all(),
            'book' => $upload
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $upload)
    {
        $rules = [
            'title' => 'required|max:255',
            'price' => 'required|numeric|min_digits:4',
            'categories' => 'required',
            'desc' => 'required'
        ];

        if($request->slug != $upload->slug){
            $rules['slug'] = 'required|unique:books';
        }
        if($request->file('cover')){
            $rules['cover'] = 'required|image|file|max:102400';
        }
        if($request->isbn != $upload->isbn){
            $rules['isbn'] = 'required|unique:books|numeric|min_digits:8';
        }

        $validated = $request->validate($rules);

        $validated['author_id'] = auth()->user()->id;
        $validated['page'] = 50;
        $category_book = $validated['categories'];
        $validated['published_at'] = $upload->published_at;
        unset($validated['categories']);
        if($request->file('cover')){
            if($upload->cover){
                Storage::delete($upload->cover);
            }
            $validated['cover'] = $request->file('cover')->store('cover-images');
        }

        Book::where('id', $upload->id)->update($validated);
        $upload->category()->sync($category_book);

        return redirect('/upload')->with('success', 'Berhasil Mengupdate Buku!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $upload)
    {
        Storage::delete($upload->cover);
        Book::destroy($upload->id);
        return redirect('/upload')->with('success', 'Berhasil Menghapus Buku!');
    }

    public function checkSlug(Request $request){
        $slug = SlugService::createSlug(Book::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
}