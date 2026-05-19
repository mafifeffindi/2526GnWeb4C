<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("location:login.php");
}
include 'koneksi.php';

$search = isset($_GET['search']) ? $_GET['search'] : '';
if ($search != '') {
    $data = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE nim LIKE '%$search%' OR nama LIKE '%$search%' OR prodi LIKE '%$search%'");
} else {
    $data = mysqli_query($koneksi, "SELECT * FROM mahasiswa");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Mahasiswa</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">

<div class="container mt-4">
    <div class="card shadow">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h4 class="mb-0">Data Mahasiswa</h4>
            <a href="logout.php" class="btn btn-danger btn-sm">Logout</a>
        </div>
        <div class="card-body">

            <!-- Search -->
            <form method="get" class="mb-3 d-flex gap-2">
                <input type="text" name="search" class="form-control" placeholder="Cari NIM, Nama, atau Prodi..." value="<?php echo $search; ?>">
                <button type="submit" class="btn btn-primary">Cari</button>
                <a href="index.php" class="btn btn-secondary">Reset</a>
            </form>

            <a href="tambah.php" class="btn btn-success mb-3">+ Tambah Data</a>

            <table class="table table-bordered table-striped">
                <thead class="table-primary">
                    <tr>
                        <th>No</th>
                        <th>NIM</th>
                        <th>Nama</th>
                        <th>Prodi</th>
                        <th>Email</th>
                        <th>No HP</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $no = 1;
                while ($d = mysqli_fetch_array($data)) {
                ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $d['nim']; ?></td>
                        <td><?php echo $d['nama']; ?></td>
                        <td><?php echo $d['prodi']; ?></td>
                        <td><?php echo $d['email']; ?></td>
                        <td><?php echo $d['no_hp']; ?></td>
                        <td>
                            <a href="edit.php?id=<?php echo $d['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                            <a href="hapus.php?id=<?php echo $d['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>

        </div>
    </div>
</div>

</body>
</html>