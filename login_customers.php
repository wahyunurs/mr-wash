<?php
require 'functions.php';

if (isset($_POST["login"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM akun_customers WHERE username = '$username'");

    //Cek username
    if (mysqli_num_rows($result) === 1) {
        //Cek Password
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row["password"])) {
            echo "<script>  
                        alert('Selamat datang customer!');
                        document.location.href = 'index.php';
                </script>";
            exit;
        }
    }

    $error = true;
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login-Users</title>
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

    h5,
    p {
        font-family: cursive;
    }
</style>

<body>

    <div class="card">
        <div class="card-header">
            <h3>Login Customer</h3>
        </div>
        <div class="card-body">
            <form action="" method="POST">
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" name="username">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password">
                </div>
                <?php if (isset($error)) : ?>
                    <p style="color: red; font-style: italic">Username/Password salah</p>
                <?php endif; ?>
                <p>Belum mempunyai akun? Silahkan <a href="register_customers.php">registrasi</a> terlebih dahulu.</p>
                <button type="submit" name="login" class="btn btn-primary">Login</button>
            </form>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>