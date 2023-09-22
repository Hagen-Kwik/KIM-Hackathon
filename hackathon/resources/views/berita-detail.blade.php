@extends('layouts.mainheader')
@section('css')
<link rel="stylesheet" href="{{ asset('styles/berita.css') }}">
@endsection
@section('title', 'Berita Detail')

@section('content')
<div class="container mt-5">
    <h1 class="bold">JUDUL Disini</h1>
    <h5>by CJR MANA, Tanggal disini</h5>
    <img src="{{ asset('images/assets/tentangkami1.jpg') }}" class="img-fluid">
    <p>Deskripsi berita</p>

 

</div>
@endsection