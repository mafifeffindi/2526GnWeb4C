<?php
include 'koneksi.php';

if (isset($_GET['cari']) && $_GET['cari'] != '') {
    $cari = $_GET['cari'];

    $query = mysqli_query($koneksi, "
        SELECT * FROM mahasiswa
        WHERE nim LIKE '%$cari%'
        OR nama LIKE '%$cari%'
        OR prodi LIKE '%$cari%'
        OR email LIKE '%$cari%'
        OR no_hp LIKE '%$cari%'
    ");
} else {
    $query = mysqli_query($koneksi, "SELECT * FROM mahasiswa");
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Mahasiswa</title>

    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">

    <div class="box">
        <h1>Data Mahasiswa</h1>

        <a href="tambah.php" class="btn btn-tambah">+ Tambah Data</a>
        <a href="logout.php" class="btn btn-logout">Logout</a>

        <form method="GET">
            <input type="text" name="cari" placeholder="Cari data..."
                   value="<?= isset($_GET['cari']) ? $_GET['cari'] : ''; ?>">
            <button type="submit" class="btn-cari">Cari</button>
        </form>
    </div>

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
        if (mysqli_num_rows($query) > 0) {
            $no = 1;
            while ($data = mysqli_fetch_assoc($query)) {
        ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?= $data['nim']; ?></td>
            <td><?= $data['nama']; ?></td>
            <td><?= $data['prodi']; ?></td>
            <td><?= isset($data['email']) ? $data['email'] : '-'; ?></td>
            <td><?= isset($data['no_hp']) ? $data['no_hp'] : '-'; ?></td>

            <td>
                <a href="edit.php?id=<?= $data['id']; ?>" class="btn-edit">Edit</a>
                <a href="hapus.php?id=<?= $data['id']; ?>" class="btn-hapus"
                   onclick="return confirm('Yakin mau hapus?')">Hapus</a>
            </td>
        </tr>
        <?php
            }
        } else {
            echo "<tr><td colspan='7'>Data tidak ditemukan</td></tr>";
        }
        ?>
    </table>

</div>

</body>
</html>
