<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
include 'koneksi.php';

$id = $_GET['id'];
$data = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM pegawai WHERE id='$id'"));

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nip = $_POST['nip'];
    $nama = $_POST['nama'];
    $jabatan = $_POST['jabatan'];
    $email = $_POST['email'];
    $no_hp = $_POST['no_hp'];

    $sql = "UPDATE pegawai SET nip='$nip', nama='$nama', jabatan='$jabatan', email='$email', no_hp='$no_hp' WHERE id='$id'";
    if (mysqli_query($koneksi, $sql)) {
        header("Location: index.php");
        exit();
    } else {
        $error = "Gagal update: " . mysqli_error($koneksi);
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Pegawai</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4" style="max-width: 600px;">
        <div class="card">
            <div class="card-header bg-warning">Edit Data Pegawai</div>
            <div class="card-body">
                <?php if (isset($error)) echo "<div class='alert alert-danger'>$error</div>"; ?>
                <form method="POST">
                    <div class="mb-3"><label>NIP</label><input type="text" name="nip" class="form-control" value="<?= $data['nip']; ?>" required></div>
                    <div class="mb-3"><label>Nama</label><input type="text" name="nama" class="form-control" value="<?= $data['nama']; ?>" required></div>
                    <div class="mb-3"><label>Jabatan</label><input type="text" name="jabatan" class="form-control" value="<?= $data['jabatan']; ?>" required></div>
                    <div class="mb-3"><label>Email</label><input type="email" name="email" class="form-control" value="<?= $data['email']; ?>" required></div>
                    <div class="mb-3"><label>No. HP</label><input type="text" name="no_hp" class="form-control" value="<?= $data['no_hp']; ?>" required></div>
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="index.php" class="btn btn-secondary">Kembali</a>
                </form>
            </div>
        </div>
    </div>
</body>
</html>