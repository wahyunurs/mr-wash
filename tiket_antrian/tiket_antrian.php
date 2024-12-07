<?php
//Koneksi ke database & query dari file functions.php
require '../functions.php';

//Query select table
$pendaftaran = query("SELECT * FROM pendaftaran");

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tiket Antrian</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- Link rel cetak pdf -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <!-- Feather Icons -->
    <script src="https://unpkg.com/feather-icons"></script>
</head>

<style>
    * {
        font-family: monospace;
        font-size: large;
    }

    body {
        background-image: url('../assets/img/background.jpg');
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: 100% 100%;
        height: 700px;
    }

    .dropdown-menu {
        background-color: black;
    }

    .card {
        width: 70%;
    }
</style>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-dark fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="../assets/img/mr_wash.png" alt="Mr Wash" width="120">
            </a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="../index.php">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Daftar
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="../pendaftaran/pendaftaran.php">Pendaftaran</a></li>
                            <li><a class="dropdown-item active" href="#">Tiket Antrian</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../tentang_kami/tentang_kami.php">Tentang Kami</a>
                    </li>
                </ul>
                <ul>
                    <a href="../login_customers.php" id="log-in"><i data-feather="log-in"></i></a>
                    <a href="../profil_customers/profil_customers.php" id="user"><i data-feather="user"></i></a>
                    <a href="../logout_customers.php" id="log-out"><i data-feather="log-out"></i></a>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Tabel Data Pesanan Antrian -->
    <div class="card">
        <div class="card-header">
            <h3>Tiket Antrian</h3>
        </div>
        <div class="card-body">
            <table class="table table-hover">
                <tbody>
                    <?php foreach ($pendaftaran as $row) : ?>
                        <tr>
                            <td scope="col">Nama Lengkap</td>
                            <td><?= $row["nama_lengkap"]; ?></td>
                        </tr>
                        <tr>
                            <td scope="col">Merk Mobil</td>
                            <td><?= $row["merk_mobil"]; ?></td>
                        </tr>
                        <tr>
                            <td>Jenis Cuci</td>
                            <td><?= $row["jenis_cuci"]; ?></td>
                        </tr>
                        <tr>
                            <td>Harga</td>
                            <td><?= $row["harga"]; ?></td>
                        </tr>
                        <tr>
                            <td>Tanggal Cuci</td>
                            <td><?= $row["tanggal_cuci"]; ?></td>
                        </tr>
                        <tr>
                            <td>Jam Cuci</td>
                            <td><?= $row["jam_cuci"]; ?></td>
                        </tr>
                        <tr>
                            <td>No Antrian</td>
                            <td><?= $row["no_antrian"]; ?></td>
                        </tr>
                        <tr>
                            <td>Status Pembayaran</td>
                            <td><?= $row["status_pembayaran"]; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <button type="button" class="btn btn-primary" class="cetak"><a href="cetak.php" target="_blank">Cetak</a></button>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <!-- Feather Icons -->
    <script>
        feather.replace();
    </script>
</body>

</html>