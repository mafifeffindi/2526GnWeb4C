<?php
include 'koneksi.php';

$id = $_GET['id'];

$data = mysqli_fetch_array(
mysqli_query($conn,
"SELECT * FROM mahasiswa WHERE id='$id'")
);

if(isset($_POST['update'])){

    mysqli_query($conn,
    "UPDATE mahasiswa SET

    nama='$_POST[nama]',
    nim='$_POST[nim]',
    jurusan='$_POST[jurusan]',
    email='$_POST[email]',
    no_hp='$_POST[no_hp]',
    jenis_kelamin='$_POST[jenis_kelamin]',
    tanggal_lahir='$_POST[tanggal_lahir]',
    alamat='$_POST[alamat]'

    WHERE id='$id'");

    header("Location:index.php");
}
?>

<!DOCTYPE html>
<html>
<head>

    <title>Edit Data Mahasiswa</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="style.css">

</head>

<body>

<div class="container-center">

<div class="card-custom p-5" style="width:550px;">

    <h1 class="title text-center mb-4">
        Edit Data Mahasiswa
    </h1>

    <form method="POST">

        <div class="mb-3">

            <label>Nama</label>

            <input type="text"
            name="nama"
            class="form-control"
            value="<?= $data['nama'] ?>">

        </div>

        <div class="mb-3">

            <label>NIM</label>

            <input type="text"
            name="nim"
            class="form-control"
            value="<?= $data['nim'] ?>">

        </div>

        <div class="mb-3">

            <label>Jurusan</label>

            <input type="text"
            name="jurusan"
            class="form-control"
            value="<?= $data['jurusan'] ?>">

        </div>

        <div class="mb-3">

            <label>Email</label>

            <input type="email"
            name="email"
            class="form-control"
            value="<?= $data['email'] ?>">

        </div>

        <div class="mb-3">

            <label>Nomor HP</label>

            <input type="text"
            name="no_hp"
            class="form-control"
            value="<?= $data['no_hp'] ?>">

        </div>

        <div class="mb-3">

            <label>Jenis Kelamin</label>

            <select name="jenis_kelamin"
            class="form-control">

                <option value="Laki-laki"
                <?= $data['jenis_kelamin'] == 'Laki-laki' ? 'selected' : '' ?>>

                    Laki-laki

                </option>

                <option value="Perempuan"
                <?= $data['jenis_kelamin'] == 'Perempuan' ? 'selected' : '' ?>>

                    Perempuan

                </option>

            </select>

        </div>

        <div class="mb-3">

            <label>Tanggal Lahir</label>

            <input type="date"
            name="tanggal_lahir"
            class="form-control"
            value="<?= $data['tanggal_lahir'] ?>">

        </div>

        <div class="mb-4">

            <label>Alamat</label>

            <textarea
            name="alamat"
            class="form-control"
            rows="3"><?= $data['alamat'] ?></textarea>

        </div>

        <button type="submit"
        name="update"
        class="btn btn-custom w-100">

            Update Data

        </button>

    </form>

</div>

</div>

</body>
</html>