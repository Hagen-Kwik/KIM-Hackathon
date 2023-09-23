<nav class="navbar navbar-expand-lg navbar-light shadow-sm" style="background-color: white">
    <div class="container w-100 justify-content-lg-between align-items-center nav-between-on-mobile">
        <a class="navbar-brand py-2 px-4" href="/">
            <img src="{{ asset('images/assets/cjr_logo2.png') }}" height="44">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse flex-grow-0" id="navbarNav">
            <ul class="navbar-nav text-center">
                <li class="nav-item active">
                    <a class="nav-link py-2 px-4" href="/">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link py-2 px-4" href="/silabus">Silabus</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link py-2 px-4" href="/berita">Berita</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link py-2 px-4" href="/tentang-kami">Tentang Kami</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link py-2 px-4" href="/">Podcast</a>
                </li>

                @guest
                <li class="nav-item">
                    <a class="nav-link py-2 px-4" href="/masuk">Masuk</a>
                </li>
                @endguest

                @auth
                @if (Auth::check() && Auth::user()->role == 'Admin')
                <li class="nav-item">
                    <a class="nav-link py-2 px-4" href="/admin">Admin</a>
                </li>
                @endif
                <li class="nav-item">
                    <a class="nav-link py-2 px-4" href="/profil">Profil</a>
                </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
