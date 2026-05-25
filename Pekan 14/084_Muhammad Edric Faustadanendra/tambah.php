<?php
include 'koneksi.php';

if(isset($_POST['submit'])){

    mysqli_query($conn,
    "INSERT INTO mahasiswa VALUES(
    '',
    '$_POST[nama]',
    '$_POST[nim]',
    '$_POST[jurusan]',
    '$_POST[email]',
    '$_POST[no_hp]',
    '$_POST[jenis_kelamin]',
    '$_POST[tanggal_lahir]',
    '$_POST[alamat]'
    )");

    header("Location:index.php");
}
?>

<!DOCTYPE html>
<html>
<head>

    <title>Tambah Data Mahasiswa</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="style.css">

</head>

<body>

<div class="container-center">

<div class="card-custom p-5" style="width:550px;">

    <h1 class="title text-center mb-4">
        Tambah Data Mahasiswa
    </h1>

    <form method="POST">

        <div class="mb-3">

            <label>Nama</label>

            <input type="text"
            name="nama"
            class="form-control">

        </div>

        <div class="mb-3">

            <label>NIM</label>

            <input type="text"
            name="nim"
            class="form-control">

        </div>

        <div class="mb-3">

            <label>Jurusan</label>

            <input type="text"
            name="jurusan"
            class="form-control">

        </div>

        <div class="mb-3">

            <label>Email</label>

            <input type="email"
            name="email"
            class="form-control">

        </div>

        <div class="mb-3">

            <label>Nomor HP</label>

            <input type="text"
            name="no_hp"
            class="form-control">

        </div>

        <div class="mb-3">

            <label>Jenis Kelamin</label>

            <select name="jenis_kelamin"
            class="form-control">

                <option value="Laki-laki">
                    Laki-laki
                </option>

                <option value="Perempuan">
                    Perempuan
                </option>

            </select>

        </div>

        <div class="mb-3">

            <label>Tanggal Lahir</label>

            <input type="date"
            name="tanggal_lahir"
            class="form-control">

        </div>

        <div class="mb-4">

            <label>Alamat</label>

            <textarea
            name="alamat"
            class="form-control"
            rows="3"></textarea>

        </div>

        <button type="submit"
        name="submit"
        class="btn btn-custom w-100">

            Simpan Data

        </button>

    </form>

</div>

</div>

</body>
</html>