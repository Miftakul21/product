<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Rest API Produk</title>

</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Rest API Produk</a>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="container mt-5">
        <div class="row">
            <div class="col-6">
                <div class="card shadow">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5>Data Produk</h5>
                        <div class="d-flex align-items-center" style="gap:10px;">
                            <button style="width: 180px; height: 35px; white-space: no-wrap;"
                                class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                data-bs-target="#tambahProduk">Tambah Data
                            </button>
                            <select class="form-control" name="" id="selected-status-produk">
                                <option value="" selected>Cari status produk</option>
                            </select>
                        </div>
                    </div>
                    <div class="card-content table-responsive">
                        <table class="table  table-hover">
                            <thead class="table-dark">
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama Produk</th>
                                    <th scope="col">Harga</th>
                                    <th scope="col">Kategori Produk</th>
                                    <th scope="col">Status Produk</th>
                                    <th scope="col" style="text-align:center;">Action</th>
                                </tr>
                            </thead>
                            <tbody id="data-produk">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="row">
                    <div class="col-6">
                        <div class="card shadow">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h5>Data Kategori</h5>
                                <button class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#tambahKategori">Tambah
                                    data</button>
                            </div>
                            <div class="card-content table-responsive">
                                <table class="table  table-hover">
                                    <thead class="table-dark">
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Kategori</th>
                                            <th scope="col" style="text-align:center;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="data-kategori">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="card shadow">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h5>Data Status</h5>
                                <button class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#tambahStatus">Tambah
                                    data</button>
                            </div>
                            <div class="card-content table-responsive">
                                <table class="table  table-hover">
                                    <thead class="table-dark">
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Status</th>
                                            <th scope="col" style="text-align:center;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="data-status">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Modal Tambah Produk -->
    <div class="modal fade" id="tambahProduk" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Tambah Produk</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="javascript:void(0)" id="form-tambah-produk">
                        <div class="mb-3">
                            <label for="produk" class="form-label">Produk</label>
                            <input type="text" class="form-control" id="produk" name="nama_produk"
                                placeholder="Masukkan produk">
                            <div id="error-produk" class="form-text text-danger"></div>
                        </div>
                        <div class="mb-3">
                            <label for="harga" class="form-label">Harga</label>
                            <input type="number" class="form-control" id="harga" name="harga"
                                placeholder="Masukkan Harga">
                            <div id="error-harga" class="form-text text-danger"></div>
                        </div>
                        <div class="mb-3">
                            <label for="select-kategori" class="form-label">Kategori</label>
                            <select class="form-select" name="kategori_id" id="select-kategori">
                            </select>
                            <div id="error-kategori" class="form-text text-danger"></div>
                        </div>
                        <div class="mb-3">
                            <label for="select-status" class="form-label">Status Produk</label>
                            <select class="form-select" name="status_id" id="select-status">
                            </select>
                            <div id="error-status" class="form-text text-danger"></div>
                        </div>
                        <div class="d-flex justify-content-end align-items-center">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Edit Produk -->
    <div class="modal fade" id="editProduk" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Edit Produk</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="javascript:void(0)" id="form-update-produk">
                        <div class="mb-3">
                            <label for="produk" class="form-label">Produk</label>
                            <input type="hidden" id="produk_id-edit" value="">
                            <input type="text" class="form-control" id="produk-edit" name="nama_produk" value="">
                            <div id="error-produk-edit" class="form-text text-danger"></div>
                        </div>
                        <div class="mb-3">
                            <label for="harga" class="form-label">Harga</label>
                            <input type="number" class="form-control" min="1" id="harga-edit" name="harga" value="">
                            <div id="error-harga-edit" class="form-text text-danger"></div>
                        </div>
                        <div class="mb-3">
                            <label for="select-kategori" class="form-label">Kategori</label>
                            <select class="form-select" name="kategori_id" id="select-kategori-edit">
                            </select>
                            <div id="error-kategori-edit" class="form-text text-danger"></div>
                        </div>
                        <div class="mb-3">
                            <label for="select-status" class="form-label">Status Produk</label>
                            <select class="form-select" name="status_id" id="select-status-edit">
                            </select>
                            <div id="error-status-edit" class="form-text text-danger"></div>
                        </div>
                        <div class="d-flex justify-content-end align-items-center">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Tambah Kategori -->
    <div class="modal fade" id="tambahKategori" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Tambah Kategori</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="javascript:void(0)" id="form-tambah-kategori">
                        <div class="mb-3">
                            <label for="produk" class="form-label">Kategori</label>
                            <input type="text" class="form-control" id="kategori" name="nama_kategori"
                                placeholder="Masukkan kategori">
                            <div class="form-text text-danger error-kategori"></div>
                        </div>
                        <div class="d-flex justify-content-end align-items-center">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Edit Kategori -->
    <div class="modal fade" id="editKategori" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Edit Kategori</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="javascript:void(0)" id="form-edit-kategori">
                        <div class="mb-3">
                            <label for="produk" class="form-label">Kategori</label>
                            <input type="hidden" id="kategori_id-edit" value="">
                            <input type="text" class="form-control" id="kategori-edit" name="nama_kategori"
                                placeholder="Masukkan kategori">
                            <div class="form-text text-danger error-kategori-edit"></div>
                        </div>
                        <div class="d-flex justify-content-end align-items-center">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Tambah Status -->
    <div class="modal fade" id="tambahStatus" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Tambah Status</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="javascript:void(0)" id="form-tambah-status">
                        <div class="mb-3">
                            <label for="produk" class="form-label">Status</label>
                            <input type="text" class="form-control" id="status" name="nama_status"
                                placeholder="Masukkan status">
                            <div class="form-text text-danger error-status"></div>
                        </div>
                        <div class="d-flex justify-content-end align-items-center">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Edit Status -->
    <div class="modal fade" id="editStatus" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Edit Status</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="javascript:void(0)" id="form-edit-status">
                        <div class="mb-3">
                            <label for="produk" class="form-label">Status</label>
                            <input type="hidden" value="" id="status_id-edit">
                            <input type="text" class="form-control" id="status-edit" name="nama_status"
                                placeholder="Masukkan status">
                            <div class="form-text text-danger error-status-edit"></div>
                        </div>
                        <div class="d-flex justify-content-end align-items-center">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="<?= base_url(); ?>/assets/js/jquery.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
    $(document).ready(function() {
        /**
         *  Produk Request (Get, Post Put, Delete)
         */

        // Search status produk
        $('#selected-status-produk').change(function() {
            let valueOption = $(this).find('option:selected');
            let params = valueOption.val();

            if (params == '') {
                getProduk()
            } else {
                $.ajax({
                    url: '<?= base_url('data') ?>/' + params,
                    type: 'GET',
                    dataType: 'JSON',
                    success: (res) => {
                        if (res.success) {
                            let html = '';

                            $('#data-produk').html();
                            $('#data-produk').empty();
                            for (let i = 0; i < res.data.length; i++) {
                                html = `<tr>
                                        <th scope="row">${i + 1}</th>
                                        <td>${res.data[i].produk}</td>
                                        <td>${res.data[i].produk_harga}</td>
                                        <td>${res.data[i].produk_kategori}</td>
                                        <td>${res.data[i].produk_status}</td>
                                        <td class="d-flex justify-content-center" style="gap: 5px;">
                                            <button type="button" 
                                                class="btn btn-warning btn-edit-produk" 
                                                data-id="${res.data[i].produk_id}" 
                                                data-bs-toggle="modal"
                                                data-bs-target="#editProduk">
                                                Edit
                                            </button>
                                            <button type="button" 
                                                class="btn btn-danger btn-delete-produk" 
                                                data-id="${res.data[i].produk_id}">
                                                Delete
                                            </button>
                                        </td>
                                    </tr>`
                                $('#data-produk').append(html);
                            }
                        }
                    },
                    error: (res) => {
                        console.log(JSON.stringify(res));
                    }
                })
            }
        })

        getProduk()

        function getProduk() {
            $.ajax({
                url: '<?= base_url('produk') ?>',
                type: 'GET',
                dataType: 'JSON',
                success: (res) => {
                    if (res.success) {
                        let html = '';

                        $('#data-produk').html();
                        $('#data-produk').empty();
                        for (let i = 0; i < res.data.length; i++) {
                            html = `<tr>
                                        <th scope="row">${i + 1}</th>
                                        <td>${res.data[i].produk}</td>
                                        <td>${res.data[i].produk_harga}</td>
                                        <td>${res.data[i].produk_kategori}</td>
                                        <td>${res.data[i].produk_status}</td>
                                        <td class="d-flex justify-content-center" style="gap: 5px;">
                                            <button type="button" 
                                                class="btn btn-warning btn-edit-produk" 
                                                data-id="${res.data[i].produk_id}" 
                                                data-bs-toggle="modal"
                                                data-bs-target="#editProduk">
                                                Edit
                                            </button>
                                            <button type="button" 
                                                class="btn btn-danger btn-delete-produk" 
                                                data-id="${res.data[i].produk_id}">
                                                Delete
                                            </button>
                                        </td>
                                    </tr>`
                            $('#data-produk').append(html);
                        }
                    }
                }
            })
        }

        // Tambah Data (Produk)
        $('#form-tambah-produk').on('submit', function(e) {
            e.preventDefault();
            let formDataProduk = new FormData(this);
            $.ajax({
                url: '<?= base_url('produk') ?>',
                type: 'POST',
                dataType: 'JSON',
                data: formDataProduk,
                processData: false,
                contentType: false,
                success: (res) => {
                    if (res.success) {
                        $('#tambahProduk').modal('hide');
                        Swal.fire({
                            position: "top-center",
                            icon: "success",
                            title: "Berhasil Tambah Data",
                            showConfirmButton: false,
                            timer: 1500
                        });

                        $('#produk').val(null);
                        $('#harga').val(null);
                        $('#select-kategori').val(null);
                        $('#select-status').val(null);

                        $('#error-produk').html('')
                        $('#error-harga').html('')
                        $('#error-kategori').html('')
                        $('#error-status').html('')

                        getProduk()
                    } else {
                        $('#error-produk').html('')
                        $('#error-harga').html('')
                        $('#error-kategori').html('')
                        $('#error-status').html('')

                        // validasi input
                        $('#error-produk').html(res.error.nama_produk)
                        $('#error-harga').html(res.error.harga)
                        $('#error-kategori').html(res.error.kategori_id)
                        $('#error-status').html(res.error.status_id)
                    }
                },
                error: (res) => {
                    console.log(JSON.stringify(res));
                }
            })
        });

        // Show data (Produk)
        $('#data-produk').on('click', '.btn-edit-produk', function() {
            let id = $(this).data('id');
            $('#produk_id-edit').attr('value', id);

            $.ajax({
                url: '<?= base_url('produk') ?>/' + id,
                type: 'GET',
                dataType: 'JSON',
                success: (res) => {
                    if (res.success) {
                        let id_status, status_name, id_kategori, kategori_name;
                        let html, selectOption, html2, selectOption2;

                        $('#produk-edit').attr('value', res.data[0].produk);
                        $('#harga-edit').attr('value', Number(res.data[0].produk_harga));

                        // Select option kategori
                        $('#select-kategori-edit').html('');
                        $('#select-kategori-edit').empty();
                        $('#select-kategori-edit').append(
                            `<option value="">Pilih Kategori</option>`);
                        for (let i = 0; i < res.data[1].kategori.length; i++) {
                            id_kategori = res.data[1].kategori[i].id_kategori;
                            kategori_name = res.data[1].kategori[i].nama_kategori;

                            if (id_kategori == res.data[0].produk_kategori_id) {
                                selectOption =
                                    `<option selected value="${id_kategori}">${kategori_name}</option>`;
                            } else {
                                selectOption =
                                    `<option value="${id_kategori}">${kategori_name}</option>`;
                            }
                            $('#select-kategori-edit').append(selectOption);
                        }

                        // Select option status
                        $('#select-status-edit').html('');
                        $('#select-status-edit').empty();
                        $('#select-status-edit').append(
                            `<option value="">Pilih Status</option>`);
                        for (let i = 0; i < res.data[1].status.length; i++) {
                            id_status = res.data[1].status[i].id_status;
                            status_name = res.data[1].status[i].nama_status;

                            if (id_status == res.data[0].produk_status_id) {
                                selectOption =
                                    `<option selected value="${id_status}">${status_name}</option>`;
                            } else {
                                selectOption =
                                    `<option value="${id_status}">${status_name}</option>`;
                            }
                            $('#select-status-edit').append(selectOption);
                        }
                    }
                },
                error: (res) => {
                    console.log(JSON.stringify(res));
                }
            })
        });

        // Update Produk
        $('#form-update-produk').on('submit', function(e) {
            e.preventDefault();
            let formDataUpdateProduk = $(this).serialize();
            let id = $('#produk_id-edit').val();

            $.ajax({
                url: '<?= base_url('produk') ?>/' + id,
                type: 'PUT',
                dataType: 'JSON',
                data: formDataUpdateProduk,
                processData: false,
                contentType: false,
                success: (res) => {
                    if (res.success) {
                        $('#editProduk').modal('hide');
                        Swal.fire({
                            position: "top-center",
                            icon: "success",
                            title: "Berhasil Update Data",
                            showConfirmButton: false,
                            timer: 1500
                        });

                        $('#error-produk-edit').html('')
                        $('#error-harga-edit').html('')
                        $('#error-kategori-edit').html('')
                        $('#error-status-edit').html('')

                        getProduk()
                    } else {
                        $('#error-produk-edit').html('')
                        $('#error-harga-edit').html('')
                        $('#error-kategori-edit').html('')
                        $('#error-status-edit').html('')

                        console.log(res)
                        // validasi input
                        $('#error-produk-edit').html(res.error.nama_produk)
                        $('#error-harga-edit').html(res.error.harga)
                        $('#error-kategori-edit').html(res.error.kategori_id)
                        $('#error-status-edit').html(res.error.status_id)
                    }
                },
                error: (res) => {
                    console.log(JSON.stringify(res));
                }
            })
        });

        // Delete Produk
        $('#data-produk').on('click', '.btn-delete-produk', function() {
            let id = $(this).data('id');

            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '<?= base_url('produk')  ?>/' + id,
                        type: 'DELETE',
                        dataType: 'JSON',
                        success: (res) => {
                            if (res.success) {
                                Swal.fire({
                                    title: "Deleted!",
                                    text: `${res.message}`,
                                    icon: "success"
                                });
                                getProduk()
                            }
                        },
                        error: (res) => {
                            Swal.fire({
                                title: "Hapus data?",
                                text: "Terjadi kesalahan.",
                                icon: "question"
                            });
                        }
                    })
                }
            });
        });

        /**
         * Kategori Request (Get, Post, Put, Delete)
         */

        getKategori()

        function getKategori() {
            $.ajax({
                url: '<?= base_url('kategori') ?>',
                type: 'GET',
                dataType: 'JSON',
                success: (res) => {
                    if (res.success) {
                        let html = '';
                        let selectOption = '';

                        $('#data-kategori').html('');
                        $('#select-kategori').append('');

                        $('#select-kategori').append(`<option value="">Pilih Kategori</option>`);
                        for (let i = 0; i < res.data.length; i++) {
                            html = `<tr>
                                        <th scope="row">${i+1}</th>
                                        <td>${res.data[i].kategori}</td>
                                        <td class="d-flex justify-content-center" style="gap: 5px;">
                                            <button type="button" 
                                                class="btn btn-warning btn-sm btn-edit-kategori" 
                                                data-id="${res.data[i].kategori_id}" 
                                                data-bs-toggle="modal"
                                                data-bs-target="#editKategori">
                                                Edit
                                            </button>
                                            <button type="button" 
                                                class="btn btn-danger btn-sm btn-delete-kategori" 
                                                data-id="${res.data[i].kategori_id}">
                                                Delete
                                            </button>
                                        </td>
                                    </tr>`;

                            selectOption = `<option value="${res.data[i].kategori_id}">
                                                ${res.data[i].kategori}
                                            </option>`;

                            $('#data-kategori').append(html);
                            $('#select-kategori').append(selectOption);
                        }
                    }
                }
            })
        }

        // Tambah Kategori
        $('#form-tambah-kategori').on('submit', function(e) {
            e.preventDefault();
            let formData = new FormData(this);

            $.ajax({
                url: '<?= base_url('kategori') ?>',
                type: 'POST',
                dataType: 'JSON',
                data: formData,
                processData: false,
                contentType: false,
                success: (res) => {
                    if (res.success) {
                        $('#tambahKategori').modal('hide');
                        Swal.fire({
                            position: "top-center",
                            icon: "success",
                            title: "Berhasil Tambah Data",
                            showConfirmButton: false,
                            timer: 1500
                        });

                        $('#kategori').val(null);
                        $('.error-kategori').html('');
                        getKategori()
                    } else {
                        $('.error-kategori').html('');
                        $('.error-kategori').html(res.error.nama_kategori)
                    }
                },
                error: (res) => {
                    console.log(JSON.stringify(res))
                }
            })

        })

        // Show Kategori
        $('#data-kategori').on('click', '.btn-edit-kategori', function() {
            let id = $(this).data('id');
            $.ajax({
                url: '<?= base_url('kategori') ?>/' + id,
                type: 'GET',
                dataType: 'JSON',
                success: (res) => {
                    if (res.success) {
                        $('#kategori_id-edit').attr('value', res.data[0].kategori_id);
                        $('#kategori-edit').attr('value', res.data[0].kategori);
                        console.log(res.data[0].kategori);
                        getKategori();
                    }
                },
                error: (res) => {
                    console.log(JSON.stringify(res));
                }
            })
        })

        // Update Kategori
        $('#form-edit-kategori').on('submit', function(e) {
            e.preventDefault();
            let formData = $(this).serialize();
            let id = $('#kategori_id-edit').val();

            $.ajax({
                url: '<?= base_url('kategori') ?>/' + id,
                type: 'PUT',
                dataType: 'JSON',
                data: formData,
                success: (res) => {
                    if (res.success) {
                        $('#editKategori').modal('hide');
                        Swal.fire({
                            position: "top-center",
                            icon: "success",
                            title: "Berhasil Update Data",
                            showConfirmButton: false,
                            timer: 1500
                        });

                        $('#kategori-edit').val(null);
                        $('.error-kategori-edit').html('');
                        getKategori()
                    } else {
                        $('.error-kategori-edit').html('');
                        $('.error-kategori-edit').html(res.error.nama_kategori)
                    }
                },
                error: (res) => {
                    console.log(JSON.stringify(res))
                }
            })

        })

        // Delete Kategori
        $('#data-kategori').on('click', '.btn-delete-kategori', function() {
            let id = $(this).data('id');

            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '<?= base_url('kategori')  ?>/' + id,
                        type: 'DELETE',
                        dataType: 'JSON',
                        success: (res) => {
                            if (res.success) {
                                Swal.fire({
                                    title: "Deleted!",
                                    text: `${res.message}`,
                                    icon: "success"
                                });
                                getKategori()
                            }
                        },
                        error: (res) => {
                            Swal.fire({
                                title: "Hapus data?",
                                text: "Terjadi kesalahan.",
                                icon: "question"
                            });
                        }
                    })
                }
            });

        })

        /**
         * 
         * Status Request (Get, Post, Put, Delete)
         */
        getStatus()

        function getStatus() {
            $.ajax({
                url: '<?= base_url('status') ?>',
                type: 'GET',
                dataType: 'JSON',
                success: (res) => {
                    if (res.success) {
                        let html = '';
                        let selectOption = '';

                        $('#data-status').html('');
                        $('#select-status').append(
                            `<option value="">Pilih Status</option>`);
                        for (let i = 0; i < res.data.length; i++) {
                            html = `<tr>
                                        <th scope="row">${i+1}</th>
                                        <td>${res.data[i].status}</td>
                                        <td class="d-flex justify-content-center" style="gap: 5px;">
                                            <button type="button" 
                                                class="btn btn-warning btn-sm btn-edit-status" 
                                                data-id="${res.data[i].status_id}" 
                                                data-bs-toggle="modal"
                                                data-bs-target="#editStatus">
                                                Edit
                                            </button>
                                            <button type="button" 
                                                class="btn btn-danger btn-sm btn-delete-status" 
                                                data-id="${res.data[i].status_id}">
                                                Delete
                                            </button>
                                        </td>
                                    </tr>`;

                            selectOption = `<option value="${res.data[i].status_id}">
                                                ${res.data[i].status}
                                            </option>`;

                            $('#data-status').append(html);
                            $('#selected-status-produk').append(selectOption);
                            $('#select-status').append(selectOption);
                        }
                    }
                }
            })
        }

        // Tambah Status
        $('#form-tambah-status').on('submit', function(e) {
            e.preventDefault();
            let formData = $(this).serialize();

            $.ajax({
                url: '<?= base_url('status') ?>',
                type: 'POST',
                dataType: 'JSON',
                data: formData,
                success: (res) => {
                    if (res.success) {
                        $('#tambahStatus').modal('hide');
                        Swal.fire({
                            position: "top-center",
                            icon: "success",
                            title: "Berhasil Tambah Data",
                            showConfirmButton: false,
                            timer: 1500
                        });

                        $('#status').val(null);
                        $('.error-status').html('');
                        getStatus();
                    } else {
                        $('.error-status').html('');
                        $('.error-status').html(res.error.nama_status);
                    }
                }
            })

        })

        // Show Status
        $('#data-status').on('click', '.btn-edit-status', function() {
            let id = $(this).data('id');
            $.ajax({
                url: '<?= base_url('status') ?>/' + id,
                type: 'GET',
                dataType: 'JSON',
                success: (res) => {
                    if (res.success) {
                        $('#status_id-edit').attr('value', res.data[0].status_id);
                        $('#status-edit').attr('value', res.data[0].status);
                    }
                },
                error: (res) => {
                    console.log(JSON.stringify(res));
                }
            })
        })

        // Update Status 
        $('#form-edit-status').on('submit', function(e) {
            e.preventDefault;
            let formData = $(this).serialize();
            let id = $('#status_id-edit').val();

            $.ajax({
                url: '<?= base_url('status') ?>/' + id,
                type: 'PUT',
                dataType: 'JSON',
                data: formData,
                success: (res) => {
                    if (res.success) {
                        $('#editStatus').modal('hide');
                        Swal.fire({
                            position: "top-center",
                            icon: "success",
                            title: "Berhasil Update Data",
                            showConfirmButton: false,
                            timer: 1500
                        });

                        $('#status-edit').val(null);
                        $('.error-status-edit').html('');
                        getStatus()
                    } else {
                        $('.error-status-edit').html('');
                        $('.error-status-edit').html(res.error.nama_status)
                    }
                },
                error: (res) => {
                    console.log(JSON.stringify(res))
                }
            })
        })

        // Delete Status
        $('#data-status').on('click', '.btn-delete-status', function() {
            let id = $(this).data('id')

            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '<?= base_url('status')  ?>/' + id,
                        type: 'DELETE',
                        dataType: 'JSON',
                        success: (res) => {
                            if (res.success) {
                                Swal.fire({
                                    title: "Deleted!",
                                    text: `${res.message}`,
                                    icon: "success"
                                });
                                getStatus()
                            }
                        },
                        error: (res) => {
                            Swal.fire({
                                title: "Hapus data?",
                                text: "Terjadi kesalahan.",
                                icon: "question"
                            });
                        }
                    })
                }
            });
        })

    })
    </script>

</body>

</html>