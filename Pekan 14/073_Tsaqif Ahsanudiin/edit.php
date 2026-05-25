<?php
// File: edit.php
include 'koneksi.php';

if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

$id = $_GET['id'];
$queryData = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE id='$id'");
$d = mysqli_fetch_array($queryData);

if (!$d) {
    header("Location: index.php");
    exit;
}

if (isset($_POST['update'])) {
    $nim      = mysqli_real_escape_string($koneksi, $_POST['nim']);
    $nama     = mysqli_real_escape_string($koneksi, $_POST['nama']);
    $prodi    = mysqli_real_escape_string($koneksi, $_POST['prodi']);
    $email    = mysqli_real_escape_string($koneksi, $_POST['email']);
    $nomor_hp = mysqli_real_escape_string($koneksi, $_POST['nomor_hp']);

    $updateQuery = "UPDATE mahasiswa SET 
                    nim='$nim', 
                    nama='$nama', 
                    prodi='$prodi', 
                    email='$email', 
                    nomor_hp='$nomor_hp' 
                    WHERE id='$id'";

    if (mysqli_query($koneksi, $updateQuery)) {
        header("Location: index.php");
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <title>Edit Data Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container my-5" style="max-width: 600px;">
        <div class="card shadow">
            <div class="card-header bg-warning text-dark">
                <h4 class="mb-0">Edit Data Mahasiswa</h4>
            </div>
            <div class="card-body p-4">
                <form method="post" action="">
                    <div class="mb-3">
                        <label class="form-label">NIM</label>
                        <input type="text" name="nim" class="form-control" value="<?= $d['nim']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nama Lengkap</label>
                        <input type="text" name="nama" class="form-control" value="<?= $d['nama']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Program Studi</label>
                        <input type="text" name="prodi" class="form-control" value="<?= $d['prodi']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" value="<?= $d['email']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nomor HP</label>
                        <input type="text" name="nomor_hp" class="form-control" value="<?= $d['nomor_hp']; ?>" required>
                    </div>
                    <div class="d-flex gap-2">
                        <button type="submit" name="update" class="btn btn-primary">Update</button>
                        <a href="index.php" class="btn btn-secondary">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>