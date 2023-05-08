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
        <form class="px-4 py-3" action="/register" method="POST">
            @csrf
          <div class="form-floating">
            <label for="exampleDropdownFormName1">Nama Lengkap</label>
            <input type="text" name="name" class="form-control" placeholder="Nama Lengkap" required value="{{ old('name') }}">
            @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
          </div>
          <div class="form-floating">
            <label for="exampleDropdownFormEmail1">Email address</label>
            <input type="email" name="email" class="form-control" placeholder="email@example.com" required value="{{ old('email') }}">
            @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
          </div>
          <div class="form-floating">
            <label for="exampleDropdownFormTelp1">No. Telp</label>
            <input type="tel" name="phone" class="form-control" placeholder="+62xxxxxxxxxxx" required value="{{ old('phone') }}">
            @error('phone')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
          </div>
          <div class="form-floating">
            <label for="exampleDropdownFormGender1">Jenis Kelamin</label>
            <input type="radio" name="gender" class="form-control" value="L">Laki-laki
            <input type="radio" name="gender" class="form-control" value="P">Perempuan<br>
            @error('gender')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
          </div>
          <div class="form-floating">
            <label for="exampleDropdownFormPassword1">Password</label>
            <input type="password" name="password" class="form-control" placeholder="Password" required>
            @error('password')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
          </div>
          <div class="form-floating">
            <label for="exampleDropdownFormRepassword1">Re-type Password</label>
            <input type="password" name="repassword" class="form-control" placeholder="Re-type Password" required>
            @error('repassword')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
          </div>
          <button type="submit" class="btn btn-primary">Registrasi</button>
        </form>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="/login">Login</a>
    </div>
</body>
</html>