@extends('layouts.admin')

@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <div class="row justify-content-between">
                <div class="col">
                    <h1>Guru</h1>
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">Admin</li>
                            <li class="breadcrumb-item active">Guru</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div><!-- End Page Title -->

        <section class="section">
            @if ($results != null)
                @foreach ($results as $result)
                    <div class="row aBox">
                        <div class="col-md-4"> <!-- Left column for the teacher's picture -->
                            <img src="{{ $result->picture }}" alt="Teacher's Picture" class="img-fluid">
                        </div>
                        <div class="col-md-8"> <!-- Right column for teacher's information -->
                            <h4 class="pt-2">{{ $result->teacherName }}</h4>
                            <h6>Deskripsi: {{ $result->description }}</h6>
                            <h6>Job Title: {{ $result->job_title }}</h6>
                            <h6>WhatsApp: {{ $result->whatsapp }}</h6>
                            <h6>Email: {{ $result->email }}</h6>
                            <h6>Instagram: {{ $result->instagram }}</h6>
                            <div style="display: flex; justify-content: flex-end;">
                                <a href="/admin-guru_formUpdate?id={{ $result->id }}"><button
                                        class="editButton">Edit</button></a>
                                <form method="POST" action="/admin-guru_delete" class="pb-2">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $result->id }}">
                                    <input type="hidden" name="delete" value="yes">
                                    <button class="deleteButton ms-3" type="submit">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </section>







    </main><!-- End #main -->
@endsection
