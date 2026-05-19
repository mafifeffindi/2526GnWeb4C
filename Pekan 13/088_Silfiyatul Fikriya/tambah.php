<?php
include 'koneksi.php';

if(isset($_POST['simpan'])){
    $id = $_POST['id'];
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $prodi = $_POST['prodi'];
    $email = $_POST['email']; 
    $nomor_telepon = $_POST['nomor telepon'];

    mysqli_query($koneksi,
    "INSERT INTO mahasiswa VALUES('', '$id' , '$nim', '$nama', '$prodi', '$email', '$nomor_telepon')");

    header("location:index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Tambah Data</title>
</head>
<body>

<h2>Tambah Data Mahasiswa</h2>

<form method="post">
    <input type="int" name="id" placeholder="id"><br><br>
    <input type="text" name="nim" placeholder="nim"><br><br>
    <input type="text" name="nama" placeholder="nama"><br><br>
    <input type="text" name="prodi" placeholder="prodi"><br><br>
    <input type="text" name="email" placeholder="email"><br><br>
    <input type="text" name="nomor telepon" placeholder="nomor telepon"><br><br>

    <button type="submit" name="simpan">simpan</button>
</form>

</body>
</html>
