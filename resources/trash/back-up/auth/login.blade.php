<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
</head>
<body>
    <div class="dropdown-menu">
      @if(session()->has('success'))
        <p>{{ session('success') }}</p>
      @endif

      @if(session()->has('failed'))
        <p>{{ session('failed') }}</p>
      @endif

        <form action="/login" method="post" class="px-4 py-3">
          @csrf
          <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" name="email" class="form-control" id="email" placeholder="email@example.com" required value="{{ old('email') }}">
            @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
          </div>
          <button type="submit" class="btn btn-primary">Login</button>
        </form>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="/register">New around here? Sign up</a>
        <a class="dropdown-item" href="#">Forgot password?</a>
    </div>
</body>
</html>