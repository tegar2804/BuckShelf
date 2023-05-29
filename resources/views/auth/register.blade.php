<!DOCTYPE html>
<html>

<head>
    <link href="https://fonts.googleapis.com/css?family=Verdana&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Raleway&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Inter&display=swap" rel="stylesheet" />
    <link href="{{ asset('css/regis.css') }}" rel="stylesheet" />
    <title>BuckShelf | Register</title>
</head>

<body>
    <div class="v8_2214">
        <div class="v20_12">
            <div class="logo">
                <img src="{{ asset('/storage/images/regis/logo.svg') }}" alt="logo"/>
            </div>
        </div>
        <div class="v9_2452">
            <div class="v9_2453">
                <div class="v9_2454">
                    <a href="/" class="back-button"></a>
                </div>
            </div>
        </div>
        <form class="px-4 py-3" action="/register" method="POST">
            @csrf
            <span class="v8_2219">Daftar</span>
            <div class="container_form">
                <div class="container_nama"><span class="nama_lengkap">Nama Lengkap</span>
                    <input type="text" placeholder="Masukkan Nama Lengkap Anda" class="input_nama" name="name" required>
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="container_email"><span class="alamat_email">Alamat Email</span>
                    <input type="email" placeholder="Masukkan Alamat Email Anda" class="input_email" name="email" required>
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                </div>
                <div class="container_telepon"><span class="nomor_telepon">Nomor Telepon</span>
                    <input type="tel" placeholder="Masukkan Nomor Telepon Anda" class="input_telepon" name="phone" required>
                    @error('phone')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="container_jenis_kelamin">
                    <div class="v67_525">Jenis Kelamin</div>
                    <div class="radio_buttons">
                        <label>
                            <input type="radio" name="gender" value="L" />
                            Laki-laki
                        </label>
                        <label>
                            <input type="radio" name="gender" value="P" />
                            Perempuan
                        </label>
                    </div>
                    @error('gender')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="container_sandi"><span class="sandi">Kata Sandi</span>
                    <input type="password" name="password" placeholder="Masukkan Kata Sandi Anda" class="input_sandi1" required>
                    @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="container_sandi2"><span class="sandi2">Konfirmasi Kata Sandi</span>
                    <input type="password" name="repassword" placeholder="Konfirmasi Kata Sandi Anda" class="input_sandi2" required>
                    @error('repassword')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="container_daftar">
                <button type="submit" class="shape_daftar">
                <span class="teks_daftar">DAFTAR</span>
                </button>
            </div>
        </form>
        <div class="v93_779">
            <div class="v93_780">
                <div class="v93_781"></div>
                <div class="v93_782"></div>
            </div>
        </div>
    </div>
</body>

</html>