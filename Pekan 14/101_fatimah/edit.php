<?php
session_start();
if (!isset($_SESSION['user'])) { header("location:login.php"); exit; }
include 'koneksi.php';

$id = $_GET['id'];
$data = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE id='$id'");
$d = mysqli_fetch_array($data);

if (isset($_POST['update'])) {
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $prodi = $_POST['prodi'];
    $email = $_POST['email'];
    $nohp = $_POST['nohp'];
    
    mysqli_query($koneksi, "UPDATE mahasiswa SET nim='$nim', nama='$nama', prodi='$prodi', email='$email', nohp='$nohp' WHERE id='$id'");
    header("location:index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Data Mahasiswa</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="flex-center">
    <div class="card">
        <h2>Edit Data</h2>
        <form method="post">
            <label>NIM</label>
            <input type="text" name="nim" value="<?php echo $d['nim']; ?>" required><br>
            <label>Nama</label>
            <input type="text" name="nama" value="<?php echo $d['nama']; ?>" required><br>
            <label>Prodi</label>
            <input type="text" name="prodi" value="<?php echo $d['prodi']; ?>" required><br>
            <label>Email</label>
            <input type="email" name="email" value="<?php echo $d['email']; ?>" required><br>
            <label>No. HP</label>
            <input type="text" name="nohp" value="<?php echo $d['nohp']; ?>" required><br>
            
            <div style="margin-top: 20px;">
                <button type="submit" name="update" class="btn btn-primary">Update</button>
                <a href="index.php" class="btn btn-secondary" style="text-decoration: none; display: inline-block; text-align: center;">Batal</a>
            </div>
        </form>
    </div>
</body>
</html>
