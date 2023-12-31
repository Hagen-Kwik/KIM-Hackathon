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

                <div class="col text-end">
                    <a href="/admin-quiz_formAdd"><button type="button" class="btn btn-light rounded-pill">+ Tambah
                            Quiz</button></a>
                </div>
            </div>
        </div><!-- End Page Title -->

        <section class="section">
            @if ($results != null)
                @foreach ($results as $result)
                    @php
                        $jumlahSoal = $questions->where('quiz_id', $result->id)->count();
                    @endphp
                    <div class="row aBox">
                        <h4 class="pt-2">{{ $result->title }}</h4>
                        @php
                            $quizType = $result->quiz_type_id == '1' ? 'Pre/Post Exam' : 'Exam';
                        @endphp
                        <h6>Type: {{ $quizType }}</h6>
                        <h6>Jumlah Soal: {{ $jumlahSoal }}</h6>
                        <a href="/admin-question?quizID={{ $result->id }}"><button class="editButton">Lihat
                                Soal</button></a>
                        <div style="display: flex; justify-content: flex-end;">
                            <a href="/admin-quiz_formUpdate?id={{ $result->id }}"><button
                                    class="editButton">Edit</button></a>
                            <form method="POST" action="/admin-quiz_delete" class="pb-2">
                                @csrf
                                <input type="hidden" name="id" value="{{ $result->id }}">
                                <input type="hidden" name="delete" value="yes">
                                <button class="deleteButton ms-3" type="submit">Delete</button>
                            </form>
                        </div>

                    </div>
                @endforeach
            @endif
        </section>






    </main><!-- End #main -->
@endsection
