<?php

require_once __DIR__ . '/vendor/autoload.php';

//Koneksi ke database & query dari file functions.php
require '../functions.php';

//Query select table
$pendaftaran = query("SELECT * FROM pendaftaran");

$mpdf = new \Mpdf\Mpdf();
$html = '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tiket Antrian</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <img src="../assets/img/mr_wash.png" alt="Mr Wash" style="width:300px; margin: auto; margin-left: auto; margin-right: auto;">
    <h1 style="text-align:center;">Tiket Antrian</h1>
    <table class="center">
                <tbody>';
foreach ($pendaftaran as $row) {
    $html .= '<tr>
                <td scope="col">Nama Lengkap</td>
                <td>:</td>
                <td>' . $row["nama_lengkap"] . '</td>
            </tr>
            <tr>
                <td scope="col">Merk Mobil</td>
                <td>:</td>
                <td>' . $row["merk_mobil"] . '</td>
            </tr>
            <tr>
                <td scope="col">Jenis Cuci</td>
                <td>:</td>
                <td>' . $row["jenis_cuci"] . '</td>
            </tr>
            <tr>
                <td scope="col">Harga</td>
                <td>:</td>
                <td>' . $row["harga"] . '</td>
            </tr>
            <tr>
                <td scope="col">Tanggal Cuci</td>
                <td>:</td>
                <td>' . $row["tanggal_cuci"] . '</td>
            </tr>
            <tr>
                <td scope="col">Jam Cuci</td>
                <td>:</td>
                <td>' . $row["jam_cuci"] . '</td>
            </tr>
            <tr>
                <td scope="col">No Antrian</td>
                <td>:</td>
                <td>' . $row["no_antrian"] . '</td>
            </tr>
            <tr>
                <td scope="col">Status Pembayaran</td>
                <td>:</td>
                <td>' . $row["status_pembayaran"] . '</td>
            </tr>';
}

$html .= '</tbody>
        </table>
</body>
</html>';

$mpdf->WriteHTML($html);
$mpdf->Output();
