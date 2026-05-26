<?php

session_start();

if(!isset($_SESSION['login'])){
    header("location:login.php");
    exit;
}

include 'koneksi.php';

$cari = '';

if(isset($_GET['cari'])){
    $cari = $_GET['cari'];

    $data = mysqli_query($koneksi,
    "SELECT * FROM mahasiswa
    WHERE nim LIKE '%$cari%'
    OR nama LIKE '%$cari%'
    OR prodi LIKE '%$cari%'
    OR email LIKE '%$cari%'
    OR no_hp LIKE '%$cari%'");
}
else{
    $data = mysqli_query($koneksi,
    "SELECT * FROM mahasiswa");
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Data Mahasiswa</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<div class="container">

<h2>Data Mahasiswa</h2>

<a href="tambah.php" class="tambah">
    + Tambah Data
</a>

<a href="logout.php" class="hapus">
    Logout
</a>

<br><br>

<form method="GET">
    <input
        type="text"
        name="cari"
        placeholder="Cari data mahasiswa..."
        value="<?php echo $cari; ?>">

    <button type="submit">
        Cari
    </button>
</form>

<br>

<table border="1" cellpadding="10">

    <tr>
        <th>No</th>
        <th>NIM</th>
        <th>Nama</th>
        <th>Prodi</th>
        <th>Email</th>
        <th>No HP</th>
        <th>Aksi</th>
    </tr>

<?php

$no = 1;

while($d = mysqli_fetch_array($data)){
?>

<tr>

    <td><?php echo $no++; ?></td>

    <td><?php echo $d['nim']; ?></td>

    <td><?php echo $d['nama']; ?></td>

    <td><?php echo $d['prodi']; ?></td>

    <td><?php echo $d['email']; ?></td>

    <td><?php echo $d['no_hp']; ?></td>

    <td>

        <a href="edit.php?id=<?php echo $d['id']; ?>" class="edit">
            Edit
        </a>

        <a href="hapus.php?id=<?php echo $d['id']; ?>"
        class="hapus"
        onclick="return confirm('Yakin ingin menghapus data ini?')">
            Hapus
        </a>

    </td>

</tr>

<?php
}
?>

</table>

</div>

</body>
</html>