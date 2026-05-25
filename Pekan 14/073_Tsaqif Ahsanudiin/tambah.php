<?php
// File: tambah.php
include 'koneksi.php';

if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

if (isset($_POST['simpan'])) {
    $nim      = mysqli_real_escape_string($koneksi, $_POST['nim']);
    $nama     = mysqli_real_escape_string($koneksi, $_POST['nama']);
    $prodi    = mysqli_real_escape_string($koneksi, $_POST['prodi']);
    $email    = mysqli_real_escape_string($koneksi, $_POST['email']);
    $nomor_hp = mysqli_real_escape_string($koneksi, $_POST['nomor_hp']);

    $query = "INSERT INTO mahasiswa (nim, nama, prodi, email, nomor_hp) VALUES ('$nim', '$nama', '$prodi', '$email', '$nomor_hp')";
    
    if (mysqli_query($koneksi, $query)) {
        header("Location: index.php");
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <title>Tambah Data Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container my-5" style="max-width: 600px;">
        <div class="card shadow">
            <div class="card-header bg-success text-white">
                <h4 class="mb-0">Tambah Data Mahasiswa</h4>
            </div>
            <div class="card-body p-4">
                <form method="post" action="">
                    <div class="mb-3">
                        <label class="form-label">NIM</label>
                        <input type="text" name="nim" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nama Lengkap</label>
                        <input type="text" name="nama" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Program Studi</label>
                        <input type="text" name="prodi" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nomor HP</label>
                        <input type="text" name="nomor_hp" class="form-control" required>
                    </div>
                    <div class="d-flex gap-2">
                        <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
                        <a href="index.php" class="btn btn-secondary">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>