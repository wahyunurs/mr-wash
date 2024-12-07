<?php
//Koneksi ke database & query dari file functions.php
require '../functions.php';

//Data input form tambah data mobil
if (isset($_POST["submit"])) {
    if (pendaftaran($_POST) > 0) {
        echo "<script>
            alert('Anda berhasil mendaftar. Mohon datang tepat waktu!');
            document.location.href = '../index.php';
        </script>";
    } else {
        echo "<script>
            alert('Data gagal ditambahkan!');
            document.location.href = 'pendaftaran.php';
        </script>";
    }
}
?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pendaftaran</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- Link rel cetak pdf -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
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
        height: 1200px;
    }

    .dropdown-menu {
        background-color: black;
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
                            <li><a class="dropdown-item active" href="#">Pendaftaran</a></li>
                            <li><a class="dropdown-item" href="../tiket_antrian/tiket_antrian.php">Tiket Antrian</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../tentang_kami/tentang_kami.php">Tentang Kami</a>
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

    <!-- Form Pendaftaran -->
    <div class="card">
        <div class="card-header">
            <h3>Pendaftaran Cuci Mobil</h3>
        </div>
        <div class="card-body">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="nama_lengkap" class="form-label">Nama Lengkap</label><br>
                    <input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control" placeholder="Enter Nama Lengkap" required>
                </div>
                <div class="mb-3">
                    <label for="merk_mobil" class="form-label">Merk Mobil</label>
                    <input type="text" name="merk_mobil" id="merk_mobil" class="form-control" placeholder="Enter Merk Mobil" required>
                </div>

                <div class="mb-3">
                    <label for="jenis_cuci" class="form-label">Jenis Cuci</label>
                    <select name="jenis_cuci" id="jenis_cuci" class="form-select">
                        <option>Pilih Jenis Cuci</option>
                        <!-- Code agar isi option dari atribut jenis_cuci table jenis_cuci dalam database -->
                        <?php $i = 1; ?>
                        <?php
                        //Query select table jenis_cuci
                        $jenis_cuci = query("SELECT * FROM jenis_cuci");
                        foreach ($jenis_cuci as $row) : ?>
                            <option value="<?= $row["jenis_cuci"]; ?>"><?= $row["jenis_cuci"]; ?></option>
                        <?php endforeach; ?>
                        <?php $i++; ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="harga" class="form-label">Harga</label>
                    <input type="number" name="harga" id="harga" class="form-control" readonly>
                </div>
                <!-- Script Autofill form label Harga dari label Jenis Cuci -->
                <script>
                    document.getElementById("jenis_cuci").addEventListener("change", function() {
                        var jenis_cuci = this.value;
                        var harga = 0;

                        // Atur harga berdasarkan jenis_cuci yang dipilih
                        switch (jenis_cuci) {
                            case "Cuci Body":
                                harga = 35000;
                                break;
                            case "Cuci Menyeluruh":
                                harga = 45000;
                                break;
                        }

                        // Isi nilai harga
                        document.getElementById("harga").value = harga;
                    });
                </script>

                <div class="mb-3">
                    <label for="tanggal_cuci" class="form-label">Tanggal Cuci</label>
                    <input type="date" name="tanggal_cuci" id="tanggal_cuci" class="form-control" required>
                </div>
                <script>
                    // Mendapatkan elemen input tanggal
                    var tanggalInput = document.getElementById("tanggal_cuci");

                    // Mendapatkan tanggal hari ini
                    var today = new Date().toISOString().split("T")[0];

                    // Mendapatkan tanggal besok
                    var tomorrow = new Date();
                    tomorrow.setDate(tomorrow.getDate() + 1);
                    var tomorrowISO = tomorrow.toISOString().split("T")[0];

                    // Menetapkan tanggal minimum dan maksimum
                    tanggalInput.setAttribute("min", today);
                    tanggalInput.setAttribute("max", tomorrowISO);
                </script>



                <div class="mb-3">
                    <label for="jam_cuci" class="form-label">Jam Cuci</label>
                    <input type="time" min="08:00:00" max="17:00:00" name="jam_cuci" id="jam_cuci" class="form-control" required>
                </div>
                <script>
                    // Mendapatkan elemen input jam
                    var jamInput = document.getElementById("jam_cuci");

                    // Mengamati perubahan pada input jam
                    jamInput.addEventListener("input", function() {
                        var jamCuci = jamInput.value;

                        // Mengubah jam menjadi objek Date
                        var jamCuciObj = new Date("1970-01-01T" + jamCuci);

                        // Mendapatkan jam dan menit dari objek Date
                        var jam = jamCuciObj.getHours();
                        var menit = jamCuciObj.getMinutes();

                        // Membandingkan jam dengan batasan
                        if (jam < 8 || jam > 17 || (jam === 17 && menit > 0)) {
                            jamInput.setCustomValidity("Jam harus antara 08.00 dan 17.00!");
                        } else {
                            jamInput.setCustomValidity("");
                        }
                    });
                </script>

                <div class="mb-3">
                    <label for="no_antrian" class="form-label">No Antrian</label>
                    <input type="number" name="no_antrian" id="no_antrian" class="form-control" readonly>
                </div>

                <script>
                    // Mendapatkan elemen input nomor antrian
                    var noAntrianInput = document.getElementById("no_antrian");

                    // Memperoleh nomor antrian terakhir yang tersimpan
                    var lastQueueNumber = localStorage.getItem("lastQueueNumber");

                    // Mengatur nomor antrian pada input
                    if (lastQueueNumber) {
                        var nextQueueNumber = parseInt(lastQueueNumber) + 1;
                        noAntrianInput.value = nextQueueNumber;
                    }

                    // Mengamati pengiriman formulir
                    document.addEventListener("submit", function() {
                        // Memperbarui nomor antrian terakhir yang tersimpan
                        localStorage.setItem("lastQueueNumber", noAntrianInput.value);
                    });
                </script>


                <div class="mb-3">
                    <label for="metode_pembayaran" class="form-label">Metode Pembayaran</label>
                    <select name="metode_pembayaran" id="metode_pembayaran" class="form-select" required>
                        <option>Pilih Metode Pembayaran</option>
                        <option value="Transfer">Transfer</option>
                        <option value="Cash">Cash</option>
                    </select>
                </div>

                <div class="mb-3" id="bukti_pembayaran_container">
                    <label for="bukti_pembayaran" class="form-label">Bukti Pembayaran</label>
                    <?php
                    // Query select table data_mobil
                    $info_perusahaan = query("SELECT * FROM info_perusahaan");

                    foreach ($info_perusahaan as $row) :
                    ?>
                        <?php if ($row["nama_bank"] && $row["no_rekening"]) : ?>
                            <p>Transfer ke rekening bank <?= $row["nama_bank"]; ?> nomor rekening: <?= $row["no_rekening"]; ?></p>
                        <?php endif; ?>
                    <?php endforeach; ?>

                    <input type="file" name="bukti_pembayaran" id="bukti_pembayaran" class="form-control" disabled>
                </div>

                <script>
                    // Mendapatkan elemen input metode pembayaran
                    var metodePembayaranInput = document.getElementById("metode_pembayaran");

                    // Mendapatkan elemen container bukti pembayaran
                    var buktiPembayaranContainer = document.getElementById("bukti_pembayaran_container");

                    // Mendapatkan elemen input bukti pembayaran
                    var buktiPembayaranInput = document.getElementById("bukti_pembayaran");

                    // Mengamati perubahan pada input metode pembayaran
                    metodePembayaranInput.addEventListener("change", function() {
                        // Memeriksa apakah metode pembayaran yang dipilih adalah "Transfer"
                        if (metodePembayaranInput.value === "Transfer") {
                            buktiPembayaranContainer.style.display = "block"; // Menampilkan container bukti pembayaran
                            buktiPembayaranInput.disabled = false; // Mengaktifkan input bukti pembayaran
                            buktiPembayaranInput.required = true; // Membuat input bukti pembayaran wajib diisi
                        } else {
                            buktiPembayaranContainer.style.display = "none"; // Menyembunyikan container bukti pembayaran
                            buktiPembayaranInput.disabled = true; // Menonaktifkan input bukti pembayaran
                            buktiPembayaranInput.required = false; // Membuat input bukti pembayaran tidak wajib diisi
                            buktiPembayaranInput.value = ""; // Mengosongkan nilai input bukti pembayaran
                        }
                    });
                </script>



                <button type="submit" name="submit" class="btn btn-primary">Daftar</button>
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