@extends('layouts.main')

@section('container')
    <h1>Book!!!</h1>
    <h2>{{ $book->title }}</h2>
    <h3>isbn: {{ $book->isbn }}</h3>
    <h3>price: {{ $book->price }}</h3>
    <h3>page: {{ $book->page }}</h3>
    @foreach($book->category as $cat)
        <p>{{ $cat->name }}</p>
        <br>
    @endforeach
    <h3>desc: </h3>
    <p>{{ $book->desc }}</p>
@endsection