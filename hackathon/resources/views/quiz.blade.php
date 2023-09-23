@extends('layouts.mainheader')
@section('css')
    <link rel="stylesheet" href="{{ asset('styles/quiz.css') }}">
@endsection
@section('title', 'Quiz')

@section('content')
    <div class="container mt-5 px-4 px-md-0">
        <h1 class="fw-bold pb-3">{{ $quiz->title }}</h1>
        <p class="fw-medium fs-4 pb-2">Cek Pemahamanmu</p>
        <div class="quiz-line pb-5"></div>
        <form method="POST" action="/quiz">
            @csrf
            <input type="hidden" name="quiz_id" value="{{ $quiz->id }}">
            <ol class="fw-semibold fs-4 px-5">
                @foreach ($quiz->questions->shuffle() as $question)
                    <li class="pb-3">
                        {{ ucfirst($question->question) }}
                        <ol style="list-style-type:lower-alpha" class="fw-normal fs-6 pt-3">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="{{$question->id}}" id="exampleRadios1"
                                    value="option1">
                                <label class="form-check-label" for="exampleRadios1">{{ $question->optionA }}</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="{{$question->id}}" id="exampleRadios2"
                                    value="option2">
                                <label class="form-check-label" for="exampleRadios1">{{ $question->optionB }}</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="{{$question->id}}" id="exampleRadios3"
                                    value="option2">
                                <label class="form-check-label" for="exampleRadios1">{{ $question->optionC }}</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="{{$question->id}}" id="exampleRadios4"
                                    value="option2">
                                <label class="form-check-label" for="exampleRadios1">{{ $question->optionD }}</label>
                            </div>
                        </ol>
                    </li>
                @endforeach
            </ol>

            <div class="d-flex flex-row justify-content-center pb-5">
                <button class="btn btn-secondary fw-semibold" type="submit">Selesai</button>
            </div>
        </form>
    </div>
@endsection
