@extends('layouts.admin')

@section('content')
<main id="main" class="main">

    <div class="pagetitle">
        <div class="row justify-content-between">
            <div class="col">
                <h1>Siswa</h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">Admin</li>
                        <li class="breadcrumb-item active">Siswa</li>
                    </ol>
                </nav>
            </div>

            <div class="col text-end">
                <button type="button" class="btn btn-light rounded-pill" data-bs-toggle="modal" data-bs-target="#addNewSiswa">+ Tambah Siswa</button>
            </div>
        </div>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">

        </div>
        </div>
    </section>


    <div class="modal fade" id="addNewSiswa" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- CEHCK ACTION  -->
                <form method="POST" action="/admin">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title">Siswa Baru</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Nama Siswa</label>
                            <div class="col-sm-10">
                                <input type="name" name="name" class="form-control" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Sekolah</label>
                            <div class="col-sm-10">
                                <select name="sekolah" class="form-select fw-medium" id="selectSchool">
                                    @foreach ($schools as $school)
                                        <option value="{{ $school->id }}" class="fw-medium">{{ $school->school_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="email" name="email" class="form-control" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Kata Sandi</label>
                            <div class="col-sm-10">
                                <input type="password" name="password" class="form-control" required>
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
        $('#addNewSiswa').modal({
            backdrop: 'static',
            keyboard: false
        });

        $('#addNewSiswa .btn-close').click(function () {
            // Optionally, you can add a custom close behavior here
        });
    });
</script>

</main><!-- End #main -->
@endsection