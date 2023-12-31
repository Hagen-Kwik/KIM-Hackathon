@extends('layouts.mainheader')
@section('css')
    <link rel="stylesheet" href="{{ asset('styles/beranda.css') }}">
@endsection
@section('title', 'Beranda')

@section('content')
    <div class="bg-white">
        {{-- banner --}}
        <div class="banner" style="background-image: url({{ asset('images/assets/bannerkegiatan2.jpeg') }});">
            <div class="w-100 row align-items-center m-0 p-0"
                style="height: 60vh; background: rgba(18, 14, 65, 0.509) !important;">
                <div class="col justify-content-center text-center">
                    <h1 class=" text-white font-weight-bold">
                        Citizen Journalisme Remaja
                    </h1>
                </div>
            </div>
        </div>

        <div class="px-2 px-lg-3 pt-4">
            <form action="/" method="GET">
                <h3 class="text-center pt-3">Mitra Sekolah Kami</h3>
                <div class="row d-flex justify-content-evenly my-4 properties-page-filter-card px-lg-5 px-4 py-4 mx-3">
                    <label for="filterHouseStatus" class="font-montserrat mb-2" style="color: #676767;">Nama
                        Sekolah</label>
                    @if (request()->get('search'))
                        <div class="col-md-10 col-12 pe-md-4 property-filter-right-border">
                            <input value="{{ request()->get('search') }}" class="form-control me-2" type="text"
                                placeholder="Search" name="search" aria-label="Search" />
                        </div>
                    @else
                        <div class="col-md-10 col-12 pe-md-4 property-filter-right-border">
                            <input class="form-control me-2" type="text" placeholder="Search" name="search"
                                aria-label="Search" />
                        </div>
                    @endif
                    <div class="col-md-2 col-6 d-flex align-items-end justify-content-center ps-md-4 ps-lg-5 mt-4 mt-md-0">
                        <button class="btn btn-primary font-montserrat fw-semibold py-2 w-100" type="submit"
                            value="Search">Cari</button>
                    </div>
                </div>
            </form>

            <div class="mt-3">
                <div class="p-4">
                    <div class="row">
                        <!-- for loop this code -->
                        @if (count($school) == 0)
                            <div class="text-center py-4">
                                <img style="width: 200px; opacity: 0.8;"
                                    src="{{ asset('/images/assets/emptycontents.png') }}" alt="">
                                <p class="text-center fs-5 mt-3 font-montserrat fw-medium">Belum ada sekolah. </p>
                            </div>
                        @else
                            @foreach ($school as $schools)
                                <div class="col-lg-4 col-md-6 mb-4" style="display: inline-block;">
                                    <a href="/berandasekolah/{{ $schools->id }}">
                                        <div class="col-sm-12 EachGridBox">
                                            <!-- image asset -->
                                            <img src="{{ asset('storage/images/sekolah/' . $schools->id . '/' . $schools->bannerPicture) }}"
                                                class="HalfRoundedCorner img-fluid">

                                            <div class="InsideGridBox">
                                                <!-- title -->
                                                <h4 class="bold" style="font-size: 18px;">{{ $schools->schoolName }}</h4>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>

        </div>

        <div class="p-5">
            <h3 class="text-center">Kegiatan Kami</h3>
            <div class="row">
                <!-- for loop this code -->
                <div class="row">
                    <!-- for loop this code -->
                    @if (count($news) == 0)
                        <div class="text-center py-4">
                            <img style="width: 200px; opacity: 0.8;" src="{{ asset('/images/assets/emptycontents.png') }}"
                                alt="">
                            <p class="text-center fs-5 mt-3 font-montserrat fw-medium">Belum ada berita. </p>
                        </div>
                    @else
                        @foreach ($news->slice(0, 3) as $new)
                            <div class="col-lg-4 col-md-6 mb-4" style="display: inline-block;">
                                <a href="/berita-detail/{{ $new->id }}" style="text-decoration: none">
                                    <div class="col-sm-12 EachGridBox">
                                        <!-- image asset -->
                                        <img src="{{ asset('storage/images/news/' . $new->id . '/' . $new->news_pictures[0]->pictureName) }}"
                                            class="HalfRoundedCorner img-fluid2">
                                        <div class="InsideGridBox">
                                            <!-- title -->
                                            <h3 class="" style="font-size: 22px;">
                                                <strong>{{ $new->judul }}</strong>
                                            </h3>
                                            <h6>{{ $new->created_at }}</h6>
                                            <p>{{ $new->description }}</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
