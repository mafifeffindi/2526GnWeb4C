<?php
session_start();
$koneksi = mysqli_connect("localhost", "root", "", "db_kampuss");
if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>