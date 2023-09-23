@extends('layouts.mainheader')
@section('css')
    <link rel="stylesheet" href="{{ asset('styles/berita.css') }}">
@endsection
@section('title', 'Berita')

@section('content')
    <div class="container mt-5">
        <h1 class="fw-bold">Berita Terkini</h1>
        <div class="row mt-3 mb-5">
                @if (count($results)==0)
                <div class="text-center py-4">
                    <img style="width: 200px; opacity: 0.8;"
                        src="{{ asset('/images/assets/emptycontents.png') }}" alt="">
                        <p class="text-center fs-5 mt-3 font-montserrat fw-medium">Belum ada berita. </p>
                </div>
                @else
                @foreach ($results as $result)
                    <div class="col-lg-4 col-md-6 mb-4" style="display: inline-block;">
                        <a href="/berita-detail/{{ $result->id }}" style="text-decoration: none">
                            <div class="col-sm-12 EachGridBox">
                                <!-- image asset -->
                                <img src="{{asset('storage/images/news/' . $result->id . '/' . $result->news_pictures[0]->pictureName)}}"
                                    class="HalfRoundedCorner img-fluid">
                                <div class="InsideGridBox">
                                    <!-- title -->
                                    <h3 class="" style="font-size: 22px;"><strong>{{ $result->judul }}</strong> </h3>
                                    <h6>{{ $result->created_at }}</h6>
                                    <p>{{ $result->description }}</p>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
                @endif
            </div>

        </div>
    </div>
@endsection
