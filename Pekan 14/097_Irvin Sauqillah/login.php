<?php
session_start();
include 'koneksi.php';

if (isset($_SESSION['user'])) {
    header("location:index.php");
    exit();
}

$error = "";

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = MD5($_POST['password']);

    $query = mysqli_query($koneksi, "SELECT * FROM users WHERE username='$username' AND password='$password'");

    if (mysqli_num_rows($query) > 0) {
        $_SESSION['user'] = $username;
        header("location:index.php");
        exit();
    } else {
        $error = "Username atau password salah!";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="login-box">
    <h2>Login</h2>

    <?php if ($error != "") { ?>
        <p class="error"><?php echo $error; ?></p>
    <?php } ?>

    <form method="post">
        <label>Username</label><br>
        <input type="text" name="username" placeholder="Username" required><br><br>

        <label>Password</label><br>
        <input type="password" name="password" placeholder="Password" required><br><br>

        <button type="submit" name="login">Login</button>
    </form>
</div>
</body>
</html>
