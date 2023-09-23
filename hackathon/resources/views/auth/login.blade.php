<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('styles/navigation.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Masuk</title>
</head>
<body class="">
    <div class="d-flex flex-row justify-content-center">
        <div class="d-flex d-none d-lg-flex col-6 justify-content-center align-items-center" style="height: 100vh; background-color: #F9F9F4;">
            <img src="{{ asset('images/assets/cjr_logo4.png') }}" style="width: 25vw">
        </div>
        <div class="d-flex col-lg-6 justify-content-center align-items-center" style="height: 100vh">
            <div class="d-flex align-items-center justify-content-center flex-column w-100">
                <img src="{{ asset('images/assets/cjr_logo1.png') }}" height="50">
                <h2 class="fw-bold pt-4">Selamat Datang!</h2>
                <p>Silahkan masuk ke akun Anda</p>
                <form action="{{ route('login') }}" method="post" class="w-75">
                    @csrf
                    <div class="mb-3 mt-4">
                        <input type="email" class="form-control font-montserrat" id="inputEmail" name="email" placeholder="Email" required autofocus>
                        <small class="text-danger font-montserrat">
                        @foreach ($errors->get('email') as $err)
                            {{ ucfirst($err) }}
                        @endforeach
                        </small>
                    </div>
                    <div class="mb-3 mt-4">
                        <input type="password" class="form-control font-montserrat" id="inputPassword" name="password" placeholder="Kata Sandi" required autocomplete="current-password">
                        <small class="text-danger font-montserrat">
                        @foreach ($errors->get('password') as $err)
                            {{ ucfirst($err) }}
                        @endforeach
                        </small>
                    </div>
                    <div class="mb-4">
                    <div class="form-check">
                        <input class="form-check-input loginregistercheckbox" type="checkbox" id="rememberLoginCheck" name="remember">
                        <label class="form-check-label" for="rememberLoginCheck">
                        Ingat Saya
                        </label>
                    </div>
                    </div>
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary font-montserrat fw-semibold py-2 px-4">Masuk</button>
                    </div>
                </form>
                <h6 class="font-montserrat fw-semibold mt-3 mx-4 text-center">Belum mempunyai akun? <span class="color-orange fw-bold"><a href="/daftar" class="text-decoration-none color-orange">Daftar Di Sini!</a></span></h6>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>