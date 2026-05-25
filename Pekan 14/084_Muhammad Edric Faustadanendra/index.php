<?php
session_start();

if(!isset($_SESSION['login'])){
    header("Location: login.php");
}

include 'koneksi.php';

$cari = "";

if(isset($_GET['cari'])){

    $cari = $_GET['cari'];

    $query = mysqli_query($conn,
    "SELECT * FROM mahasiswa
    WHERE nama LIKE '%$cari%'
    OR nim LIKE '%$cari%'
    OR jurusan LIKE '%$cari%'");

} else {

    $query = mysqli_query($conn,
    "SELECT * FROM mahasiswa");
}

$total = mysqli_num_rows(
mysqli_query($conn,
"SELECT * FROM mahasiswa")
);

$laki = mysqli_num_rows(
mysqli_query($conn,
"SELECT * FROM mahasiswa
WHERE jenis_kelamin='Laki-laki'")
);

$perempuan = mysqli_num_rows(
mysqli_query($conn,
"SELECT * FROM mahasiswa
WHERE jenis_kelamin='Perempuan'")
);
?>

<!DOCTYPE html>
<html>
<head>

    <title>Dashboard Mahasiswa</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="style.css">

    <link rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

</head>

<body>

<div class="container py-5">

<div class="card-custom p-5">

    <!-- HEADER -->

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h1 class="title">
                Dashboard Mahasiswa
            </h1>

            <p class="text-secondary">
                Sistem CRUD Data Mahasiswa
            </p>

        </div>

        <div class="d-flex gap-2">

            <button
            onclick="toggleDarkMode()"
            class="btn btn-dark">

                🌙

            </button>

            <a href="logout.php"
            class="btn btn-danger">

                <i class="bi bi-box-arrow-right"></i>
                Logout

            </a>

        </div>

    </div>

    <!-- STATISTIK -->

    <div class="row mb-4">

        <div class="col-md-4">

            <div class="stat-card">

                <i class="bi bi-people-fill"></i>

                <h3><?= $total ?></h3>

                <p>Total Mahasiswa</p>

            </div>

        </div>

        <div class="col-md-4">

            <div class="stat-card">

                <i class="bi bi-gender-male"></i>

                <h3><?= $laki ?></h3>

                <p>Laki-laki</p>

            </div>

        </div>

        <div class="col-md-4">

            <div class="stat-card">

                <i class="bi bi-gender-female"></i>

                <h3><?= $perempuan ?></h3>

                <p>Perempuan</p>

            </div>

        </div>

    </div>

    <!-- SEARCH -->

    <form method="GET" class="mb-4">

        <div class="row g-2">

            <div class="col-md-10">

                <input type="text"
                name="cari"
                class="form-control"
                placeholder="Cari nama, NIM, jurusan..."
                value="<?= $cari ?>">

            </div>

            <div class="col-md-2">

                <button class="btn btn-custom w-100">

                    <i class="bi bi-search"></i>
                    Cari

                </button>

            </div>

        </div>

    </form>

    <!-- BUTTON TAMBAH -->

    <a href="tambah.php"
    class="btn btn-success mb-4">

        <i class="bi bi-plus-circle"></i>
        Tambah Data

    </a>

    <!-- TABLE -->

    <div class="table-responsive">

    <table class="table align-middle text-center">

        <thead>

            <tr>

                <th>No</th>
                <th>Nama</th>
                <th>NIM</th>
                <th>Jurusan</th>
                <th>Email</th>
                <th>No HP</th>
                <th>Jenis Kelamin</th>
                <th>Tanggal Lahir</th>
                <th>Alamat</th>
                <th>Aksi</th>

            </tr>

        </thead>

        <tbody>

        <?php
        $no = 1;

        while($data = mysqli_fetch_array($query)){
        ?>

        <tr>

            <td><?= $no++ ?></td>

            <td><?= $data['nama'] ?></td>

            <td><?= $data['nim'] ?></td>

            <td><?= $data['jurusan'] ?></td>

            <td><?= $data['email'] ?></td>

            <td><?= $data['no_hp'] ?></td>

            <td><?= $data['jenis_kelamin'] ?></td>

            <td><?= $data['tanggal_lahir'] ?></td>

            <td><?= $data['alamat'] ?></td>

            <td>

                <a href="edit.php?id=<?= $data['id'] ?>"
                class="btn btn-warning btn-sm">

                    <i class="bi bi-pencil-square"></i>
                    Edit

                </a>

                <button
                class="btn btn-danger btn-sm"
                onclick="konfirmasiHapus(<?= $data['id'] ?>)">

                    <i class="bi bi-trash"></i>
                    Hapus

                </button>

            </td>

        </tr>

        <?php } ?>

        </tbody>

    </table>

    </div>

</div>

<footer class="text-center mt-4 text-secondary">

    © 2026 CRUD Mahasiswa | Muhammad Edric

</footer>

</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>

function konfirmasiHapus(id){

    Swal.fire({

        title: 'Yakin ingin menghapus?',
        text: "Data yang dihapus tidak bisa dikembalikan!",
        icon: 'warning',

        showCancelButton: true,

        confirmButtonColor: '#6366f1',
        cancelButtonColor: '#ef4444',

        confirmButtonText: 'Ya, Hapus!',
        cancelButtonText: 'Batal'

    }).then((result) => {

        if(result.isConfirmed){

            window.location.href =
            'hapus.php?id=' + id;

        }

    });

}

function toggleDarkMode(){

    document.body.classList.toggle('dark-mode');

}

</script>

</body>
</html>