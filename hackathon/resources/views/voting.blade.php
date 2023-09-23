@extends('layouts.mainheader')
@section('css')
    <link rel="stylesheet" href="{{ asset('styles/berita.css') }}">
@endsection
@section('title', 'Donasi')

@section('content')

    <div class="container mt-5 text-center">
        @if ($winner != null)
            <div class="winnerBox">
                <h1>Karya Terpopuler Bulan ini 🔥</h1>
                @if ($winner != null)
                    <img src={{ $winner->link }} class="mt-3 mb-5" height="350px">
                    <h3 class="card-title">{{ $winner->judul }}</h3>
                @endif
            </div>
            @auth
                @php
                    $voted = Auth::user()->voted == '0' ? 'no' : 'yes';
                    $text = $voted == 'no' ? "You haven't voted" : 'You have voted';
                    $status = $voted == 'no' ? ' ' : 'disabled';
                @endphp
            @else
                @php
                    $text = 'Log In to vote';
                    $status = 'disabled';
                @endphp
            @endauth
            <h3 class="mt-5"> Pilihlah Karya terbaik menurutmu! ({{ $text }})</h3>

            <div class="row mt-4">
                @php $pictureCount = 0; @endphp
                @foreach ($results as $picture)
                    @if ($pictureCount % 4 == 0)
            </div>
            <div class="row mt-4 mb-5">
        @endif
        <div class="col-md-3">
            <div class="card">
                <img src="{{ $picture->link }}" class="card-img-top img-fluid" alt="Picture"
                    style="max-width: 100%; max-height: 200px; object-fit: scale-down; padding: 1%">
                <div class="card-body">
                    <h5 class="card-title">{{ $picture->judul }} ({{ $picture->vote }})</h5>
                    <label for=""></label>
                    <form action="/voted" method="POST">
                        @csrf
                        <input type="hidden" name="id" value={{ $picture->id }}>
                        <button class="btn btn-primary" {{ $status }}>Vote</button>
                    </form>
                </div>
            </div>
        </div>
        @php $pictureCount++; @endphp
        @endforeach
    @else
        <h1 class="mb-5">Belum Ada Event Voting</h1>
        @endif
    </div>



    </div>
@endsection
