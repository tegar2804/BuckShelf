<!DOCTYPE html>
<html>
  <head>
    <link
      href="https://fonts.googleapis.com/css?family=Verdana&display=swap"
      rel="stylesheet"
    />
    <link
      href="https://fonts.googleapis.com/css?family=Raleway&display=swap"
      rel="stylesheet"
    />
    <link
      href="https://fonts.googleapis.com/css?family=Inter&display=swap"
      rel="stylesheet"
    />
    <link href="{{ asset('css/login.css') }}" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous"/>
    <title>BuckShelf | Login</title>
  </head>
  <body>
    <div class="all">
      <div class="logo">
        </div>
      </div>
      <span class="headmasuk">Masuk</span>
      @if(session()->has('success'))
        <p>{{ session('success') }}</p>
      @endif

      @if(session()->has('failed'))
        <p>{{ session('failed') }}</p>
      @endif
      <form action="/login" method="post" class="px-4 py-3">
        @csrf
        <div class="grupemail">
            <div class="form-floating mb-3">
              <input type="email" class="form-control" name="email"  id="email" placeholder="name@example.com" required value="{{ old('email') }}">
              <label for="email">Email Address</label>
            </div>
            <div class="lineemail"></div>
            @error('email')
              <div class="invalid-feedback">
                  {{ $message }}
              </div>
            @enderror
        </div>
        <div class="grupkatasandi">
            <div class="form-floating mb-3">
            <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
            <label for="katasandi">Kata Sandi</label>
            <div class="linekatasandi"></div>
            </div>
        </div>

        <div class="lupakatasandi">
            <a href="#">Lupa kata sandi?</a>
        </div>

        <div class="grupmasuk">
          <button type="submit" class="squaremasuk">
            <span class="masuk">MASUK</span>
          </button>
        </div>
      </form>
      
      <div class="grupatau">
        <div class="leftlineatau"></div>
        <div class="rightlineatau"></div>
        <span class="atau">ATAU</span>
      </div>

      <div class="grupdaftar">
        <a href="/register">
            <button class="squaredaftar">
                <span class="daftar">DAFTAR</span>
            </button>
        </a>
      </div>
      <div class="ilustration"></div>
    </div>
  </body>
</html>