@extends('layouts.admin')

@section('content')
<main id="main" class="main">

    <div class="pagetitle">
        <div class="row justify-content-between">
            <div class="col">
                <h1>Berita</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">Admin</li>
                        <li class="breadcrumb-item active">Berita</li>
                    </ol>
                </nav>
            </div>

            <div class="col text-end">
                <a href="/admin-berita_form"><button type="button" class="btn btn-light rounded-pill">+ Tambah Berita</button></a>
            </div>
        </div>
    </div><!-- End Page Title -->

    <section class="section">
        @if ($results != null)
        @foreach ($results as $result)
        <div class="row aBox">
            <h6 style="display: none;">{{$result->id}}</h6>
            <h3>{{$result->judul}}</h3>
            <h3>{{$result->description}}</h3>
            <h3>{{$result->video_link}}</h3>
            <a href="/admin-berita_delete"><button>Delete</button></a>
            <button>Delete</button>

            @endforeach
            @endif
        </div>
    </section>






</main><!-- End #main -->
@endsection