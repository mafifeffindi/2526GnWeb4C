<?php
session_start();
require_once 'koneksi.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$keyword = $_GET['search'] ?? '';
$sql = "SELECT * FROM barang WHERE nama_barang LIKE ? OR email LIKE ? OR nomor_hp LIKE ? ORDER BY id DESC";
$stmt = $conn->prepare($sql);
$searchTerm = "%$keyword%";
$stmt->bind_param("sss", $searchTerm, $searchTerm, $searchTerm);
$stmt->execute();
$result = $stmt->get_result();
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Data Barang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body { background: #f8f9fa; }
        .table-hover tbody tr:hover { background-color: #f1f3f5; }
        .btn-action { margin: 0 3px; }
        .navbar-brand i { margin-right: 8px; }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="index.php"><i class="fas fa-boxes"></i> Inventori Barang</a>
        <div class="ms-auto">
            <span class="text-white me-3">Halo, <?= htmlspecialchars($_SESSION['username']) ?></span>
            <a href="logout.php" class="btn btn-outline-light btn-sm"><i class="fas fa-sign-out-alt"></i> Logout</a>
        </div>
    </div>
</nav>

<div class="container mt-4">
    <div class="card shadow-sm border-0 rounded-4">
        <div class="card-header bg-white d-flex justify-content-between align-items-center flex-wrap">
            <h4 class="mb-0"><i class="fas fa-database"></i> Daftar Barang</h4>
            <a href="tambah.php" class="btn btn-success"><i class="fas fa-plus"></i> Tambah Barang</a>
        </div>
        <div class="card-body">
            <form method="GET" class="mb-4">
                <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="Cari berdasarkan nama, email, atau nomor HP..." value="<?= htmlspecialchars($keyword) ?>">
                    <button class="btn btn-primary" type="submit"><i class="fas fa-search"></i> Cari</button>
                    <?php if($keyword): ?>
                        <a href="index.php" class="btn btn-secondary">Reset</a>
                    <?php endif; ?>
                </div>
            </form>

            <div class="table-responsive">
                <table class="table table-bordered table-hover align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Nama Barang</th>
                            <th>Deskripsi</th>
                            <th>Harga (Rp)</th>
                            <th>Stok</th>
                            <th>Email</th>
                            <th>Nomor HP</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if($result->num_rows > 0): ?>
                            <?php while($row = $result->fetch_assoc()): ?>
                            <tr>
                                <td><?= $row['id'] ?></td>
                                <td><?= htmlspecialchars($row['nama_barang']) ?></td>
                                <td><?= htmlspecialchars(substr($row['deskripsi'],0,50)) ?>...</td>
                                <td><?= number_format($row['harga'],0,',','.') ?></td>
                                <td><?= $row['stok'] ?></td>
                                <td><?= htmlspecialchars($row['email']) ?></td>
                                <td><?= htmlspecialchars($row['nomor_hp']) ?></td>
                                <td>
                                    <a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-warning btn-action"><i class="fas fa-edit"></i> Edit</a>
                                    <a href="#" onclick="confirmDelete(<?= $row['id'] ?>)" class="btn btn-sm btn-danger btn-action"><i class="fas fa-trash"></i> Hapus</a>
                                </td>
                            </tr>
                            <?php endwhile; ?>
                        <?php else: ?>
                            <tr><td colspan="8" class="text-center">Tidak ada data barang.</td></tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
function confirmDelete(id) {
    if (confirm("Apakah Anda yakin ingin menghapus barang ini? Tindakan tidak dapat dibatalkan.")) {
        window.location.href = "hapus.php?id=" + id;
    }
}
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>