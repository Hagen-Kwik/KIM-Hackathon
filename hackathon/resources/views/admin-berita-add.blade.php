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

        <form action="{{ route('dropzone.storenews') }}" class="dropzone col justify-content-center text-center mb-4"
            id="my-dropzone">
            @csrf
            <div class="dz-message" data-dz-message>
                <img src="{{ asset('/images/assets/imgdragdropicon.png') }}" alt="Add Image Icon" class="dragdropicon mb-3">
                <p class="font-montserrat fw-medium dragdroptext d-none d-lg-block">Drag & Drop Gambar Di Sini Untuk Di
                    Upload</p>
                <p class="font-montserrat fw-medium dragdroptext d-lg-none">Upload Gambar Di Sini</p>
            </div>
        </form>
        <small class="text-danger font-montserrat">
            @foreach ($errors->get('gambar_rumah') as $err)
                @if ($loop->iteration > 1)
                    <br />
                @endif
                {{ ucfirst($err) }}
            @endforeach
        </small>

        <section class="section">
            <div class="row">
                <!-- CEHCK ACTION  -->
                <form method="POST" action="/admin-berita">
                    @csrf
                    <input type="hidden" name="gambar_rumah" value="" id="news_img">
                    <h5 class="modal-title">Tambah Berita</h5>
                    <div class="row mt-3">
                        <label for="inputText" class="col-sm-2 col-form-label">Judul</label>
                        <div class="col-sm-10">
                            <input type="text" name="judul" class="form-control" required>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <label for="isiBerita" class="col-sm-2 col-form-label">Isi</label>
                        <div class="col-sm-10">
                            <textarea name="isiBerita" id="isiBerita" class="textarea form-control" rows="10"></textarea>
                        </div>
                    </div>

                    <div class="row mt-3 mb-3">
                        <label for="inputVideoLink" class="col-sm-2 col-form-label">Video Link</label>
                        <div class="col-sm-10">
                            <input type="text" name="VideoLink" class="form-control" required>
                        </div>
                    </div>

                    <div class='col mt-3 d-flex justify-content-center py-3'>
                        <button type="button" class="btn btn-secondary me-3" onclick="window.history.back();">Batal</button>
                        <button type="submit" class="btn btn-success">Tambah</button>
                    </div>

                </form>
            </div>
        </section>
    </main>
    <script>
        Dropzone.options.myDropzone = {
            acceptedFiles: 'image/*',
            dictRemoveFile: 'Remove',
            init: function() {
                this.on("success", function(file, response) {
                    // Create the remove button
                    var removeButton = Dropzone.createElement(
                        "<button class='btn btn-danger mt-5 w-100 fw-medium font-montserrat'>Hapus</button>"
                        );

                    // Capture the Dropzone instance as closure.
                    var _this = this;

                    var tmp = document.getElementById("news_img").value;
                    document.getElementById("news_img").value = tmp + "1";

                    // Listen to the click event
                    removeButton.addEventListener("click", function(e) {
                        // Make sure the button click doesn't submit the form:
                        e.preventDefault();
                        e.stopPropagation();

                        // Remove the file preview.
                        _this.removeFile(file);

                        var tmp = document.getElementById("news_img").value;
                        document.getElementById("news_img").value = tmp.substring(0, (tmp.length -
                            1));

                        // If you want to the delete the file on the server as well,
                        // you can do the AJAX request here.
                        $.ajax({
                            type: 'GET',
                            url: '{{ route('dropzone.deletenews') }}',
                            data: {
                                'file_ext': (file.name).split('.').pop(),
                                'file_name': response.index
                            }
                        });
                    });

                    // Add the button to the file preview element.
                    file.previewElement.appendChild(removeButton);
                });
            }
        };
    </script>
@endsection
