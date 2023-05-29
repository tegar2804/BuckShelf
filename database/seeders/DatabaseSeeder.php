<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Book;
use App\Models\BookCategory;
use App\Models\Category;
use App\Models\Method;
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
        User::create([
            'email' => 'abcde@gmail.com',
            'name' => 'Abcde Efghi',
            'password' => bcrypt('abcde123'),
            'phone' => '089665311527',
            'gender' => 'L'
            // 'isAdmin' => 1
        ]);
        
        Book::factory(10)->create();

        Category::create([
            'name' => 'Klasik',
            'slug' => 'klasik',
            'image' => 'classic.svg'
        ]);
        
        Category::create([
            'name' => 'Fiksi',
            'slug' => 'fiksi',
            'image' => 'fiction.svg'
        ]);
        
        Category::create([
            'name' => 'Novel',
            'slug' => 'novel',
            'image' => 'novel.svg'
        ]);

        Category::create([
            'name' => 'Kamus',
            'slug' => 'kamus',
            'image' => 'dict.svg'
        ]);

        Category::create([
            'name' => 'Majalah',
            'slug' => 'majalah',
            'image' => 'magz.svg'
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

        Method::create([
            'name' => 'Gopay'
        ]);
        
        Method::create([
            'name' => 'Dana'
        ]);
        
        Method::create([
            'name' => 'ShopeePay'
        ]);
    }
}
