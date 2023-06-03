<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Book;
use App\Models\Collection;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Purchased
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, Book $book): Response
    {
        if(auth()->guest()){
            abort(403);
        }
        $collection = Collection::where('user_id', auth()->user()->id)->where('book_id', $book->id);
        if(!$collection){
            abort(403);
        }
        return $next($request);
    }
}
