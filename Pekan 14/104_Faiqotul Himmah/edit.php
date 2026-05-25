<?php
session_start();
if(!isset($_SESSION['username'])){
    header("location:login.php");
}
include 'koneksi.php';

$id = isset($_GET['id']) ? $_GET['id'] : 0;

$data = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE id='$id'");
$d = mysqli_fetch_array($data);

if(isset($_POST['update'])){
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $prodi = $_POST['prodi'];
    $email = $_POST['email'];
    $no_hp = $_POST['no_hp'];

    mysqli_query($koneksi, "UPDATE mahasiswa SET nim='$nim', nama='$nama', prodi='$prodi', email='$email', no_hp='$no_hp' WHERE id='$id'");

    header("location:index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Data</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #fce4ec, #f3e5f5, #e8eaf6);
            min-height: 100vh;
            display: flex;
            align-items: center;
        }
        .card {
            border: none;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(233,30,99,0.1);
        }
        .card-body { padding: 2.5rem; }
        h4 { color: #ad1457; font-weight: 600; }
        label { color: #ad1457; font-weight: 500; font-size: 0.9rem; }
        .form-control {
            border-radius: 10px;
            border: 1.5px solid #f8bbd0;
            padding: 10px 15px;
        }
        .form-control:focus {
            border-color: #f48fb1;
            box-shadow: 0 0 0 0.2rem rgba(244,143,177,0.25);
        }
        .btn-update {
            background: linear-gradient(135deg, #ffe082, #ffcc02);
            border: none;
            border-radius: 10px;
            color: #5d4037;
            font-weight: 500;
            padding: 10px 24px;
        }
        .btn-update:hover { background: linear-gradient(135deg, #ffd54f, #ffb300); color: #5d4037; }
        .btn-batal {
            background: linear-gradient(135deg, #e0e0e0, #bdbdbd);
            border: none;
            border-radius: 10px;
            color: #555;
            font-weight: 500;
            padding: 10px 24px;
        }
        .btn-batal:hover { background: #9e9e9e; color: white; }
    </style>
</head>
<body>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="mb-4">✏️ Edit Data Mahasiswa</h4>
                    <form method="post">
                        <div class="mb-3">
                            <label>NIM</label>
                            <input type="text" name="nim" class="form-control" value="<?php echo $d['nim']; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label>Nama</label>
                            <input type="text" name="nama" class="form-control" value="<?php echo $d['nama']; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label>Prodi</label>
                            <input type="text" name="prodi" class="form-control" value="<?php echo $d['prodi']; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" value="<?php echo $d['email']; ?>" required>
                        </div>
                        <div class="mb-4">
                            <label>No HP</label>
                            <input type="text" name="no_hp" class="form-control" value="<?php echo $d['no_hp']; ?>" required>
                        </div>
                        <div class="d-flex gap-2">
                            <button type="submit" name="update" class="btn btn-update">✏️ Update</button>
                            <a href="index.php" class="btn btn-batal">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>