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
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">

<div class="d-flex justify-content-between mb-3">
    <h2>Data Mahasiswa</h2>
    <a href="logout.php" class="btn btn-danger">Logout</a>
</div>

<div class="card p-4">

<form method="GET" class="mb-3">
    <input type="text" name="cari" class="form-control" placeholder="Cari data mahasiswa">
</form>

<a href="tambah.php" class="btn btn-primary mb-3">Tambah Data</a>

<table class="table table-bordered table-striped">
    <tr>
        <th>No</th>
        <th>Nama</th>
        <th>NIM</th>
        <th>Email</th>
        <th>No HP</th>
        <th>Jurusan</th>
        <th>Aksi</th>
    </tr>

<?php
$no = 1;
while($d = mysqli_fetch_array($data)){
?>
<tr>
    <td><?php echo $no++; ?></td>
    <td><?php echo $d['nama']; ?></td>
    <td><?php echo $d['nim']; ?></td>
    <td><?php echo $d['email']; ?></td>
    <td><?php echo $d['nohp']; ?></td>
    <td><?php echo $d['jurusan']; ?></td>
    <td>
        <a href="edit.php?id=<?php echo $d['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
        <a href="hapus.php?id=<?php echo $d['id']; ?>" 
           class="btn btn-danger btn-sm"
           onclick="return confirm('Yakin ingin menghapus data?')">
           Hapus
        </a>
    </td>
</tr>
<?php } ?>

</table>

</div>
</div>

</body>
</html>
