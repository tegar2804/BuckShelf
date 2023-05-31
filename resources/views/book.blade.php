@extends('layouts.main')

@section('container')
    <div class="row">
        <div class="left-container">
            <div class="image-container">
                <img src="{{ asset('storage/'. $book->cover) }}" alt="{{ $book->title }}">
            </div>
            @auth
                @can('author', [$book])
                    <div class="edit">
                        <a href="/upload/{{ $book->slug }}/edit">
                            <button>EDIT</button>
                        </a>
                    </div>
                @endcan
            @endauth
        </div>
        <div class="info-container">
            <h2><strong>{{ $book->title }}</strong></h2>
            <div class="detail">
                <div class="left">
                    <p>Penulis</p>
                    <p>ISBN</p>
                    <p>Harga</p>
                    <p>Tanggal Rilis</p>
                    <p>Kategori</p>
                </div>
                <div class="right">
                    <p>: {{ $book->author->name }}</p>
                    <p>: {{ $book->isbn }}</p>
                    <p>: {{ 'Rp'.number_format($book->price, 0, ',', '.') }}</p>
                    <p>: {{ (new DateTime($book->published_at))->format('d M Y') }}</p>
                    @foreach($book->category as $cat)
                    <p>: {{ $cat->name }}</p>
                    @endforeach
                </div>
            </div>
            <h2><strong>Deskripsi:</strong></h2>
            <p class="desc">Ajasajs ajsdnajkfnsja sjfanksfna jsfnak fskanfaklnsfa jfsaknfsa. Ajasajs ajsdnajkfnsja sjfanksfna jsfnak fskanfaklnsfa jfsaknfsa. Ajasajs ajsdnajkfnsja sjfanksfna jsfnak fskanfaklnsfa jfsaknfsa. Ajasajs ajsdnajkfnsja sjfanksfna jsfnak fskanfaklnsfa jfsaknfsa</p>
        </div>
        <div class="button-container">
        @auth
            @if(!Gate::check('author', [$book]) && !Gate::check('purchased', [$book]) && !Gate::check('inCart', [$book]))
                <form action="/cart" method="post">
                    @csrf
                    <input type="text" id="id" name="id" value="{{ $book->id }}" required hidden>
                    <button type="submit"><i class="fas fa-plus"></i> Tambahkan ke Keranjang</button>
                </form>
            @endif
        @else
            <a href="/login">
                <button><i class="fas fa-plus"></i> Tambahkan ke Keranjang</button>
            </a>
        @endauth
        @if(session()->has('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}, silahkan cek <a href="/cart" class="alert-link">Keranjang</a> Anda.
            </div>
        @endif
        </div>
    </div>
    
    <div class="star-container">
        <div class="star-box">
            <div class="star-left">
                <div class="rating-box">
                    <h1>4.0</h1>
                    <h6>OUT OF 5</h6>
                    <div class="star-count">
                        <i class="fa fa-star star-active mx-1"></i>
                        <i class="fa fa-star star-active mx-1"></i>
                        <i class="fa fa-star star-active mx-1"></i>
                        <i class="fa fa-star star-active mx-1"></i>
                        <i class="fa fa-star star-inactive mx-1"></i>
                    </div>
                </div>
            </div>
            <div class="star-right">
                <div class="all-rate">
                    <ul class="rate-level">
                        <li>Perfect</li>
                        <li>Good</li>
                        <li>Normal</li>
                        <li>Poor</li>
                        <li>Bad</li>
                    </ul>
                    <ul class="rate-vis">
                        <li>
                            <div class="star-count">
                                <i class="fa fa-star star-active mx-1"></i>
                                <i class="fa fa-star star-active mx-1"></i>
                                <i class="fa fa-star star-active mx-1"></i>
                                <i class="fa fa-star star-active mx-1"></i>
                                <i class="fa fa-star star-active mx-1"></i>
                            </div>
                        </li>
                        <li>
                            <div class="star-count">
                                <i class="fa fa-star star-active mx-1"></i>
                                <i class="fa fa-star star-active mx-1"></i>
                                <i class="fa fa-star star-active mx-1"></i>
                                <i class="fa fa-star star-active mx-1"></i>
                            </div>
                        </li>
                        <li>
                            <div class="star-count">
                                <i class="fa fa-star star-active mx-1"></i>
                                <i class="fa fa-star star-active mx-1"></i>
                                <i class="fa fa-star star-active mx-1"></i>
                            </div>
                        </li>
                        <li>
                            <div class="star-count">
                                <i class="fa fa-star star-active mx-1"></i>
                                <i class="fa fa-star star-active mx-1"></i>
                            </div>
                        </li>
                        <li>
                            <div class="star-count">
                                <i class="fa fa-star star-active mx-1"></i>
                            </div>
                        </li>
                    </ul>
                    <ul class="rate-total">
                        <li>8</li>
                        <li>5</li>
                        <li>4</li>
                        <li>2</li>
                        <li>1</li>
                    </ul>
                </div>
                <div class="your-rate">
                    <h5>
                        Your Rating:
                    </h5>
                    <div class="star-count">
                        <i class="fa fa-star star-active mx-1"></i>
                        <i class="fa fa-star star-active mx-1"></i>
                        <i class="fa fa-star star-active mx-1"></i>
                        <i class="fa fa-star star-inactive mx-1"></i>
                        <i class="fa fa-star star-inactive mx-1"></i>
                    </div>
                </div>
            </div> 
        </div>    
    </div>
{{-- 
    @auth
        @can('purchased', [$book])
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
        @endcan
    @else
        <a href="#"><h4>Rating</h4></a>
    @endauth --}}
@endsection