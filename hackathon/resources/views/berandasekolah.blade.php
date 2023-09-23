@extends('layouts.mainheader')
@section('css')
    <link rel="stylesheet" href="{{ asset('styles/berita.css') }}">
@endsection
@section('title', 'Berita')

@section('content')
    <div class="container mt-5">
        <h1 class="fw-bold text-center">Berita {{ $school->schoolName }}</h1>
        <div class="row mt-5 mb-5">
            <!-- for loop this code -->
            <div class="row">
                <!-- for loop this code -->
                @foreach ($berita as $beritas)
                    @if (count($berita) == 0)
                        <div class="text-center py-4">
                            <img style="width: 200px; opacity: 0.8;" src="{{ asset('/images/assets/emptycontents.png') }}"
                                alt="">
                            <p class="text-center fs-5 mt-3 font-montserrat fw-medium">Belum ada sekolah. </p>
                        </div>
                    @else
                        <div class="col-lg-4 col-md-6 mb-4" style="display: inline-block;">
                            <a href="/berita-detail/{{ $beritas->id }}" style="text-decoration: none">
                                <div class="col-sm-12 EachGridBox">
                                    <!-- image asset -->
                                    <img src="{{asset('storage/images/news/' . $beritas->id . '/' . $beritas->news_pictures[0]->pictureName)}}"
                                        class="HalfRoundedCorner img-fluid">
                                    <div class="InsideGridBox">
                                        <!-- title -->
                                        <h3 class="" style="font-size: 22px;"><strong>{{ $beritas->judul }}</strong>
                                        </h3>
                                        <h6>{{ $beritas->created_at }}</h6>
                                        <p>{{ $beritas->description }}</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
@endsection
