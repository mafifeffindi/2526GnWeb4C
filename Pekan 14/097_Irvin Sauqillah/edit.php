<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION['user'])) {
    header("location:login.php");
    exit();
}

$id   = $_GET['id'];
$data = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE id='$id'");
$d    = mysqli_fetch_array($data);

if (isset($_POST['update'])) {
    $nim   = $_POST['nim'];
    $nama  = $_POST['nama'];
    $prodi = $_POST['prodi'];
    $email = $_POST['email'];
    $no_hp = $_POST['no_hp'];

    mysqli_query($koneksi, "UPDATE mahasiswa SET 
        nim='$nim', nama='$nama', prodi='$prodi', email='$email', no_hp='$no_hp'
        WHERE id='$id'");

    header("location:index.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Data</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container form-box">
    <h2>Edit Data Mahasiswa</h2>

    <form method="post">
        <label>NIM</label><br>
        <input type="text" name="nim" value="<?php echo $d['nim']; ?>" required><br><br>

        <label>Nama</label><br>
        <input type="text" name="nama" value="<?php echo $d['nama']; ?>" required><br><br>

        <label>Program Studi</label><br>
        <input type="text" name="prodi" value="<?php echo $d['prodi']; ?>" required><br><br>

        <label>Email</label><br>
        <input type="email" name="email" value="<?php echo $d['email']; ?>" required><br><br>

        <label>Nomor HP</label><br>
        <input type="text" name="no_hp" value="<?php echo $d['no_hp']; ?>" required><br><br>

        <button type="submit" name="update" class="btn-simpan">Update</button>
        <a href="index.php" class="btn-kembali">Kembali</a>
    </form>
</div>
</body>
</html>
