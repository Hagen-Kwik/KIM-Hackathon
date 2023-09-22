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
            <p class="pb-5">Menghadapi era globalisasi serta kebebasan informasi, banyak media informasi baik cetak maupun elektronik, yang berbasis IT maupun yang konvensional yang dapat diakses oleh masyarakat.  Sementara kondisi sebagian masyarakat yang belum memiliki kemampuan untuk mengakses dan menelaah muatan informasi tersebut. Perlu adanya wadah bagi masyarakat untuk memperoleh informasi serta menyalurkan informasi yang ada di masyarakat.</br></br>Guna menyikapi hal tersebut di atas, Kelompok Informasi Masyarakat (KIM) Anyelir dibentuk pada tanggal 12 Agustus 2014 yang dikukuhkan dengan Surat Keputusan Lurah kejuron dengan nomor: 489/07/401.403.6/2014.</p>
        </div>
        <img src="{{ asset('images/assets/tentangkami1.jpg') }}" class="tentang-kami-picture-1 pb-5 pb-lg-0">
    </div>
</div>

<div class="container pb-5">
    <div class="d-flex flex-lg-row flex-column justify-content-lg-between align-items-center pb-5">
        <img src="{{ asset('images/assets/tentangkami2.jpg') }}" class="tentang-kami-picture-2">
        <div class="col-lg-6 px-lg-3 px-5 pt-5 pt-lg-0">
            <h2 class="fw-semibold">Apa Itu KIM Anyelir?</h2>
            <p class="pb-lg-5 pe-lg-5">Kelompok Informasi Masyarakat (KIM) Anyelir Kelurahan Kejuron Kecamatan Taman Kota Madiun merupakan organisasi sosial kemasyarakatan yang tumbuh dari, oleh dan untuk masyarakat yang berorientasi pada layanan informasi dan pemberdayaan masyarakat sesuai dengan kebutuhan. </br></br>KIM Anyelir disini  merupakan bagian integral dari Public Relation yang salah satu tugasnya membentuk opini public yang favourable. Oleh karenanya di tengah perubahan transisi menuju masyarakat madani saat ini, yang menjunjung tinggi nilai-nilai demokrasi, transparasi dan nilai-nilai hukum, KIM Anyelir harus mampu menyikapi serta mengambil peluang secara cerdas dalam memanfaatkan dan mengolah informasi yang ada dengan tanpa meninggalkan tradisi dan budaya lokal yang ada.</p>
        </div>
    
    </div>
</div>
@endsection
