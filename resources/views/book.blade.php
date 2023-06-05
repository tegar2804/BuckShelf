@extends('layouts.main')

@section('container')
    @if(session()->has('rated'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <p>{{ session('rated') }}</p>
    </div>
    @endif
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
                    <div class="unduh">
                        <a href="/download-pdf/{{ $book->slug }}">
                            <button>UNDUH</button>
                        </a>
                    </div>
                @elsecan('purchased', [$book])
                    <div class="unduh">
                        <a href="/download-pdf/{{ $book->slug }}">
                            <button>UNDUH</button>
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
                    <h1>{{ number_format($book->rating,1) }}</h1>
                    <h6>OUT OF 5</h6>
                    <div class="star-count">
                        <i class="fa fa-star mx-1" style="background-position: {{ (1-($book->rating <= 0 ? '1' : (1-$book->rating <= 0 ? '0' : 1-$book->rating)))*13.3 }}px 0px;"></i>
                        <i class="fa fa-star mx-1" style="background-position: {{ (1-($book->rating-1 <= 0 ? '1' : (2-$book->rating <= 0 ? '0' : 2-$book->rating)))*13.3 }}px 0px;"></i>
                        <i class="fa fa-star mx-1" style="background-position: {{ (1-($book->rating-2 <= 0 ? '1' : (3-$book->rating <= 0 ? '0' : 3-$book->rating)))*13.3 }}px 0px;"></i>
                        <i class="fa fa-star mx-1" style="background-position: {{ (1-($book->rating-3 <= 0 ? '1' : (4-$book->rating <= 0 ? '0' : 4-$book->rating)))*13.3 }}px 0px;"></i>
                        <i class="fa fa-star mx-1" style="background-position: {{ (1-($book->rating-4 <= 0 ? '1' : (5-$book->rating <= 0 ? '0' : 5-$book->rating)))*13.3 }}px 0px;"></i>
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
                        <li>{{ $book->collection->where('rate', '==', 5)->count() }}</li>
                        <li>{{ $book->collection->where('rate', '==', 4)->count() }}</li>
                        <li>{{ $book->collection->where('rate', '==', 3)->count() }}</li>
                        <li>{{ $book->collection->where('rate', '==', 2)->count() }}</li>
                        <li>{{ $book->collection->where('rate', '==', 1)->count() }}</li>
                    </ul>
                </div>
                <div class="your-rate">
                    <h5>
                        Your Rating:
                    </h5>
                    <div class="rating-container">
                        @auth
                            @can('purchased', [$book])
                            <form action="/book/{{ $book->slug }}/rating" method="post">
                                @method('put')
                                @csrf
                                <div class="rating-stars">
                                    <input type="radio" name="rate" id="star5" value="5" {{ auth()->user()->book->find($book->id)->collection->first()->rate == 5 ? 'checked' : ''}}>
                                    <label for="star5"><i class="fas fa-star"></i></label>
                                    <input type="radio" name="rate" id="star4" value="4" {{ auth()->user()->book->find($book->id)->collection->first()->rate == 4 ? 'checked' : ''}}>
                                    <label for="star4"><i class="fas fa-star"></i></label>
                                    <input type="radio" name="rate" id="star3" value="3" {{ auth()->user()->book->find($book->id)->collection->first()->rate == 3 ? 'checked' : ''}}>
                                    <label for="star3"><i class="fas fa-star"></i></label>
                                    <input type="radio" name="rate" id="star2" value="2" {{ auth()->user()->book->find($book->id)->collection->first()->rate == 2 ? 'checked' : ''}}>
                                    <label for="star2"><i class="fas fa-star"></i></label>
                                    <input type="radio" name="rate" id="star1" value="1" {{ auth()->user()->book->find($book->id)->collection->first()->rate == 1 ? 'checked' : ''}}>
                                    <label for="star1"><i class="fas fa-star"></i></label>
                                    <input type="radio" name="rate" id="star0" value="0" hidden>
                                </div>
                                <button class="submit-button" type="submit">submit</button>
                                <button class="reset-button" onclick="checkRadio(); return false;">reset</button>
                            </form>
                            @else
                            <div class="rating-stars inactive">
                                <label><i class="fas fa-star star-inactive mx-1"></i></label>
                                <label><i class="fas fa-star star-inactive mx-1"></i></label>
                                <label><i class="fas fa-star star-inactive mx-1"></i></label>
                                <label><i class="fas fa-star star-inactive mx-1"></i></label>
                                <label><i class="fas fa-star star-inactive mx-1"></i></label>
                            </div>
                            @endcan
                        @endauth
                        </div>
                    </div>
            </div> 
        </div>    
    </div>
@auth
<script>
document.addEventListener('DOMContentLoaded', function() {
    const ratingContainer = document.querySelector('.rating-container');
    const ratingInputs = ratingContainer.querySelectorAll('input[name="rate"]');

    const initialRating = {{ auth()->user()->collection->where('book_id', $book->id)->first()->rate ?? 0 }};
    
    ratingInputs.forEach(function(input) {
        if (input.value == initialRating) {
            input.checked = true;
        }
    });

    const closeButtons = document.querySelectorAll('.alert .close');
    closeButtons.forEach(function(button) {
        button.addEventListener('click', function() {
            const alert = this.closest('.alert');
            alert.remove(); // Menghapus alert dari DOM saat tombol close di klik
        });
    });
});

function checkRadio() {
    document.getElementById("star0").checked = true;
}
</script>
@endauth
@endsection