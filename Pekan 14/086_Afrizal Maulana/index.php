<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
include 'koneksi.php';

$cari = "";
if (isset($_GET['cari'])) {
    $cari = mysqli_real_escape_string($koneksi, $_GET['cari']);
    $query = "SELECT * FROM pegawai WHERE 
              nip LIKE '%$cari%' OR 
              nama LIKE '%$cari%' OR 
              jabatan LIKE '%$cari%' OR 
              email LIKE '%$cari%' OR 
              no_hp LIKE '%$cari%'";
} else {
    $query = "SELECT * FROM pegawai";
}
$result = mysqli_query($koneksi, $query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Pegawai</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script>
        function konfirmasiHapus(id) {
            if (confirm("Yakin ingin menghapus data pegawai ini?")) {
                window.location.href = "hapus.php?id=" + id;
            }
        }
    </script>
</head>
<body>
    <div class="container mt-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2>📋 Data Pegawai</h2>
            <div>
                <span class="me-3">Halo, <?= $_SESSION['username']; ?></span>
                <a href="logout.php" class="btn btn-danger btn-sm">Logout</a>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <a href="tambah.php" class="btn btn-primary">+ Tambah Pegawai</a>
            </div>
            <div class="col-md-6">
                <form method="GET" class="d-flex">
                    <input type="text" name="cari" class="form-control me-2" placeholder="Cari NIP, nama, jabatan, email, atau HP..." value="<?= $cari ?>">
                    <button type="submit" class="btn btn-outline-success">Cari</button>
                    <?php if ($cari != ""): ?>
                        <a href="index.php" class="btn btn-outline-secondary ms-2">Reset</a>
                    <?php endif; ?>
                </form>
            </div>
        </div>

        <table class="table table-bordered table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>NIP</th>
                    <th>Nama</th>
                    <th>Jabatan</th>
                    <th>Email</th>
                    <th>No. HP</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                <tr>
                    <td><?= $row['id']; ?></td>
                    <td><?= $row['nip']; ?></td>
                    <td><?= $row['nama']; ?></td>
                    <td><?= $row['jabatan']; ?></td>
                    <td><?= $row['email']; ?></td>
                    <td><?= $row['no_hp']; ?></td>
                    <td>
                        <a href="edit.php?id=<?= $row['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                        <button onclick="konfirmasiHapus(<?= $row['id']; ?>)" class="btn btn-danger btn-sm">Hapus</button>
                    </td>
                </tr>
                <?php endwhile; ?>
                <?php if (mysqli_num_rows($result) == 0): ?>
                <tr><td colspan="7" class="text-center">Tidak ada data.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>
</html>