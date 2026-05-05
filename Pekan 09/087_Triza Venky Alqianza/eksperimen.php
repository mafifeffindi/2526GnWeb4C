<!DOCTYPE html>
<html>
<head>
    <title>Eksperimen PHP Lanjutan</title>
    <style>
        body {
            font-family: Arial;
            background-color: #f4f4f4;
        }
        .container {
            width: 60%;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
        }
        h1 {
            color: darkblue;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        td {
            padding: 10px;
            border-bottom: 1px solid #ccc;
        }
    </style>
</head>
<body>

<div class="container">
<h1>Profil Mahasiswa</h1>
<hr>

<?php
$nama = "Alqianza";
$universitas = "Universitas Trunojoyo Madura";
$hobi = "Coding, Membaca";
$cita = "Software Engineer";
$alasan = "Ingin mengembangkan aplikasi berbasis web";

$tahunLahir = 2005;
$umur = date("Y") - $tahunLahir;

echo "<table>";
echo "<tr><td>Nama</td><td>$nama</td></tr>";
echo "<tr><td>Universitas</td><td>$universitas</td></tr>";
echo "<tr><td>Hobi</td><td>$hobi</td></tr>";
echo "<tr><td>Cita-cita</td><td>$cita</td></tr>";
echo "<tr><td>Umur</td><td>$umur tahun</td></tr>";
echo "<tr><td>Motivasi</td><td>$alasan</td></tr>";
echo "</table>";

echo "<br><b>Status:</b> Mahasiswa Aktif";
?>

</div>

</body>
</html>
