<?php
//Koneksi ke database & query dari file functions.php
require '../../functions.php';

//Query select table data_mobil
$jenis_cuci = query("SELECT * FROM jenis_cuci");


//Fetch data_mobil dari object result
// mysqli_fetch_row() //mengembalikkan array numerik
// mysqli_fetch_assoc() //mengembalikkan array associative
// mysqli_fetch_array() //mengembalikkan kdeua array tersebut
// mysqli_fetch_object()

//Menampilkan fetch semua data dari table data_mobil
// while ($data_mobil = mysqli_fetch_assoc($result)) {
//     var_dump($data_mobil);
// }

?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Jenis-Cuci</title>
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
                            <a class="nav-link active" href="#">Jenis Cuci</a>
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

    <!-- Tabel Data Jenis Cuci -->
    <div class="card">
        <div class="card-header">
            <h3>Data Jenis Cuci</h3>
        </div>
        <div class="card-body">
            <button type="button" class="btn btn-primary"><a href="tambah_jenis_cuci.php">Tambah Data</a></button>
            <br><br>
            <table class="table table-hover">
                <thead class="table-success">
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Jenis Cuci</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($jenis_cuci as $row) : ?>
                        <tr>
                            <td><?= $i ?></td>
                            <td><?= $row["jenis_cuci"]; ?></td>
                            <td><?= $row["harga"]; ?></td>
                            <td>
                                <button type="button" class="btn btn-warning"><a href="edit_jenis_cuci.php?id=<?= $row["id"]; ?>">Edit</a></button>
                                <button type="button" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data tersebut?');"><a href="delete_jenis_cuci.php?id=<?= $row["id"]; ?>">Delete</a></button>
                            </td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>