<?php
include 'koneksi.php';

// cek login
if(!isset($_SESSION['status'])){
    header("Location: login.php");
    exit;
}

// proses tambah data
if(isset($_POST['simpan'])){

    $nim    = $_POST['nim'];
    $nama   = $_POST['nama'];
    $prodi  = $_POST['prodi'];
    $email  = $_POST['email'];
    $no_hp  = $_POST['no_hp'];

    $simpan = mysqli_query($conn,
    "INSERT INTO mahasiswa
    (nim,nama,prodi,email,no_hp)

    VALUES

    ('$nim','$nama','$prodi','$email','$no_hp')");

    if($simpan){

        echo "
        <script>
            alert('Data berhasil ditambahkan');
            window.location='index.php';
        </script>
        ";

    }else{

        echo "
        <script>
            alert('Data gagal ditambahkan');
        </script>
        ";

    }

}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Mahasiswa</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icon -->
    <link rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>

        body{
            background-color: #f4f6f9;
        }

        .card{
            border: none;
            border-radius: 15px;
        }

        .btn{
            border-radius: 8px;
        }

    </style>

</head>
<body>

<div class="container mt-5">

    <div class="row justify-content-center">

        <div class="col-md-7">

            <div class="card shadow">

                <div class="card-body p-4">

                    <!-- Header -->
                    <div class="d-flex justify-content-between align-items-center mb-4">

                        <h3 class="fw-bold">

                            <i class="bi bi-person-plus-fill"></i>
                            Tambah Data Mahasiswa

                        </h3>

                        <a href="index.php"
                        class="btn btn-secondary">

                            <i class="bi bi-arrow-left"></i>
                            Kembali

                        </a>

                    </div>

                    <!-- Form -->
                    <form method="POST">

                        <div class="mb-3">

                            <label class="form-label">
                                NIM
                            </label>

                            <input type="text"
                            name="nim"
                            class="form-control"
                            placeholder="Masukkan NIM"
                            required>

                        </div>

                        <div class="mb-3">

                            <label class="form-label">
                                Nama Mahasiswa
                            </label>

                            <input type="text"
                            name="nama"
                            class="form-control"
                            placeholder="Masukkan nama mahasiswa"
                            required>

                        </div>

                        <div class="mb-3">

                            <label class="form-label">
                                Program Studi
                            </label>

                            <input type="text"
                            name="prodi"
                            class="form-control"
                            placeholder="Masukkan program studi"
                            required>

                        </div>

                        <div class="mb-3">

                            <label class="form-label">
                                Email
                            </label>

                            <input type="email"
                            name="email"
                            class="form-control"
                            placeholder="Masukkan email"
                            required>

                        </div>

                        <div class="mb-4">

                            <label class="form-label">
                                Nomor HP
                            </label>

                            <input type="text"
                            name="no_hp"
                            class="form-control"
                            placeholder="Masukkan nomor HP"
                            required>

                        </div>

                        <button type="submit"
                        name="simpan"
                        class="btn btn-primary w-100">

                            <i class="bi bi-save"></i>
                            Simpan Data

                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

</body>
</html>