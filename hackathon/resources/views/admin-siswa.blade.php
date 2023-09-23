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
        <small class="text-danger pb-4">
            @foreach ($errors->get('nama') as $err)
                @if ($loop->iteration > 1)
                    <br/>
                @endif
                {{ ucfirst($err) }}
            @endforeach
            @foreach ($errors->get('sekolah') as $err)
                @if ($loop->iteration > 1)
                    <br/>
                @endif
                {{ ucfirst($err) }}
            @endforeach
            @foreach ($errors->get('email') as $err)
                @if ($loop->iteration > 1)
                    <br/>
                @endif
                {{ ucfirst($err) }}
            @endforeach
            @foreach ($errors->get('kata_sandi') as $err)
                @if ($loop->iteration > 1)
                    <br/>
                @endif
                {{ ucfirst($err) }}
            @endforeach
        </small>
    </div><!-- End Page Title -->

    <section class="section pt-3">
        <div class="row ps-2 table-responsive">
            <table id="schoolTable" class="display table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Sekolah</th>
                        <th>Email</th>
                        <th>Ubah/Hapus</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($results as $result) 
                    <tr>   
                        <td>{{$result->id}}</td>
                        <td>{{$result->name}}</td>
                        <td>{{$result->school->schoolName}}</td>
                        <td>{{$result->email}}</td>
                        <td class="d-flex flex-row">
                            <div class="modal fade" id="editsiswa{{$result->id}}" tabindex="-1">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form method="POST" action="/admin-siswa" enctype="multipart/form-data">
                                            @csrf
                                            @method('patch')
                                            <input type="hidden" name="id" value="{{$result->id}}">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Ubah Sekolah</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row mb-3">
                                                    <label for="inputText" class="col-sm-2 col-form-label">Nama Siswa</label>
                                                    <div class="col-sm-10">
                                                        <input type="name" name="nama" class="form-control" required>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label for="inputText" class="col-sm-2 col-form-label">Sekolah</label>
                                                    <div class="col-sm-10">
                                                        <select name="sekolah" class="form-select fw-medium" id="selectSchool">
                                                            @foreach ($schools as $school)
                                                                <option value="{{ $school->id }}" class="fw-medium">{{ $school->schoolName }}</option>
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
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                <button type="submit" class="btn btn-success">Ubah</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <button type="button" class="btn btn-warning me-3" data-bs-toggle="modal"
                    data-bs-target="#editsiswa{{$result->id}}">Ubah</button>
                            <form action="/admin-siswa" method="DELETE">
                                @csrf
                                <input type="hidden" name="delete" value="yes">
                                <input type="hidden" name="id" value={{$result->id}}>
                                <button type="delete" class="btn btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    <!-- Data will be inserted here -->
                </tbody>
            </table>
            

            </div>
        </div>
    </section>

    <div class="modal fade" id="addNewSiswa" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- CEHCK ACTION  -->
                <form method="POST" action="/admin-siswa">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title">Siswa Baru</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Nama Siswa</label>
                            <div class="col-sm-10">
                                <input type="name" name="nama" class="form-control" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Sekolah</label>
                            <div class="col-sm-10">
                                <select name="sekolah" class="form-select fw-medium" id="selectSchool">
                                    @foreach ($schools as $school)
                                        <option value="{{ $school->id }}" class="fw-medium">{{ $school->schoolName }}</option>
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
                                <input type="password" name="kata_sandi" class="form-control" required>
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