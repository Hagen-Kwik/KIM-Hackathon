@extends('layouts.admin')

@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <div class="row justify-content-between">
                <div class="col">
                    <h1>Modul</h1>
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">Admin</li>
                            <li class="breadcrumb-item active">Modul</li>
                        </ol>
                    </nav>
                </div>

                <div class="col text-end">
                    <button type="button" class="btn btn-light rounded-pill" data-bs-toggle="modal" data-bs-target="#addNewModul">+ Tambah Modul</button>
                </div>
            </div>
            <small class="text-danger pb-4">
                @foreach ($errors->get('modul_id') as $err)
                    @if ($loop->iteration > 1)
                        <br/>
                    @endif
                    {{ ucfirst($err) }}
                @endforeach
                @foreach ($errors->get('title') as $err)
                    @if ($loop->iteration > 1)
                        <br/>
                    @endif
                    {{ ucfirst($err) }}
                @endforeach
                @foreach ($errors->get('description') as $err)
                    @if ($loop->iteration > 1)
                        <br/>
                    @endif
                    {{ ucfirst($err) }}
                @endforeach
                @foreach ($errors->get('learning_type') as $err)
                    @if ($loop->iteration > 1)
                        <br/>
                    @endif
                    {{ ucfirst($err) }}
                @endforeach
                @foreach ($errors->get('file') as $err)
                    @if ($loop->iteration > 1)
                        <br/>
                    @endif
                    {{ ucfirst($err) }}
                @endforeach
                @foreach ($errors->get('youtube_link') as $err)
                    @if ($loop->iteration > 1)
                        <br/>
                    @endif
                    {{ ucfirst($err) }}
                @endforeach
            </small>
        </div><!-- End Page Title -->

        <section class="section">
            @if ($results != null)
                @foreach ($results as $result)
                    <div class="row aBox py-4">
                        <h6 style="display: none;">{{ $result->id }}</h6>
                        <h4>{{ $result->title }}</h4>
                        <h6>{{ $result->description }}</h6>
                        <h6>{{ $result->learningType->learning_type }}</h6>
                        <div style="display: inline-block;" class="d-flex flex-row pt-2">
                            <div class="modal fade" id="editmodul{{ $result->id }}" tabindex="-1">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form method="POST" action="/admin-modul">
                                            @csrf
                                            @method('patch')
                                            <input type="hidden" name="modul_id" value="{{ $result->id }}">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Ubah Modul</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row mb-3">
                                                    <label for="inputText" class="col-sm-2 col-form-label">Judul</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" name="title" class="form-control"
                                                            value="{{ $result->title }}" required>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label for="inputText" class="col-sm-2 col-form-label">Deskripsi</label>
                                                    <div class="col-sm-10">
                                                        <textarea type="text" name="description" class="form-control"
                                                            placeholder="Deskripsi" required>{{$result->description}}</textarea>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label for="inputText" class="col-sm-2 col-form-label">Jenis Modul</label>
                                                    <div class="col-sm-10">
                                                        <select name="learning_type" class="form-select fw-medium" id="selectSchool">
                                                            @foreach ($learning_types as $learning_type)
                                                                <option value="{{ $learning_type->id }}" class="fw-medium">{{ $learning_type->learning_type }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label for="inputText" class="col-sm-2 col-form-label">Youtube Link</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" name="youtube_link" class="form-control"
                                                            placeholder="Youtube Link" value="{{$result->youtube_link}}">
                                                    </div>
                                                </div>

                                                <div class="row mb-3">
                                                    <label for="file" class="col-sm-2 col-form-label">File</label>
                                                    <div class="col-sm-10">
                                                        <input type="file" id="imageUpload" name="file" accept="application/pdf"
                                                            class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Cancel</button>
                                                <button type="submit" class="btn btn-success">Edit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                data-bs-target="#editmodul{{ $result->id }}">Ubah</button>
                            <form action="/admin-finance_delete" method="POST">
                                @csrf
                                <input type="hidden" name="delete" value="yes">
                                <input type="hidden" name="id" value={{ $result->id }}>
                                <button type="delete" class="btn btn-danger ms-3">Delete</button>
                            </form>
                        </div>
                    </div>
                @endforeach
            @endif
        </section>

        <div class="modal fade" id="addNewModul" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- CEHCK ACTION  -->
                    <form method="POST" action="/admin-modul">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title">Modul Baru</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Judul</label>
                                <div class="col-sm-10">
                                    <input type="text" name="title" class="form-control"
                                        required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Deskripsi</label>
                                <div class="col-sm-10">
                                    <textarea type="text" name="description" class="form-control"
                                        placeholder="Deskripsi" required></textarea>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Jenis Modul</label>
                                <div class="col-sm-10">
                                    <select name="learning_type" class="form-select fw-medium" id="selectSchool">
                                        @foreach ($learning_types as $learning_type)
                                        @if ($loop->first)
                                            <option value="{{ $learning_type->id }}" class="fw-medium" selected>{{ $learning_type->learning_type }}</option>
                                        @else
                                            <option value="{{ $learning_type->id }}" class="fw-medium">{{ $learning_type->learning_type }}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Youtube Link</label>
                                <div class="col-sm-10">
                                    <input type="text" name="description" class="form-control"
                                        placeholder="Youtube Link">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="file" class="col-sm-2 col-form-label">File</label>
                                <div class="col-sm-10">
                                    <input type="file" id="imageUpload" name="file" accept="application/pdf"
                                        class="form-control">
                                </div>
                            </div>
    
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-success">Add</button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    
        <script>
        $(document).ready(function () {
            $('#addNewModul').modal({
                backdrop: 'static',
                keyboard: false
            });
    
            $('#addNewModul .btn-close').click(function () {
                // Optionally, you can add a custom close behavior here
            });
        });
    </script>
        
    </main><!-- End #main -->
@endsection
