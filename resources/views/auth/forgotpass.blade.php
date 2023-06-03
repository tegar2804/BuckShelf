<!DOCTYPE html>
<html>

<head>
    <link href="https://fonts.googleapis.com/css?family=Verdana&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Inter&display=swap" rel="stylesheet" />
    <link href="{{ asset('css/forgor.css') }}" rel="stylesheet" />
    <title>BuckShelf | Forgot Password</title>
</head>

<body>
    <div class="v9_2435">
            <div class="v20_12">
                <div class="logo">
                    <img src="{{ asset('storage/images/forgor/logo.svg') }}" alt="logo"/>
                </div>
            </div>
        <div class="v9_2452">
            <div class="v9_2453">
                <div class="v9_2454">
                    <a href="/login" class="back-button"></a>
                  </div>
            </div>
        </div>
        <form action="/forgor" method="post" class="px-4 py-3">
            @csrf
            @if (session('status'))
                <div>{{ session('status') }}</div>
            @endif

            <span class="v9_2441">Anda Lupa Kata Sandi Anda?</span><span class="v9_2442">Jangan khawatir, kami akan kirimkan konfirmasi ke emailmu</span>
            <div class="v9_2444">
                <span for="email" class="v9_2445">Masukkan Emailmu</span>
                <div class="email-input-box">
                  <input type="email" id="email" name="email" class="v9_2446" placeholder="Email" />
                </div>
                @error('email')
                    <div>{{ $message }}</div>
                @enderror
            </div>
            <div class="v9_2447">
                <button type="submit" class="v9_2448">
                  <span class="v9_2465">Kirim</span>
                </button>
            </div>
        </form>
        <div class="v9_2450"></div>
    </div>
</body>

</html>