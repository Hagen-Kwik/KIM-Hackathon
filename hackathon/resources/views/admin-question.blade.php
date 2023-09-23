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

                <div class="col text-end">
                    <a href="/admin-question_formAdd?quizID={{ $_GET['quizID'] }}"><button type="button"
                            class="btn btn-light rounded-pill">+ Tambah
                            Soal</button></a>
                </div>
            </div>
        </div><!-- End Page Title -->

        <section class="section">
            @if ($questions != null)
                @foreach ($questions as $result)
                    <div class="row aBox">
                        <h6 style="display: block;">Quiz ID: {{ $result->quiz_id }}</h6>
                        <h6 style="display: block;">Question ID: {{ $result->id }}</h6>
                        <h4>{{ $result->question }}</h4>
                        <h6>Option A: {{ $result->optionA }}</h6>
                        <h6>Option B: {{ $result->optionB }}</h6>
                        <h6>Option C: {{ $result->optionC }}</h6>
                        <h6>Option D: {{ $result->optionD }}</h6>
                        <h6>Jawaban yang benar: {{ $result->correctOption }}</h6>
                        <div style="display: flex; justify-content: flex-end;">
                            <a href="/admin-question_formUpdate?id={{ $result->id }}"><button
                                    class="editButton">Edit</button></a>
                            <form method="POST" action="/admin-question_delete">
                                @csrf
                                <input type="hidden" name="id" value="{{ $result->id }}">
                                <input type="hidden" name="quizID" value="{{ $result->quiz_id }}">
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
