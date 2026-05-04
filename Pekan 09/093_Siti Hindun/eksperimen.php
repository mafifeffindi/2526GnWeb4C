<!DOCTYPE html>
<html>
<head>
    <title>Profil Mahasiswa</title>
    <style>
        body {
            font-family: "Times New Roman", sans-serif;
            background-color: #ffe6f0; 
            margin: 0;
            padding: 20px;
        }

        .container {
            width: 60%;
            margin: auto;
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        h1 {
            text-align: center;
            color: #800020; 
        }

        hr {
            border: 1px solid #800020;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        td {
            padding: 10px;
            border: 1px solid #800020;
        }

        td:first-child {
            background-color: #800020;
            color: white;
            width: 30%;
            font-weight: bold;
        }

        td:last-child {
            background-color: #ffe6f0;
        }
    </style>
</head>
<body>

<div class="container">

<?php
echo "<h1>Profil Mahasiswa</h1>";
echo "<hr>";

echo "<table>";
echo "<tr><td>Nama</td><td>Siti Hindun</td></tr>";
echo "<tr><td>Universitas</td><td>Universitas Trunodjoyo Madura</td></tr>";
echo "<tr><td>Hobi</td><td>menyanyi</td></tr>";
echo "<tr><td>Cita-cita</td><td>Menjadi Web Developer</td></tr>";
echo "<tr><td>Alasan Belajar</td><td>Ingin membuat website yang bermanfaat</td></tr>";
echo "<tr><td>Bahasa Favorit</td><td>PHP</td></tr>";
echo "</table>";
?>

</div>

</body>
</html>
