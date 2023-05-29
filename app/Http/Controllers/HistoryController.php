<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HistoryController extends Controller
{
    public function index(Order $order){
        return view('invoice', [
            'title' => 'Invoice',
            'css_name' => ['navbar', 'history'],
            'order' => $order
        ]);
    }
}
