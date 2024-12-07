<?php
//Koneksi ke database & query dari file functions.php
require '../../functions.php';

//Query select table data_mobil
$akun_customers = query("SELECT * FROM akun_customers");

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin-Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="../../assets/css/admin_style.css">
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar  navbar-dark bg-dark fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                Admin-Panel
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">Menu Dashboard</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="../index.php">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="../jenis_cuci/jenis_cuci.php">Jenis Cuci</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Customers
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item active" href="#">Akun Customers</a></li>
                                <li><a class="dropdown-item" href="data_customers.php">Data Customers</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Pesanan
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="../pesanan/pesanan.php">Pesanan</a></li>
                                <li><a class="dropdown-item" href="../pesanan/pembayaran.php">Pembayaran</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="../info_perusahaan/info_perusahaan.php">Info Perusahaan</a>
                        </li>

                </div>
            </div>
        </div>
    </nav>

    <!-- Table Akun Customer -->
    <div class="card">
        <div class="card-header">
            <h3>Akun Customers</h3>
        </div>
        <div class="card-body">
            <table class="table table-hover">
                <thead class="table-success">
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Username</th>
                        <th scope="col">Password</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($akun_customers as $row) : ?>
                        <?php $i = 1; ?>
                        <tr>
                            <td><?= $i ?></td>
                            <td><?= $row["username"]; ?></td>
                            <td><?= $row["password"] ?></td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

</body>

</html>