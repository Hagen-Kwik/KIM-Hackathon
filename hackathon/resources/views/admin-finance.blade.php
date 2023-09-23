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
                        data-bs-target="#addNewAdmin">+ Tambah Keuangan</button>
                </div>
            </div>
        </div><!-- End Page Title -->
        
        <section class="section">
            <div class="row ps-2">
                <table id="financeTable" class="display">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama</th>
                            <th>Nominal</th>
                            <th>Jumlah</th>
                            <th>Satuan</th>
                            <th>Kategori</th>
                            <th>Total</th>
                            <th>Edit/delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($results as $result) 
                        <tr>   
                            <td>{{$result->id}}</td>
                            <td>{{$result->nama}}</td>
                            <td>{{$result->nominal}}</td>
                            <td>{{$result->jumlah}}</td>
                            <td>{{$result->satuan}}</td>
                            <td>{{$result->kategori}}</td>
                            <td>{{$result->total}}</td>
                            <td>
                                <div class="modal fade" id="editfinance{{$result->id}}" tabindex="-1">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form method="POST" action="/admin-finance_edit">
                                                @csrf
                                                <input type="hidden" name="id" value="{{$result->id}}">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Ubah Keuangan</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row mb-3">
                                                        <label for="inputText" class="col-sm-2 col-form-label">Name</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" name="nama" class="form-control" value="{{$result->nama}}"required>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <label for="kategori" class="col-sm-2 col-form-label">Kategori</label>
                                                        <div class="col-sm-10">
                                                            <select name="kategori" class="form-select" required>
                                                                <option value="Pengeluaran">Pengeluaran</option>
                                                                <option value="Pemasukan">Pemasukan</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="row mb-3">
                                                        <label for="inputText" class="col-sm-2 col-form-label">Nominal</label>
                                                        <div class="col-sm-10">
                                                            <input type="number" name="nominal" class="form-control" value="{{$result->nominal}}" required>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <label for="inputText" class="col-sm-2 col-form-label">Satuan</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" name="satuan" class="form-control" value="{{$result->satuan}}"required>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <label for="inputText" class="col-sm-2 col-form-label">Jumlah</label>
                                                        <div class="col-sm-10">
                                                            <input type="number" name="jumlah" class="form-control" value="{{$result->jumlah}}"required>
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
                        data-bs-target="#editfinance{{$result->id}}">Ubah</button>
                                <form action="/admin-finance_delete" method="POST">
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

        <div class="modal fade" id="addNewAdmin" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form method="POST" action="/admin-finance_add">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title">Data Keuangan Baru</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Nama</label>
                                <div class="col-sm-10">
                                    <input type="text" name="name" class="form-control" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="kategori" class="col-sm-2 col-form-label">Kategori</label>
                                <div class="col-sm-10">
                                    <select name="kategori" class="form-select" required>
                                        <option value="Pengeluaran">Pengeluaran</option>
                                        <option value="Pemasukan">Pemasukan</option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Nominal</label>
                                <div class="col-sm-10">
                                    <input type="number" name="nominal" class="form-control" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Satuan</label>
                                <div class="col-sm-10">
                                    <input type="text" name="satuan" class="form-control" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Jumlah</label>
                                <div class="col-sm-10">
                                    <input type="number" name="jumlah" class="form-control" required>
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
