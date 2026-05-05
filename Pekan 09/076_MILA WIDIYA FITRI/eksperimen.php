<?php
// ============================================
// File: eksperimen.php
// Aktivitas 2: Eksperimen Output Dinamis
// Nama: Mila Widiya Fitri
// ============================================
?>

<!DOCTYPE html>
<html>
<head>
    <title>Profil Mila Widiya Fitri</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            margin: 0;
            padding: 20px;
            min-height: 100vh;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background: white;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.3);
        }
        h1 {
            text-align: center;
            color: #667eea;
            border-bottom: 3px solid #667eea;
            padding-bottom: 15px;
            margin-bottom: 30px;
        }
        .info-box {
            background: #f8f9fa;
            padding: 15px;
            margin: 15px 0;
            border-left: 5px solid #667eea;
            border-radius: 5px;
        }
        .label {
            color: #667eea;
            font-weight: bold;
            font-size: 16px;
        }
        .value {
            color: #333;
            font-size: 15px;
            margin-top: 5px;
        }
        hr {
            border: none;
            height: 2px;
            background: linear-gradient(to right, #667eea, #764ba2);
            margin: 30px 0;
        }
        .footer {
            text-align: center;
            color: #667eea;
            font-size: 14px;
            margin-top: 20px;
            font-style: italic;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php
        // Deklarasi variabel
        $nama = "Mila Widiya Fitri";
        $universitas = "Universitas Trunodjoyo Madura";
        $hobi = "Menonton Film dan mendengarkan musik";
        $citaCita = "Ingin menjadi Bisnis Women";
        $alamatAsal = "Pamekasan, Madura, Jawa Timur";
        $alasanBelajar = "Ingin membangun website yang bermanfaat dan menciptakan solusi teknologi untuk masyarakat";
        ?>
        
        <h1><?php echo " PROFIL " . strtoupper($nama); ?></h1>
        
        <div class="info-box">
            <div class="label"> Nama Lengkap:</div>
            <div class="value"><?php echo $nama; ?></div>
        </div>
        
        <div class="info-box">
            <div class="label"> Universitas:</div>
            <div class="value"><?php echo $universitas; ?></div>
        </div>
        
        <div class="info-box">
            <div class="label"> Asal Daerah:</div>
            <div class="value"><?php echo $alamatAsal; ?></div>
        </div>
        
        <div class="info-box">
            <div class="label"> Hobi Favorit:</div>
            <div class="value"><?php echo $hobi; ?></div>
        </div>
        
        <div class="info-box">
            <div class="label"> Cita-Cita:</div>
            <div class="value"><?php echo $citaCita; ?></div>
        </div>
        
        <hr>
        
        <div class="info-box" style="background: linear-gradient(135deg, #667eea20, #764ba220);">
            <div class="label"> Alasan Belajar Web Programming:</div>
            <div class="value"><?php echo $alasanBelajar; ?></div>
        </div>
        
        <div class="footer">
            <?php echo "Halaman ini dibuat pada: " . date('d-m-Y H:i:s'); ?>
        </div>
    </div>
</body>
</html>
