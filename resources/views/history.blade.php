@extends('layouts.main')

@section('container')
<div class="container-history">
    <h1>Riwayat Transaksi</h1>
    @php
        $i = 0;
        $max = $orders->count();
    @endphp
    @while($i < $max)
    <div class="dated-order-box">
        <h3>{{ (new DateTime($orders[$i]->order_at))->format('d M Y') }}</h3>
        @while(true)
            <a href="/invoice/{{ $orders[$i]->id }}">
                <div class="order-box">
                    @php
                        $order_id = $orders[$i]->id;
                        while(Str::length($order_id) < 5){
                            $order_id = "0".$order_id;
                        }
                    @endphp
                    <p class="id-order"><strong>{{ "BS".$order_id }}</strong></p>
                    <p>{{ $orders[$i]->method->name }}</p>
                    <div class="highlight-order">
                        <p class="book-total">Total Buku: {{ $orders[$i]->book_total }}</p>
                        <p class="price-total"><strong>{{ 'Rp'.number_format($orders[$i]->price_total, 0, ',', '.') }}</strong><p>
                    </div>
                </div>
            </a>
            @if(++$i >= $max || (new DateTime($orders[$i]->order_at))->format('d M Y') != (new DateTime($orders[$i-1]->order_at))->format('d M Y'))
                @break
            @endif
        @endwhile
    </div>
    @endwhile
</div>
@endsection