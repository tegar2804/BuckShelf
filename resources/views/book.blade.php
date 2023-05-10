@extends('layouts.main')

@section('container')
    <h1>Book!!!</h1>
    @auth
        @if(auth()->user()->id == $book->author->id)
            <a href=""><h4>Edit</h4></a>
            <a href=""><h4>Delete</h4></a>
        @elseif(!auth()->user()->book->find($book->id))
            <a href=""><h4>keranjang</h4></a>
        @endif
    @endauth
    <h2>{{ $book->title }}</h2>
    <img style="border: 1px solid #ddd; border-radius: 4px; padding: 5px; width: 450px;" src="{{ asset('storage/'. $book->cover) }}" alt="cover buku '{{ $book->title }}'">
    <h3>isbn: {{ $book->isbn }}</h3>
    <h3>penulis: {{ $book->author->name }}</h3>
    <h3>price: {{ $book->price }}</h3>
    <h3>page: {{ $book->page }}</h3>
    @foreach($book->category as $cat)
        <p>{{ $cat->name }}</p>
        <br>
    @endforeach
    <h3>desc: </h3>
    <p>{{ $book->desc }}</p>
    @auth
        @if(auth()->user()->book->find($book->id))
            {{-- {{ auth()->user()->book->find($book->id)->collection[0]->rate }} --}}
            <form action="/book/{{ $book->slug }}" method="post">
                @method('put')
                @csrf
                <div class="mb-3">
                    <label for="rate" class="form-label">Rating: ({{ auth()->user()->book->find($book->id)->collection[0]->rate }})</label>
                    <select class="form-select" id="rate" name="rate">
                        @for($i = 0; $i <= 5; $i++)
                        <option value="{{ $i }}">{{ $i }}</option>
                        @endfor
                    </select>
                    @error('rate')
                        <div class="invalid-feedback">
                            <p class="text-danger">{{ $message }}</p>
                        </div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">submit</button>
            </form>
        @endif
    @else
        <a href="#"><h4>Rating</h4></a>
    @endauth
@endsection