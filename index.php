<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mr Wash</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css" />
    <!-- Feather Icons -->
    <script src="https://unpkg.com/feather-icons"></script>
</head>
<style>
    * {
        font-family: monospace;
        color: white;
        font-size: large;
    }

    .dropdown-menu {
        background-color: black;
    }

    .carousel-caption {
        background-color: rgba(169, 169, 169, 0.436);
    }

    .collapse a:hover {
        color: red;
    }

    .carousel-item img {
        height: 600px;
    }
</style>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-dark fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="assets/img/mr_wash.png" alt="Mr Wash" width="120">
            </a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Daftar
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="pendaftaran/pendaftaran.php">Pendaftaran</a></li>
                            <li><a class="dropdown-item" href="tiket_antrian/tiket_antrian.php">Tiket Antrian</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="tentang_kami/tentang_kami.php">Tentang Kami</a>
                    </li>
                </ul>
                <ul>
                    <a href="login_customers.php" id="log-in"><i data-feather="log-in"></i></a>
                    <a href="profil_customers/profil_customers.php" id="user"><i data-feather="user"></i></a>
                    <a href="logout_customers.php" id="log-out"><i data-feather="log-out"></i></a>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Carousel Home Content -->
    <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="assets/img/index-bg1.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Selamat Datang di Website Official Mr. Wash</h5>
                    <p>
                        Ini adalah website official kami yang melayanai pendaftaran online antrian cuci mobil. <br>
                        Jika mau mendaftar jangan lupa baca syarat & ketentuannya
                    </p>
                    <button type="button" class="btn btn-primary"><a href="syarat_ketentuan/syarat_ketentuan.php">Info Selengkapnya</a></button>
                </div>
            </div>
            <div class="carousel-item">
                <img src="assets/img/index-bg2.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Mau cuci mobil tapi males ngantri?</h5>
                    <p>Cuci di Mr Wash sulusinya, melayani daftar online tanpa antri.</p>
                    <button type="button" class="btn btn-primary"><a href="pendaftaran/data_customer.php">Daftar Sekarang</a></button>
                </div>
            </div>
            <div class="carousel-item">
                <img src="assets/img/index-bg3.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Mr Wash</h5>
                    <p>Mencuci mobil anda cepat, bersih, dan kinclong.</p>
                    <button type="button" class="btn btn-primary"><a href="pendaftaran/data_customer.php">Lanjut</a></button>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

    <!-- Feather Icons -->
    <script>
        feather.replace();
    </script>

</body>

</html>