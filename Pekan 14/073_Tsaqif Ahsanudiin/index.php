<?php
// File: index.php
include 'koneksi.php';

// Proteksi Login
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

// Fitur Pencarian
$keyword = "";
if (isset($_POST['cari'])) {
    $keyword = $_POST['keyword'];
    $query = "SELECT * FROM mahasiswa WHERE 
              nim LIKE '%$keyword%' OR 
              nama LIKE '%$keyword%' OR 
              prodi LIKE '%$keyword%'";
} else {
    $query = "SELECT * FROM mahasiswa";
}

$data = mysqli_query($koneksi, $query);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <title>Data Mahasiswa - SIM Kampus</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container my-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Daftar Mahasiswa</h2>
            <div>
                <span class="me-3 text-secondary">Halo, <strong><?= $_SESSION['username']; ?></strong></span>
                <a href="logout.php" class="btn btn-sm btn-danger">Logout</a>
            </div>
        </div>

        <div class="card shadow">
            <div class="card-body">
                <div class="row mb-3 align-items-center">
                    <div class="col-md-6">
                        <a href="tambah.php" class="btn btn-success">+ Tambah Data</a>
                    </div>
                    <div class="col-md-6">
                        <form method="post" action="" class="d-flex justify-content-end gap-2">
                            <input type="text" name="keyword" class="form-control w-50" placeholder="Cari data..." value="<?= $keyword; ?>">
                            <button type="submit" name="cari" class="btn btn-primary">Cari</button>
                            <?php if($keyword != ""): ?>
                                <a href="index.php" class="btn btn-secondary">Reset</a>
                            <?php endif; ?>
                        </form>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-striped table-hover align-middle">
                        <thead class="table-dark">
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
                            if(mysqli_num_rows($data) > 0) {
                                while ($d = mysqli_fetch_array($data)) { 
                            ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $d['nim']; ?></td>
                                <td><?= $d['nama']; ?></td>
                                <td><?= $d['prodi']; ?></td>
                                <td><?= $d['email']; ?></td>
                                <td><?= $d['nomor_hp']; ?></td>
                                <td class="text-center">
                                    <a href="edit.php?id=<?= $d['id']; ?>" class="btn btn-sm btn-warning me-1">Edit</a>
                                    <a href="hapus.php?id=<?= $d['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data <?= $d['nama']; ?>?');">Hapus</a>
                                </td>
                            </tr>
                            <?php 
                                }
                            } else {
                                echo "<tr><td colspan='7' class='text-center text-muted py-3'>Data tidak ditemukan</td></tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>