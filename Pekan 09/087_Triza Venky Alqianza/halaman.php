<!DOCTYPE html>
<html>
<head>
    <title>Halaman PHP Interaktif</title>
    <style>
        body {
            font-family: Arial;
            background-color: #eef;
        }
        .box {
            background: white;
            padding: 20px;
            width: 50%;
            margin: auto;
            border-radius: 10px;
        }
    </style>
</head>
<body>

<div class="box">
<h1>Belajar PHP + HTML</h1>

<p>Contoh integrasi HTML dan PHP dengan logika sederhana.</p>

<?php
$nama = "Al";
$prodi = "Pendidikan Informatika";
$alamat = "Jawa Timur";
$nilai = 85;

echo "Nama: $nama <br>";
echo "Program Studi: $prodi <br>";
echo "Alamat: $alamat <br>";

if($nilai >= 80){
    echo "<b>Status: Lulus dengan Baik</b>";
} else {
    echo "<b>Status: Perlu Perbaikan</b>";
}
?>

</div>

</body>
</html>
