<?php
include 'koneksi.php';

$id = $_GET['id'];

$data = mysqli_query($koneksi, 
"SELECT * FROM mahasiswa WHERE id='$id'");

$d = mysqli_fetch_array($data);

if(isset($_POST['update'])){
    $id = $_POST['id'];
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $prodi = $_POST['prodi'];
    $email = $_email['email'];
    $nomor_telepon= $_nomor_telepon['nomor telepon'];

    mysqli_query($koneksi,
    "UPDATE mahasiswa SET
    id='$id',
    nim='$nim',
    nama='$nama',
    prodi='$prodi',
    email='$email',
    nomor telepon='$nomor_telepon',
    WHERE id='$id'");

    header("location:index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Data</title>
</head>
<body>

<h2>Edit Data Mahasiswa</h2>

<form method="post">
    <input type="INT" name="id"
    value="<?php echo $d[id]; ?>"><br><br>

    <input type="text" name="nim"
    value="<?php echo $d['nim']; ?>"><br><br>

    <input type="text" name="nama"
    value="<?php echo $d['nama']; ?>"><br><br>

    <input type="text" name="prodi"
    value="<?php echo $d['prodi']; ?>"><br><br>

    <input type="text" name="email"
    value="<?php echo $d['email']; ?>"><br><br>

    <input type="text" name="nomor telepon"
    value="<?php echo $d['nomor telepon']; ?>"><br><br>
    
    <button type="submit" name="update" >update</button>
</form>

</body>
</html>
