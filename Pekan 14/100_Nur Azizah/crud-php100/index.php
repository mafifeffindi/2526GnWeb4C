<?php
include 'koneksi.php';

if(!isset($_SESSION['login'])){
    header("Location: login.php");
}

$cari = "";

if(isset($_GET['cari'])){
    $cari = $_GET['cari'];
    $query = mysqli_query($conn,
    "SELECT * FROM mahasiswa 
    WHERE nama LIKE '%$cari%'
    OR nim LIKE '%$cari%'
    ");
}else{
    $query = mysqli_query($conn,
    "SELECT * FROM mahasiswa");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Mahasiswa</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body class="bg-light">

<nav class="navbar navbar-dark bg-dark">
    <div class="container">
        <span class="navbar-brand">
            Sistem Data Mahasiswa
        </span>

        <a href="logout.php" class="btn btn-danger">
            Logout
        </a>
    </div>
</nav>

<div class="container mt-5">

    <div class="card shadow p-4">

        <div class="d-flex justify-content-between mb-3">
            <a href="tambah.php" class="btn btn-primary">
                + Tambah Data
            </a>

            <form method="GET" class="d-flex">
                <input type="text" 
                name="cari"
                class="form-control me-2"
                placeholder="Cari data..."
                value="<?= $cari ?>">

                <button class="btn btn-dark">
                    Cari
                </button>
            </form>
        </div>

        <table class="table table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>NIM</th>
                    <th>Jurusan</th>
                    <th>Email</th>
                    <th>No HP</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>

            <?php
            $no = 1;

            while($row = mysqli_fetch_assoc($query)){
            ?>

            <tr>
                <td><?= $no++ ?></td>
                <td><?= $row['nama'] ?></td>
                <td><?= $row['nim'] ?></td>
                <td><?= $row['jurusan'] ?></td>
                <td><?= $row['email'] ?></td>
                <td><?= $row['no_hp'] ?></td>

                <td>
                    <a href="edit.php?id=<?= $row['id'] ?>" 
                    class="btn btn-warning btn-sm">
                    Edit
                    </a>

                    <a href="hapus.php?id=<?= $row['id'] ?>" 
                    class="btn btn-danger btn-sm"
                    onclick="return confirm('Yakin ingin menghapus data?')">
                    Hapus
                    </a>
                </td>
            </tr>

            <?php } ?>

            </tbody>
        </table>
    </div>
</div>

</body>
</html>