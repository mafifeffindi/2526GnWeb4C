<?php
require_once 'koneksi.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$id = (int)$_GET['id'];
$user_id = $_SESSION['user_id'];

// Pastikan buku milik user yang login
$cek = mysqli_query($koneksi, "SELECT id FROM buku WHERE id = $id AND user_id = $user_id");
if (mysqli_num_rows($cek) > 0) {
    mysqli_query($koneksi, "DELETE FROM buku WHERE id = $id AND user_id = $user_id");
}

header("Location: index.php?sukses=hapus");
exit;