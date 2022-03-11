<?php

require 'functions.php';

if (isset($_GET['page'])) {
    $page = $_GET['page'];
    $query = "SELECT * FROM menu WHERE kategori = '$page'";
} else {
    $query = "SELECT * FROM menu";
}

$menu = query("$query");

if (isset($_POST['submit'])) {

    if (tambah($_POST) > 0) {
        echo "
        <script>
            alert('data berhasil ditambahkan')
            window.location.href = 'index.php'
        </script>
        ";
    } else {
        $_SESSION['fail'] = "Data Gagal Di Tambahkan";
    }
}

?>


<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="bootstrap.min.css" rel="stylesheet">

    <title>Kedai Om Madi</title>

    <style>
        @font-face {
            font-family: 'roquen';
            src: url('font/Roquen.otf');
        }

        @font-face {
            font-family: 'poppins';
            src: url('font/Poppins-Bold.ttf');
        }

        @font-face {
            font-family: 'manrope';
            src: url('font/Manrope-Bold.ttf');
        }

        :root {
            --green: #85dcb8;
            --blue: #41B3a3;
            --red: #e27d60;
            --orange: #e8a87c;
            --purple: #c38d9e;
            --orange2: #D1603D;
        }

        body {
            background-color: var(--green);
        }



        .navbar {
            background-color: rgba(255, 255, 255, .2) !important;
        }

        .navbar a {
            color: var(--red) !important;
            font-family: manrope;
            font-size: 1.1em;
        }

        .navbar a:hover {
            color: var(--orange2) !important;
        }

        .navbar .dropdown-item:hover {
            cursor: pointer;
        }

        .navbar .active {
            color: var(--blue) !important;
        }

        .navbar .dropdown-menu {
            background-color: rgba(255, 255, 255, 0.7);
        }

        .navbar .search {
            padding: .7em 1.2em;
            font-size: .9em;
            font-family: manrope;
            outline: none;
            border: none;
        }

        /* .navbar .search::-webkit-input-placeholder {} */

        .navbar .btn-search {
            font-family: manrope;
            font-size: .9em;
            color: #eee;
            background-color: var(--red);
            border: none;
            padding: 0 1em;
        }

        .navbar .btn-search:hover {
            background-color: var(--orange2);
        }


        .title {
            font-family: roquen;
        }

        .title h1 {
            font-size: 4em;
            color: var(--orange);
            text-shadow: 4px 4px 2px var(--red);
            margin-bottom: 0;
        }

        .title p {
            font-size: 1.3em;
            color: var(--red);
            margin-bottom: 1em;
        }


        .card {
            font-family: poppins;
            border: 1px solid #fff;
            border-radius: 15px;
            box-shadow: 0 0 1rem 0 rgba(0, 0, 0, 0.2);
            padding: 2px 15px;
        }

        .card .card-head {
            padding: 10px;
        }

        .card .card-head,
        .card-foot {
            color: var(--blue);
        }

        .card .card-img {
            overflow: hidden;
        }

        .card .card-img img {
            transition: transform .2s;
        }

        .card .card-img img:hover {
            transform: scale(1.2);
        }

        .modal .modal-content,
        .card-edit {
            font-family: poppins;
            background-color: var(--orange);
            color: var(--orange2);
            font-size: 1.1em;
            padding: .1em 1em;
            border-radius: 2em;
        }

        .modal .modal-content input,
        .card-edit input,
        .card-edit select {
            color: #999;
        }

        .modal .modal-content .modal-header h5 {
            font-size: 2em;
        }

        .btn-orange {
            background-color: var(--red);
            color: #eee;
        }

        .btn-orange:hover {
            background-color: var(--orange2);
            color: #eee;

        }

        table {
            border-collapse: collapse;
            border-radius: 1em;
            overflow: hidden;
            font-family: manrope;
            background-color: white;
        }

        table thead tr th {
            padding: 1.5em !important;
        }

        table tbody img {
            width: 5em;
            border-radius: .5em;
        }

        .table-total tr>th,
        .table-total tr>td {
            padding: 1em;
        }

        .table-total {
            border-radius: 1em;
        }

        .table-total tr>th {

            background-color: var(--orange);
            color: var(--orange2);
        }


        .alert {
            font-family: manrope;
            margin-bottom: 2em;
        }

        h2 {
            text-align: center;
            font-family: poppins;
            color: var(--orange2);
        }
    </style>
