<?php
include 'koneksi.php';
$data = mysqli_query($conn, "SELECT * FROM mahasiswa");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Mahasiswa</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h2>Data Mahasiswa</h2>

<a href="tambah.php">+ Tambah Data</a>

<table border="1" cellpadding="10">
    <tr>
        <th>No</th>
        <th>Nama</th>
        <th>NIM</th>
        <th>Prodi</th>
        <th>Email</th>
        <th>Nomor Telepon</th>
        <th>Aksi</th>
    </tr>

<?php
$no = 1;
while($row = mysqli_fetch_assoc($data)) {
?>

<tr>
    <td><?= $no++; ?></td>
    <td><?= $row['nama']; ?></td>
    <td><?= $row['nim']; ?></td>
    <td><?= $row['prodi']; ?></td>
    <td><?= $row['email']; ?></td>
    <td><?= $row['nomor telepon'];  ?></td>
    <td>
        <a href="edit.php?id=<?= $row['id']; ?>">Edit</a> |
        <a href="hapus.php?id=<?= $row['id']; ?>">Hapus</a>
    </td>
</tr>

<?php } ?>

</table>

</body>
</html>
