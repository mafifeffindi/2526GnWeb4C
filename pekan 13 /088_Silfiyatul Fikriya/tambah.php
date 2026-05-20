<?php
include 'koneksi.php';

if (isset($_POST['submit'])) {

    $nama     = $_POST['nama'];
    $nim      = $_POST['nim'];
    $prodi    = $_POST['prodi'];
    $email    = $_POST['email'];
    $nomor_telepon = $_POST['nomor_telepon'];

    mysqli_query($conn,
        "INSERT INTO mahasiswa(nama,nim,prodi,email,nomor_telepon)
        VALUES('$nama','$nim','$prodi', '$email', '$nomor_telepon')"
    );

    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Data</title>
</head>
<body>

<h2>Tambah Data Mahasiswa</h2>

<form method="POST">

    <label>Nama</label><br>
    <input type="text" name="nama"><br><br>

    <label>NIM</label><br>
    <input type="text" name="nim"><br><br>

    <label>Prodi</label><br>
    <input type="text" name="prodi"><br><br>

    <label>Email</label><br>
    <input type="email" name="email"><br><br>

    <label>Nomor Telepon</label><br>
    <input type="text" name="nomor_telepon"><br><br>

    <button type="submit" name="submit">
        Simpan
    </button>

</form>

</body>
</html>
