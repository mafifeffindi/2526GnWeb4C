<?php
include 'koneksi.php';

// cek login
if(!isset($_SESSION['status'])){
    header("Location: login.php");
    exit;
}

// cek id
if(isset($_GET['id'])){

    $id = $_GET['id'];

    $data = mysqli_query($conn,
    "SELECT * FROM mahasiswa
    WHERE id_mahasiswa='$id'");

    $d = mysqli_fetch_array($data);

}else{

    die("ID tidak ditemukan");

}

// proses update
if(isset($_POST['update'])){

    $nim    = $_POST['nim'];
    $nama   = $_POST['nama'];
    $prodi  = $_POST['prodi'];
    $email  = $_POST['email'];
    $no_hp  = $_POST['no_hp'];

    $update = mysqli_query($conn,
    "UPDATE mahasiswa
    SET nim='$nim',
        nama='$nama',
        prodi='$prodi',
        email='$email',
        no_hp='$no_hp'
    WHERE id_mahasiswa='$id'");

    if($update){

        echo "
        <script>
            alert('Data berhasil diupdate');
            window.location='index.php';
        </script>
        ";

    }else{

        echo "
        <script>
            alert('Data gagal diupdate');
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
    <title>Edit Data Mahasiswa</title>

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
                            <i class="bi bi-pencil-square"></i>
                            Edit Data Mahasiswa
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
                            value="<?php echo $d['nim']; ?>"
                            required>

                        </div>

                        <div class="mb-3">

                            <label class="form-label">
                                Nama Mahasiswa
                            </label>

                            <input type="text"
                            name="nama"
                            class="form-control"
                            value="<?php echo $d['nama']; ?>"
                            required>

                        </div>

                        <div class="mb-3">

                            <label class="form-label">
                                Program Studi
                            </label>

                            <input type="text"
                            name="prodi"
                            class="form-control"
                            value="<?php echo $d['prodi']; ?>"
                            required>

                        </div>

                        <div class="mb-3">

                            <label class="form-label">
                                Email
                            </label>

                            <input type="email"
                            name="email"
                            class="form-control"
                            value="<?php echo $d['email']; ?>"
                            required>

                        </div>

                        <div class="mb-4">

                            <label class="form-label">
                                Nomor HP
                            </label>

                            <input type="text"
                            name="no_hp"
                            class="form-control"
                            value="<?php echo $d['no_hp']; ?>"
                            required>

                        </div>

                        <button type="submit"
                        name="update"
                        class="btn btn-primary w-100">

                            <i class="bi bi-save"></i>
                            Update Data

                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

</body>
</html>