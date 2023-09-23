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
                @php
                    $questionID = $_GET['id'];
                    $question = $questions->where('id', $questionID)->first();
                @endphp
                <!-- CEHCK ACTION  -->
                <form method="POST" action="/admin-question_edit">
                    @csrf
                    <input type="hidden" name="id" value="{{ $questionID }}">
                    <h5 class="modal-title">Edit Question</h5>
                    <div class="row mt-3">
                        <label for="inputText" class="col-sm-2 col-form-label">For Quiz ID:</label>
                        <div class="col-sm-10">
                            <input type="text" name="quiz" class="form-control" value="{{ $question->quiz_id }}"
                                disabled>
                        </div>
                    </div>
                    <input type="hidden" name="quizID" value="{{ $question->quiz_id }}">
                    <div class="row mt-3">
                        <label for="inputText" class="col-sm-2 col-form-label">Soal</label>
                        <div class="col-sm-10">
                            <input type="text" name="soal" class="form-control" value="{{ $question->question }}"
                                required>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <label for="inputText" class="col-sm-2 col-form-label">Option A</label>
                        <div class="col-sm-10">
                            <input type="text" name="optionA" class="form-control" value="{{ $question->optionA }}"
                                required>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <label for="inputText" class="col-sm-2 col-form-label">Option B</label>
                        <div class="col-sm-10">
                            <input type="text" name="optionB" class="form-control" value="{{ $question->optionB }}"
                                required>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <label for="inputText" class="col-sm-2 col-form-label">Option C</label>
                        <div class="col-sm-10">
                            <input type="text" name="optionC" class="form-control" value="{{ $question->optionC }}"
                                required>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <label for="inputText" class="col-sm-2 col-form-label">Option D</label>
                        <div class="col-sm-10">
                            <input type="text" name="optionD" class="form-control" value="{{ $question->optionD }}"
                                required>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <label for="isiBerita" class="col-sm-2 col-form-label">Jawaban yang benar</label>
                        <div class="col-sm-10">
                            <select name="correctOption">
                                <option value="optionA"
                                    {{ $question->correctOption == $question->optionA ? 'selected' : '' }}>Option A</option>
                                <option value="optionB"
                                    {{ $question->correctOption == $question->optionB ? 'selected' : '' }}>Option B</option>
                                <option value="optionC"
                                    {{ $question->correctOption == $question->optionC ? 'selected' : '' }}>Option C
                                </option>
                                <option value="optionD"
                                    {{ $question->correctOption == $question->optionD ? 'selected' : '' }}>Option D
                                </option>
                            </select>
                        </div>
                    </div>

                    <div class='col mt-3'>
                        <button type="button" class="btn btn-secondary" onclick="window.history.back();">Cancel</button>
                        <button type="submit" class="btn btn-success">Edit</button>
                    </div>

                </form>
            </div>
        </section>




    </main><!-- End #main -->
@endsection
