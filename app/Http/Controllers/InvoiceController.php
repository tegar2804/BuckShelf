<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InvoiceController extends Controller
{
    public function index(Order $order){
        return view('invoice', [
            'title' => 'Invoice',
            'css_name' => ['navbar', 'invoice'],
            'order' => $order
        ]);
    }
}
