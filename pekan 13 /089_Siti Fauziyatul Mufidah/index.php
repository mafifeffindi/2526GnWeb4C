<?php
session_start();

// Proteksi halaman: Jika belum login, tendang kembali ke login.php
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

// Ambil file koneksi database
require 'koneksi.php';

// Proses 1: Tambah Data (Poin 2)
if (isset($_POST['tambah'])) {
    $nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
    $email = mysqli_real_escape_string($koneksi, $_POST['email']);
    $hp = mysqli_real_escape_string($koneksi, $_POST['hp']);

    $query = "INSERT INTO mahasiswa (nama, email, hp) VALUES ('$nama', '$email', '$hp')";
    mysqli_query($koneksi, $query);
    
    // Refresh halaman agar data baru langsung muncul tanpa bug re-submit
    header("Location: index.php");
    exit;
}

// Proses 2: Hapus Data dengan Validasi
if (isset($_GET['hapus'])) {
    $id_hapus = (int)$_GET['hapus']; // casting ke int demi keamanan data
    $query = "DELETE FROM mahasiswa WHERE id = $id_hapus";
    mysqli_query($koneksi, $query);
    
    header("Location: index.php");
    exit;
}

// Proses 3: Pencarian Data (Poin 3a)
$keyword = "";
if (isset($_POST['cari'])) {
    $keyword = mysqli_real_escape_string($koneksi, $_POST['keyword']);
    $query = "SELECT * FROM mahasiswa WHERE 
              nama LIKE '%$keyword%' OR 
              email LIKE '%$keyword%' OR 
              hp LIKE '%$keyword%' ORDER BY id DESC";
} else {
    // Jika tidak sedang mencari, tampilkan semua data terbaru di atas
    $query = "SELECT * FROM mahasiswa ORDER BY id DESC";
}

$result = mysqli_query($koneksi, $query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Data Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
    <div class="container">
        <a class="navbar-brand fw-bold" href="index.php">Aplikasi Mahasiswa</a>
        <div class="ms-auto">
            <a href="logout.php" class="btn btn-outline-danger btn-sm px-3 fw-semibold">Logout</a>
        </div>
    </div>
</nav>

<div class="container mt-4">
    <div class="row">
        
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-primary text-white fw-bold">
                    Form Tambah Data
                </div>
                <div class="card-body">
                    <form action="" method="POST">
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Nama Lengkap</label>
                            <input type="text" name="nama" class="form-control" placeholder="Nama siswa" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Email</label>
                            <input type="email" name="email" class="form-control" placeholder="contoh@mail.com" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Nomor HP</label>
                            <input type="tel" name="hp" class="form-control" placeholder="08xxxxxxxxxx" required>
                        </div>
                        <button type="submit" name="tambah" class="btn btn-success w-100 fw-semibold shadow-sm">Simpan Data</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="card shadow-sm border-0 p-3">
                
                <form action="" method="POST" class="row g-2 mb-3">
                    <div class="col-9">
                        <input type="text" name="keyword" class="form-control" placeholder="Cari berdasarkan nama, email, atau no HP..." value="<?= htmlspecialchars($keyword) ?>">
                    </div>
                    <div class="col-3">
                        <button type="submit" name="cari" class="btn btn-secondary w-100 fw-semibold">Cari</button>
                    </div>
                </form>

                <div class="table-responsive">
                    <table class="table table-hover align-middle border">
                        <thead class="table-dark">
                            <tr>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Nomor HP</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (mysqli_num_rows($result) === 0) : ?>
                                <tr>
                                    <td colspan="4" class="text-center text-muted py-4">Data tidak ditemukan / kosong.</td>
                                </tr>
                            <?php else : ?>
                                <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                                    <tr>
                                        <td class="fw-semibold"><?= htmlspecialchars($row['nama']) ?></td>
                                        <td><?= htmlspecialchars($row['email']) ?></td>
                                        <td><?= htmlspecialchars($row['hp']) ?></td>
                                        <td class="text-center">
                                            <a href="index.php?hapus=<?= $row['id'] ?>" 
                                               class="btn btn-danger btn-sm px-3 shadow-sm" 
                                               onclick="return confirm('Apakah Anda yakin sungguh-sungguh ingin menghapus data milik <?= htmlspecialchars($row['nama']) ?>?');">
                                               Hapus
                                            </a>
                                        </td>
                                    </tr>
                                <?php endwhile; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>

    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>