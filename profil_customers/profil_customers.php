<?php
//Koneksi ke database & query dari file functions.php
require '../functions.php';

//Query select table data_mobil
$data_customers = query("SELECT * FROM data_customer");

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Profil-Customer</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/style.css" />
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
    }

    .dropdown-menu {
        background-color: black;
    }

    .card {
        width: 50%;
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
                            <li><a class="dropdown-item" href="../tiket_antrian/tiket_antrian.php">Tiket Antrian</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../tentang_kami/tentang_kami.php">Tentang Kami</a>
                    </li>
                </ul>
                <ul>
                    <a href="../login_customers.php" id="log-in"><i data-feather="log-in"></i></a>
                    <a href="#" id="user"><i data-feather="user"></i></a>
                    <a href="../logout_customers.php" id="log-out"><i data-feather="log-out"></i></a>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Tabel Profil Customer -->
    <div class="card">
        <div class="card-header">
            <h3>Profil Customer</h3>
        </div>
        <div class="card-body">
            <?php foreach ($data_customers as $row) : ?>
                <table class="table table-hover">
                    <tbody>
                        <tr>
                            <td scope="col">Nama Lengkap</td>
                            <td><?= $row["nama_lengkap"]; ?></td>
                        </tr>
                        <tr>
                            <td scope="col">Alamat</td>
                            <td><?= $row["alamat"]; ?></td>
                        </tr>
                        <tr>
                            <td scope="col">No Telpon</td>
                            <td><?= $row["no_telpon"]; ?></td>
                        </tr>
                        <tr>
                            <td scope="col">Email</td>
                            <td><?= $row["email"]; ?></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
                <br>
                <button type="button" class="btn btn-warning"><a href="edit_profil_customers.php?id=<?= $row["id"]; ?>">Edit Profil</a></button>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

    <!-- Feather Icons -->
    <script>
        feather.replace();
    </script>

</body>

</html>