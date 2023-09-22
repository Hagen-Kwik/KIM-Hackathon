<!-- ======= Header ======= -->

<div class="headerrrrrr">

    <header id="header" class="header fixed-top d-flex align-items-center">

        <div class="d-flex align-items-center justify-content-between">
            <a href="#" class="logo d-flex align-items-center">
                {{-- <img src="{{ asset('img/logo.jpg') }}" alt="product"> --}}
                <span class="d-none d-lg-block">Admin</span>
            </a>
            <i class="bi bi-list toggle-sidebar-btn"></i>
        </div><!-- End Logo -->



        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">



                <li class="nav-item dropdown pe-3">

                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#"
                        data-bs-toggle="dropdown">
                        {{-- <img src="{{ asset('img/noimgeplaceholder.jpg') }}" alt="Profile" class="rounded-circle"> --}}
                        <span class="d-none d-md-block dropdown-toggle ps-2">H&D Webmaker</span>
                    </a><!-- End Profile Iamge Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                        <li class="dropdown-header">
                            <h6>H&D Webmaker</h6>
                            <span>Admin</span>
                        </li>

                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                                <i class="bi bi-person"></i>
                                <span>My Profile</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <form action="/logout" method="POST">
                                @csrf
                                <button class="dropdown-item d-flex align-items-center" type="submit"><i
                                        class="bi bi-box-arrow-right"></i><span>Sign Out</span></button>
                            </form>
                        </li>

                    </ul><!-- End Profile Dropdown Items -->
                </li><!-- End Profile Nav -->

            </ul>
        </nav><!-- End Icons Navigation -->

    </header><!-- End Header -->

    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">

        <ul class="sidebar-nav" id="sidebar-nav">
            <li class="nav-item">
                <a class="nav-link collapsed" href="/admin-profile">
                    <i class="bi bi-person"></i>
                    <span>My Profile</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="/admin-berita">
                    <i class="bi bi-people"></i>
                    <span>Berita</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="/admin-tentang_kami">
                    <i class="bi bi-people"></i>
                    <span>Tentang Kami</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="/admin-silabus">
                    <i class="bi bi-people"></i>
                    <span>Silabus</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="/admin-beranda">
                    <i class="bi bi-people"></i>
                    <span>Beranda</span>
                </a>
            </li>
        </ul>

    </aside><!-- End Sidebar-->


</div>
