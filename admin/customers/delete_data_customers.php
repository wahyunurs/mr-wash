<?php
//Koneksi ke database & query dari file functions.php
require '../../functions.php';

$id = $_GET["id"];

if (delete_data_customers($id) > 0) {
    echo "<script>
            alert('Data berhasill dihapus!');
            document.location.href = 'data_customers.php';
        </script>";
} else {
    echo "<script>
            alert('Data gagal dihapus');
            document.location.href = 'data_customers.php';
        </script>";
}
