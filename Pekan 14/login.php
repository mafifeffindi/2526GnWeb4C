<?php
session_start();
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Login sederhana: username 'fatimah' dan password '123'
    if ($username == 'fatimah' && $password == '456') {
        $_SESSION['user'] = $username;
        header("location:index.php");
    } else {
        $error = "Username atau password salah, fatimah!";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login - CRUD Pastel</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="flex-center">
    <div class="card card-login">
        <h2>🌷 Selamat Datang 🌷</h2>
        <p style="font-size: 14px; color: #9a1770; margin-bottom: 20px;">Silakan login terlebih dahulu</p>
        
        <?php if(isset($error)) { echo "<p class='alert'>$error</p>"; } ?>
        
        <form method="post">
            <input type="text" name="username" placeholder="Username (fatimah)" required><br>
            <input type="password" name="password" placeholder="Password (456)" required><br>
            <button type="submit" name="login" class="btn btn-primary">Masuk</button>
        </form>
    </div>
</body>
</html>