<?php
$koneksi = mysqli_connect("localhost", "root", "", "db_kaampus");
if (!$koneksi) {
    die("Koneksi ke database gagal: " . mysqli_connect_error());
}
?>