<?php 
include 'koneksi.php'; 
$data = mysqli_query($conn, "SELECT * FROM mahasiswa"); 
?> 
<!DOCTYPE html> 
<html lang="en"> 
<head> 
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Data Mahasiswa</title> 
    <link rel="stylesheet" href="style.css"> 
</head> 
<body> 

    <h2>Data Mahasiswa</h2> 
    <a href="tambah.php">+ Tambah Data</a> 

    <table border="1" cellpadding="10"> 
        <tr> 
            <th>No</th> 
            <th>NIM</th> 
            <th>Nama</th> 
            <th>Jurusan</th> 
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
            <!-- Pastikan kolom di database Anda 'jurusan' atau 'prodi' -->
            <td><?php echo $d['prodi']; ?></td> 
            <td> 
                <!-- Pastikan id/primary key di database Anda adalah 'id' -->
                <a href="edit.php?id=<?php echo $d['id_mahasiswa']; ?>">Edit</a> | 
                <a href="hapus.php?id=<?php echo $d['id_mahasiswa']; ?>" onclick="return confirm('Yakin ingin hapus?')">Hapus</a> 
            </td> 
        </tr> 
        <?php } ?> 
    </table> 

</body> 
</html>
