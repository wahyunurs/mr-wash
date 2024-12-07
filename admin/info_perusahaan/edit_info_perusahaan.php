<?php
//Koneksi ke database & query dari file functions.php
require '../../functions.php';

//Mengambil data yang akan diedit
$id = $_GET["id"];

//Query jenis cuci berdasarkan id
$info_perusahaan = query("SELECT * FROM info_perusahaan WHERE id = $id")[0];

if (isset($_POST["submit"])) {
    if (edit_info_perusahaan($_POST) > 0) {
        echo "<script>
            alert('Data berhasill diedit!');
            document.location.href = 'info_perusahaan.php';
        </script>";
    } else {
        echo "<script>
            alert('Data gagal diedit!');
            document.location.href = 'info_perusahaan.php';
        </script>";
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit-Info-Perusahaan</title>
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
                            <a class="nav-link" href="../jenis_cuci/jenis_cuci.php">Jenis Cuci</a>
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
                            <a class="nav-link active" href="#">Info Perusahaan</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <!-- Form Edit Info Perusahaan -->
    <div class="card">
        <div class="card-header">
            <h3>Edit Info Perusahaan</h3>
        </div>
        <div class="card-body">
            <form action="" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?= $info_perusahaan["id"]; ?>">
                <div class="mb-3">
                    <label for="nama_perusahaan" class="form-label">Nama Perusahaan</label>
                    <input type="text" name="nama_perusahaan" id="nama_perusahaan" class="form-control" placeholder="Enter Nama Perusahaan" value="<?= $info_perusahaan["nama_perusahaan"]; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="alamat_perusahaan" class="form-label">Alamat</label>
                    <input type="text" name="alamat_perusahaan" id="alamat_perusahaan" class="form-control" placeholder="Enter Alamat" value="<?= $info_perusahaan["alamat_perusahaan"]; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="kontak_perusahaan" class="form-label">Kontak</label>
                    <input type="number" name="kontak_perusahaan" id="kontak_perusahaan" class="form-control" placeholder="Enter Kontak" value="<?= $info_perusahaan["kontak_perusahaan"]; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="email_perusahaan" class="form-label">Email</label>
                    <input type="email" name="email_perusahaan" id="email_perusahaan" class="form-control" placeholder="Enter Email" value="<?= $info_perusahaan["email_perusahaan"]; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="nama_bank" class="form-label">Jenis Bank</label>
                    <input type="text" name="nama_bank" id="nama_bank" class="form-control" placeholder="Enter Jenis Bank" value="<?= $info_perusahaan["nama_bank"]; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="no_rekening" class="form-label">Email</label>
                    <input type="number" name="no_rekening" id="no_rekening" class="form-control" placeholder="Enter Email" value="<?= $info_perusahaan["no_rekening"]; ?>" required>
                </div>
                <button type="submit" name="submit" class="btn btn-success">Simpan</button>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>