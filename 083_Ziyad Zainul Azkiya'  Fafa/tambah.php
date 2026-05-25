<?php
include 'koneksi.php';

if(isset($_POST['submit'])) {
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $prodi = $_POST['prodi'];

    $sql = "INSERT INTO mahasiswa (nim, nama, Prodi) VALUES ('$nim', '$nama', '$prodi')";
    if ($conn->query($sql) === TRUE) {
        echo "Data berhasil ditambahkan.";
        header("Location: index.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data</title>
</head>
<body>
    <h2>Tambah Data Mahasiswa</h2>

    <form method="post">
        <input type="text" name="nim" placeholder="NIM"><br><br>
        <input type="text" name="nama" placeholder="Nama"><br><br>
        <input type="text" name="prodi" placeholder="Program Studi"><br><br>
        
        <button type="submit" name="submit">Simpan</button>
    </form>
</body>
</html>