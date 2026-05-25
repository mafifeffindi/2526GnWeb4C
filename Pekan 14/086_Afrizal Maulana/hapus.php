<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
include 'koneksi.php';

$id = $_GET['id'];
mysqli_query($koneksi, "DELETE FROM pegawai WHERE id='$id'");
header("Location: index.php");
exit();
?>