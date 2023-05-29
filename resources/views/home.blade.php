@extends('layouts.main')

@section('container')
    @auth
        <h1 class="mb-5">Selamat Datang, {{ auth()->user()->name }}!</h1>
    @else
        <h1 class="mb-5">Selamat Datang, Guest!</h1>
    @endauth

    @if($books->count() > 0)
    <h2>Rekomendasi Untuk Anda</h2>
    <div class="book-list mb-4">
        @foreach($books as $book)
        <a href="/book/{{ $book->slug }}">
            <div class="book">
                <div class="book-frame">
                    <img src="{{ asset('storage/'.$book->cover) }}" alt="{{ $book->title }}">
                </div>
                <h3>{{ $book->title }}</h3>
                <p>{{ 'Rp'.number_format($book->price, 0, ',', '.') }}</p>
            </div>
        </a>
        @endforeach
    </div>
    <h2>Koleksi Baru Kami</h2>
    <div class="book-list mb-4">
        @foreach($books as $book)
        <a href="/book/{{ $book->slug }}">
            <div class="book">
                <div class="book-frame">
                    <img src="{{ asset('storage/'.$book->cover) }}" alt="{{ $book->title }}">
                </div>
                <h3>{{ $book->title }}</h3>
                <p>{{ 'Rp'.number_format($book->price, 0, ',', '.') }}</p>
            </div>
        </a>
        @endforeach
    </div>
    <h2>Saya Lagi Beruntung?</h2>
    <div class="book-list mb-4">
        @foreach($books_ran as $book)
        <a href="/book/{{ $book->slug }}">
            <div class="book">
                <div class="book-frame">
                    <img src="{{ asset('storage/'.$book->cover) }}" alt="{{ $book->title }}">
                </div>
                <h3>{{ $book->title }}</h3>
                <p>{{ 'Rp'.number_format($book->price, 0, ',', '.') }}</p>
            </div>
        </a>
        @endforeach
    </div>
    @else
        <div class="container text-center mt-4">
            <h3>Tidak Ada!</h3>
        </div>
    @endif
@endsection