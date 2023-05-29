@extends('layouts.main')

@section('container')
    <h1>Diunggah</h1>
    <div class="upload-button">
      <a href="\upload\create">
        <button>
          Upload Buku
        </button>
      </a>
    </div>
    @if(session()->has('success'))
    <div class="alert alert-success" role="alert">
      {{ session('success') }}
    </div>
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
          <div class="edit">
            <a href="/upload/{{ $book->slug }}/edit">
                <button>EDIT</button>
            </a>
          </div>
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