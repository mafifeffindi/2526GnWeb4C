<?php
include 'koneksi.php';

$id = $_GET['id'];

$data = mysqli_query($conn, "SELECT * FROM mahasiswa WHERE id='$id'");
$d = mysqli_fetch_assoc($data);

if(isset($_POST['update'])){

    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $jurusan = $_POST['jurusan'];
    $alamat = $_POST['alamat'];

    mysqli_query($conn,"UPDATE mahasiswa SET
        nim='$nim',
        nama='$nama',
        jurusan='$jurusan',
        alamat='$alamat'
        WHERE id='$id'
    ");

    header("Location:index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Data</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">

    <h1>✏️ Edit Data Mahasiswa</h1>

    <form method="POST">

        <input type="text" name="nim"
        value="<?= $d['nim']; ?>" required>

        <input type="text" name="nama"
        value="<?= $d['nama']; ?>" required>

        <input type="text" name="jurusan"
        value="<?= $d['jurusan']; ?>" required>

        <textarea name="alamat" rows="4" required><?= $d['alamat']; ?></textarea>

        <button type="submit" name="update">💾 Update Data</button>

    </form>

    <a href="index.php" class="back">⬅ Kembali</a>

</div>

</body>
</html>