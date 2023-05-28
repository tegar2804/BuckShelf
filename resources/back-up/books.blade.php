@extends('layouts.main')

@section('container')
    <h1>{{ $header_title }}</h1>
    @if($books->count())
    @foreach($books as $book)
      <div class="container text-center mt-4">
        <a class="text-white" href="/book/{{ $book->slug }}">
          <div class="col p-5 mb-2 mx-2 rounded bg-secondary text-white">
              {{ $book->title }}
              <br>
              {{ $book->author->name }}
          </div>
        </a>
      </div>
    @endforeach
    @else
    <div class="container text-center mt-4">
      <h3>Tidak Ada!</h3>
    </div>
    @endif
@endsection