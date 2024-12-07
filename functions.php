<?php

//Koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "car_wash");


//Registrasi Admin
function registrasi($data)
{
    global $conn;

    //Ambil data dari table admin
    $result = mysqli_query($conn, "SELECT * FROM admin");

    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);

    //Cek konfirmasi password
    if ($password !== $password2) {
        echo    "<script>
                    alert('konfirmasi password tidak sesuai!');
                </script>";
        return false;
    }

    //Cek Admin sudah ada atau belum
    mysqli_query($conn, "SELECT username FROM admin WHERE username='$username'");

    if (mysqli_fetch_assoc($result)) {
        echo    "<script>
                    alert('Akun sudah terdaftar!');
                    document.location.href = 'register.php';
                </script>";
        return false;
    }


    //Enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    //Tambahkan admin baru
    mysqli_query($conn, "INSERT INTO admin VALUES('','$username','$password')");

    return mysqli_affected_rows($conn);
}

// Function registrasi customers
function registrasi_customers($data)
{
    global $conn;

    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);

    // Cek konfirmasi password
    if ($password !== $password2) {
        echo "<script>
                alert('Konfirmasi password tidak sesuai!');
              </script>";
        return false;
    }

    // Cek User sudah ada atau belum
    $query = "SELECT username FROM akun_customers WHERE username = '$username'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        echo "<script>
                alert('Username sudah terdaftar!');
              </script>";
        return false;
    }

    //Enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    // Tambahkan user baru
    $query = "INSERT INTO akun_customers (username, password) VALUES ('$username', '$password')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}


