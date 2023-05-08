<nav class="navbar navbar-expand-lg bg-body-tertiary">
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
            <form action="/logout" method="post">
                @csrf
                <button>Log out</button>
            </form>
        @else
            <a class="btn btn-primary" href="/login">Login</a>
        @endauth
    </div>
</nav>