<?php
//Koneksi ke database & query dari file functions.php
require '../functions.php';

//Mengambil data yang akan diedit
$id = $_GET["id"];

//Query data_customers berdasarkan id
$data_customers = query("SELECT * FROM data_customer WHERE id = $id")[0];

if (isset($_POST["submit"])) {
    if (edit_data_customers($_POST) > 0) {
        echo "<script>
            alert('Profil berhasill diedit!');
            document.location.href = 'profil_customers.php';
        </script>";
    } else {
        echo "<script>
            alert('Profil gagal diedit!');
            document.location.href = 'profil_customers.php';
        </script>";
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit-Profil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/style.css" />
    <!-- Feather Icons -->
    <script src="https://unpkg.com/feather-icons"></script>
</head>

<style>
    * {
        font-family: monospace;
        color: black;
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


    <!-- Form Edit Profil -->
    <div class="card">
        <div class="card-header">
            <h3>Edit Profil Customer</h3>
        </div>
        <div class="card-body">
            <form action="" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?= $data_customers["id"]; ?>">
                <div class="mb-3">
                    <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                    <input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control" placeholder="Enter Nama Lengkap" value="<?= $data_customers["nama_lengkap"]; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <input type="text" name="alamat" id="alamat" class="form-control" placeholder="Enter Alamat" value="<?= $data_customers["alamat"]; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="no_telpon" class="form-label">No Telpon</label>
                    <input type="number" name="no_telpon" id="no_telpon" class="form-control" placeholder="Enter No Telpon" value="<?= $data_customers["no_telpon"]; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="Enter Email" value="<?= $data_customers["email"]; ?>" required>
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
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