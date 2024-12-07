<?php
require 'functions.php';
if (isset($_POST["register"])) {
    if (registrasi_customers($_POST) > 0) {
        echo    "<script>
                        alert('Customer berhasil mendaftar!');
                        document.location.href = 'data_customers.php';
                    </script>";
    } else {
        echo mysqli_error($conn);
    }
}
?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register-Customer</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css" />
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
    }

    .card {
        width: 50%;
    }
</style>

<body>
    <div class="card">
        <div class="card-header">
            <h2>Registrasi Customer</h2>
        </div>
        <div class="card-body">
            <form action="" method="post">
                <div class="mb-3">
                    <label for="username" class="form-label">Username </label>
                    <input class="form-control" type="text" name="username" id="username">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password </label>
                    <input class="form-control" type="password" name="password" id="password">
                </div>
                <div class="mb-3">
                    <label for="password2" class="form-label">Konfirmasi password </label>
                    <input class="form-control" type="password" name="password2" id="password2">
                </div>

                <button type="submit" name="register" class="btn btn-primary">Register</button>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>