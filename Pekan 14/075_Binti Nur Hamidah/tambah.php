<?php

session_start();

if(!isset($_SESSION['login'])){
    header("location:login.php");
}

include 'koneksi.php';

if(isset($_POST['simpan'])){

    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $prodi = $_POST['prodi'];
    $email = $_POST['email'];
    $no_hp = $_POST['no_hp'];

    mysqli_query($koneksi,
    "INSERT INTO mahasiswa VALUES(
    '',
    '$nim',
    '$nama',
    '$prodi',
    '$email',
    '$no_hp'
    )");

    header("location:index.php");
}

?>

<!DOCTYPE html>
<html>

<head>

    <title>Tambah Data</title>
    <link rel="stylesheet" href="style.css">

</head>

<body>

<div class="container">

    <h2>Tambah Data Mahasiswa</h2>

    <form method="post">

        <input type="text"
        name="nim"
        placeholder="Masukkan NIM">

        <input type="text"
        name="nama"
        placeholder="Masukkan Nama">

        <input type="text"
        name="prodi"
        placeholder="Masukkan Prodi">

        <input type="text"
        name="email"
        placeholder="Masukkan Email">

        <input type="text"
        name="no_hp"
        placeholder="Masukkan Nomor HP">

        <button type="submit" name="simpan">
            Simpan
        </button>

    </form>

</div>

</body>

</html>