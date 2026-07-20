<?php
include 'koneksi.php';

// cek apakah id tersedia
if(isset($_GET['id'])){

    $id = $_GET['id'];

    // ambil data mahasiswa berdasarkan id
    $data = mysqli_query($conn,
    "SELECT * FROM mahasiswa WHERE id_mahasiswa='$id'");

    $d = mysqli_fetch_array($data);

}else{
    die("ID tidak ditemukan");
}

// proses update data
if(isset($_POST['update'])){

    $nim   = $_POST['nim'];
    $nama  = $_POST['nama'];
    $prodi = $_POST['prodi'];

    $update = mysqli_query($conn,
    "UPDATE mahasiswa
    SET nim='$nim',
        nama='$nama',
        prodi='$prodi'
    WHERE id_mahasiswa='$id'");

    // cek apakah update berhasil
    if($update){
        header("Location: index.php");
        exit;
    }else{
        echo "Gagal update data";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Mahasiswa</title>
</head>
<body>

    <h2>Edit Data Mahasiswa</h2>

    <form method="POST">

        <label>NIM</label><br>
        <input type="text" name="nim"
        value="<?php echo $d['nim']; ?>" required>
        <br><br>

        <label>Nama</label><br>
        <input type="text" name="nama"
        value="<?php echo $d['nama']; ?>" required>
        <br><br>

        <label>Program Studi</label><br>
        <input type="text" name="prodi"
        value="<?php echo $d['prodi']; ?>" required>
        <br><br>

        <button type="submit" name="update">
            Update Data
        </button>

    </form>

</body>
</html>