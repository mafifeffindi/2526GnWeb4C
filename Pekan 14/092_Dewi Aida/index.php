<?php
include 'koneksi.php';
if (!isset($_SESSION['login']) || $_SESSION['login'] !== true) {
    header("location:login.php");
    exit;
}
$keyword = "";
if (isset($_GET['search'])) {
    $keyword = mysqli_real_escape_string($koneksi, $_GET['search']);
    $data = mysqli_query($koneksi, "SELECT * FROM mahasiswa
        WHERE nim LIKE '%$keyword%'
        OR nama LIKE '%$keyword%'
        OR prodi LIKE '%$keyword%'
        OR email LIKE '%$keyword%'
        OR nomor_hp LIKE '%$keyword%'");
} else {
    $data = mysqli_query($koneksi, "SELECT * FROM mahasiswa");
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Mahasiswa</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>
<body class="bg-light">
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="fw-bold text-primary"><i class="bi bi-people-fill me-2"></i>Data Mahasiswa</h4>
        <div>
            <span class="me-3 text-muted">Halo, <strong><?= $_SESSION['username'] ?></strong></span>
            <a href="logout.php" class="btn btn-outline-danger btn-sm">
                <i class="bi bi-box-arrow-right"></i> Logout
            </a>
        </div>
    </div>
    <div class="d-flex justify-content-between mb-3">
        <a href="tambah.php" class="btn btn-success btn-sm">
            <i class="bi bi-plus-circle"></i> Tambah Data
        </a>
        <form method="GET" class="d-flex" style="width:300px">
            <input type="text" name="search" class="form-control form-control-sm me-2"
                placeholder="Cari nama, NIM, prodi..." value="<?= htmlspecialchars($keyword) ?>">
            <button class="btn btn-primary btn-sm" type="submit"><i class="bi bi-search"></i></button>
            <?php if ($keyword): ?>
                <a href="index.php" class="btn btn-secondary btn-sm ms-1">Reset</a>
            <?php endif; ?>
        </form>
    </div>
    <div class="card shadow-sm">
        <div class="card-body p-0">
            <table class="table table-striped table-hover mb-0">
                <thead class="table-primary">
                    <tr>
                        <th>No</th>
                        <th>NIM</th>
                        <th>Nama</th>
                        <th>Prodi</th>
                        <th>Email</th>
                        <th>Nomor HP</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $no = 1;
                while ($d = mysqli_fetch_array($data)):
                ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= htmlspecialchars($d['nim']) ?></td>
                        <td><?= htmlspecialchars($d['nama']) ?></td>
                        <td><?= htmlspecialchars($d['prodi']) ?></td>
                        <td><?= htmlspecialchars($d['email']) ?></td>
                        <td><?= htmlspecialchars($d['nomor_hp']) ?></td>
                        <td class="text-center">
                            <a href="edit.php?id=<?= $d['id'] ?>" class="btn btn-warning btn-sm">
                                <i class="bi bi-pencil-square"></i> Edit
                            </a>
                            <a href="hapus.php?id=<?= $d['id'] ?>"
                               class="btn btn-danger btn-sm"
                               onclick="return confirm('Yakin ingin menghapus data <?= htmlspecialchars($d['nama']) ?>?')">
                                <i class="bi bi-trash3"></i> Hapus
                            </a>
                        </td>
                    </tr>
                <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>