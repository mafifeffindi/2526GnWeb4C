<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION['user'])) {
    header("location:login.php");
    exit();
}

$search = "";
if (isset($_GET['search'])) {
    $search = $_GET['search'];
    $data = mysqli_query($koneksi, "SELECT * FROM mahasiswa 
        WHERE nim LIKE '%$search%' 
        OR nama LIKE '%$search%' 
        OR prodi LIKE '%$search%'
        OR email LIKE '%$search%'");
} else {
    $data = mysqli_query($koneksi, "SELECT * FROM mahasiswa");
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
    <div class="header-bar">
        <h2>Data Mahasiswa</h2>
        <a href="logout.php" class="btn-logout">Logout (<?php echo $_SESSION['user']; ?>)</a>
    </div>

    <form method="get" class="search-form">
        <input type="text" name="search" placeholder="Cari nama, NIM, prodi, email..."
               value="<?php echo $search; ?>">
        <button type="submit" class="btn-cari">Cari</button>
        <?php if ($search != "") { ?>
            <a href="index.php" class="btn-reset">Reset</a>
        <?php } ?>
    </form>

    <a href="tambah.php" class="btn-tambah">+ Tambah Data</a>

    <table>
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
                <a href="edit.php?id=<?php echo $d['id']; ?>" class="btn-edit">Edit</a>
                <a href="hapus.php?id=<?php echo $d['id']; ?>" class="btn-hapus"
                   onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
            </td>
        </tr>
        <?php } ?>
    </table>

    <?php if (mysqli_num_rows($data) == 0) { ?>
        <p class="kosong">Data tidak ditemukan.</p>
    <?php } ?>
</div>
</body>
</html>
