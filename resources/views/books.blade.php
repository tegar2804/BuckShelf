@extends('layouts.main')

@section('container')
  <h1>{{ $header_title }}</h1>
  @if(request('search'))
    <p class="search">Hasil Pencarian: <strong>{{ request('search') }}</strong></p>
  @endif
  @if($books->count())
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
  @else
    <div class="container text-center mt-4">
      <h3>Tidak Ada!</h3>
    </div>
  @endif
@endsection