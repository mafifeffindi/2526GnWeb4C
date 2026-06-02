<?php
require_once 'koneksi.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$id = (int)$_GET['id'];
$user_id = $_SESSION['user_id'];

// Ambil data buku milik user yang login
$query = "SELECT * FROM buku WHERE id = $id AND user_id = $user_id";
$result = mysqli_query($koneksi, $query);
$buku = mysqli_fetch_assoc($result);

if (!$buku) {
    header("Location: index.php?error=notfound");
    exit;
}

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $judul = mysqli_real_escape_string($koneksi, $_POST['judul']);
    $penulis = mysqli_real_escape_string($koneksi, $_POST['penulis']);
    $tahun_terbit = (int)$_POST['tahun_terbit'];
    $isbn = mysqli_real_escape_string($koneksi, $_POST['isbn']);
    $stok = (int)$_POST['stok'];

    $update = "UPDATE buku SET judul='$judul', penulis='$penulis', tahun_terbit=$tahun_terbit, isbn='$isbn', stok=$stok WHERE id=$id AND user_id=$user_id";
    if (mysqli_query($koneksi, $update)) {
        header("Location: index.php?sukses=edit");
        exit;
    } else {
        $error = "Gagal update: " . mysqli_error($koneksi);
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-light">
    <div class="container mt-4" style="max-width: 600px;">
        <div class="card shadow">
            <div class="card-header bg-warning">
                <h4><i class="fas fa-edit"></i> Edit Buku</h4>
            </div>
            <div class="card-body">
                <?php if ($error): ?>
                    <div class="alert alert-danger"><?= $error ?></div>
                <?php endif; ?>
                <form method="POST">
                    <div class="mb-3">
                        <label>Judul Buku</label>
                        <input type="text" name="judul" class="form-control" value="<?= htmlspecialchars($buku['judul']) ?>" required>
                    </div>
                    <div class="mb-3">
                        <label>Penulis</label>
                        <input type="text" name="penulis" class="form-control" value="<?= htmlspecialchars($buku['penulis']) ?>" required>
                    </div>
                    <div class="mb-3">
                        <label>Tahun Terbit</label>
                        <input type="number" name="tahun_terbit" class="form-control" value="<?= $buku['tahun_terbit'] ?>" required>
                    </div>
                    <div class="mb-3">
                        <label>ISBN</label>
                        <input type="text" name="isbn" class="form-control" value="<?= htmlspecialchars($buku['isbn']) ?>">
                    </div>
                    <div class="mb-3">
                        <label>Stok</label>
                        <input type="number" name="stok" class="form-control" value="<?= $buku['stok'] ?>" min="0">
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="index.php" class="btn btn-secondary">Kembali</a>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
