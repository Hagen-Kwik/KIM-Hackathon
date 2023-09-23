@extends('layouts.admin')

@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <div class="row justify-content-between">
                <div class="col">
                    <h1>Question</h1>
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">Admin</li>
                            <li class="breadcrumb-item">Quiz</li>
                            <li class="breadcrumb-item active">Question</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <!-- CEHCK ACTION  -->
                <form method="POST" action="/admin-question_add">
                    @csrf
                    <h5 class="modal-title">Tambah Quiz</h5>
                    <div class="row mt-3">
                        <label for="inputText" class="col-sm-2 col-form-label">For Quiz ID:</label>
                        <div class="col-sm-10">
                            <input type="text" name="quiz" class="form-control" value="{{ $quizID }}" disabled>
                        </div>
                    </div>
                    <input type="hidden" name="quizID" value="{{ $quizID }}">
                    <div class="row mt-3">
                        <label for="inputText" class="col-sm-2 col-form-label">Soal</label>
                        <div class="col-sm-10">
                            <input type="text" name="soal" class="form-control" required>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <label for="inputText" class="col-sm-2 col-form-label">Option A</label>
                        <div class="col-sm-10">
                            <input type="text" name="optionA" class="form-control" required>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <label for="inputText" class="col-sm-2 col-form-label">Option B</label>
                        <div class="col-sm-10">
                            <input type="text" name="optionB" class="form-control" required>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <label for="inputText" class="col-sm-2 col-form-label">Option C</label>
                        <div class="col-sm-10">
                            <input type="text" name="optionC" class="form-control" required>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <label for="inputText" class="col-sm-2 col-form-label">Option D</label>
                        <div class="col-sm-10">
                            <input type="text" name="optionD" class="form-control" required>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <label for="isiBerita" class="col-sm-2 col-form-label">Jawaban yang benar</label>
                        <div class="col-sm-10">
                            <select name="correctOption">
                                <option value="optionA">Option A</option>
                                <option value="optionB">Option B</option>
                                <option value="optionC">Option C</option>
                                <option value="optionD">Option D</option>
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
