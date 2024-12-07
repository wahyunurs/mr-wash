<?php
// Koneksi ke database & query dari file functions.php
require 'functions.php';

// Data input form tambah data mobil
if (isset($_POST["submit"])) {
    if (tambah_data_customers($_POST) > 0) {
        echo "<script>
            alert('Data berhasil dikirim!');
            window.location.href = 'login_customers.php';
        </script>";
    } else {
        echo "<script>
            alert('Data gagal dikirim!');
            window.location.href = 'profil_customers.php';
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
    <link rel="stylesheet" href="assets/css/style.css" />
    <!-- Feather Icons -->
    <script src="https://unpkg.com/feather-icons"></script>
</head>

<style>
    * {
        color: black;
        font-family: monospace;
        font-size: large;
    }

    body {
        background-image: url('assets/img/login-registrasi-bg.jpg');
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: 100% 100%;
        height: 600px;
    }

    .card {
        width: 60%;
    }

    h5,
    p {
        font-family: cursive;
    }
</style>

<body>
    <!-- Form Data Diri Customers -->
    <div class="card">
        <div class="card-header">
            <h3>Data Diri Customers</h3>
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