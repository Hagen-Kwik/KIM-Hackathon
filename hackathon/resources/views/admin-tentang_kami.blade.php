@extends('layouts.admin')

@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <div class="row justify-content-between">
                <div class="col">
                    <h1>Tentang Kami</h1>
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">Admin</li>
                            <li class="breadcrumb-item active">Tentang Kami</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <section class="section">
            <div class="row">
                <form action="" method="">
                    @php
                        $latarbelakang = $aboutus
                            ->where('id', 1)
                            ->pluck('description')
                            ->first();
                        $maksud = $aboutus
                            ->where('id', 2)
                            ->pluck('description')
                            ->first();
                        $tujuan = $aboutus
                            ->where('id', 3)
                            ->pluck('description')
                            ->first();
                    @endphp
                    <h4>Latar Belakang</h4>
                    <textarea class="textarea" id="latarBelakang" name="latarbelakang" rows="1">{{ $latarbelakang }}</textarea>

                    <h4 class="specialAdditionalMargin">Maksud</h4>
                    <textarea class="textarea" id="maksud" name="maksud" rows="1">{{ $maksud }}</textarea>

                    <h4 class="specialAdditionalMargin">Tujuan</h4>
                    <textarea class="textarea" id="tujuan" name="tujuan" rows="1">{{ $tujuan }}</textarea>


                    <button class="saveButton">Save</button>
                </form>
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
    </main><!-- End #main -->
    <script>
        const latarBelakangTextarea = document.getElementById('latarBelakang');
        const maksudTextarea = document.getElementById('maksud');
        const tujuanTextarea = document.getElementById('tujuan');

        function adjustTextareaSize(textarea) {
            textarea.style.height = 'auto';
            textarea.style.height = (textarea.scrollHeight) + 'px';
        }

        latarBelakangTextarea.addEventListener('input', function() {
            adjustTextareaSize(this);
        });

        maksudTextarea.addEventListener('input', function() {
            adjustTextareaSize(this);
        });

        tujuanTextarea.addEventListener('input', function() {
            adjustTextareaSize(this);
        });

        // Set the initial textarea sizes based on the content
        window.addEventListener('load', function() {
            adjustTextareaSize(latarBelakangTextarea);
            adjustTextareaSize(maksudTextarea);
            adjustTextareaSize(tujuanTextarea);
        });
    </script>
@endsection
