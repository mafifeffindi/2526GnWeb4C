<?php
include 'koneksi.php';

// cek login
if(!isset($_SESSION['status'])){
    header("Location: login.php");
    exit;
}

// pencarian
$cari = "";

if(isset($_GET['cari'])){
    
    $cari = $_GET['cari'];

    $query = mysqli_query($conn,
    "SELECT * FROM mahasiswa
    WHERE nim LIKE '%$cari%'
    OR nama LIKE '%$cari%'
    OR prodi LIKE '%$cari%'
    OR email LIKE '%$cari%'
    OR no_hp LIKE '%$cari%'");

}else{

    $query = mysqli_query($conn,
    "SELECT * FROM mahasiswa");

}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Icon Bootstrap -->
    <link rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>

        body{
            background-color: #f4f6f9;
        }

        .navbar{
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        .card{
            border: none;
            border-radius: 15px;
        }

        .table{
            border-radius: 10px;
            overflow: hidden;
        }

        .btn{
            border-radius: 8px;
        }

        .search-box{
            max-width: 350px;
        }

    </style>

</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">

    <div class="container">

        <a class="navbar-brand fw-bold" href="#">
            Sistem Data Mahasiswa
        </a>

        <div>

            <a href="logout.php"
            class="btn btn-light btn-sm">
                <i class="bi bi-box-arrow-right"></i>
                Logout
            </a>

        </div>

    </div>

</nav>

<div class="container mt-5">

    <div class="card shadow p-4">

        <!-- Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">

            <h3 class="fw-bold">
                Data Mahasiswa
            </h3>

            <a href="tambah.php"
            class="btn btn-primary">

                <i class="bi bi-plus-circle"></i>
                Tambah Data

            </a>

        </div>

        <!-- Form Search -->
        <form method="GET" class="mb-4">

            <div class="input-group search-box">

                <input type="text"
                name="cari"
                class="form-control"
                placeholder="Cari mahasiswa..."
                value="<?php echo $cari; ?>">

                <button class="btn btn-primary" type="submit">

                    <i class="bi bi-search"></i>

                </button>

            </div>

        </form>

        <!-- Table -->
        <div class="table-responsive">

            <table class="table table-bordered table-hover align-middle">

                <thead class="table-primary">

                    <tr>
                        <th>No</th>
                        <th>NIM</th>
                        <th>Nama</th>
                        <th>Prodi</th>
                        <th>Email</th>
                        <th>No HP</th>
                        <th width="170">Aksi</th>
                    </tr>

                </thead>

                <tbody>

                <?php
                $no = 1;

                while($d = mysqli_fetch_array($query)){
                ?>

                    <tr>

                        <td><?php echo $no++; ?></td>

                        <td>
                            <?php echo $d['nim']; ?>
                        </td>

                        <td>
                            <?php echo $d['nama']; ?>
                        </td>

                        <td>
                            <?php echo $d['prodi']; ?>
                        </td>

                        <td>
                            <?php echo $d['email']; ?>
                        </td>

                        <td>
                            <?php echo $d['no_hp']; ?>
                        </td>

                        <td>

                            <a href="edit.php?id=<?php echo $d['id_mahasiswa']; ?>"
                            class="btn btn-warning btn-sm">

                                <i class="bi bi-pencil-square"></i>
                                Edit

                            </a>

                            <a href="hapus.php?id=<?php echo $d['id_mahasiswa']; ?>"
                            class="btn btn-danger btn-sm"
                            onclick="return confirm('Yakin ingin menghapus data ini?')">

                                <i class="bi bi-trash"></i>
                                Hapus

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