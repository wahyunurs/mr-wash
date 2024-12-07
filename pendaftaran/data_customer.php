<?php
// Koneksi ke database & query dari file functions.php
require '../functions.php';

// Data input form tambah data mobil
if (isset($_POST["submit"])) {
    if (tambah_data_customers($_POST) > 0) {
        echo "<script>
            alert('Data berhasil dikirim!');
            window.location.href = 'pendaftaran.php';
        </script>";
    } else {
        echo "<script>
            alert('Data gagal dikirim!');
            window.location.href = 'data_customer.php';
        </script>";
    }
}
?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data-Customer</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/style.css" />
    <!-- Feather Icons -->
    <script src="https://unpkg.com/feather-icons"></script>
</head>

<style>
    body {
        background-image: url('../assets/img/background1.jpg');
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: 100% 100%;
        height: 600px;
    }

    .card {
        background-color: grey;
        width: 90%;
    }
</style>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-dark fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><span style="color: red;" class="span">Mr</span> Wash</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
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
                            <li><a class="dropdown-item active" href="#">Pendaftaran</a></li>
                            <li><a class="dropdown-item" href="../tiket_antrian/tiket_antrian.php">Tiket Antrian</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../syarat_ketentuan/syarat_ketentuan.php">Syarat & Ketentuan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../tentang_kami/tentang_kami.php">Tentang Kami</a>
                    </li>
                </ul>
                <ul>
                    <a href="../login_customers.php" id="log-in"><i data-feather="log-in"></i></a>
                    <a href="../logout_customers.php" id="log-out"><i data-feather="log-out"></i></a>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Form Profil Customers -->
    <div class="card">
        <div class="card-header">
            <h3>Pendaftaran Cuci Mobil</h3>
            <p>Mohon isi data diri terlebih dahulu</p>
        </div>
        <div class="card-body">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="nama_lengkap" class="form-label">Nama Lengkap</label><br>
                    <input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control" placeholder="Enter Nama Lengkap" required>
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <input type="text" name="alamat" id="alamat" class="form-control" placeholder="Enter Alamat" required>
                </div>
                <div class="mb-3">
                    <label for="no_telpon" class="form-label">No Telpon</label>
                    <input type="number" name="no_telpon" id="no_telpon" class="form-control" placeholder="Enter No Telpon" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="Enter Email" required>
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Kirim</button>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

    <!-- Feather Icons -->
    <script>
        feather.replace();
    </script>

</body>

</html>