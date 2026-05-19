<?php
include 'koneksi.php';

$id = $_GET['id'];

$data = mysqli_fetch_array(
mysqli_query($conn,
"SELECT * FROM mahasiswa WHERE id='$id'")
);

if(isset($_POST['update'])){

    mysqli_query($conn,
    "UPDATE mahasiswa SET
    nama='$_POST[nama]',
    nim='$_POST[nim]',
    jurusan='$_POST[jurusan]'
    WHERE id='$id'");

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

    <h2>Edit Data Mahasiswa</h2>

    <form method="POST">

        <label>Nama</label>

        <input type="text"
        name="nama"
        value="<?= $data['nama'] ?>">

        <label>NIM</label>

        <input type="text"
        name="nim"
        value="<?= $data['nim'] ?>">

        <label>Jurusan</label>

        <input type="text"
        name="jurusan"
        value="<?= $data['jurusan'] ?>">

        <button type="submit" name="update">
            Update
        </button>

    </form>

</div>

</body>
</html>