@extends('layouts.main')

@section('container')
    @auth
        <h1 class="mb-5">Selamat Datang, {{ auth()->user()->name }}!</h1>
    @else
        <h1 class="mb-5">Selamat Datang, Guest!</h1>
    @endauth
    <h3 class="mb-3">Rekomendasi</h3>
    @foreach($books as $book)
        <a href="/book/{{ $book->slug }}">
        <div class="col p-3 my-2 rounded bg-secondary text-white">
            <p>{{ $book->title }} <br> {{ $book->author->name}}</p>
        </div>
        </a>
    @endforeach
    <h3 class="mt-5 mb-3">Rilis Terbaru</h3>
    @foreach($books as $book)
        <a href="/book/{{ $book->slug }}">
        <div class="col p-3 my-2 rounded bg-secondary text-white">
            <p>{{ $book->title }} <br> {{ $book->author->name}}</p>
        </div>
        </a>
    @endforeach
    <h3 class="mt-5 mb-3">Feeling Lucky?</h3>
    @foreach($books_ran as $book)
        <a href="/book/{{ $book->slug }}">
        <div class="col p-3 my-2 rounded bg-secondary text-white">
            <p>{{ $book->title }} <br> {{ $book->author->name}}</p>
        </div>
        </a>
    @endforeach
@endsection