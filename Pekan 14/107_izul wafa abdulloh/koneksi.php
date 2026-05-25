<?php

$koneksi = mysqli_connect("localhost", "root", "", "dbkampus");

if (!$koneksi) {

die("Koneksi gagal: " . mysqli_connect_error());

}

?>
