@extends('layouts.admin')

@section('content')
<main id="main" class="main">

    <div class="pagetitle">
        <div class="row justify-content-between">
            <div class="col">
                <h1>Berita</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">Admin</li>
                        <li class="breadcrumb-item active">Berita</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <!-- CEHCK ACTION  -->
            <form method="POST" action="/admin-berita_add">
                @csrf
                <h5 class="modal-title">Tambah Berita/Edit Berita</h5>
                <div class="row mt-3">
                    <label for="inputText" class="col-sm-2 col-form-label">Judul</label>
                    <div class="col-sm-10">
                        <input type="text" name="judul" class="form-control" required>
                    </div>
                </div>

                <div class="row mt-3">
                    <label for="isiBerita" class="col-sm-2 col-form-label">Isi</label>
                    <div class="col-sm-10">
                        <textarea name="isiBerita" id="isiBerita" class="textarea" rows="10"></textarea>
                    </div>
                </div>

                <div class="row mt-3 mb-3">
                    <label for="inputVideoLink" class="col-sm-2 col-form-label">Video Link</label>
                    <div class="col-sm-10">
                        <input type="text" name="VideoLink" class="form-control" required>
                    </div>
                </div>

                <label for="imageUpload">Choose one or more images:</label>
                <input type="file" id="imageUpload" name="images[]" accept="image/*" multiple>

                <div class='col mt-3'>
                    <button type="button" class="btn btn-secondary" onclick="window.history.back();">Cancel</button>
                    <button type="submit" class="btn btn-success">Add</button>
                </div>

            </form>
        </div>
    </section>




</main><!-- End #main -->
@endsection