@extends('layouts.mainheader')
@section('css')
<link rel="stylesheet" href="{{ asset('styles/berita.css') }}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css"/>

<script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
@endsection
@section('title', 'Berita Detail')

@section('content')
<div class="container mt-5">
    <h1 class="fw-bold">{{ $news->judul }}</h1>
    <h5 class="pb-3">by {{ $news->school->schoolName }}, {{$news->createdAt}}</h5>

    <div class="d-flex justify-content-center mt-4">
        <img src="{{ asset('storage/images/news/' . $news->id . '/' . $images[0]->pictureName) }}" class="img-fluid" id="news-big-imageid">
    </div>
    <div class="swiper mySwiper mb-5">
        @if (count($images) < 2)
            <div class="swiper-wrapper ps-3 w-100 justify-content-center">
        @elseif (count($images) < 3)
            <div class="swiper-wrapper ps-3 w-100 justify-content-md-center">
        @elseif (count($images) < 5)
            <div class="swiper-wrapper ps-3 w-100 justify-content-lg-center">
        @else
            <div class="swiper-wrapper ps-3 w-100">
        @endif

        @foreach ($images as $image)
            @if ($loop->first)
                <div class="swiper-slide swiper-slide1 mx-4 my-4">
                    <img src="{{ asset('storage/images/news/' . $news->id . '/' . $image->pictureName) }}"
                        alt="{{ $image->house_image }}" class="property-slider-image property-image-selected">
                </div>
            @else
                <div class="swiper-slide swiper-slide1 mx-4 my-4">
                    <img src="{{ asset('storage/images/news/' . $news->id . '/' . $image->pictureName) }}"
                        alt="{{ $image->house_image }}" class="property-slider-image">
                </div>
            @endif
        @endforeach
        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>
    <p class="pb-4">{{ $news->description }}</p>

 

</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js">
    < script src = "https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity = "sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
    crossorigin = "anonymous" >
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
    integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
<script>
    if (window.matchMedia("(min-width: 1024px)").matches) {
        var slides = 4
        var slides2 = 2.076
    } else if (window.matchMedia("(min-width: 768px)").matches) {
        var slides = 2.1
        var slides2 = 1.065
    } else {
        var slides = 1.14
        var slides2 = 1.0455
    }

    var swiper = new Swiper(".mySwiper", {
        slidesPerView: slides,
        spaceBetween: 30,
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
    });

    var swiper2 = new Swiper(".mySwiper2", {
        slidesPerView: slides2,
        spaceBetween: 30,
        navigation: {
            nextEl: ".swiper-button-next.swiper2",
            prevEl: ".swiper-button-prev.swiper2",
        },
    });

    $('.swiper-slide1').click(function() {
        var src = $(this).find('img').attr("src");
        $('#news-big-imageid').attr('src', src);
        $('.swiper-slide1').find('img').removeClass('property-image-selected');
        $(this).find('img').addClass('property-image-selected');
    });
</script>
@endsection