<?php

namespace App\Models;

use App\Models\Book;
use App\Models\Order;
use App\Models\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;

    protected $guarded = ['id'];

    public function upload(){
        return $this->hasMany(Book::class);
    }

    public function collection(){
        return $this->hasMany(Collection::class);
    }

    public function book(){
        return $this->belongsToMany(Book::class, 'collections', 'user_id', 'book_id');
    }

    public function order(){
        return $this->hasMany(Order::class);
    }
}
