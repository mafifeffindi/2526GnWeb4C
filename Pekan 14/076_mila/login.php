<?php
session_start();
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Login sederhana: username 'mila' dan password '123'
    if ($username == 'mila' && $password == '123') {
        $_SESSION['user'] = $username;
        header("location:index.php");
    } else {
        $error = "Username atau password salah, Mila!";
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
        <h2>Selamat Datang 🌸</h2>
        <p style="font-size: 14px; color: #7f8c8d; margin-bottom: 20px;">Silakan login terlebih dahulu</p>
        
        <?php if(isset($error)) { echo "<p class='alert'>$error</p>"; } ?>
        
        <form method="post">
            <input type="text" name="username" placeholder="Username (mila)" required><br>
            <input type="password" name="password" placeholder="Password (123)" required><br>
            <button type="submit" name="login" class="btn btn-primary">Masuk</button>
        </form>
    </div>
</body>
</html>
