<?php
//Koneksi ke database & query dari file functions.php
require '../../functions.php';

//Mengambil data yang akan diedit
$id = $_GET["id"];

//Query jenis cuci berdasarkan id
$pendaftaran = query("SELECT * FROM pendaftaran WHERE id = $id")[0];

if (isset($_POST["submit"])) {
    if (edit_pembayaran($_POST) > 0) {
        echo "<script>
            alert('Data berhasill diedit!');
            document.location.href = 'pembayaran.php';
        </script>";
    } else {
        echo "<script>
            alert('Data gagal diedit!');
            document.location.href = 'pembayaran.php';
        </script>";
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Pembayaran</title>
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
                                <li><a class="dropdown-item active" href="#">Pembayaran</a></li>
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

    <!-- Form Edit Pembayaran -->
    <div class="card" style="width: 90%;">
        <div class="card-header">
            <h3>Edit Pembayaran</h3>
        </div>
        <div class="card-body">
            <form action="" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?= $pendaftaran["id"]; ?>">
                <input type="hidden" name="bukti_pembayaran_lama" id="bukti_pembayaran_lama" value="<?= $pendaftaran["bukti_pembayaran"]; ?>">

                <div class="mb-3">
                    <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                    <input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control" placeholder="Enter Nama Lengkap" value="<?= $pendaftaran["nama_lengkap"]; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="jenis_cuci" class="form-label">Jenis Cuci</label>
                    <input type="text" name="jenis_cuci" id="jenis_cuci" class="form-control" placeholder="Enter Jenis Cuci" value="<?= $pendaftaran["jenis_cuci"]; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="harga" class="form-label">Harga</label>
                    <input type="number" name="harga" id="harga" class="form-control" placeholder="Enter Harga" value="<?= $pendaftaran["harga"]; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="tanggal_cuci" class="form-label">Tanggal Cuci</label>
                    <input type="date" name="tanggal_cuci" id="tanggal_cuci" class="form-control" placeholder="Enter Tanggal Cuci" value="<?= $pendaftaran["tanggal_cuci"]; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="no_antrian" class="form-label">No. Antrian</label>
                    <input type="number" name="no_antrian" id="no_antrian" class="form-control" placeholder="Enter No Antrian" value="<?= $pendaftaran["no_antrian"]; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="metode_pembayaran" class="form-label">Metode Pembayaran</label>
                    <input type="text" name="metode_pembayaran" id="metode_pembayaran" class="form-control" placeholder="Enter Metode Pembayaran" value="<?= $pendaftaran["metode_pembayaran"]; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="bukti_pembayaran" class="form-label">Bukti Pembayaran</label><br>
                    <img src="../../assets/img/<?= $pendaftaran["bukti_pembayaran"]; ?>" alt="bukti_pembayaran" style="width: 70px;">
                    <input type="file" name="bukti_pembayaran" id="bukti_pembayaran" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="status_pembayaran" class="form-label">Status Pembayaran</label>
                    <select name="status_pembayaran" id="status_pembayaran" class="form-select" required>
                        <option>Pilih Status Pembayaran</option>
                        <option value="Belum dibayar">Belum dibayar</option>
                        <option value="Lunas">Lunas</option>
                    </select>
                </div>
                <button type="submit" name="submit" class="btn btn-success">Simpan</button>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>