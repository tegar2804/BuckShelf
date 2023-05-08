<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Book;
use App\Models\BookCategory;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        User::factory(3)->create();
        Book::factory(10)->create();

        Category::create([
            'name' => 'Cat 1',
            'slug' => 'cat-1'
        ]);
        
        Category::create([
            'name' => 'Cat 2',
            'slug' => 'cat-2'
        ]);
        
        Category::create([
            'name' => 'Cat 3',
            'slug' => 'cat-3'
        ]);
        
        BookCategory::create([
            'book_id' => 1,
            'category_id' => 1
        ]);
        
        BookCategory::create([
            'book_id' => 1,
            'category_id' => 2
        ]);

        BookCategory::create([
            'book_id' => 2,
            'category_id' => 2
        ]);

        BookCategory::create([
            'book_id' => 3,
            'category_id' => 2
        ]);

        BookCategory::create([
            'book_id' => 3,
            'category_id' => 3
        ]);

        BookCategory::create([
            'book_id' => 4,
            'category_id' => 3
        ]);

        BookCategory::create([
            'book_id' => 5,
            'category_id' => 3
        ]);

        BookCategory::create([
            'book_id' => 6,
            'category_id' => 1
        ]);

        BookCategory::create([
            'book_id' => 7,
            'category_id' => 2
        ]);

        BookCategory::create([
            'book_id' => 8,
            'category_id' => 2
        ]);

        BookCategory::create([
            'book_id' => 9,
            'category_id' => 1
        ]);

        BookCategory::create([
            'book_id' => 10,
            'category_id' => 1
        ]);

        BookCategory::create([
            'book_id' => 10,
            'category_id' => 3
        ]);
    }
}
