<?php
session_start();
if(!isset($_SESSION['username'])){
    header("location:login.php");
}
include 'koneksi.php';

$search = isset($_GET['search']) ? $_GET['search'] : '';
$data = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE nim LIKE '%$search%' OR nama LIKE '%$search%' OR prodi LIKE '%$search%'");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Mahasiswa</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #fce4ec, #f3e5f5, #e8eaf6);
            min-height: 100vh;
            padding: 30px 0;
        }
        .card {
            border: none;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(233,30,99,0.1);
        }
        .navbar-custom {
            background: linear-gradient(135deg, #f48fb1, #ce93d8);
            border-radius: 15px;
            padding: 12px 20px;
            margin-bottom: 20px;
        }
        .navbar-custom h5 {
            color: white;
            font-weight: 600;
            margin: 0;
        }
        .btn-tambah {
            background: linear-gradient(135deg, #a5d6a7, #80cbc4);
            border: none;
            border-radius: 10px;
            color: white;
            font-weight: 500;
            padding: 7px 16px;
            font-size: 0.85rem;
        }
        .btn-tambah:hover { background: linear-gradient(135deg, #81c784, #4db6ac); color: white; }
        .btn-logout {
            background: linear-gradient(135deg, #ef9a9a, #f48fb1);
            border: none;
            border-radius: 10px;
            color: white;
            font-weight: 500;
            padding: 7px 16px;
            font-size: 0.85rem;
        }
        .btn-logout:hover { background: linear-gradient(135deg, #e57373, #f06292); color: white; }
        .form-control {
            border-radius: 10px;
            border: 1.5px solid #f8bbd0;
        }
        .form-control:focus {
            border-color: #f48fb1;
            box-shadow: 0 0 0 0.2rem rgba(244,143,177,0.25);
        }
        .btn-cari {
            background: linear-gradient(135deg, #f48fb1, #ce93d8);
            border: none;
            border-radius: 10px;
            color: white;
            font-weight: 500;
        }
        .btn-cari:hover { background: linear-gradient(135deg, #f06292, #ba68c8); color: white; }
        thead { background: linear-gradient(135deg, #f48fb1, #ce93d8); color: white; }
        thead th { font-weight: 500; border: none; }
        .table { border-radius: 10px; overflow: hidden; }
        .table td { vertical-align: middle; font-size: 0.9rem; }
        .btn-edit {
            background: linear-gradient(135deg, #ffe082, #ffcc02);
            border: none;
            border-radius: 8px;
            color: #5d4037;
            font-size: 0.8rem;
            padding: 4px 12px;
            font-weight: 500;
        }
        .btn-edit:hover { background: linear-gradient(135deg, #ffd54f, #ffb300); color: #5d4037; }
        .btn-hapus {
            background: linear-gradient(135deg, #ef9a9a, #f48fb1);
            border: none;
            border-radius: 8px;
            color: white;
            font-size: 0.8rem;
            padding: 4px 12px;
            font-weight: 500;
        }
        .btn-hapus:hover { background: linear-gradient(135deg, #e57373, #f06292); color: white; }
        .modal-content { border-radius: 20px; border: none; }
        .modal-header {
            background: linear-gradient(135deg, #f48fb1, #ce93d8);
            border-radius: 20px 20px 0 0;
            border: none;
            color: white;
        }
        .btn-confirm {
            background: linear-gradient(135deg, #ef9a9a, #f48fb1);
            border: none;
            border-radius: 10px;
            color: white;
            font-weight: 500;
        }
        .btn-cancel {
            background: linear-gradient(135deg, #e0e0e0, #bdbdbd);
            border: none;
            border-radius: 10px;
            color: #555;
            font-weight: 500;
        }
        .badge-no {
            background: linear-gradient(135deg, #f48fb1, #ce93d8);
            color: white;
            border-radius: 50%;
            padding: 4px 8px;
            font-size: 0.8rem;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="navbar-custom d-flex justify-content-between align-items-center">
        <h5>🌸 Student Data Management</h5>
        <div class="d-flex align-items-center gap-2">
            <span style="color:white; font-size:0.85rem;">👤 <?php echo $_SESSION['username']; ?></span>
            <a href="logout.php" class="btn btn-logout">Logout</a>
        </div>
    </div>

    <div class="card">
        <div class="card-body p-4">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <a href="tambah.php" class="btn btn-tambah">+ Tambah Data</a>
                <form method="get" class="d-flex gap-2">
                    <input type="text" name="search" class="form-control form-control-sm" placeholder="🔍 Cari mahasiswa..." value="<?php echo $search; ?>">
                    <button type="submit" class="btn btn-cari btn-sm">Cari</button>
                </form>
            </div>

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NIM</th>
                        <th>Nama</th>
                        <th>Prodi</th>
                        <th>Email</th>
                        <th>No HP</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $no = 1;
                while($d = mysqli_fetch_array($data)){
                ?>
                    <tr>
                        <td><span class="badge-no"><?php echo $no++; ?></span></td>
                        <td><?php echo $d['nim']; ?></td>
                        <td><?php echo $d['nama']; ?></td>
                        <td><?php echo $d['prodi']; ?></td>
                        <td><?php echo $d['email']; ?></td>
                        <td><?php echo $d['no_hp']; ?></td>
                        <td>
                            <a href="edit.php?id=<?php echo $d['id']; ?>" class="btn btn-edit">✏️ Edit</a>
                            <button class="btn btn-hapus" onclick="konfirmasiHapus(<?php echo $d['id']; ?>, '<?php echo $d['nama']; ?>')">🗑️ Hapus</button>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal Konfirmasi Hapus -->
<div class="modal fade" id="modalHapus" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">🗑️ Konfirmasi Hapus</h5>
            </div>
            <div class="modal-body text-center py-4">
                <p style="font-size:1rem;">Yakin ingin menghapus data</p>
                <p style="font-weight:600; color:#ad1457; font-size:1.1rem;" id="namaHapus"></p>
                <p style="color:#888; font-size:0.85rem;">Data yang dihapus tidak bisa dikembalikan!</p>
            </div>
            <div class="modal-footer justify-content-center border-0">
                <button type="button" class="btn btn-cancel px-4" data-bs-dismiss="modal">Batal</button>
                <a id="linkHapus" href="#" class="btn btn-confirm px-4">Ya, Hapus!</a>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
function konfirmasiHapus(id, nama) {
    document.getElementById('namaHapus').innerText = nama;
    document.getElementById('linkHapus').href = 'hapus.php?id=' + id;
    new bootstrap.Modal(document.getElementById('modalHapus')).show();
}
</script>

</body>
</html>