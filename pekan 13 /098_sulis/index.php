<?php

include 'koneksi.php';

$data = mysqli_query($koneksi, "SELECT * FROM mahasiswa");

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

<table border="1" cellpadding="10">
    <tr>
        <th>No</th>
        <th>NIM</th>
        <th>Nama</th>
        <th>Prodi</th>
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
    <td>
        <a href="edit.php?id=<?php echo $d['id']; ?>" class="edit">
            Edit
</a>
        <a href="hapus.php?id=<?php echo $d['id']; ?>" class="hapus">
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
