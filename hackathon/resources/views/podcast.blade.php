@extends('layouts.mainheader')
@section('css')
<!-- <link rel="stylesheet" href="{{ asset('styles/berita.css') }}"> -->
@endsection
@section('title', 'Podcast')

@section('content')
<div class="container mt-5">
    <h1 class="fw-bold">Podcast</h1>

    @if ($results != null)
    @foreach ($results as $result)
        <!-- Start a new row for every two iframes -->
        @if ($loop->iteration % 2 == 1)
            <div class="row mb-5">
        @endif

        <div class="col">
            <div class="video-container">
                <iframe width="560" height="315" src="{{$result->link}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                {{-- <iframe width="560" height="315" src="" frameborder="0" allowfullscreen></iframe> --}}
                <h4>{{$result->judul}}</h4>
            </div>
        </div>

        <!-- Close the row after the second iframe -->
        @if ($loop->iteration % 2 == 0 || $loop->last)
            </div>
        @endif

    @endforeach
@endif

    


</div>
@endsection