//Menampilkan values table
function query($query)
{
    global $conn;

    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

//Function tambah data jenis cuci
function tambah_jenis_cuci($data)
{
    global $conn;

    $jenis_cuci = htmlspecialchars($data["jenis_cuci"]); //htmlspecialchars agar user tidak bisa input syntax html dalam form
    $harga = htmlspecialchars($data["harga"]);

    $query = "INSERT INTO jenis_cuci VALUES ('', '$jenis_cuci', '$harga')";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

//Function delete data jenis cuci
function delete_jenis_cuci($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM jenis_cuci WHERE id =$id");

    return mysqli_affected_rows($conn);
}

//Function edit data jenis cuci
function edit_jenis_cuci($data)
{
    global $conn;

    $id = $data["id"];
    $jenis_cuci = htmlspecialchars($data["jenis_cuci"]);
    $harga = htmlspecialchars($data["harga"]);

    $query = "UPDATE jenis_cuci SET jenis_cuci='$jenis_cuci', harga='$harga' WHERE id= $id";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

//Tambah akun customer
function tambah_akun_customers($data)
{
    global $conn;

    $username = $data["username"];
    $password = $data["password"];

    $query = "INSERT INTO akun_customers VALUES ('', 'username', 'password')";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

//Function Tambah Data Customer
function tambah_data_customers($data)
{
    global $conn;

    $nama_lengkap = htmlspecialchars($data["nama_lengkap"]);
    $alamat = htmlspecialchars($data["alamat"]);
    $no_telpon = htmlspecialchars($data["no_telpon"]);
    $email = htmlspecialchars($data["email"]);

    $query = "INSERT INTO data_customer VALUES ('', '$nama_lengkap', '$alamat', '$no_telpon', '$email')";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

//Function Delete Data Customers
function delete_data_customers($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM data_customer WHERE id =$id");

    return mysqli_affected_rows($conn);
}

//Function edit data jenis cuci
function edit_data_customers($data)
{
    global $conn;

    $id = $data["id"];
    $nama_lengkap = htmlspecialchars($data["nama_lengkap"]);
    $alamat = htmlspecialchars($data["alamat"]);
    $no_telpon = htmlspecialchars($data["no_telpon"]);
    $email = htmlspecialchars($data["email"]);

    $query = "UPDATE data_customer SET nama_lengkap='$nama_lengkap', alamat='$alamat', no_telpon='$no_telpon', email='$email' WHERE id= $id";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

//Function Tambah Info Perusahaan
function tambah_info_perusahaan($data)
{
    global $conn;

    $nama_perusahaan = htmlspecialchars($data["nama_perusahaan"]);
    $alamat_perusahaan = htmlspecialchars($data["alamat_perusahaan"]);
    $kontak_perusahaan = htmlspecialchars($data["kontak_perusahaan"]);
    $email_perusahaan = htmlspecialchars($data["email_perusahaan"]);
    $nama_bank = htmlspecialchars($data["nama_bank"]);
    $no_rekening = htmlspecialchars($data["no_rekening"]);

    $query = "INSERT INTO data_customer VALUES ('', '$nama_perusahaan', '$alamat_perusahaan', '$kontak_perusahaan', '$email_perusahaan', '$nama_bank', '$no_rekening')";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

//Function Delete Info Perusahaan
function delete_info_perusahaan($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM data_customer WHERE id =$id");

    return mysqli_affected_rows($conn);
}

//Function Edit Info Perusahaan
function edit_info_perusahaan($data)
{
    global $conn;

    $id = $data["id"];
    $nama_perusahaan = htmlspecialchars($data["nama_perusahaan"]);
    $alamat_perusahaan = htmlspecialchars($data["alamat_perusahaan"]);
    $kontak_perusahaan = htmlspecialchars($data["kontak_perusahaan"]);
    $email_perusahaan = htmlspecialchars($data["email_perusahaan"]);
    $nama_bank = htmlspecialchars($data["nama_bank"]);
    $no_rekening = htmlspecialchars($data["no_rekening"]);

    $query = "UPDATE data_customer SET nama_perusahaan='$nama_perusahaan', alamat_perusahaan='$alamat_perusahaan', kontak_perusahaan='$kontak_perusahaan', email_perusahaan='$email_perusahaan', nama_bank='$nama_bank', no_rekening='$no_rekening' WHERE id=$id";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

// Function Tambah Data Pendaftaran
function pendaftaran($data)
{
    global $conn;

    $nama_lengkap = htmlspecialchars($data["nama_lengkap"]);
    $merk_mobil = htmlspecialchars($data["merk_mobil"]);
    $jenis_cuci = htmlspecialchars($data["jenis_cuci"]);
    $harga = htmlspecialchars($data["harga"]);
    $tanggal_cuci = htmlspecialchars($data["tanggal_cuci"]);
    $jam_cuci = htmlspecialchars($data["jam_cuci"]);
    $no_antrian = htmlspecialchars($data["no_antrian"]);
    $metode_pembayaran = htmlspecialchars($data["metode_pembayaran"]);

    //Upload bukti pembayaran
    $bukti_pembayaran = upload();
    if (!$bukti_pembayaran) {
        return false;
    }

    $query = "INSERT INTO pendaftaran (id, nama_lengkap, merk_mobil, jenis_cuci, harga, tanggal_cuci, jam_cuci, no_antrian, metode_pembayaran, bukti_pembayaran) VALUES ('', '$nama_lengkap', '$merk_mobil', '$jenis_cuci', '$harga', '$tanggal_cuci', '$jam_cuci', '$no_antrian', '$metode_pembayaran', '$bukti_pembayaran')";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

// Function Upload Bukti Pembayaran
function upload()
{
    // Cek apakah metode pembayaran adalah "Transfer"
    if ($_POST['metode_pembayaran'] === 'Transfer') {
        $namaFile = $_FILES['bukti_pembayaran']['name'];
        $ukuranFile = $_FILES['bukti_pembayaran']['size'];
        $error = $_FILES['bukti_pembayaran']['error'];
        $tmpName = $_FILES['bukti_pembayaran']['tmp_name'];

        // Cek yang Diupload hanya Foto
        $ekstensiFotoValid = ['jpg', 'jpeg', 'png'];
        $ekstensiFoto = explode('.', $namaFile);
        $ekstensiFoto = strtolower(end($ekstensiFoto));
        if (!in_array($ekstensiFoto, $ekstensiFotoValid)) {
            echo "<script>
                    alert('yang Anda Upload bukan Foto!');
                </script>";
            return false;
        }

        // Cek Jika Tidak Ada Foto yang diupload
        if ($error === 4) {
            echo "<script>
                    alert('Pilih Foto terlebih dahulu!');
                </script>";
            return false;
        }

        // Cek Ukuran Foto tidak terlalu Besar
        if ($ukuranFile > 50000000) {
            echo "<script>
                    alert('Foto yang Anda upload ukurannya terlalu besar!');
                </script>";
            return false;
        }

        // Lolos Pengecekan dan upload foto
        move_uploaded_file($tmpName, '../assets/img/' . $namaFile);

        return $namaFile;
    }

    // Jika metode pembayaran bukan "Transfer", kembalikan nilai null
    return null;
}


//Function Edit Pesanan
function edit_pesanan($data)
{
    global $conn;

    $id = $data["id"];
    $nama_lengkap = htmlspecialchars($data["nama_lengkap"]);
    $merk_mobil = htmlspecialchars($data["merk_mobil"]);
    $jenis_cuci = htmlspecialchars($data["jenis_cuci"]);
    $harga = htmlspecialchars($data["harga"]);
    $tanggal_cuci = htmlspecialchars($data["tanggal_cuci"]);
    $jam_cuci = htmlspecialchars($data["jam_cuci"]);
    $no_antrian = htmlspecialchars($data["no_antrian"]);
    $status_cuci = htmlspecialchars($data["status_cuci"]);

    $query = "UPDATE pendaftaran SET nama_lengkap='$nama_lengkap', merk_mobil='$merk_mobil', jenis_cuci='$jenis_cuci', harga='$harga', tanggal_cuci='$tanggal_cuci', jam_cuci='$jam_cuci', no_antrian='$no_antrian', status_cuci='$status_cuci' WHERE id=$id";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

//Function Delete Pesanan Pendaftaran
function delete_pesanan($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM pendaftaran WHERE id =$id");

    return mysqli_affected_rows($conn);
}

//Function Edit Pembayaran
function edit_pembayaran($data)
{
    global $conn;

    $id = $data["id"];
    $nama_lengkap = htmlspecialchars($data["nama_lengkap"]);
    $jenis_cuci = htmlspecialchars($data["jenis_cuci"]);
    $harga = htmlspecialchars($data["harga"]);
    $tanggal_cuci = htmlspecialchars($data["tanggal_cuci"]);
    $no_antrian = htmlspecialchars($data["no_antrian"]);
    $metode_pembayaran = htmlspecialchars($data["metode_pembayaran"]);

    //Bukti Pembayaran Lama
    $bukti_pembayaran_lama = htmlspecialchars($data["bukti_pembayaran_lama"]);

    //Cek Apakah Admin Pilih Gambar Baru atau Tidak
    if ($_FILES['bukti_pembayaran']['error'] === 4) {
        $bukti_pembayaran = $bukti_pembayaran_lama; //Jika Admin tidak pilih gambar baru
    } else {
        // Hapus bukti pembayaran lama
        if ($bukti_pembayaran_lama) {
            unlink('../assets/img/' . $bukti_pembayaran_lama);
        }
        // Upload gambar baru
        $bukti_pembayaran = upload(); // Jika Admin memilih gambar baru
    }

    $status_pembayaran = htmlspecialchars($data["status_pembayaran"]);

    $query = "UPDATE pendaftaran SET nama_lengkap='$nama_lengkap', jenis_cuci='$jenis_cuci', harga='$harga', tanggal_cuci='$tanggal_cuci', no_antrian='$no_antrian', metode_pembayaran='$metode_pembayaran', bukti_pembayaran='$bukti_pembayaran', status_pembayaran='$status_pembayaran' WHERE id=$id";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

//Function Delete Pembayaran Pendaftaran
function delete_pembayaran($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM pendaftaran WHERE id = $id");

    return mysqli_affected_rows($conn);
}
