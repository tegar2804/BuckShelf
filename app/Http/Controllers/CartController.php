<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Order;
use App\Models\DetailOrder;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Collection;
use App\Models\Method;
use Illuminate\Auth\Events\Validated;

class CartController extends Controller
{
    public function index(){
        $order = Order::where('user_id', auth()->user()->id)->where('status', false)->first();
        if(!$order){
            $new_order = [
                'user_id' => auth()->user()->id,
                'method_id' => 0,
                'book_total' => 0,
                'price_total' => 0,
                'order_at' => now()
            ];
            $order = Order::create($new_order);
        }
        $items = DetailOrder::where('order_id', $order->id)->get();
        return view('cart',[
            'title' => 'Keranjang',
            'css_name' => ['navbar', 'cart'],
            'order' => $order,
            'methods' => Method::all(),
            'items' => $items
        ]);
    }

    public function addItem(Request $request)
    {
        $old_order = Order::where('user_id', auth()->user()->id)->where('status', false)->first();
        if(!$old_order){
            $new_order = [
                'user_id' => auth()->user()->id,
                'method_id' => 0,
                'book_total' => 0,
                'price_total' => 0,
                'order_at' => now()
            ];
            $old_order = Order::create($new_order);
        }
        $item = [];
        $item['book_id'] = $request->id;
        $item['order_id'] = $old_order->id;

        $book = Book::find($request->id);
        DetailOrder::create($item);
        $old_order->price_total += $book->price;
        $old_order->save();
        return redirect('/book/'.$book->slug)->with('success', 'Berhasil Menambahkan Ke Cart!');
    }

    public function removeItem($order_id, $book_id)
    {
        $detail = DetailOrder::where('order_id', $order_id)->where('book_id', $book_id);
        $order = $detail->first()->order;
        $order->price_total -= $detail->first()->book->price;
        $detail->delete();
        $order->save();

        return redirect('/cart');
    }

    public function payOrder(Request $request, Order $order)
    {
        $rules = [
            'method_id' => 'required',
            'book_total' => 'required|numeric|min:0|not_in:0'
        ];
        
        $validated = $request->validate($rules);
        
        $validated['user_id'] = auth()->user()->id;
        $validated['order_at'] = now();
        $validated['price_total'] = $order->price_total;
        $validated['status'] = true;
        
        $method = Method::find($validated['method_id']);

        if($method){
            // Order::where('id', $order->id)->where('user_id', auth()->user()->id)->update($validated);
            $details = DetailOrder::where('order_id', $order->id)->get();
            $order->update($validated);
            foreach($details as $detail){
                Collection::create([
                    'user_id' => $validated['user_id'],
                    'book_id' => $detail->book->id
                ]);
            }
            return redirect('/invoice/'.$order->id)->with('success', 'Ceritanya Udah Bayar!');
        }
        return redirect('/cart');
    }
}
