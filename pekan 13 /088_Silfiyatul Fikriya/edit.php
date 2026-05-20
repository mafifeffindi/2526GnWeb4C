<?php
include 'koneksi.php';

$id = $_GET['id'];

$data = mysqli_query(
    $conn,
    "SELECT * FROM mahasiswa WHERE id='$id'"
);

$row = mysqli_fetch_assoc($data);

if (isset($_POST['submit'])) {

    $nama     = $_POST['nama'];
    $nim      = $_POST['nim'];
    $jurusan  = $_POST['jurusan'];

    mysqli_query($conn,
        "UPDATE mahasiswa SET
        nama='$nama',
        nim='$nim',
        jurusan='$jurusan'
        WHERE id='$id'"
    );

    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Data</title>
</head>
<body>

<h2>Edit Data Mahasiswa</h2>

<form method="POST">

    <label>Nama</label><br>
    <input type="text"
           name="nama"
           value="<?= $row['nama']; ?>">
    <br><br>

    <label>NIM</label><br>
    <input type="text"
           name="nim"
           value="<?= $row['nim']; ?>">
    <br><br>

    <label>Prodi</label><br>
    <input type="text"
           name="prodi"
           value="<?= $row['prodi']; ?>">
    <br><br>

    <label>Email</label><br>
    <input type="email"
           name="email"
           value="<?= $row['email']; ?>">
    <br><br>

    <label>Nomor Telepon</label><br>
    <input type="text"
           name="nomor_telepon"
           value="<?= $row['nomor_telepon']; ?>">

    <button type="submit" name="submit">
        Update
    </button>

</form>

</body>
</html>