</head>


<body>

    <!-- nav -->
    <nav class="navbar navbar-expand-sm">
        <div class="container">
            <div class="pos-f-t">
                <div class="collapse" id="navbarToggleExternalContent">
                    <div class="bg-dark p-4">
                        <h4 class="text-white">Collapsed content</h4>
                        <span class="text-muted">Toggleable via the navbar brand.</span>
                    </div>
                </div>
                <nav class="navbar navbar-dark bg-dark">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </nav>
            </div>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?page=makanan">Makanan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?page=minuman">Minuman</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?page=ice cream">IceCream</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            More
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#tambahitem">Add Item</a>
                            </li>
                            <li><a class="dropdown-item" href="manage.php">Manage Item</a></li>
                        </ul>
                    </li>
                </ul>
                <form class="d-flex">
                    <input class="form-control me-2 mt-3 search" type="search" placeholder="Masukan Item" aria-label="Search" id="keyword">
                    <button class="btn btn-primary mt-3 btn-search" type="submit" id="tombol-cari">Cari</button>
                </form>
            </div>
        </div>
        </div>
    </nav>
    <!-- end nav -->



    <!-- title -->
    <div class="title">

        <div class="d-flex justify-content-center mt-3">
            <h1>Kedai Om Madi</h1>
        </div>

        <div class="d-flex justify-content-center">
            <p>est. 2020</p>
        </div>

    </div>
    <!-- end title -->


    <!-- Modal Add-->
    <div class="modal fade" id="tambahitem" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Item</h5>
                </div>
                <div class="modal-body">
                    <form action="" method="POST">
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Item</label>
                            <input type="text" class="form-control" id="nama" required="" name="nama">
                        </div>
                        <div class="mb-3">
                            <label for="harga" class="form-label">Harga</label>
                            <input type="text" class="form-control" id="harga" required="" name="harga">
                        </div>
                        <div class="mb-3">
                            <label for="kategori" class="form-label">Kategori</label>
                            <select class="form-select" aria-label="Default select example" required="" name="kategori">
                                <option selected> </option>
                                <option value="Makanan">Makanan</option>
                                <option value="Minuman">Minuman</option>
                                <option value="Ice Cream">IceCream</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="gambar" class="form-label">Gambar</label>
                            <input type="file" class="form-control" id="gambar" aria-describedby="emailHelp" required="" name="gambar">
                            <div id="emailHelp" class="form-text">Pastikan Format Gambar Sesuai</div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-orange" name="submit">Add Item</button>
                </div>
                </form>
            </div>
        </div>
    </div>


    <?php

    if (isset($_SESSION['success'])) {

    ?>

        <div class="container">
            <div class="alert alert-success d-flex align-items-center" role="alert">
                <img src="svg/check-circle-fill.svg" width="24" height="24" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img">
                </img>
                <div>
                    <?= $_SESSION['success']; ?>
                </div>
            </div>
        </div>

    <?php
        unset($_SESSION['success']);
    };


    if (isset($_SESSION['fail'])) {

    ?>

        <div class="container">
            <div class="alert alert-danger d-flex align-items-center" role="alert">
                <img src="svg/danger.svg" width="24" height="24" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img">
                </img>
                <div>
                    <?= $_SESSION['fail']; ?>
                </div>
            </div>
        </div>

    <?php
        unset($_SESSION['fail']);
    }
    ?>

    <div id="container">