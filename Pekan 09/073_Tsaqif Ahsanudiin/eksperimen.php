<!DOCTYPE html>
<html>
<head>
    <title>Latihan PHP - Profil Dev</title>
</head>
<body>

    <h1>Eksplorasi Dunia Server-Side</h1>
    
    <p>PHP memungkinkan kita membuat halaman web yang dinamis. Di bawah ini adalah contoh data yang diproses langsung oleh server sebelum sampai ke browser Anda:</p>

    <?php
        // 1. Menampilkan teks salam
        echo "<h3>Halo, Selamat Datang di Localhost!</h3>";
        
        // 2. Menampilkan tanggal hari ini secara otomatis
        echo "Hari ini adalah: <b>" . date("d F Y") . "</b><br>";
        
        // 3. Logika sederhana untuk memberikan pesan semangat
        $status = "Semangat";
        echo "Status Belajar: <span style='color: green; font-weight: bold;'>$status Koding!</span>";
    ?>

</body>
</html>

