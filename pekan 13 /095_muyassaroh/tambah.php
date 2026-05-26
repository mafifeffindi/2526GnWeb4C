<?php
include 'koneksi.php';

if(isset($_POST['submit'])){

    $nama = $_POST['nama'];
    $nim = $_POST['nim'];
    $jurusan = $_POST['jurusan'];

    mysqli_query($conn, "INSERT INTO mahasiswa VALUES('', '$nama', '$nim', '$jurusan')");

    header("location:index.php");
}
?>

<form method="POST">
    Nama:
    <input type="text" name="nama"><br><br>

    NIM:
    <input type="text" name="nim"><br><br>

    Jurusan:
    <input type="text" name="jurusan"><br><br>

    <button type="submit" name="submit">Simpan</button>
</form>