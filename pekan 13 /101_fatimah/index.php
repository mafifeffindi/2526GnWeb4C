<?php
include 'koneksi.php';

$data = mysqli_query($conn, "SELECT * FROM mahasiswa");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Aplikasi Mahasiswa</title>
    
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">

    <h1>📚 Manajemen Data Mahasiswa</h1>

    <form action="tambah.php" method="POST">

        <input type="text" name="nim" placeholder="NIM" required>

        <input type="text" name="nama" placeholder="Nama Mahasiswa" required>

        <input type="text" name="jurusan" placeholder="Jurusan" required>

        <textarea name="alamat" placeholder="Alamat" rows="4" required></textarea>

        <button type="submit">➕ Tambah Data</button>

    </form>

    <table border="0">

        <thead>
            <tr>
                <th>No</th>
                <th>NIM</th>
                <th>Nama</th>
                <th>Jurusan</th>
                <th>Alamat</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>

        <?php
        $no = 1;
        while($row = mysqli_fetch_assoc($data)){
        ?>

            <tr>
                <td><?= $no++; ?></td>
                <td><?= $row['nim']; ?></td>
                <td><?= $row['nama']; ?></td>
                <td><?= $row['jurusan']; ?></td>
                <td><?= $row['alamat']; ?></td>
                <td>
                    <a class="action-btn edit" href="edit.php?id=<?= $row['id']; ?>">Edit</a>

                    <a class="action-btn delete"
                    href="hapus.php?id=<?= $row['id']; ?>"
                    onclick="return confirm('Yakin hapus data?')">
                    Hapus
                    </a>
                </td>
            </tr>

        <?php } ?>

        </tbody>

    </table>

</div>

</body>
</html>