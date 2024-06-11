@extends('admin.layouts.mainAdmin')

@section('containAdmin')

    <head>
        <link rel="stylesheet" href="assets/css/dragndrop.css">
    </head>

    <div class="container-fluid mt-4">
        <!-- title -->
        <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-4">
                <div class="container mx-2">
                    <h4>Tambah Ruangan<h4>
                </div>
            </div>
        </div>

        <!-- href ui -->
        <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-4">
                <div class="d-flex container my-2 mx-2">
                    <a href="/statusRuanganAdmin" class="fw-bolder" style="color: #797979; font-size:12px; ">Daftar Ruangan
                        ></a>
                    <a href="" class="fw-bolder" style="color: red; font-size:12px;">&nbsp;Tambah Ruangan </a>
                </div>
            </div>
        </div>

        <!-- value -->
        <div class="row justify-content-center mt-4">
            <div class="col-11">
                <div class="card border shadow shadow-md">
                    <div class="card-body">
                        <form action="{{ route('posts.ruangan') }}" method="POST" enctype="multipart/form-data"
                            id="my-form">
                            @csrf
                            <!-- left from text field -->
                            <div class="row">
                                <div class="col-7">
                                    <div class="form-group row">
                                        <div class="form-group row mb-2 ">
                                            <label for="id_ruangan" class="text-color col-md-3 col-form-label text-md-left-right">ID
                                                Ruangan</label>
                                            <div class="col-md-7">
                                                <input type="text" id="id_ruangan" class="bordered-text form-control" name="id_ruangan"
                                                    style="" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-2">
                                            <label for="nama_ruangan" class="text-color col-md-3 col-form-label text-md-right">Nama
                                                Ruangan</label>
                                            <div class="col-md-7">
                                                <input type="text" id="nama_ruangan" class=" bordered-text form-control"
                                                    name="nama_ruangan" required>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-2">
                                            <label for="kapasitas_ruangan"
                                                class="text-color col-md-3 col-form-label text-md-right">Kapasitas</label>
                                            <div class="col-md-7">
                                                <input type="number" id="kapasitas_ruangan" class="bordered-text form-control"
                                                    name="kapasitas_ruangan" required>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-2">
                                            <label for="lokasi"
                                                class="text-color col-md-3 col-form-label text-md-right">Lokasi</label>
                                            <div class="col-md-7">
                                                <input type="text" id="lokasi" class="bordered-text form-control" name="lokasi"
                                                    required>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-2">
                                            <label for="harga_ruangan"
                                                class="text-color col-md-3 col-form-label text-md-right">Harga</label>
                                            <div class="col-md-7">
                                                <input type="text" id="harga_ruangan" class="bordered-text form-control"
                                                    name="harga_ruangan" required>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-2">
                                            <label for="status"
                                                class="text-color col-md-3 col-form-label text-md-right">Status</label>
                                            <div class="col-md-7">
                                                <select id="status" class="form-control bordered-text" name="status">
                                                    <option value="">Pilih Status</option>
                                                    <option value="Available">Available</option>
                                                    <option value="Booked">Booked</option>
                                                </select>
                                                <input type="number" id="tersedia" class="bordered-text form-control" name="tersedia"
                                                    value="" required hidden>
                                            </div>
                                        </div>
                                        <!-- right form file -->

                                    </div>
                                </div>
                                <div class="col-5">
                                    <div class="form-group row mb-2">
                                        <label for="url" class="text-color col-md-4 col-form-label text-md-right">Gambar
                                            Ruangan</label>
                                    </div>

                                    <div class="drop-zone">
                                        <span class="drop-zone__prompt">Drop file here or click to upload</span>
                                        <input type="file" for="url" id="url" name="url[]"
                                            class="drop-zone__input" multiple>
                                    </div>

                                    <strong>Uploaded Files</strong>
                                    <p class="uploadedRooms"></p>

                                    <!-- Menggunakan class col-auto agar kolom menyesuaikan dengan ukuran kontennya -->
                                    <button type="submit" class="btn text-white" style="background-color: #0C9300">Tambah</button>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
    </div>
    </div>
    </div>
    <script src="assets/js/admin/dragndrop.js"></script>
    <style>
        .text-color {
            color: #717171;
            font-size: 14px;
            font-weight: 600;
        }
        .button-style{
            background-color: #0C9300; width: 147px; height: 41px; border-radius:6px;font-size: 14px;
        }
        .button-style:hover {
            background-color: #0A7A00; /* Slightly darker green for hover effect */
        }
        .capitalize-first-letter {
            text-transform: capitalize; /* Transform all text to lowercase */
        }
        .bordered-text {
            border: 1px solid #717171;
            padding: 5px;
            border-radius: 4px;
            min-height: 35px;
        }
        .border-color{
            border-color: #717171;
        }

    </style>
@endsection
