<?php
//Koneksi ke database & query dari file functions.php
require '../../functions.php';

$id = $_GET["id"];

if (delete_pesanan($id) > 0) {
    echo "<script>
            alert('Data berhasill dihapus!');
            document.location.href = 'pesanan.php';
        </script>";
} else {
    echo "<script>
            alert('Data gagal dihapus');
            document.location.href = 'pesanan.php';
        </script>";
}
