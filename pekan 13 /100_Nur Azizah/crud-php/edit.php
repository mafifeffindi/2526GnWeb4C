<?php
include 'koneksi.php';

$id = $_GET['id'];

$data = mysqli_query($conn, "SELECT * FROM mahasiswa WHERE id='$id'");
$d = mysqli_fetch_array($data);

if(isset($_POST['update'])){

    $nama = $_POST['nama'];
    $nim = $_POST['nim'];
    $jurusan = $_POST['jurusan'];

    mysqli_query($conn, "UPDATE mahasiswa SET
        nama='$nama',
        nim='$nim',
        jurusan='$jurusan'
        WHERE id='$id'
    ");

    header("location:index.php");
}
?>

<form method="POST">

    Nama:
    <input type="text" name="nama" value="<?php echo $d['nama']; ?>"><br><br>

    NIM:
    <input type="text" name="nim" value="<?php echo $d['nim']; ?>"><br><br>

    Jurusan:
    <input type="text" name="jurusan" value="<?php echo $d['jurusan']; ?>"><br><br>

    <button type="submit" name="update">Update</button>

</form>