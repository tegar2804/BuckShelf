<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use App\Models\User;
use App\Models\Book;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::define('isAdmin', function(User $user){
            return $user->IsAdmin;
        });
        
        Gate::define('author', function(User $user, Book $book){
            return $user->id == $book->author_id;
        });
        
        Gate::define('purchased', function(User $user, Book $book){
            return !is_null($user->book->find($book->id));
        });
    }
}
