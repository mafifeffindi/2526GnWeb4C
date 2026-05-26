<?php
session_start();
if (!isset($_SESSION['user'])) { header("location:login.php"); exit; }
include 'koneksi.php';

if (isset($_POST['simpan'])) {
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $prodi = $_POST['prodi'];
    $email = $_POST['email'];
    $nohp = $_POST['nohp'];
    
    mysqli_query($koneksi, "INSERT INTO mahasiswa (nim, nama, prodi, email, nohp) VALUES('$nim', '$nama', '$prodi', '$email', '$nohp')");
    header("location:index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Tambah Data Mahasiswa</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="flex-center">
    <div class="card">
        <h2>Tambah Data</h2>
        <form method="post">
            <input type="text" name="nim" placeholder="NIM" required><br>
            <input type="text" name="nama" placeholder="Nama Lengkap" required><br>
            <input type="text" name="prodi" placeholder="Program Studi" required><br>
            <input type="email" name="email" placeholder="Email (contoh@gmail.com)" required><br>
            <input type="text" name="nohp" placeholder="Nomor HP" required><br>
            
            <div style="margin-top: 20px;">
                <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
                <a href="index.php" class="btn btn-secondary" style="text-decoration: none; display: inline-block; text-align: center;">Kembali</a>
            </div>
        </form>
    </div>
</body>
</html>
