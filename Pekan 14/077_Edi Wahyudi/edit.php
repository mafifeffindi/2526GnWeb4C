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
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Edit Data Mahasiswa</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

<style>
body{
    background: linear-gradient(135deg,#0d6efd,#6610f2);
    min-height:100vh;
}

.edit-card{
    border:none;
    border-radius:20px;
    box-shadow:0 10px 30px rgba(0,0,0,0.2);
}

.form-control{
    border-radius:10px;
}

.btn{
    border-radius:10px;
}

.header-title{
    color:#0d6efd;
    font-weight:bold;
}
</style>
</head>

<body>

<div class="container">

<div class="row justify-content-center align-items-center vh-100">

<div class="col-md-7">

<div class="card edit-card p-4">

<div class="text-center mb-4">
    <i class="bi bi-pencil-square text-primary" style="font-size:60px;"></i>
    <h2 class="header-title">Edit Data Mahasiswa</h2>
    <p class="text-muted">Silakan ubah data mahasiswa di bawah ini</p>
</div>

<form method="POST">

<div class="mb-3">
    <label class="form-label">Nama Lengkap</label>
    <input type="text"
           name="nama"
           value="<?php echo $d['nama']; ?>"
           class="form-control"
           required>
</div>

<div class="mb-3">
    <label class="form-label">NIM</label>
    <input type="text"
           name="nim"
           value="<?php echo $d['nim']; ?>"
           class="form-control"
           required>
</div>

<div class="mb-3">
    <label class="form-label">Email</label>
    <input type="email"
           name="email"
           value="<?php echo $d['email']; ?>"
           class="form-control"
           required>
</div>

<div class="mb-3">
    <label class="form-label">Nomor HP</label>
    <input type="text"
           name="nohp"
           value="<?php echo $d['nohp']; ?>"
           class="form-control"
           required>
</div>

<div class="mb-4">
    <label class="form-label">Jurusan</label>
    <input type="text"
           name="jurusan"
           value="<?php echo $d['jurusan']; ?>"
           class="form-control"
           required>
</div>

<div class="d-grid gap-2">
    <button type="submit" name="update" class="btn btn-primary">
        <i class="bi bi-check-circle"></i> Update Data
    </button>

    <a href="index.php" class="btn btn-outline-secondary">
        <i class="bi bi-arrow-left"></i> Kembali
    </a>
</div>

</form>

</div>

</div>

</div>

</div>

</body>
</html>
```
