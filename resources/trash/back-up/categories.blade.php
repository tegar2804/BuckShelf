@extends('layouts.main')

@section('container')
  <h1>Daftar Kategori</h1>
  @foreach($categories as $category)
    <div class="container text-center mt-4">
      <a class="text-white" href="/book?category={{ $category->slug }}">
        <div class="col p-5 mb-2 mx-2 rounded bg-secondary text-white">
            {{ $category->name }}
        </div>
      </a>
    </div>
  @endforeach
@endsection