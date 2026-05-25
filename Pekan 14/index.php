<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("location:login.php");
    exit;
}
include 'koneksi.php';

// Fitur Pencarian Data
$search = "";
if (isset($_GET['cari'])) {
    $search = $_GET['cari'];
    $query = "SELECT * FROM mahasiswa WHERE nama LIKE '%$search%' OR nim LIKE '%$search%' OR prodi LIKE '%$search%'";
} else {
    $query = "SELECT * FROM mahasiswa";
}
$data = mysqli_query($koneksi, $query);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Mahasiswa - Pastel Theme</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="navbar">
        <span>Aplikasi CRUD Mahasiswa ✨</span>
        <a href="logout.php" class="btn-logout">Logout</a>
    </div>

    <div class="container">
        <h2>Data Mahasiswa</h2>
        
        <div class="action-bar">
            <a href="tambah.php" class="btn btn-primary">+ Tambah Data</a>
            
            <form method="get" class="search-form">
                <input type="text" name="cari" placeholder="Cari nama, nim, atau prodi..." value="<?php echo $search; ?>">
                <button type="submit" class="btn btn-secondary">Cari</button>
            </form>
        </div>

        <table>
            <tr>
                <th>No</th>
                <th>NIM</th>
                <th>Nama</th>
                <th>Prodi</th>
                <th>Email</th>
                <th>No. HP</th>
                <th>Aksi</th>
            </tr>
            <?php
            $no = 1;
            if (mysqli_num_rows($data) > 0) {
                while ($d = mysqli_fetch_array($data)) {
                ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><strong><?php echo $d['nim']; ?></strong></td>
                    <td><?php echo $d['nama']; ?></td>
                    <td><?php echo $d['prodi']; ?></td>
                    <td><?php echo $d['email']; ?></td>
                    <td><?php echo $d['nohp']; ?></td>
                    <td>
                        <a href="edit.php?id=<?php echo $d['id']; ?>" class="btn-edit">Edit</a>
                        <a href="hapus.php?id=<?php echo $d['id']; ?>" class="btn-delete" onclick="return confirm('Mila, yakin mau menghapus data ini? 😢');">Hapus</a>
                    </td>
                </tr>
                <?php
                }
            } else {
                echo "<tr><td colspan='7' style='text-align:center;'>Data tidak ditemukan.</td></tr>";
            }
            ?>
        </table>
    </div>
</body>
</html>