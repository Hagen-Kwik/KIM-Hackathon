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

            <div class="col text-end">
                <button type="button" class="btn btn-light rounded-pill" data-bs-toggle="modal" data-bs-target="#addNewBerita">+ Tambah Berita</button>
            </div>
        </div>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">

        </div>
        </div>
    </section>


    <div class="modal fade" id="addNewBerita" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- CEHCK ACTION  -->
                <form method="POST" action="/admin">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title">Berita Baru</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Judul</label>
                            <div class="col-sm-10">
                                <input type="name" name="name" class="form-control" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="isiBerita" class="col-sm-2 col-form-label">Isi</label>
                            <div class="col-sm-10">
                                <textarea name="isiBerita" id="isiBerita" class="textarea form-control" rows="10"></textarea>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="gambar" class="col-sm-2 col-form-label">Gambar</label>
                            <div class="col-sm-10">
                                <input type="file" id="imageUpload" name="image" accept="image/*" class="form-control">
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
        $('#addNewBerita').modal({
            backdrop: 'static',
            keyboard: false
        });

        $('#addNewBerita .btn-close').click(function () {
            // Optionally, you can add a custom close behavior here
        });
    });
</script>

</main><!-- End #main -->
@endsection