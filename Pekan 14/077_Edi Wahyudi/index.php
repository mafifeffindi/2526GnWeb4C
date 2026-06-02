<?php
session_start();
if(!isset($_SESSION['login'])){
    header("location:login.php");
}

include 'koneksi.php';

$cari = isset($_GET['cari']) ? $_GET['cari'] : '';

$data = mysqli_query($conn, "SELECT * FROM mahasiswa
WHERE nama LIKE '%$cari%'
OR nim LIKE '%$cari%'
OR jurusan LIKE '%$cari%'");

$total = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM mahasiswa"));
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Mahasiswa</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        body{
            background:#f4f7fc;
        }

        .navbar-custom{
            background: linear-gradient(90deg,#0d6efd,#6610f2);
        }

        .card-custom{
            border:none;
            border-radius:20px;
            box-shadow:0 5px 20px rgba(0,0,0,0.1);
        }

        .info-card{
            border:none;
            border-radius:15px;
            background:linear-gradient(135deg,#0d6efd,#6610f2);
            color:white;
        }

        .table{
            vertical-align:middle;
        }

        .table tbody tr:hover{
            background:#f0f5ff;
            transition:0.3s;
        }

        .btn{
            border-radius:10px;
        }

        .search-box{
            border-radius:12px;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark navbar-custom shadow">
    <div class="container">
        <a class="navbar-brand fw-bold" href="#">
            <i class="bi bi-mortarboard-fill"></i>
            Sistem Informasi Mahasiswa
        </a>

        <a href="logout.php" class="btn btn-danger">
            <i class="bi bi-box-arrow-right"></i> Logout
        </a>
    </div>
</nav>

<div class="container mt-4">

    <!-- Statistik -->
    <div class="row mb-4">
        <div class="col-md-4">
            <div class="card info-card p-3">
                <h5>Total Mahasiswa</h5>
                <h2><?php echo $total; ?></h2>
            </div>
        </div>
    </div>

    <!-- Data -->
    <div class="card card-custom p-4">

        <div class="d-flex justify-content-between align-items-center mb-3">
            <h3>
                <i class="bi bi-table"></i>
                Data Mahasiswa
            </h3>

            <a href="tambah.php" class="btn btn-primary">
                <i class="bi bi-plus-circle"></i>
                Tambah Data
            </a>
        </div>

        <form method="GET" class="mb-3">
            <div class="input-group">
                <span class="input-group-text">
                    <i class="bi bi-search"></i>
                </span>

                <input type="text"
                       name="cari"
                       value="<?php echo $cari; ?>"
                       class="form-control search-box"
                       placeholder="Cari nama, NIM atau jurusan">
            </div>
        </form>

        <div class="table-responsive">

        <table class="table table-hover table-bordered align-middle">

            <thead class="table-primary text-center">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>NIM</th>
                    <th>Email</th>
                    <th>No HP</th>
                    <th>Jurusan</th>
                    <th width="150">Aksi</th>
                </tr>
            </thead>

            <tbody>

            <?php
            $no = 1;
            while($d = mysqli_fetch_array($data)){
            ?>

            <tr>
                <td class="text-center"><?php echo $no++; ?></td>
                <td><?php echo $d['nama']; ?></td>
                <td><?php echo $d['nim']; ?></td>
                <td><?php echo $d['email']; ?></td>
                <td><?php echo $d['nohp']; ?></td>
                <td><?php echo $d['jurusan']; ?></td>

                <td class="text-center">

                    <a href="edit.php?id=<?php echo $d['id']; ?>"
                       class="btn btn-warning btn-sm">
                       <i class="bi bi-pencil-square"></i>
                    </a>

                    <a href="hapus.php?id=<?php echo $d['id']; ?>"
                       class="btn btn-danger btn-sm"
                       onclick="return confirm('Yakin ingin menghapus data?')">
                       <i class="bi bi-trash"></i>
                    </a>

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
