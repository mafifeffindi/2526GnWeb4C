<?php
session_start();
require_once 'koneksi.php';
if (!isset($_SESSION['user_id'])) header("Location: login.php");

$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama_barang'];
    $deskripsi = $_POST['deskripsi'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];
    $email = $_POST['email'];
    $nomor_hp = $_POST['nomor_hp'];

    if (empty($nama) || empty($harga) || empty($stok) || empty($email) || empty($nomor_hp)) {
        $error = "Field bertanda * wajib diisi.";
    } else {
        $stmt = $conn->prepare("INSERT INTO barang (nama_barang, deskripsi, harga, stok, email, nomor_hp) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssdiss", $nama, $deskripsi, $harga, $stok, $email, $nomor_hp);
        if ($stmt->execute()) {
            $success = "Barang berhasil ditambahkan!";
            // optional: reset form
        } else {
            $error = "Gagal: " . $conn->error;
        }
        $stmt->close();
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Tambah Barang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>.container { max-width: 700px; margin-top: 40px; }</style>
</head>
<body>
<div class="container">
    <div class="card shadow">
        <div class="card-header bg-primary text-white"><i class="fas fa-plus-circle"></i> Tambah Data Barang</div>
        <div class="card-body">
            <?php if($error): ?><div class="alert alert-danger"><?= $error ?></div><?php endif; ?>
            <?php if($success): ?><div class="alert alert-success"><?= $success ?> <a href="index.php">Lihat data</a></div><?php endif; ?>
            <form method="POST">
                <div class="mb-3">
                    <label>Nama Barang *</label>
                    <input type="text" name="nama_barang" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Deskripsi</label>
                    <textarea name="deskripsi" class="form-control" rows="3"></textarea>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label>Harga (Rp) *</label>
                        <input type="number" name="harga" class="form-control" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Stok *</label>
                        <input type="number" name="stok" class="form-control" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label>Email *</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Nomor HP *</label>
                        <input type="text" name="nomor_hp" class="form-control" required>
                    </div>
                </div>
                <button type="submit" class="btn btn-success">Simpan Barang</button>
                <a href="index.php" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
</body>
</html>