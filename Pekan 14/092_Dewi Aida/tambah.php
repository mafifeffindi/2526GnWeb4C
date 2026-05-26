<?php
include 'koneksi.php';
if (!isset($_SESSION['login'])) {
    header("location:login.php");
    exit;
}
if (isset($_POST['simpan'])) {
    $nim      = mysqli_real_escape_string($koneksi, $_POST['nim']);
    $nama     = mysqli_real_escape_string($koneksi, $_POST['nama']);
    $prodi    = mysqli_real_escape_string($koneksi, $_POST['prodi']);
    $email    = mysqli_real_escape_string($koneksi, $_POST['email']);
    $nomor_hp = mysqli_real_escape_string($koneksi, $_POST['nomor_hp']);
    mysqli_query($koneksi,
        "INSERT INTO mahasiswa (nim, nama, prodi, email, nomor_hp)
         VALUES ('$nim', '$nama', '$prodi', '$email', '$nomor_hp')"
    );
    header("location:index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Data</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>
<body class="bg-light">
<div class="container py-4" style="max-width:500px">
    <div class="card shadow-sm">
        <div class="card-header bg-success text-white fw-bold">
            <i class="bi bi-plus-circle me-2"></i>Tambah Data Mahasiswa
        </div>
        <div class="card-body">
            <form method="post">
                <div class="mb-3">
                    <label class="form-label">NIM</label>
                    <input type="text" name="nim" class="form-control" placeholder="Masukkan NIM" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Nama</label>
                    <input type="text" name="nama" class="form-control" placeholder="Masukkan nama lengkap" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Program Studi</label>
                    <input type="text" name="prodi" class="form-control" placeholder="Masukkan program studi" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" placeholder="contoh@email.com" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Nomor HP</label>
                    <input type="tel" name="nomor_hp" class="form-control" placeholder="08xxxxxxxxxx" required>
                </div>
                <div class="d-flex gap-2">
                    <button type="submit" name="simpan" class="btn btn-success w-100">Simpan</button>
                    <a href="index.php" class="btn btn-secondary w-100">Batal</a>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>