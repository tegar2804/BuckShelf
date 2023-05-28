<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        return view('categories', [
            'title' => 'Kategori',
            'css_name' => ['navbar', 'category'],
            'categories' => Category::all()
        ]);
    }
    
    // public function show(Category $category){
    //     return view('books', [
    //         'title' => $category->name,
    //         'header_title' => 'Kategori: '.$category->name,
    //         'book_categories' => $category->book_category
    //     ]);
    // }
}
