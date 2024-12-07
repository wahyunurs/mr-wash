<?php
//Koneksi ke database & query dari file functions.php
require '../functions.php';

//Query select table data_mobil
$info_perusahaan = query("SELECT * FROM info_perusahaan");

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tentang-Kami</title>
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

    .dropdown-menu {
        background-color: black;
    }

    body {
        background-image: url('../assets/img/background.jpg');
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: 100% 100%;
        height: 1200px;
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
                        <a class="nav-link active" href="#">Tentang Kami</a>
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

    <!-- Table Info Perusahaan -->
    <div class="card">
        <div class="card-header">
            <h2>Tentang Kami</h2>
        </div>
        <div class="card-body">
            <?php foreach ($info_perusahaan as $row) : ?>
                <p>
                    <b><?= $row["nama_perusahaan"] ?></b> adalah perusahaan yang bergerak di bidang jasa cuci mobil. Kami menerima daftar cuci mobil secara offline(datang langsung ke tempat) atau online(tanpa antri), karena kami mempunyai karyawan tersendiri untuk melayani customer yang mendaftar online dan offline. Berikut Info lengkapnya tentang kami :
                </p>
                <br><br>
                <table>
                    <colgroup>
                        <col span="2">
                    </colgroup>
                    <tr>
                        <td>Nama Perusahaan</td>
                        <td> : </td>
                        <td><?= $row["nama_perusahaan"] ?></td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td> : </td>
                        <td><?= $row["alamat_perusahaan"]; ?></td>
                    </tr>
                    <tr>
                        <td>Kontak</td>
                        <td> : </td>
                        <td><?= $row["kontak_perusahaan"]; ?></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td> : </td>
                        <td><?= $row["email_perusahaan"]; ?></td>
                    </tr>
                    <tr>
                        <td>Kerjasama Bank</td>
                        <td> : </td>
                        <td><?= $row["nama_bank"]; ?></td>
                    </tr>
                    <tr>
                        <td>No Rekening</td>
                        <td> : </td>
                        <td><?= $row["no_rekening"]; ?></td>
                    </tr>
                    <tr>
                        <td>Jenis Cuci</td>
                        <td> : </td>
                        <td>Cuci Body & Cuci Menyeluruh</td>
                    </tr>
                    <tr>
                        <td>Buka</td>
                        <td> : </td>
                        <td>08.00 WIB</td>
                    </tr>
                    <tr>
                        <td>Tutup</td>
                        <td> : </td>
                        <td> 17.00 WIB</td>
                    </tr>
                </table>
            <?php endforeach; ?>
            <br>

            <h3>Lokasi :</h3>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31681.726662311394!2d110.39007617511331!3d-6.9838364553992625!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e708b531471df89%3A0xcd30f7c7c78dc560!2sClean%20%26%20Go!5e0!3m2!1sid!2sid!4v1687379500154!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

    <!-- Feather Icons -->
    <script>
        feather.replace();
    </script>

</body>

</html>