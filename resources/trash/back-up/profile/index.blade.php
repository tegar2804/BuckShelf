@extends('layouts.main')

@section('container')
    <h1>Profile:</h1>
    <ul>
        <li>
            <h2>Nama: {{ auth()->user()->name }}</h2>
        </li>
        <li>
            <h2>Email: {{ auth()->user()->email }}</h2>
        </li>
        <li>
            <h2>Phone Number: {{ auth()->user()->phone }}</h2>
        </li>
        <li>
            @if(auth()->user()->gender == "L")
                <h2>Gender: Laki-laki</h2>
            @endif
            @if(auth()->user()->gender == "P")
                <h2>Gender: Perempuan</h2>
            @endif
        </li>
    </ul>
@endsection