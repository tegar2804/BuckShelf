@extends('layouts.main')

@section('container')
<div class="container-cart">
    <div class="content left">
      <h1>Keranjang Belanja</h1>
      <div class="cart-items">
        @foreach($items as $item)
        <div class="cart-item-container">
            <div class="item-info">
                <div class="item-title">
                    <h4>{{ $item->book->title }}</h4>
                </div>
                <div class="item-detail">
                    <div class="item-img">
                        <img src="{{ asset('storage/'. $item->book->cover) }}" alt="{{ $item->book->title }}">
                    </div>
                    <div class="item-desc">
                        <div class="item-desc-1">
                            <h5>{{ $item->book->author->name }}</h5>
                            <h3>{{ 'Rp'.number_format($item->book->price, 0, ',', '.') }}</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="remove-item">
                <a href="#" onclick="event.preventDefault(); document.getElementById('removeForm-{{ $item->book->slug }}-{{ $item->order_id }}').submit();">
                    <i class="fas fa-trash-alt"></i>
                </a>
                <form action="/cart/{{ $item->order_id }}/{{ $item->book_id }}" id="removeForm-{{ $item->book->slug }}-{{ $item->order_id }}" method="POST">
                    @csrf
                    @method('DELETE')
                </form>
            </div>
        </div>
        @endforeach
      </div>
    </div>
    <div class="content right">
        {{-- <div class="history-btn">
            <a href="/history"><i class="fas fa-history"></i> History Belanja</a>
        </div> --}}
        @if($items->count() > 0)
        <form action="/cart/{{ $order->id }}" id="pay-{{ $order->id }}" method="POST">
            @method('put')
            @csrf
            <div class="payment">
                <div class="payment-method">
                    <h6>Cara Pembayaran</h6>
                    <div class="radio-item">
                        @foreach($methods as $method)
                        <input type="radio" class="btn-check" name="method_id" id="{{ $method->name }}" value={{ $method->id }} autocomplete="off">
                        <label class="btn btn-primary" for="{{ $method->name }}">{{ $method->name }}</label>
                        @endforeach
                    </div>
                </div>
                <div class="price-total">
                    <h6>Total Harga: {{ 'Rp'.number_format($order->price_total, 0, ',', '.') }}</h6>
                </div>
                <input type="number" class="form-control" id="book_total" name="book_total" placeholder="" required hidden value="{{ $items->count() }}">
                <div class="pay-btn">
                    <a href="#" onclick="event.preventDefault(); document.getElementById('pay-{{ $order->id }}').submit();">
                        <button>BELI SEKARANG</button>
                    </a>
                </div>
            </div>
        </form>
        @else
        <div class="payment">
            <div class="payment-method">
                <h6>Cara Pembayaran</h6>
                <div class="radio-item">
                    @foreach($methods as $method)
                        <input type="radio" class="btn-check" name="method_id" id="{{ $method->name }}" disabled autocomplete="off">
                        <label class="btn btn-primary" for="{{ $method->name }}">{{ $method->name }}</label>
                    @endforeach
                </div>
            </div>
            <div class="price-total">
                <h6>Total Harga: {{ 'Rp'.number_format($order->price_total, 0, ',', '.') }}</h6>
            </div>
            <div class="pay-btn">
                <a href="#" class="disabled" role="button">
                    <button class="disabled" disabled>BELI SEKARANG</button>
                </a>
            </div>
        </div>
        @endif
    </div>
  </div>
@endsection