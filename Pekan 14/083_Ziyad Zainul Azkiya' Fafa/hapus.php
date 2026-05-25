<?php
include 'koneksi.php';

$id = $_GET['id_mahasiswa'];

mysqli_query($conn, "DELETE FROM mahasiswa WHERE id_mahasiswa='$id'");
header("location:index.php");
?>