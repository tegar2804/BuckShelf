@extends('layouts.main')

@section('container')
    @if(session()->has('success'))
        <div class="alert alert-success" role="alert">
          {{ session('success') }}
        </div>
    @endif
    <div class="row">
        <div class="left-container">
            <div class="image-container">
                @if(auth()->user()->profile_image)
                    <img src="{{ asset('storage/'. auth()->user()->profile_image) }}" alt="{{ auth()->user()->name }}">
                @else
                    <img src="{{ asset('storage/profile-images/default.png') }}" alt="{{ auth()->user()->name }}">
                @endif
            </div>            
        </div>
        <div class="info-container">
            <div class="detail">
                <div class="left">
                    <p>Nama</p>
                    <p>Email</p>
                    <p>Telepon</p>
                    <p>Jenis Kelamin</p>
                </div>
                <div class="right">
                    <p>: {{ auth()->user()->name }}</p>
                    <p>: {{ auth()->user()->email }}</p>
                    <p>: {{ auth()->user()->phone }}</p>
                    <p>: {{ auth()->user()->gender == 'L' ? 'Laki-laki' : 'Perempuan'}}</p>
                </div>
            </div>
    </div>
        <div class="button-container">
            <a href="/profile/{{ auth()->user()->email }}/edit">
                <button><i class="fas fa-edit"></i> Edit</button>
            </a>
        </div>
    </div>
@endsection