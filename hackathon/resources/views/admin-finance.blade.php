@extends('layouts.admin')

@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <div class="row justify-content-between">
                <div class="col">
                    <h1>Keuangan</h1>
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">Admin</li>
                            <li class="breadcrumb-item active">Keuangan</li>
                        </ol>
                    </nav>
                </div>
                <div class="col text-end">
                    <button type="button" class="btn btn-light rounded-pill" data-bs-toggle="modal"
                        data-bs-target="#addNewAdmin">+ Edit Silabus</button>
                </div>
            </div>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <table id="financeTable" class="display">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                            <th>Nama</th>
                            <th>Kategori</th>
                            <th>Nominal</th>
                            <th>Satuan</th>
                            <th>Jumlah</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Data will be inserted here -->
                    </tbody>
                </table>
                

                </div>
            </div>
        </section>


        <div class="modal fade" id="addNewAdmin" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form method="POST" action="/admin-manage_accountAdd">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title">New Admin</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                    <input type="name" name="name" class="form-control" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="email" name="email" class="form-control" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                                <div class="col-sm-10">
                                    <input type="password" name="password" class="form-control" required>
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
            $('#financeTable').DataTable({
    "data": [
        {
            "id":1,
            "created_at":"2023-09-22 17:52:36",
            "updated_at":"2023-09-22 17:52:36",
            "nama":"Uang transport",
            "kategori":"pengeluaran",
            "nominal":200000,
            "satuan":"Bulan",
            "jumlah":2,
            "total":400000
        }
    ],
    "columns": [
        { "data": "id" },
        { "data": "created_at" },
        { "data": "updated_at" },
        { "data": "nama" },
        { "data": "kategori" },
        { "data": "nominal" },
        { "data": "satuan" },
        { "data": "jumlah" },
        { "data": "total" }
    ], // Add a comma here
    "paging": true,
    "searching": true,
    "ordering": true,
    "info": true
});

        </script>
        
    </main><!-- End #main -->
@endsection
