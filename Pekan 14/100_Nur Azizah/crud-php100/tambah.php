<?php
include 'koneksi.php';

if(isset($_POST['submit'])){

    $nama = $_POST['nama'];
    $nim = $_POST['nim'];
    $jurusan = $_POST['jurusan'];
    $email = $_POST['email'];
    $no_hp = $_POST['no_hp'];

    mysqli_query($conn,
    "INSERT INTO mahasiswa
    VALUES('', '$nama', '$nim',
    '$jurusan', '$email', '$no_hp')");

    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Data</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5">

<div class="card shadow p-4">

<h3 class="mb-4">Tambah Data Mahasiswa</h3>

<form method="POST">

<input type="text" name="nama"
placeholder="Nama"
class="form-control mb-3" required>

<input type="text" name="nim"
placeholder="NIM"
class="form-control mb-3" required>

<input type="text" name="jurusan"
placeholder="Jurusan"
class="form-control mb-3" required>

<input type="email" name="email"
placeholder="Email"
class="form-control mb-3" required>

<input type="text" name="no_hp"
placeholder="Nomor HP"
class="form-control mb-3" required>

<button type="submit"
name="submit"
class="btn btn-primary">
Simpan
</button>

<a href="index.php"
class="btn btn-secondary">
Kembali
</a>

</form>

</div>
</div>

</body>
</html>