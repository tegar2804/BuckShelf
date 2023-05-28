@extends('layouts.main')

@section('container')
  <h1>Daftar Kategori</h1>
  <div class="kategori-container">
    @foreach ($categories as $category)
      <a href="/book?category={{ $category->slug }}">  
        <div class="kategori-frame">
          <img class="kategori-image" src="{{ asset('storage/category/'.$category->image) }}" alt="{{ $category->name }}">
          <h3 class="kategori-nama">{{ $category->name }}</h3>
        </div>
      </a>
    @endforeach
</div>
@endsection