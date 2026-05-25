<?php
include 'koneksi.php';

$id = $_GET['id'];

$data = mysqli_query($conn,
"SELECT * FROM mahasiswa WHERE id='$id'");

$row = mysqli_fetch_assoc($data);

if(isset($_POST['submit'])){

    $nama = $_POST['nama'];
    $nim = $_POST['nim'];
    $jurusan = $_POST['jurusan'];
    $email = $_POST['email'];
    $no_hp = $_POST['no_hp'];

    mysqli_query($conn,
    "UPDATE mahasiswa SET
    nama='$nama',
    nim='$nim',
    jurusan='$jurusan',
    email='$email',
    no_hp='$no_hp'
    WHERE id='$id'");

    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Edit Data</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container mt-5">

<div class="card shadow p-4">

<h3 class="mb-4">Edit Data Mahasiswa</h3>

<form method="POST">

<input type="text"
name="nama"
value="<?= $row['nama'] ?>"
class="form-control mb-3">

<input type="text"
name="nim"
value="<?= $row['nim'] ?>"
class="form-control mb-3">

<input type="text"
name="jurusan"
value="<?= $row['jurusan'] ?>"
class="form-control mb-3">

<input type="email"
name="email"
value="<?= $row['email'] ?>"
class="form-control mb-3">

<input type="text"
name="no_hp"
value="<?= $row['no_hp'] ?>"
class="form-control mb-3">

<button type="submit"
name="submit"
class="btn btn-warning">
Update
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