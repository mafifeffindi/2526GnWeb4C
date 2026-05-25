<?php
$koneksi = mysqli_connect("localhost", "root", "", "db_kampus14");

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>