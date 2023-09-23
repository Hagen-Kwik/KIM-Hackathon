@extends('layouts.admin')

@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <div class="row justify-content-between">
                <div class="col">
                    <h1>Silabus</h1>
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">Admin</li>
                            <li class="breadcrumb-item active">Silabus</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <form action="/admin-silabus" method="POST">
                    @csrf
                    @method('patch')
                    <div class="row mt-3">
                        <label for="inputText" class="col-sm-2 col-form-label">Judul</label>
                        <div class="col-sm-10">
                            <input type="text" name="judul" class="form-control" placeholder="Judul" value="{{$learning->title}}" required>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <label for="inputText" class="col-sm-2 col-form-label">Deskripsi</label>
                        <div class="col-sm-10">
                            <textarea type="text" name="deskripsi" class="form-control" placeholder="Deskripsi" required>{{$learning->description}}</textarea>
                        </div>
                    </div>
                    <div class="form-group row mt-3">
                        <label class="col-sm-2 col-form-label">Starts At</label>
                        <div class="col-sm-10">
                            <input class="form-control" name="mulai" placeholder="Select Time" type="time" value="{{$learning->starts_at}}"/>
                        </div>
                    </div>
                    <div class="form-group row mt-3">
                        <label class="col-sm-2 col-form-label">Ends At</label>
                        <div class="col-sm-10">
                            <input class="form-control" name="berakhir" placeholder="Select Time" type="time" value="{{$learning->ends_at}}"/>
                        </div>
                    </div>

                    <div class="pt-4 d-flex flex-row justify-content-center">
                        <button class="saveButton px-4" type="submit">Save</button>
                    </div>
                </form>
            </div>
        </section>


        <div class="modal fade" id="addNewAdmin" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form method="POST" action="/admin-silabus_add">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title">New Admin</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Judul</label>
                                <div class="col-sm-10">
                                    <input type="text" name="title" class="form-control" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Deskripsi</label>
                                <div class="col-sm-10">
                                    <input type="text" name="desc" class="form-control" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">gambar banner</label>
                                <div class="col-sm-10">
                                    <input type="file" name="picture" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="datetime">starts_at</label>
                                <input type="time" id="datetime" name="starts_at" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="datetime">ends_at</label>
                                <input type="time" id="datetime" name="ends_at" class="form-control" required>
                            </div>
                            <input type="hidden" name="school_id" value="{{Auth::user()->school_id}}">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-success">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


    </main><!-- End #main -->
@endsection
