@extends('layouts.admin')

@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <div class="row justify-content-between">
                <div class="col">
                    <h1>Voting</h1>
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">Admin</li>
                            <li class="breadcrumb-item active">Voting</li>
                        </ol>
                    </nav>
                </div>
                <div class="col text-end">
                    <button type="button" class="btn btn-danger rounded-pill">Reset Vote</button>
                    <button type="button" class="btn btn-light rounded-pill" data-bs-toggle="modal"
                        data-bs-target="#addNewPodcast">+ Tambah Voting</button>
                </div>
            </div>
        </div><!-- End Page Title -->
        
        <section class="section">
            <div class="row">
                    <table id="podcastTable" class="display">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Judul</th>
                                <th>Link</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($results as $result) 
                        <tr>   
                            <td>{{$result->id}}</td>
                            <td>{{$result->judul}}</td>
                            <td>{{$result->link}}</td>
                        
                            <td>
                                <div class="modal fade" id="editpodcast{{$result->id}}" tabindex="-1">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form method="POST" action="/admin-podcast_edit">
                                                @csrf
                                                <input type="hidden" name="id" value="{{$result->id}}">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Ubah Podcast</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row mb-3">
                                                        <label for="inputText" class="col-sm-2 col-form-label">Judul</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" name="judul" class="form-control" value="{{$result->judul}}"required>
                                                        </div>
                                                    </div>                                                    
                                                    <div class="row mb-3">
                                                        <label for="inputText" class="col-sm-2 col-form-label">Link</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" name="link" class="form-control" value="{{$result->link}}" required>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                    <button type="submit" class="btn btn-success">Edit</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                        data-bs-target="#editpodcast{{$result->id}}">Ubah</button>
                                <form action="/admin-podcast_delete" method="POST">
                                    @csrf
                                    <input type="hidden" name="delete" value="yes">
                                    <input type="hidden" name="id" value={{$result->id}}>
                                    <button type="delete" class="btn btn-danger">Delete</button>
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

        <div class="modal fade" id="addNewPodcast" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form method="POST" action="/admin-podcast_add">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title">Tambah Podcast</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Judul</label>
                                <div class="col-sm-10">
                                    <input type="text" name="judul" class="form-control" required>
                                </div>
                            </div>                                                    
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Link</label>
                                <div class="col-sm-10">
                                    <input type="text" name="link" class="form-control"  required>
                                </div>
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
//             $('#financeTable').DataTable({
//     "data": <?=$results?>,
//     "columns": [
//         { "data": "id" },
//         { "data": "nama" },
//         { "data": "kategori" },
//         { "data": "nominal" },
//         { "data": "satuan" },
//         { "data": "jumlah" },
//         { "data": "total" },
//     ], // Add a comma here
//     "paging": true,
//     "searching": true,
//     "ordering": true,
//     "info": true
// });

        </script>
        
    </main><!-- End #main -->
@endsection
