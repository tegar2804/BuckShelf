@extends('layouts.main')

@section('container')
    <div class="top-content">
        <div class="title">
            <h1>Upload Buku</h1>
        </div>
        <div class="back">
            <a href="/upload"><i class="fas fa-arrow-left"></i></a>
        </div>
    </div>
    <form action="/upload" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label"><p>Judul Buku</p></label>
            <input type="text" class="form-control" id="title" name="title" placeholder="" required value="{{ old('title') }}">
            @error('title')
                <p class="text-danger mt-1">{{ $message }}</p>
            @enderror
        </div>
        <input type="slug" class="form-control" id="slug" name="slug" value="{{ old('slug') }}" hidden>
        <div class="mb-3">
            <label for="isbn" class="form-label"><p>ISBN</p></label>
            <input type="text" class="form-control" id="isbn" name="isbn" placeholder="" required value="{{ old('isbn') }}">
            @error('isbn')
                <p class="text-danger mt-1">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="category" class="form-label"><p>Kategori</p></label>
            <div class="container-cat">
                @foreach($categories as $category)
                <input type="checkbox" name="categories[]" class="btn-check" id="{{ $category->slug }}" autocomplete="off" value="{{ $category->id }}">
                <label class="btn btn-primary" for="{{ $category->slug }}">{{ $category->name }}</label>
                @endforeach
            </div>
            @error('category')
            <div class="invalid-feedback">
                <p class="text-danger mt-1">{{ $message }}</p>
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="price" class="form-label"><p>Harga</p></label>
            <input type="number" class="form-control" id="price" name="price" placeholder="" required value="{{ old('price') }}">
            @error('price')
                <p class="text-danger mt-1">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="cover" class="form-label"><p>Gambar Sampul</p></label>
            <img class="img-preview img-fluid" style="max-width: 200px; margin-bottom: 7px;">
            <input class="form-control" type="file" id="cover" name="cover" onchange="previewCover()">
            @error('cover')
                <div class="invalid-feedback">
                    <p class="text-danger mt-1">{{ $message }}</p>
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="book_file" class="form-label"><p>File Buku</p></label>
            <input class="form-control" type="file" id="book_file" name="book_file">
            @error('book_file')
                <div class="invalid-feedback">
                    <p class="text-danger mt-1">{{ $message }}</p>
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="desc" class="form-label"><p>Deskripsi</p></label>
            <input type="textbox" class="form-control" id="desc" name="desc" placeholder="" required value="{{ old('desc') }}">
            @error('desc')
                <p class="text-danger mt-1">{{ $message }}</p>
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

        function previewCover(){
            const img = document.querySelector('#cover');
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.style.display = 'block';

            const read = new FileReader();
            read.readAsDataURL(img.files[0]);

            read.onload = function(event){
                imgPreview.src = event.target.result;
            }
        }
    </script>
@endsection