<?php

namespace App\Providers;

use App\Models\Book;
use App\Models\User;
use App\Models\Order;
use App\Models\DetailOrder;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

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
        
        Gate::define('inCart', function(User $user, Book $book){
            $cart = Book::whereIn('id', DetailOrder::whereIn('order_id', 
                Order::where('user_id', $user->id)
                ->pluck('id')
                ->toArray())
                    ->pluck('book_id')
                    ->toArray())
            ->get()
            ->find($book->id);
            return !is_null($cart);
        });
    }
}
