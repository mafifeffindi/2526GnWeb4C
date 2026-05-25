<?php
include 'koneksi.php';

if(isset($_POST['simpan'])){
    $nama = $_POST['nama'];
    $nim = $_POST['nim'];
    $email = $_POST['email'];
    $nohp = $_POST['nohp'];
    $jurusan = $_POST['jurusan'];

    mysqli_query($conn, "INSERT INTO mahasiswa 
    VALUES('', '$nama', '$nim', '$email', '$nohp', '$jurusan')");

    header("location:index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
<div class="card p-4">

<h2>Tambah Data</h2>

<form method="POST">

<label>Nama</label>
<input type="text" name="nama" class="form-control mb-3">

<label>NIM</label>
<input type="text" name="nim" class="form-control mb-3">

<label>Email</label>
<input type="email" name="email" class="form-control mb-3">

<label>No HP</label>
<input type="text" name="nohp" class="form-control mb-3">

<label>Jurusan</label>
<input type="text" name="jurusan" class="form-control mb-3">

<button type="submit" name="simpan" class="btn btn-primary">Simpan</button>

</form>

</div>
</div>

</body>
</html>
