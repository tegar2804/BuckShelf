<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function detail_order(){
        return $this->hasMany(DetailOrder::class);
    }

    public function method()
    {
        return $this->belongsTo(Method::class);
    }

    public function book(){
        return $this->belongsToMany(Book::class, 'detail_orders', 'order_id', 'book_id');
    }
}
