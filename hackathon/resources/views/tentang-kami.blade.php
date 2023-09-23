@extends('layouts.mainheader')
@section('css')
    <link rel="stylesheet" href="{{ asset('styles/tentang-kami.css') }}">
@endsection
@section('title', 'Tentang Kami')

@section('content')
    <div style="background-color: #F3F3F3;">
        <div class="container pt-5">
            <div class="pb-5">
                <div class="px-5 pt-5 pb-lg-4 pb-5">
                    <h1 class="fw-bold">Tentang Kami</h1>
                    <p class="pb-5 pb-lg-0">Organisasi Non Profit di Kota Madiun</p>
                </div>
            </div>
        </div>
    </div>

    <div class="container pt-5 pb-1">
        <div class="d-flex flex-lg-row flex-column-reverse justify-content-lg-between align-items-center">
            <div class="col-lg-6 px-5">
                <h2 class="fw-semibold">Latar Belakang</h2>
                @foreach ($aboutus->where('id', 1) as $us)
                    @php
                        $ttgkami = preg_split('/\r\n|\r|\n/', $us->description, -1, PREG_SPLIT_NO_EMPTY);
                        
                    @endphp
                    @foreach ($ttgkami as $kami)
                        <p class="" style="font-size: 14px;">{{ $kami }}</p>
                    @endforeach
                @endforeach
            </div>
            <img src="{{ asset('images/assets/tentangkami1.jpg') }}" class="tentang-kami-picture-1 pb-5 pb-lg-0">
        </div>
    </div>

    <div class="container pb-5 pt-5">
        <div class="d-flex flex-lg-row flex-column justify-content-lg-between align-items-center pb-5">
            <img src="{{ asset('images/assets/tentangkami2.jpg') }}" class="tentang-kami-picture-2">
            <div class="col-lg-6 px-lg-3 px-5 pt-5 pt-lg-0">
                <h2 class="fw-semibold">Maksud</h2>
                @foreach ($aboutus->where('id', 2) as $us)
                    @php
                        $maksud = preg_split('/\r\n|\r|\n/', $us->description, -1, PREG_SPLIT_NO_EMPTY);
                        
                    @endphp
                    @foreach ($maksud as $kami)
                        <p class="pe-lg-5" style="font-size: 14px;">{{ $kami }}</p>
                    @endforeach
                @endforeach
                <h2 class="fw-semibold">Tujuan</h2>
                <ul>
                    @foreach ($aboutus->where('id', 3) as $us)
                        @php
                            $tujuan = preg_split('/\r\n|\r|\n/', $us->description, -1, PREG_SPLIT_NO_EMPTY);
                            
                        @endphp
                        @foreach ($tujuan as $kami)
                            <li style="font-size: 14px;">{{ $kami }}</li>
                        @endforeach
                    @endforeach
                </ul>
            </div>

        </div>
    </div>
@endsection
