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
                        <li class="breadcrumb-item active">Quiz</li>
                    </ol>
                </nav>
            </div>

            <div class="col text-end">
                <a href="/admin-quiz_form"><button type="button" class="btn btn-light rounded-pill">+ Tambah Quiz</button></a>
            </div>
        </div>
    </div><!-- End Page Title -->

    <section class="section">
        @if ($results != null)
        @foreach ($results as $result)
        <div class="row aBox">
            <h6 style="display: none;">{{$result->id}}</h6>
            <h4>{{$result->judul}}</h4>
            <h6>{{$result->description}}</h6>
            <h6> Video Link = {{$result->video_link}}</h6>
            <div style="display: inline-block;">
                <a href="/admin-berita_edit"><button class="editButton">Edit</button></a>
                <form method="POST" action="/admin-berita_delete">
                    @csrf
                    <input type="hidden" name="id" value="{{$result->id}}">
                    <input type="hidden" name="delete" value="yes">
                    <button class="deleteButton" type="submit">Delete</button>
                </form>
            </div>
        </div>

        @endforeach
        @endif
    </section>






</main><!-- End #main -->
@endsection