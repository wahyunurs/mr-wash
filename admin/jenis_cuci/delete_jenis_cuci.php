<?php
//Koneksi ke database & query dari file functions.php
require '../../functions.php';

$id = $_GET["id"];

if (delete_jenis_cuci($id) > 0) {
    echo "<script>
            alert('Data berhasill dihapus!');
            document.location.href = 'jenis_cuci.php';
        </script>";
} else {
    echo "<script>
            alert('Data gagal dihapus');
            document.location.href = 'jenis_cuci.php';
        </script>";
}
