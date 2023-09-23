@extends('layouts.admin')

@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <div class="row justify-content-between">
                <div class="col">
                    <h1>Sekolah</h1>
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">Admin</li>
                            <li class="breadcrumb-item active">Sekolah</li>
                        </ol>
                    </nav>
                </div>

                <div class="col text-end">
                    <button type="button" class="btn btn-light rounded-pill" data-bs-toggle="modal"
                        data-bs-target="#addNewSekolah">+ Tambah Sekolah</button>
                </div>
            </div>
            <small class="text-danger pb-4">
                @foreach ($errors->get('nama_sekolah') as $err)
                    @if ($loop->iteration > 1)
                        <br/>
                    @endif
                    {{ ucfirst($err) }}
                @endforeach
                @foreach ($errors->get('lokasi_sekolah') as $err)
                    @if ($loop->iteration > 1)
                        <br/>
                    @endif
                    {{ ucfirst($err) }}
                @endforeach
                @foreach ($errors->get('gambar') as $err)
                    @if ($loop->iteration > 1)
                        <br/>
                    @endif
                    {{ ucfirst($err) }}
                @endforeach
            </small>
        </div><!-- End Page Title -->

        
        <section class="section pt-3">
            <div class="row ps-2 table-responsive">
                <table id="schoolTable table-responsive" class="display table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Gambar</th>
                            <th>Nama</th>
                            <th>Lokasi</th>
                            <th>Ubah/Hapus</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($results as $result) 
                        <tr>   
                            <td>{{$result->id}}</td>
                            <td><img src="{{ asset('storage/' . $result->bannerPicture) }}" height="40" width="40" style="border-radius: 100%; object-fit: cover;"></td>
                            <td>{{$result->schoolName}}</td>
                            <td>{{$result->location}}</td>
                            <td class="d-flex flex-row">
                                <div class="modal fade" id="editsekolah{{$result->id}}" tabindex="-1">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form method="POST" action="/admin-sekolah" enctype="multipart/form-data">
                                                @csrf
                                                @method('patch')
                                                <input type="hidden" name="id" value="{{$result->id}}">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Ubah Sekolah</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row mb-3">
                                                        <label for="inputText" class="col-sm-2 col-form-label">Nama Sekolah</label>
                                                        <div class="col-sm-10">
                                                            <input type="name" name="nama_sekolah" class="form-control" value="{{ $result->schoolName }}" required>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <label for="lokasiSekolah" class="col-sm-2 col-form-label">Lokasi</label>
                                                        <div class="col-sm-10">
                                                            <textarea name="lokasi_sekolah" id="" class="textarea form-control" rows="10">{{ $result->location }}</textarea>
                                                        </div>
                                                    </div>
                        
                                                    <div class="row mb-3">
                                                        <label for="gambar" class="col-sm-2 col-form-label">Ganti Gambar</label>
                                                        <div class="col-sm-10">
                                                            <input type="file" id="imageUpload" name="gambar" accept="image/*"
                                                                class="form-control">
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
                        data-bs-target="#editsekolah{{$result->id}}">Ubah</button>
                                <form action="/admin-sekolah" method="DELETE">
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


        <div class="modal fade" id="addNewSekolah" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- CEHCK ACTION  -->
                    <form method="POST" action="/admin-sekolah" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title">Sekolah Baru</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Nama Sekolah</label>
                                <div class="col-sm-10">
                                    <input type="name" name="nama_sekolah" class="form-control" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="lokasiSekolah" class="col-sm-2 col-form-label">Lokasi</label>
                                <div class="col-sm-10">
                                    <textarea name="lokasi_sekolah" id="" class="textarea form-control" rows="10"></textarea>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="gambar" class="col-sm-2 col-form-label">Gambar</label>
                                <div class="col-sm-10">
                                    <input type="file" id="imageUpload" name="gambar" accept="image/*"
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
            $(document).ready(function() {
                $('#addNewSekolah').modal({
                    backdrop: 'static',
                    keyboard: false
                });

                $('#addNewSekolah .btn-close').click(function() {
                    // Optionally, you can add a custom close behavior here
                });
            });
        </script>

    </main><!-- End #main -->
@endsection
