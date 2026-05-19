<?php
include 'koneksi.php';

$query = mysqli_query($conn,"SELECT * FROM mahasiswa");
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

    <a href="tambah.php" class="btn">
        + Tambah Data
    </a>

    <table>

        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>NIM</th>
            <th>Jurusan</th>
            <th>Aksi</th>
        </tr>

        <?php
        $no = 1;

        while($data = mysqli_fetch_array($query)){
        ?>

        <tr>

            <td><?= $no++ ?></td>
            <td><?= $data['nama'] ?></td>
            <td><?= $data['nim'] ?></td>
            <td><?= $data['jurusan'] ?></td>

            <td>

                <a href="edit.php?id=<?= $data['id'] ?>">
                    Edit
                </a>

                |

                <a href="hapus.php?id=<?= $data['id'] ?>">
                    Hapus
                </a>

            </td>

        </tr>

        <?php } ?>

    </table>

</div>

</body>
</html>