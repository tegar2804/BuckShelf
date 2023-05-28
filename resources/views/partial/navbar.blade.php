<div class="hanging-navbar">
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">
                <img class ="logo" src="{{ asset('storage/images/navbr/logo.svg') }}" alt="logo" />
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-5 mb-lg-0 fs-4 text">
                    <li class="nav-item mx-2">
                        <a class="nav-link {{ ($title === 'Kategori') ? 'active' : '' }}" href="/categories"style="font-size: 17px;">Kategori</a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link {{ ($title === 'Koleksi') ? 'active' : '' }}" href="/collection" style="font-size: 17px;">Dibeli</a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link {{ ($title === 'Upload') ? 'active' : '' }}" href="/upload" style="font-size: 17px;">Diunggah</a>
                    </li>                      
                </ul>
                <a class="navbar-brand cart" href="/cart">
                    <i class="fas fa-shopping-cart"></i>
                </a>
                <form class="d-flex" action="/book">
                    @if(request('category'))
                        <input type="hidden" name="category" value="{{ request('category') }}">
                    @endif
                    <input class="form-control me-2" type="text" placeholder="Cari Buku..." name="search" value="{{ request('search') }}">
                </form>
                @auth
                    <a class="profile" href="/profile"><img src="{{ asset('storage/images/navbr/profile.svg') }}" alt="profile" /></a>
                    <form action="/logout" method="post">
                        @csrf
                        <button class="logout">
                            <img src="{{ asset('storage/images/navbr/log out.svg') }}" alt="profile" />
                        </button>
                    </form>
                @else
                    <div class="login-button">
                        <a href="/login">
                            <button>
                                Login
                            </button>
                        </a>
                    </div>
                @endauth
            </div>
            </div>
        </div>
    </nav>
</div>
<!--end navbar-->