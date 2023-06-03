<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HistoryController extends Controller
{
    public function index(){
        return view('history', [
            'title' => 'History',
            'css_name' => ['navbar', 'history'],
            'orders' => auth()->user()->order()->where('status', true)->orderBy('order_at', 'asc')->get()
        ]);
    }
}
