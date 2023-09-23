@extends('layouts.mainheader')
@section('css')
<link rel="stylesheet" href="{{ asset('styles/berita.css') }}">
@endsection
@section('title', 'Berita')

@section('content')
<div class="container mt-5">
    <h1 class="fw-bold">Berita Terkini</h1>


    <div class="row mt-5 mb-5">
        <!-- for loop this code -->
        <div class="col EachGridBox">
            <!-- image asset -->
            <img src="{{ asset('images/assets/berita_trial_pic.jpg') }}" height="10" class="HalfRoundedCorner img-fluid">

            <div class="InsideGridBox">
                <!-- title -->
                <h4 class="fw-bold">Title</h4>
                <!-- upload data -->
                <h6>22 September 2023</h6>
                <!-- description -->
                <p>Decription is so long lorem ipsum..........</p>
                <!-- button redirect -->
                <a href="/berita-detail"><button class="btn btn-primary">Selengkapnya</button></a>
            </div>

        </div>
        <!-- END for loop this code -->

        <div class="col coll">
            Column
        </div>

        <div class="col coll">
            Column
        </div>

    </div>

    <!-- Pakai ini buat langung iterasi for loop -->

    <!-- <div class="row mt-5">
 kasih for loop sini
    <div class="col EachGridBox">
            <img src="{{ asset('images/assets/berita_trial_pic.jpg') }}" height="10" class="HalfRoundedCorner img-fluid">

            <div class="InsideGridBox">
                <h4 class="bold"></h4>
                <h6></h6>
                <p></p>
                <button class="btn-primary">Selengkapnya</button>
            </div>
        </div>

        if ($loop->iteration % 3 == 0)
    </div>
    <div class="row mt-5 mb-5">
        endif
        endforeach
    </div> -->
 

</div>
@endsection