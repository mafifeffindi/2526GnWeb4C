<?php
include 'koneksi.php';

if(isset($_POST['simpan'])){
    $nama = $_POST['nama'];
    $nim = $_POST['nim'];
    $email = $_POST['email'];
    $nohp = $_POST['nohp'];
    $jurusan = $_POST['jurusan'];

    mysqli_query($conn, "INSERT INTO mahasiswa
    VALUES('', '$nama', '$nim', '$email', '$nohp', '$jurusan')");

    header("location:index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Data Mahasiswa</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>

        body{
            background:#f4f7fc;
        }

        .navbar-custom{
            background:linear-gradient(90deg,#0d6efd,#6610f2);
        }

        .form-card{
            max-width:700px;
            margin:auto;
            border:none;
            border-radius:20px;
            box-shadow:0 10px 30px rgba(0,0,0,.1);
        }

        .card-header-custom{
            background:linear-gradient(90deg,#0d6efd,#6610f2);
            color:white;
            text-align:center;
            padding:25px;
            border-radius:20px 20px 0 0;
        }

        .form-control{
            border-radius:10px;
            padding:12px;
        }

        .btn{
            border-radius:10px;
        }

        label{
            font-weight:600;
            margin-bottom:5px;
        }

    </style>

</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark navbar-custom shadow">
    <div class="container">

        <a class="navbar-brand fw-bold" href="#">
            <i class="bi bi-mortarboard-fill"></i>
            Sistem Informasi Mahasiswa
        </a>

        <a href="index.php" class="btn btn-light">
            <i class="bi bi-arrow-left"></i>
            Kembali
        </a>

    </div>
</nav>

<div class="container mt-5">

    <div class="card form-card">

        <div class="card-header-custom">

            <i class="bi bi-person-plus-fill fs-1"></i>

            <h3 class="mt-2">
                Tambah Data Mahasiswa
            </h3>

            <p class="mb-0">
                Lengkapi data mahasiswa di bawah ini
            </p>

        </div>

        <div class="card-body p-4">

            <form method="POST">

                <div class="mb-3">
                    <label>
                        <i class="bi bi-person-fill"></i>
                        Nama Lengkap
                    </label>
                    <input type="text"
                           name="nama"
                           class="form-control"
                           placeholder="Masukkan nama mahasiswa"
                           required>
                </div>

                <div class="mb-3">
                    <label>
                        <i class="bi bi-credit-card"></i>
                        NIM
                    </label>
                    <input type="text"
                           name="nim"
                           class="form-control"
                           placeholder="Masukkan NIM"
                           required>
                </div>

                <div class="mb-3">
                    <label>
                        <i class="bi bi-envelope-fill"></i>
                        Email
                    </label>
                    <input type="email"
                           name="email"
                           class="form-control"
                           placeholder="Masukkan email"
                           required>
                </div>

                <div class="mb-3">
                    <label>
                        <i class="bi bi-telephone-fill"></i>
                        No HP
                    </label>
                    <input type="text"
                           name="nohp"
                           class="form-control"
                           placeholder="Masukkan nomor HP"
                           required>
                </div>

                <div class="mb-4">
                    <label>
                        <i class="bi bi-book-fill"></i>
                        Jurusan
                    </label>
                    <input type="text"
                           name="jurusan"
                           class="form-control"
                           placeholder="Masukkan jurusan"
                           required>
                </div>

                <div class="d-flex gap-2">

                    <button type="submit"
                            name="simpan"
                            class="btn btn-primary">

                        <i class="bi bi-save"></i>
                        Simpan Data

                    </button>

                    <a href="index.php"
                       class="btn btn-secondary">

                        <i class="bi bi-x-circle"></i>
                        Batal

                    </a>

                </div>

            </form>

        </div>

    </div>

</div>

</body>
</html>
