<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION['user'])) {
    header("location:login.php");
    exit();
}

if (isset($_POST['simpan'])) {
    $nim   = $_POST['nim'];
    $nama  = $_POST['nama'];
    $prodi = $_POST['prodi'];
    $email = $_POST['email'];
    $no_hp = $_POST['no_hp'];

    mysqli_query($koneksi, "INSERT INTO mahasiswa (nim, nama, prodi, email, no_hp) 
        VALUES ('$nim', '$nama', '$prodi', '$email', '$no_hp')");

    header("location:index.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Tambah Data</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container form-box">
    <h2>Tambah Data Mahasiswa</h2>

    <form method="post">
        <label>NIM</label><br>
        <input type="text" name="nim" placeholder="NIM" required><br><br>

        <label>Nama</label><br>
        <input type="text" name="nama" placeholder="Nama" required><br><br>

        <label>Program Studi</label><br>
        <input type="text" name="prodi" placeholder="Program Studi" required><br><br>

        <label>Email</label><br>
        <input type="email" name="email" placeholder="Email" required><br><br>

        <label>Nomor HP</label><br>
        <input type="text" name="no_hp" placeholder="Nomor HP" required><br><br>

        <button type="submit" name="simpan" class="btn-simpan">Simpan</button>
        <a href="index.php" class="btn-kembali">Kembali</a>
    </form>
</div>
</body>
</html>
