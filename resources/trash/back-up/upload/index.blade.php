@extends('layouts.main')

@section('container')
    <h1>My Book</h1>
    <a href="\upload\create">create new book</a>
    @if(session()->has('success'))
      <p>{{ session('success') }}</p>
    @endif
    @if($books->count())
    @foreach($books as $book)
      <div class="container text-center mt-4">
        <a class="text-white" href="/upload/{{ $book->slug }}">
          <div class="col p-5 mb-2 mx-2 rounded bg-secondary text-white">
              {{ $book->title }}
              <br>
              {{ $book->isbn }}
              <br>
              @foreach($book->category as $cat)
              {{ $cat->name }}
              <br>
              @endforeach
              {{ $book->page }}
              <br>
              {{ $book->price }}
              <br>
            </div>
          </a>
          <a href="/upload/{{ $book->slug }}/edit"><button class="badge bg-warning border-0">Update</button></a>
          <form action="/upload/{{ $book->slug }}" method="post">
            @method('delete')
            @csrf
            <button class="badge bg-danger border-0" onclick="return confirm('Hapus data?')">Delete</button>
          </form>
      </div>
    @endforeach
    @else
    <div class="container text-center mt-4">
      <h3>Tidak Ada!</h3>
    </div>
    @endif
@endsection