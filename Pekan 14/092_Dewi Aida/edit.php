<?php
include 'koneksi.php';
if (!isset($_SESSION['login'])) {
    header("location:login.php");
    exit;
}
$id   = $_GET['id'];
$data = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE id='$id'");
$d    = mysqli_fetch_array($data);
if (isset($_POST['update'])) {
    $nim      = mysqli_real_escape_string($koneksi, $_POST['nim']);
    $nama     = mysqli_real_escape_string($koneksi, $_POST['nama']);
    $prodi    = mysqli_real_escape_string($koneksi, $_POST['prodi']);
    $email    = mysqli_real_escape_string($koneksi, $_POST['email']);
    $nomor_hp = mysqli_real_escape_string($koneksi, $_POST['nomor_hp']);
    mysqli_query($koneksi,
        "UPDATE mahasiswa SET
            nim='$nim', nama='$nama', prodi='$prodi',
            email='$email', nomor_hp='$nomor_hp'
         WHERE id='$id'"
    );
    header("location:index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Data</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>
<body class="bg-light">
<div class="container py-4" style="max-width:500px">
    <div class="card shadow-sm">
        <div class="card-header bg-warning fw-bold">
            <i class="bi bi-pencil-square me-2"></i>Edit Data Mahasiswa
        </div>
        <div class="card-body">
            <form method="post">
                <div class="mb-3">
                    <label class="form-label">NIM</label>
                    <input type="text" name="nim" class="form-control" value="<?= htmlspecialchars($d['nim']) ?>" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Nama</label>
                    <input type="text" name="nama" class="form-control" value="<?= htmlspecialchars($d['nama']) ?>" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Program Studi</label>
                    <input type="text" name="prodi" class="form-control" value="<?= htmlspecialchars($d['prodi']) ?>" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" value="<?= htmlspecialchars($d['email']) ?>" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Nomor HP</label>
                    <input type="tel" name="nomor_hp" class="form-control" value="<?= htmlspecialchars($d['nomor_hp']) ?>" required>
                </div>
                <div class="d-flex gap-2">
                    <button type="submit" name="update" class="btn btn-warning w-100">Update</button>
                    <a href="index.php" class="btn btn-secondary w-100">Batal</a>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>