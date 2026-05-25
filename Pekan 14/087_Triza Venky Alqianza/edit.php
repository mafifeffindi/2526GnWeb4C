<?php
include 'koneksi.php';

$id = $_GET['id'];

$data = mysqli_query($conn, "SELECT * FROM mahasiswa WHERE id='$id'");
$d = mysqli_fetch_array($data);

if(isset($_POST['update'])){
    $nama = $_POST['nama'];
    $nim = $_POST['nim'];
    $email = $_POST['email'];
    $nohp = $_POST['nohp'];
    $jurusan = $_POST['jurusan'];

    mysqli_query($conn, "UPDATE mahasiswa SET
        nama='$nama',
        nim='$nim',
        email='$email',
        nohp='$nohp',
        jurusan='$jurusan'
        WHERE id='$id'
    ");

    header("location:index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
<div class="card p-4">

<h2>Edit Data</h2>

<form method="POST">

<label>Nama</label>
<input type="text" name="nama" value="<?php echo $d['nama']; ?>" class="form-control mb-3">

<label>NIM</label>
<input type="text" name="nim" value="<?php echo $d['nim']; ?>" class="form-control mb-3">

<label>Email</label>
<input type="email" name="email" value="<?php echo $d['email']; ?>" class="form-control mb-3">

<label>No HP</label>
<input type="text" name="nohp" value="<?php echo $d['nohp']; ?>" class="form-control mb-3">

<label>Jurusan</label>
<input type="text" name="jurusan" value="<?php echo $d['jurusan']; ?>" class="form-control mb-3">

<button type="submit" name="update" class="btn btn-success">Update</button>

</form>

</div>
</div>

</body>
</html>
