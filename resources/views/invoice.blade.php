@extends('layouts.main')

@section('container')
    <div class="invoice-container">
        <div class="invoice-d">
            <h1>Invoice Anda</h1>
            <ul>
                <li>Order Id: {{ $order->id }}</li>
                <li>Metode Pembayaran: {{ $order->method->name }}</li>
                <li>Jumlah Buku: {{ $order->book_total }}</li>
                <li>Total Harga: {{ $order->price_total }}</li>
            </ul>
            <a href="/"><i class="fas fa-arrow-left"></i></a>
        </div>
    </div>
@endsection