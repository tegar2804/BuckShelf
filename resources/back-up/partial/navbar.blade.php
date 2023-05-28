<div class="hanging-navbar">
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">
                <img src="{{ asset('storage/images/navbr/logo.svg') }}" alt="logo" />
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-5 mb-lg-0 fs-4 text">
                    <li class="nav-item">
                        <a class="nav-link {{ ($title === 'Kategori') ? 'active' : '' }}" href="/categories"style="font-size: 17px;">Kategori</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ ($title === 'Koleksi') ? 'active' : '' }}" href="/collection" style="font-size: 17px;">Dibeli</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ ($title === 'Upload') ? 'active' : '' }}" href="/upload" style="font-size: 17px;">Diunggah</a>
                    </li>                      
                </ul>
                <a class="navbar-brand" href="/cart">
                    <img src="{{ asset('storage/images/navbr/cart.svg') }}" alt="cart"/>
                </a>
            </div>
                <form class="d-flex" action="/book">
                    @if(request('category'))
                        <input type="hidden" name="category" value="{{ request('category') }}">
                    @endif
                    <input class="form-control me-2" type="text" placeholder="Cari Buku..." name="search" value="{{ request('search') }}">
                </form>
                @auth
                    <a href="/profile" style="text-decoration: none"><img src="{{ asset('storage/images/navbr/profile.svg') }}" alt="profile" /></a>
                    <form action="/logout" method="post">
                        @csrf
                        <button>
                            <img src="{{ asset('storage/images/navbr/log out.svg') }}" alt="profile" />
                        </button>
                    </form>
                @else
                    <a class="btn btn-primary" href="/login">Login</a>
                @endauth
            </div>
        </div>
    </nav>
</div>
<!--end navbar-->
{{-- <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container mt-2">
        <a class="navbar-brand" href="/">BuckShelf</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link {{ ($title === 'Kategori') ? 'active' : '' }}" href="/categories">Kategori</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ ($title === 'Koleksi') ? 'active' : '' }}" href="/collection">Dibeli</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ ($title === 'Upload') ? 'active' : '' }}" href="/upload">Diunggah</a>
                </li>
            </ul>
            <form class="d-flex" action="/book">
                @if(request('category'))
                    <input type="hidden" name="category" value="{{ request('category') }}">
                @endif
                <input class="form-control me-2" type="text" placeholder="Search.." name="search" value="{{ request('search') }}">
            </form>
        </div>
        @auth
            <div>
                <a href="/profile">profile</a>
                <form action="/logout" method="post">
                    @csrf
                    <button>Log out</button>
                </form>
            </div>
        @else
            <a class="btn btn-primary" href="/login">Login</a>
        @endauth
    </div>
</nav> --}}