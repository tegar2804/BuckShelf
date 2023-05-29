@extends('layouts.main')

@section('container')
    <div class="top-content">
        <div class="title">
            <h1>Edit Profile</h1>
        </div>
        <div class="back">
            <a href="/profile"><i class="fas fa-arrow-left"></i></a>
        </div>
    </div>
    <form action="/profile/{{ auth()->user()->email }}" method="post" enctype="multipart/form-data">
        @method('put')
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label"><p>Nama Lengkap</p></label>
            <input type="name" class="form-control" id="name" name="name" placeholder="" required value="{{ auth()->user()->name }}">
            @error('name')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="email" class="form-label"><p>Email</p></label>
            <input type="email" class="form-control" id="email" name="email" placeholder="" required value="{{ auth()->user()->email }}">
            @error('email')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label"><p>Nomor Telepon</p></label>
            <input type="tel" class="form-control" name="phone" id="phone" placeholder="" required value="{{ auth()->user()->phone }}">
        </div>
        <label for="gender" class="form-label"><p>Jenis Kelamin</p></label>
        <div class="mb-3">
            <input class="form-check-input" type="radio" name="gender" id="male" value='L' {{ auth()->user()->gender == 'L' ? 'checked' : ''}}>
            <label class="form-check-label" for="male">
                Laki-laki
            </label>
            <br>
            <input class="form-check-input" type="radio" name="gender" id="female" value='P' {{ auth()->user()->gender == 'P' ? 'checked' : ''}}>
            <label class="form-check-label" for="female">
                Perempuan
            </label>
        </div>

        <div class="mb-3">
            <label for="profile_image" class="form-label"><p>Foto Profil</p></label>
            @if(auth()->user()->profile_image)
            <img class="img-preview img-fluid d-block mb-2" style="max-width: 200px" src="{{ asset("storage/".auth()->user()->profile_image) }}">
            @else
            <img class="img-preview img-fluid mb-2" style="max-width: 200px">
            @endif
            <input class="form-control" type="file" id="profile_image" name="profile_image" onchange="previewCover()">
            @error('profile_image')
                <div class="invalid-feedback">
                    <p class="text-danger">{{ $message }}</p>
                </div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Upload</button>
    </form>

    <script>
        function previewCover(){
            const img = document.querySelector('#profile_image');
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