<?php
// File: hapus.php
include 'koneksi.php';

if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

$id = $_GET['id'];

// Eksekusi query dengan benar
mysqli_query($koneksi, "DELETE FROM mahasiswa WHERE id='$id'");

header("Location: index.php");
exit;
?>