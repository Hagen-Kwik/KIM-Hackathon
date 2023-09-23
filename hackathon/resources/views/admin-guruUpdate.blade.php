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
            <div class="row">
                @php
                    $teacherID = $_GET['id'];
                    $guru = $gurus->where('id', $teacherID)->first();
                @endphp
                <!-- CEHCK ACTION  -->
                <form method="POST" action="/admin-guru_edit">
                    @csrf
                    <input type="hidden" name="id" value="{{ $teacherID }}">
                    <h5 class="modal-title">Edit Guru</h5>
                    <div class="row mt-3">
                        <label for="inputText" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" name="teacherName" class="form-control" value="{{ $guru->teacherName }}"
                                required>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <label for="inputText" class="col-sm-2 col-form-label">Deskripsi</label>
                        <div class="col-sm-10">
                            <input type="text" name="description" class="form-control" value="{{ $guru->description }}"
                                required>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <label for="inputText" class="col-sm-2 col-form-label">Job Title</label>
                        <div class="col-sm-10">
                            <input type="text" name="job_title" class="form-control" value="{{ $guru->job_title }}"
                                required>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <label for="inputText" class="col-sm-2 col-form-label">WhatsApp</label>
                        <div class="col-sm-10">
                            <input type="text" name="whatsapp" class="form-control" value="{{ $guru->whatsapp }}"
                                required>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <label for="inputText" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="text" name="email" class="form-control" value="{{ $guru->email }}" required>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <label for="inputText" class="col-sm-2 col-form-label">Instagram</label>
                        <div class="col-sm-10">
                            <input type="text" name="instagram" class="form-control" value="{{ $guru->instagram }}"
                                required>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <label for="inputText" class="col-sm-2 col-form-label">Picture</label>
                        <div class="col-sm-10">
                            @if ($guru->picture)
                                <img src="{{ $guru->picture }}" alt="Teacher's Picture" class="img-fluid mb-2"
                                    style="max-width: 200px;">
                            @endif
                            <input type="file" name="picture" class="form-control" accept="image/*">
                        </div>
                    </div>




                    <div class='col mt-3 d-flex justify-content-center w-100 pt-2'>
                        <button type="button" class="btn btn-secondary me-3"
                            onclick="window.history.back();">Cancel</button>
                        <button type="submit" class="btn btn-success">Edit</button>
                    </div>

                </form>
            </div>
        </section>




    </main><!-- End #main -->
@endsection
