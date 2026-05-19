<?php
include 'koneksi.php';

if(isset($_POST['submit'])){

    mysqli_query($conn,
    "INSERT INTO mahasiswa VALUES(
    '',
    '$_POST[nama]',
    '$_POST[nim]',
    '$_POST[jurusan]')");

    header("Location:index.php");
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

    <form method="POST">

        <label>Nama</label>

        <input type="text" name="nama">

        <label>NIM</label>

        <input type="text" name="nim">

        <label>Jurusan</label>

        <input type="text" name="jurusan">

        <button type="submit" name="submit">
            Simpan
        </button>

    </form>

</div>

</body>
</html>