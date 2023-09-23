@extends('layouts.mainheader')
@section('css')
    <link rel="stylesheet" href="{{ asset('styles/silabus.css') }}">
@endsection
@section('title', 'welcome to learning section')
@section('content')

    <div class="bg-white">
        {{-- banner --}}
        <div class="banner" style="background-image: url({{ asset('images/assets/bannerkegiatan2.jpeg') }});">
            <div class="w-100 row align-items-center m-0 p-0"
                style="height: 30vh; background: rgba(18, 14, 65, 0.509) !important;">
                <div class="col justify-content-center text-center">
                    <h1 class=" text-white font-weight-bold">
                        Citizen Journalisme Remaja Silabus
                    </h1>
                </div>
            </div>
        </div>
        {{-- content --}}
        <div class="container py-4">
            <div class="bg-info w-100 py-4 position-relative">
                <div class="w-100 h-100 position-absolute bg-light" style="left: 8px; top: 0px;">
                    <div class="w-100 h-100 d-flex align-items-center">
                        <h2 class="ml-2 mt-2 font-weight-bold text-info">
                            Perkenalan
                        </h2>
                    </div>
                </div>
            </div>

            <div class="mt-lg-3 mb-lg-5">
                <div class="d-flex mt-3">
                    @if (count($teacher) == 0)
                        <div class="text-center align-items-center py-4">
                            <img style="width: 200px; opacity: 0.8;" src="{{ asset('/images/assets/emptycontents.png') }}"
                                alt="">
                            <p class="text-center fs-5 mt-3 font-montserrat fw-medium">Belum ada guru. </p>
                        </div>
                    @else
                        @foreach ($teacher->slice(0, 3) as $teachers)
                            <img src="{{ asset('images/assets/' . $teachers->picture) }}" alt="" style=""
                                class="bg-gray-400 image-box" width="200px">
                            <div class="ml-3 mt-3 p-3">
                                <p>
                                    {{ $teachers->teacherName }} adalah {{ $teachers->job_title }} Citizen Journalisme
                                    Remaja. {{ $teachers->description }}

                                <p class=""><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24">
                                        <g fill="none" stroke="currentColor" stroke-linecap="round"
                                            stroke-linejoin="round" stroke-width="2">
                                            <rect width="20" height="20" x="2" y="2" rx="5"
                                                ry="5" />
                                            <path d="M16 11.37A4 4 0 1 1 12.63 8A4 4 0 0 1 16 11.37zm1.5-4.87h.01"
                                                class="me-2 pet-hotel-preview-icons my-2 my-md-0" />
                                        </g>
                                    </svg> {{ $teachers->instagram }}</p>
                                <p class=""><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24">
                                        <path fill="currentColor"
                                            d="M19.05 4.91A9.816 9.816 0 0 0 12.04 2c-5.46 0-9.91 4.45-9.91 9.91c0 1.75.46 3.45 1.32 4.95L2.05 22l5.25-1.38c1.45.79 3.08 1.21 4.74 1.21c5.46 0 9.91-4.45 9.91-9.91c0-2.65-1.03-5.14-2.9-7.01zm-7.01 15.24c-1.48 0-2.93-.4-4.2-1.15l-.3-.18l-3.12.82l.83-3.04l-.2-.31a8.264 8.264 0 0 1-1.26-4.38c0-4.54 3.7-8.24 8.24-8.24c2.2 0 4.27.86 5.82 2.42a8.183 8.183 0 0 1 2.41 5.83c.02 4.54-3.68 8.23-8.22 8.23zm4.52-6.16c-.25-.12-1.47-.72-1.69-.81c-.23-.08-.39-.12-.56.12c-.17.25-.64.81-.78.97c-.14.17-.29.19-.54.06c-.25-.12-1.05-.39-1.99-1.23c-.74-.66-1.23-1.47-1.38-1.72c-.14-.25-.02-.38.11-.51c.11-.11.25-.29.37-.43s.17-.25.25-.41c.08-.17.04-.31-.02-.43s-.56-1.34-.76-1.84c-.2-.48-.41-.42-.56-.43h-.48c-.17 0-.43.06-.66.31c-.22.25-.86.85-.86 2.07c0 1.22.89 2.4 1.01 2.56c.12.17 1.75 2.67 4.23 3.74c.59.26 1.05.41 1.41.52c.59.19 1.13.16 1.56.1c.48-.07 1.47-.6 1.67-1.18c.21-.58.21-1.07.14-1.18s-.22-.16-.47-.28z" />
                                    </svg> {{ $teachers->whatsapp }}</p>
                                <p class=""><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24">
                                        <path fill="currentColor"
                                            d="M22 6c0-1.1-.9-2-2-2H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6zm-2 0l-8 5l-8-5h16zm0 12H4V8l8 5l8-5v10z" />
                                    </svg> {{ $teachers->email }}</p>

                                </p>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
            {{-- Materi --}}
            @if (count($modul) == 0)
                <div class="bg-info w-100 py-4 position-relative">
                    <div class="w-100 h-100 position-absolute bg-light" style="left: 8px; top: 0px;">
                        <div class="w-100 h-100 d-flex align-items-center">
                            <h2 class="ml-2 mt-2 font-weight-bold text-info">
                                Materi
                            </h2>

                        </div>
                    </div>
                </div>
                <div class="text-center align-items-center py-4">
                    <img style="width: 200px; opacity: 0.8;" src="{{ asset('/images/assets/emptycontents.png') }}"
                        alt="">
                    <p class="text-center fs-5 mt-3 font-montserrat fw-medium">Belum ada materi. </p>
                </div>
            @else
                @foreach ($modul as $moduls)
                    <div class="mt-4 bg-info w-100 py-4 position-relative">
                        <div class="w-100 h-100 position-absolute bg-light" style="left: 8px; top: 0px;">
                            <div class="w-100 h-100 d-flex align-items-center">
                                <h2 class="ml-2 mt-2 font-weight-bold text-info">
                                    {{ $moduls->learningType->learning_type }}
                                </h2>
                            </div>
                        </div>
                    </div>

                    <div class=" mt-lg-3 mb-lg-5">
                        <p>
                            {{ $moduls->description }}
                        </p>

                        <div class="d-flex align-items-end">
                            @if ($moduls->learningType->learning_type == 'Video pembelajaran')
                                <h1 class="text-indigo m-0">
                                    <i class="fa fa-file-video"></i>
                                </h1>
                                <div class="ml-2 text-dark">
                                    {{ $moduls->title }}
                                </div>
                            @elseif($moduls->learningType->learning_type == 'Modul pembelajaran')
                                <h1 class="text-indigo m-0">
                                    <i class="fa fa-file-pdf"></i>
                                </h1>
                                <div class="ml-2 text-dark">
                                    {{ $moduls->title }}
                                </div>
                            @else
                                <h1 class="text-indigo m-0">
                                    <h1 class="text-info m-0">
                                        <i class="fa fa-file-upload"></i>
                                    </h1>
                                </h1>
                                <div class="ml-2 text-dark">
                                    {{ $moduls->title }}
                                </div>
                            @endif
                        </div>

                        @if ($moduls->learningType->learning_type == 'Video pembelajaran')
                            <div class="d-flex mt-3">
                                <div class="ml-2"></div>
                                <div class="ml-4">
                                    <iframe width="560" height="315" src="{{ $moduls->youtube_link }}"
                                        title="YouTube video player" frameborder="0"
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                        allowfullscreen></iframe>
                                </div>
                            </div>
                        @elseif($moduls->learningType->learning_type == 'Modul pembelajaran')
                            <iframe src="{{ 'public/file/silabus/' . $moduls->file }}" width="800" height="500"
                                class="pt-3"></iframe>
                        @else
                        <button type="button" class="btn btn-light mt-3"
                        style="color: white; background-color: green;" data-bs-toggle="modal"
                        data-bs-target="#addNewtugas">Upload Tugas</button>
                        <div class="modal fade" id="addNewtugas" tabindex="-1">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <!-- CEHCK ACTION  -->
                            
                                    <form method="POST" action="/silabus" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" value="{{ $moduls->id }}" name="modul_id" id="typemodul">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Upload Tugas</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row mb-3">
                                                <div class="col-sm-12">
                                                    <input type="file" id="fileUpload" name="filemodul" accept="pdf/*"
                                                        class="form-control">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Cancel</button>
                                                <button type="submit" class="btn btn-success">Add</button>
                                            </div>
                                    </form>
                                </div>
                            </div>
                        </div>
            
                          
                        @endif
                    </div>
                @endforeach
            @endif


     

            <script>
                $(document).ready(function() {
                    $('#addNewtugas').modal({
                        backdrop: 'static',
                        keyboard: false
                    });

                    $('#addNewtugas .btn-close').click(function() {
                        // Optionally, you can add a custom close behavior here
                    });
                });
            </script>


        </div>
    </div>
@endsection
