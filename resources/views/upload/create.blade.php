@extends('layouts.main')

@section('container')
    <h1>My Book</h1>
    <a href="/upload">back</a>
    <form action="/upload" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Judul Buku</label>
            <input type="title" class="form-control" id="title" name="title" placeholder="" required value="{{ old('title') }}">
            @error('title')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <input type="slug" class="form-control" id="slug" name="slug" value="{{ old('slug') }}" hidden>
        <div class="mb-3">
            <label for="isbn" class="form-label">ISBN</label>
            <input type="text" class="form-control" id="isbn" name="isbn" placeholder="" required value="{{ old('isbn') }}">
            @error('isbn')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="category" class="form-label">Kategori</label>
            <select class="form-select" id="category" name="categories[]" multiple>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            @error('category')
                <div class="invalid-feedback">
                    <p class="text-danger">{{ $message }}</p>
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Harga</label>
            <input type="number" class="form-control" id="price" name="price" placeholder="" required value="{{ old('price') }}">
            @error('price')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        {{-- <div class="mb-3">
            <label for="page" class="form-label">Jumlah Halaman</label>
            <input type="number" class="form-control" id="page" placeholder="">
        </div> --}}
        <div class="mb-3">
          <label for="cover" class="form-label">Gambar Sampul</label>
          <input class="form-control" type="file" id="cover" name="cover">
        </div>
        <div class="mb-3">
          <label for="book_file" class="form-label">File Buku</label>
          <input class="form-control" type="file" id="book_file">
        </div>
        <div class="mb-3">
            <label for="desc" class="form-label">Deskripsi</label>
            <input type="textbox" class="form-control" id="desc" name="desc" placeholder="" required value="{{ old('desc') }}">
            @error('desc')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Upload</button>
    </form>

    <script>
        const title = document.querySelector('#title');
        const slug = document.querySelector('#slug');

        title.addEventListener('change', function(){
            fetch('/upload/checkSlug?title=' + title.value)
                .then(response => response.json())
                .then(data => slug.value = data.slug)
        });
    </script>
@endsection