<!DOCTYPE html>
<html>
<head>
    <title>Latihan PHP</title>
    <style>
        body {
            font-family: "Times New Roman", Times, serif;
            background-color: #ffe6f0;
            margin: 0;
            padding: 20px;
        }

        .container {
            width: 60%;
            margin: auto;
            background-color: white;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 0 12px rgba(0,0,0,0.1);
        }

        h1 {
            text-align: center;
            color: #800020;
            margin-bottom: 5px;
        }

        .subtitle {
            text-align: center;
            color: #555;
            margin-bottom: 15px;
        }

        hr {
            border: 1px solid #800020;
            margin: 20px 0;
        }

        .php-output {
            padding: 15px;
            background-color: #ffe6f0;
            border-left: 6px solid #800020;
            border-radius: 5px;
            line-height: 1.6;
        }

        .footer {
            margin-top: 20px;
            text-align: center;
            font-size: 14px;
            color: #800020;
        }
    </style>
</head>
<body>

<div class="container">

    <h1>Belajar PHP</h1>
    <p class="subtitle">Penggabungan HTML dan PHP</p>

    <hr>

    <p>Ini adalah contoh sederhana penggabungan HTML dengan PHP.</p>

    <hr>

    <div class="php-output">
        <?php
            echo "Hari ini saya belajar server side programming<br>";
            echo "Saya menggunakan bahasa PHP<br>";
            echo "Belajar PHP itu mudah dan menyenangkan<br>";
        ?>
    </div>

    
    <hr>

    <div class="footer">
        © Latihan belajar Web
    </div>

</div>

</body>
</html>
