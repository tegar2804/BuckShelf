<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InvoiceController extends Controller
{
    public function index(Order $order){
        if(auth()->user()->id != $order->user->id){
            abort(401, "akses dilarang");
        }
        return view('invoice', [
            'title' => 'Invoice',
            'css_name' => ['invoice'],
            'order' => $order
        ]);
    }
}
