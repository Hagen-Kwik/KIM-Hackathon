@extends('layouts.mainheader')
@section('css')
    {{-- <link rel="stylesheet" href="{{ asset('styles/silabus.css') }}"> --}}
@endsection
@section('title', 'welcome to learning section')
@section('content')

<div class="bg-white">
    {{-- banner --}}
    <div class="banner" style="background-image: url({{ asset('images/assets/bannerkegiatan2.jpeg') }});">
        <div class="w-100 row align-items-center m-0 p-0"
            style="height: 30vh; background: rgba(18, 14, 65, 0.509) !important;">
            <div class="col justify-content-center text-center">
                <h1 class=" text-white font-weight-bold">
                    Citizen Journalisme Remaja Silabus
                </h1>
            </div>
        </div>
    </div>
    {{-- content --}}
  
        <div class="bg-info w-100 py-4 position-relative">
            <div class="w-100 h-100 position-absolute bg-light" style="left: 8px; top: 0px;">
                <div class="w-100 h-100 d-flex align-items-center">
                    <h2 class="ml-2 mt-2 font-weight-bold text-info">
                        Perkenalan
                    </h2>
                </div>
            </div>
        </div>

        <div class="mt-lg-3 mb-lg-5">
            <div class="d-flex mt-3">
                <img src="{{ asset('images/assets/buarien.png') }}" alt="" style=""
                    class="bg-gray-400 image-box" width="200px">
                <p class="ml-3 mt-3 p-3">
                    Arien Sulistyani
                    adalah Ketua Citizen Journalisme Remaja. Arien Sulistyani lahir pada tanggal 18 Februari 1973 di Madiun. Dia tinggal di Jl. Semongko No. 4A, Madiun dan menganut agama Islam.
                </p>
            </div>

            <div class="d-flex mt-3">
                <img src="{{ asset('images/assets/pakkurniawan.jpg') }}" alt="" style=""
                    class="bg-gray-400 image-box" width="200px">
                <p class="ml-3 mt-3 p-3">
                    Kurniawan Dwi Jatmoko adalah 
                    Sekretaris Citizen Journalisme Remaja. Ia bertugas menyediakan dukungan administratif, seperti pengelolaan inventaris. Mengatur dan mengkoordinasikan pertemuan, termasuk persiapan agenda, pengiriman undangan, dan dokumentasi hasil pertemuan.
                </p>
            </div>

            <div class="d-flex mt-3">
                <img src="{{ asset('images/assets/pakaldi.jpeg') }}" alt="" style=""
                    class="bg-gray-400 image-box" width="200px">
                <p class="ml-3 mt-3 p-3">
                    Aldi Sunardi adalah anggota Citizen Journalisme Remaja 
                    jabatannya sebagai Bidang Pengelolaan Informasi Dan Komunikasi. 
                    Ia merupakan lulusan S1 Manajemen SDM di Universitas Katolik Widya Mandala Surabaya, 
                    telah menguasai secara baik mengenai analisis kebutuhan SDM, perencanaan dan pengembangan SDM, 
                    manajemen kinerja, manajemen talenta, manajemen konflik, dan komunikasi organisasi. Selain itu, 
                    memahami tentang hukum ketenagakerjaan dan teknologi informasi. Saya juga mampu desain grafis dan 
                    social media marketing.
                </p>
            </div>

        </div>
        {{-- YEL-YEL --}}
        <div class="mt-4 bg-info w-100 py-4 position-relative">
            <div class="w-100 h-100 position-absolute bg-light" style="left: 8px; top: 0px;">
                <div class="w-100 h-100 d-flex align-items-center">
                    <h2 class="ml-2 mt-2 font-weight-bold text-info">
                        Yel
                    </h2>
                </div>
            </div>
        </div>

        <div class=" mt-lg-3 mb-lg-5">
            <p>
                Ini adalah deskripsi dari yel.
            </p>
            {{-- consent --}}
            <div class="">
                <div class="d-flex align-items-end">
                    <h1 class="text-indigo m-0">
                        <i class="fa fa-file-video"></i>
                    </h1>
                    <div class="ml-2 text-dark">
                        Video Yel Pelatihan Model Perilaku Inovatif Guru (versi awal)
                    </div>
                </div>
                <div class="d-flex mt-3">
                    <div class="ml-2"></div>
                    <div class="ml-4">
                        <iframe width="560" height="315" src="https://www.youtube.com/embed/fK6W5iUz5pc"
                            title="YouTube video player" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen></iframe>
                    </div>
                </div>

            </div>
        </div>

        {{-- @foreach ($pelatihans as $pelatihan)
            @if ($pelatihan->type != 'tes' && $pelatihan->judul != 'Pertemuan 3: Memperkuat Intensi Berinovasi')
                <div class="mt-4 bg-info w-100 py-4 position-relative">
                    <div class="w-100 h-100 position-absolute bg-light" style="left: 8px; top: 0px;">
                        <div class="w-100 h-100 d-flex align-items-center">
                            <h2 class="ml-2 mt-2 font-weight-bold text-info">
                                {{ $pelatihan->judul }}
                            </h2>
                        </div>
                    </div>
                </div> --}}

                {{-- <div class=" mt-lg-3 mb-lg-5">
                    @if ($pelatihan->judul != 'Latihan Individu (Homework)')
                        <p>
                            {{ $pelatihan->deskripsi }}
                        </p>

                        {{-- materi --}}

                        {{-- <div class="d-flex align-items-end">
                            <h1 class="text-danger m-0">
                                <i class="fa fa-file-pdf"></i>
                            </h1>
                            <div class="ml-2">
                                <a href="https://guru-inovatif.com/modul/{{ $pelatihan->link_ppt }}"
                                    class="m-0 text-decoration-none text-purple">
                                    Download Modul
                                </a>
                            </div>
                        </div>

                        <div class="mt-3">
                            <div class="d-flex align-items-end">
                                <h1 class="text-indigo m-0">
                                    <i class="fa fa-file-video"></i>
                                </h1>
                                <div class="ml-2 text-dark">
                                    Video {{ $pelatihan->judul }}
                                </div>
                            </div>
                            <div class="d-flex mt-3">
                                <div class="ml-2"></div>
                                <div class="ml-4">
                                    <iframe width="560" height="315"
                                        src="https://www.youtube.com/embed/{{ substr($pelatihan->link, -11) }}"
                                        title="YouTube video player" frameborder="0"
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                        allowfullscreen></iframe>
                                </div>
                            </div>

                        </div>
                    @endif  --}}


                    {{-- <div class="d-flex justify-content-between align-items-center">
                        <a href="{{ route('user.training.show', $pelatihan->id) }}"
                            class="mt-3 text-decoration-none d-flex align-items-end">
                            <h1 class="text-info m-0">
                                <i class="fa fa-file-upload"></i>
                            </h1>
                            <div class="ml-2 text-dark">
                                Upload Submission
                            </div>
                        </a>

                        @foreach ($progresss as $progress)
                            @if ($progress->pelatihan->id == $pelatihan->id)
                                @if ($progress->status == 1)
                                    <div class="bg-green px-2 py-1 text-white rounded">
                                        <i class="fa fa-check"></i>
                                        Done
                                    </div>
                                @break
                            @endif
                        @endif
                    @endforeach --}}
                </div>
            </div>
        {{-- @endif --}}
</div>
    @endsection
