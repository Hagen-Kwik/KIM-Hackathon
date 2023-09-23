@extends('layouts.admin')

@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <div class="row justify-content-between">
                <div class="col">
                    <h1>Quiz</h1>
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">Admin</li>
                            <li class="breadcrumb-item active">Quiz</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <!-- CEHCK ACTION  -->
                <form method="POST" action="/admin-quiz_add">
                    @csrf
                    <h5 class="modal-title">Tambah Quiz</h5>
                    <div class="row mt-3">
                        <label for="inputText" class="col-sm-2 col-form-label">Judul</label>
                        <div class="col-sm-10">
                            <input type="text" name="title" class="form-control" required>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <label for="isiBerita" class="col-sm-2 col-form-label">Jenis</label>
                        <div class="col-sm-10">
                            <select name="quiz_type">
                                <option value="1">Pre/Post Exam</option>
                                <option value="2">Exam</option>
                            </select>
                        </div>
                    </div>

                    <div class='col mt-3'>
                        <button type="button" class="btn btn-secondary" onclick="window.history.back();">Cancel</button>
                        <button type="submit" class="btn btn-success">Add</button>
                    </div>

                </form>
            </div>
        </section>




    </main><!-- End #main -->
@endsection
