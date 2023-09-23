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
            <p class="pb-5" style="font-size: 14px;">Jurnalistik merupakan dunia yang mengasyikkan dan memberi banyak manfaat terutama untuk pengembangan skill. Pelajar dan mahasiswa pun perlu dikenalkan dan diakrabkan dengan dunia jurnalistik. Salah satunya adalah skills dalam mengelola dunia jurnalistik.  Dengan mendalami jurnalistik, khususnya jurnalistik media (koran, majalah, dan platform digital) akan membawa dampak positif. Salah satunya adalah keterampilan mereka di dalam mengelola media massa. Dengan memiliki ketrampilan di dalam mengelola media massa, maka peluang remaja untuk terjun di dalam dunia jurnalistik akan terbuka lebar.
            </br></br>Adanya program pelatihan jurnalistik ”Citizen Journalism Remaja” atau yang lebih dikenal CJr merupakan salah satu ikhtiar dalam rangka mengembangkan skills remaja di Kota Madiun khususnya wilayah Kel. Kejuron dalam dunia jurnalistik/kepenulisan. Materi dalam kegiatan jurnalistik ini tidak membebani pelajar dengan tema-tema yang berat, namun diupayakan peserta merasa senang dan enjoy di dalam mengikuti pelatihan. Dengan Pelatihan ini diharapkan akan memunculkan remaja dan pelajar yang memiliki kemampuan di dalam mengelola media massa secara handal.</p>
        </div>
        <img src="{{ asset('images/assets/tentangkami1.jpg') }}" class="tentang-kami-picture-1 pb-5 pb-lg-0">
    </div>
</div>

<div class="container pb-5">
    <div class="d-flex flex-lg-row flex-column justify-content-lg-between align-items-center pb-5">
        <img src="{{ asset('images/assets/tentangkami2.jpg') }}" class="tentang-kami-picture-2">
        <div class="col-lg-6 px-lg-3 px-5 pt-5 pt-lg-0">
            <h2 class="fw-semibold">Maksud</h2>
            <p class="pe-lg-5" style="font-size: 14px;">Maksud dari kegiatan CJr ini adalah memfasilitasi siswa melakukan wawancara, mencatat, merekam (mendokumentasikan) kegiatan observasi (pengamatan) yang berkaitan dengan tema pembelajaran baik secara individu ataupun kelompok. Kemudian siswa menuliskan hasilnya ke dalam bentuk artikel laporan berita, mengupload dalam bentuk gambar ataupun video.</p>
            <h2 class="fw-semibold">Tujuan</h2>
            <ul>
                <li style="font-size: 14px;">Meningkatkan skill/kemampuan remaja dalam dunia tulis menulis. Hal ini akan memberikan dampak positif bagi adik-adik remaja salah satunya dalam mengelola media massa. Dengan memiliki keterampilan di dalam mengelola media massa, maka peluang remaja untuk terjun di dalam dunia jurnalistik akan terbuka lebar.</li>
                <li style="font-size: 14px;">Mengenalkan kepada pelajar tentang seluk-beluk dunia jurnalistik.</li>
                <li style="font-size: 14px;">Menumbuhkan kecerdasan dan kreativitas pelajar melalui tradisi jurnalistik.</li>
                <li style="font-size: 14px;">Mampu membuat media massa sendiri, majalah sekolah, baik offline maupun online.</li>
            </ul>
        </div>
    
    </div>
</div>
@endsection
