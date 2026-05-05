<?php
// ============================================
// File: halaman.php
// Aktivitas 4: Challenge Kombinasi HTML + PHP
// Nama: Mila Widiya Fitri
// Tujuan: Membuat halaman web dengan kombinasi HTML dan PHP
// ============================================
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latihan PHP - Mila Widiya Fitri</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(120deg, #84fab0 0%, #8fd3f4 100%);
            min-height: 100vh;
            padding: 30px 20px;
        }
        
        .wrapper {
            max-width: 700px;
            margin: 0 auto;
        }
        
        .card {
            background: white;
            border-radius: 12px;
            box-shadow: 0 15px 35px rgba(0,0,0,0.2);
            padding: 40px;
            margin-bottom: 20px;
            animation: slideIn 0.5s ease-out;
        }
        
        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        h1 {
            color: #2c3e50;
            text-align: center;
            margin-bottom: 10px;
            font-size: 2.5em;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.1);
        }
        
        .subtitle {
            text-align: center;
            color: #7f8c8d;
            margin-bottom: 30px;
            font-size: 1.1em;
        }
        
        .divider {
            border: none;
            height: 3px;
            background: linear-gradient(to right, #84fab0, #8fd3f4);
            margin: 25px 0;
            border-radius: 2px;
        }
        
        .info-section {
            margin: 20px 0;
            padding: 20px;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            border-radius: 8px;
            border-left: 5px solid #84fab0;
        }
        
        .info-label {
            color: #2c3e50;
            font-weight: bold;
            font-size: 1.1em;
            margin-bottom: 5px;
        }
        
        .info-content {
            color: #34495e;
            font-size: 1em;
            line-height: 1.6;
        }
        
        .stats {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
            margin: 20px 0;
        }
        
        .stat-box {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 20px;
            border-radius: 8px;
            text-align: center;
        }
        
        .stat-number {
            font-size: 2em;
            font-weight: bold;
            margin-bottom: 5px;
        }
        
        .stat-label {
            font-size: 0.9em;
            opacity: 0.9;
        }
        
        .welcome-message {
            background: linear-gradient(135deg, #84fab0 0%, #8fd3f4 100%);
            color: white;
            padding: 25px;
            border-radius: 8px;
            text-align: center;
            font-size: 1.2em;
            font-weight: bold;
            margin: 20px 0;
            box-shadow: 0 5px 15px rgba(132, 250, 176, 0.3);
        }
        
        .footer {
            text-align: center;
            color: #2c3e50;
            font-size: 0.95em;
            margin-top: 30px;
            padding: 20px;
            background: rgba(255,255,255,0.7);
            border-radius: 8px;
        }
        
        .highlight {
            background: linear-gradient(120deg, #ffd89b 0%, #19547b 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <!-- Card Utama -->
        <div class="card">
            <h1> Belajar PHP</h1>
            <p class="subtitle">Modul 9: PHP Hypertext Preprocessor</p>
            
            <!-- Welcome Message -->
            <?php
                $nama = "Mila Widiya Fitri";
                $tahun = date('Y');
                $waktu = date('H:i:s');
                $hari = date('l', strtotime('today'));
            ?>
            
            <div class="welcome-message">
                <?php echo "Selamat datang " . strtoupper($nama) . "! "; ?>
            </div>
            
            <!-- Divider -->
            <hr class="divider">
            
            <!-- Informasi Dasar -->
            <h2 style="color: #2c3e50; margin: 20px 0 15px 0;">📝 Informasi Pembelajaran</h2>
            
            <div class="info-section">
                <div class="info-label">Nama Pelajar:</div>
                <div class="info-content"><?php echo $nama; ?></div>
            </div>
            
            <div class="info-section">
                <div class="info-label"> Waktu Akses:</div>
                <div class="info-content">
                    <?php echo "Hari: " . $hari . " | Jam: " . $waktu . " | Tahun: " . $tahun; ?>
                </div>
            </div>
            
            <div class="info-section">
                <div class="info-label"> Topik Pembelajaran:</div>
                <div class="info-content">
                    <?php echo "Server-Side Programming dengan PHP dan Web Server Architecture"; ?>
                </div>
            </div>
            
            <!-- Divider -->
            <hr class="divider">
            
            <!-- Statistik -->
            <h2 style="color: #2c3e50; margin: 20px 0 15px 0;">📊 Statistik Pembelajaran</h2>
            
            <div class="stats">
                <?php
                    $modul = 9;
                    $pertemuan = "Kesembilan";
                    $topik = "PHP Dasar";
                ?>
                
                <div class="stat-box">
                    <div class="stat-number"><?php echo $modul; ?></div>
                    <div class="stat-label">Modul</div>
                </div>
                
                <div class="stat-box">
                    <div class="stat-number">5</div>
                    <div class="stat-label">Aktivitas</div>
                </div>
            </div>
            
            <!-- Pesan Motivasi -->
            <div class="info-section" style="background: linear-gradient(135deg, #ffd89b 0%, #19547b 100%); color: white; border-left-color: white;">
                <div class="info-label" style="color: white;"> Pesan Motivasi:</div>
                <div class="info-content" style="color: rgba(255,255,255,0.95);">
                    <?php 
                        echo "Hai " . $nama . ", Anda sedang dalam perjalanan menguasai PHP. ";
                        echo "Terus belajar dan jangan menyerah! Setiap baris kode yang Anda tulis ";
                        echo "adalah langkah menuju menjadi developer profesional. Sukses untuk Anda! ";
                    ?>
                </div>
            </div>
            
            <!-- Divider -->
            <hr class="divider">
            
            <!-- Output PHP - 3 Baris -->
            <h2 style="color: #2c3e50; margin: 20px 0 15px 0;"> Output Program PHP</h2>
            
            <div class="info-section">
                <div class="info-label">Baris 1 - Salam PHP:</div>
                <div class="info-content" style="font-weight: bold; color: #667eea;">
                    <?php echo "Hari ini saya sedang belajar server-side programming"; ?>
                </div>
            </div>
            
            <div class="info-section">
                <div class="info-label">Baris 2 - Perhitungan Sederhana:</div>
                <div class="info-content" style="font-weight: bold; color: #667eea;">
                    <?php 
                        $angka1 = 15;
                        $angka2 = 7;
                        $hasil = $angka1 + $angka2;
                        echo "Hasil dari " . $angka1 . " + " . $angka2 . " = " . $hasil;
                    ?>
                </div>
            </div>
            
            <div class="info-section">
                <div class="info-label">Baris 3 - Pesan Akhir:</div>
                <div class="info-content" style="font-weight: bold; color: #667eea;">
                    <?php 
                        echo "Terima kasih telah mempelajari modul 9 PHP bersama saya. Mari kita terus berkembang! 🎉";
                    ?>
                </div>
            </div>
            
            <!-- Footer -->
            <div class="footer">
                <?php 
                    echo "📄 Dokumen ini dibuat menggunakan PHP pada tanggal " . date('d F Y') . " pukul " . date('H:i') . " oleh " . $nama;
                ?>
            </div>
        </div>
    </div>
</body>
</html>
