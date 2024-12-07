<?php
//Koneksi ke database & query dari file functions.php
require '../../functions.php';

if (isset($_POST["submit"])) {
    if (tambah_jenis_cuci($_POST) > 0) {
        echo "<script>
            alert('Data berhasill ditambahkan!');
            document.location.href = 'jenis_cuci.php';
        </script>";
    } else {
        echo "<script>
            alert('Data gagal ditambahkan!');
            document.location.href = 'tambah_jenis_cuci.php';
        </script>";
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tambah-Jenis-Cuci</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="../../assets/css/admin_style.css">
</head>

<style>
    * {
        font-family: monospace;
        font-size: large;
    }

    body {
        background-image: url('../../assets/img/admin_bg.jpeg');
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: 100% 100%;
    }

    .dropdown-menu {
        background-color: black;
    }

    .carousel-caption {
        background-color: rgba(169, 169, 169, 0.436);
    }

    .nav-item a {
        color: white;
    }

    .nav-item a:hover {
        color: red;
    }

    .card {
        width: 70%;
    }
</style>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-dark bg-dark fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="../../assets/img/mr_wash.png" alt="Mr Wash" width="120">
                Admin-Dashboard
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">Dark offcanvas</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="../index.php">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../customers/data_customers.php">Data Customers</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Jenis Cuci</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Pesanan
                            </a>
                            <ul class="dropdown-menu dropdown-menu-dark">
                                <li><a class="dropdown-item" href="../pesanan/pesanan.php">Pendaftaran</a></li>
                                <li><a class="dropdown-item" href="../pesanan/pembayaran.php">Pembayaran</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../info_perusahaan/info_perusahaan.php">Info Perusahaan</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <!-- Form Tambah Jenis Mobil -->
    <div class="card" style="width: 90%;">
        <div class="card-header">
            <h3>Tambah Data Jenis Cuci</h3>
        </div>
        <div class="card-body">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="jenis_cuci" class="form-label">Jenis Cuci</label>
                    <input type="text" name="jenis_cuci" id="jenis_cuci" class="form-control" placeholder="Enter Jenis Cuci" required>
                </div>
                <div class="mb-3">
                    <label for="harga" class="form-label">Harga</label>
                    <input type="number" name="harga" id="harga" class="form-control" placeholder="Enter Harga" required>
                </div>
                <button type="submit" name="submit" class="btn btn-success">Tambah</button>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>