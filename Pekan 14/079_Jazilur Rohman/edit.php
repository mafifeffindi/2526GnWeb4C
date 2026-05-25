<?php
session_start();
require_once 'koneksi.php';
if (!isset($_SESSION['user_id'])) header("Location: login.php");

$id = $_GET['id'] ?? 0;
$stmt = $conn->prepare("SELECT * FROM barang WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$barang = $result->fetch_assoc();
if (!$barang) {
    header("Location: index.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama_barang'];
    $deskripsi = $_POST['deskripsi'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];
    $email = $_POST['email'];
    $nomor_hp = $_POST['nomor_hp'];

    $upd = $conn->prepare("UPDATE barang SET nama_barang=?, deskripsi=?, harga=?, stok=?, email=?, nomor_hp=? WHERE id=?");
    $upd->bind_param("ssdissi", $nama, $deskripsi, $harga, $stok, $email, $nomor_hp, $id);
    if ($upd->execute()) {
        header("Location: index.php?msg=update_success");
        exit;
    } else {
        $error = "Gagal update.";
    }
    $upd->close();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Barang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <div class="card shadow">
        <div class="card-header bg-warning">✏️ Edit Barang</div>
        <div class="card-body">
            <?php if(isset($error)): ?><div class="alert alert-danger"><?= $error ?></div><?php endif; ?>
            <form method="POST">
                <div class="mb-3"><label>Nama Barang</label><input type="text" name="nama_barang" class="form-control" value="<?= htmlspecialchars($barang['nama_barang']) ?>" required></div>
                <div class="mb-3"><label>Deskripsi</label><textarea name="deskripsi" class="form-control"><?= htmlspecialchars($barang['deskripsi']) ?></textarea></div>
                <div class="row">
                    <div class="col-md-6 mb-3"><label>Harga</label><input type="number" name="harga" class="form-control" value="<?= $barang['harga'] ?>" required></div>
                    <div class="col-md-6 mb-3"><label>Stok</label><input type="number" name="stok" class="form-control" value="<?= $barang['stok'] ?>" required></div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3"><label>Email</label><input type="email" name="email" class="form-control" value="<?= htmlspecialchars($barang['email']) ?>" required></div>
                    <div class="col-md-6 mb-3"><label>Nomor HP</label><input type="text" name="nomor_hp" class="form-control" value="<?= htmlspecialchars($barang['nomor_hp']) ?>" required></div>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="index.php" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>
</body>
</html>