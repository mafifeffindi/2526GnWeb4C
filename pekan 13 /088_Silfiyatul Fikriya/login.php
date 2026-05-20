<?php
session_start();
include 'koneksi.php';

if (isset($_POST['login'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    $cek = mysqli_query(
        $conn,
        "SELECT * FROM users
        WHERE username='$username'
        AND password='$password'"
    );

    if (mysqli_num_rows($cek) > 0) {

        $_SESSION['username'] = $username;

        header("Location: index.php");

    } else {

        echo "Login gagal!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>

<h2>Login</h2>

<form method="POST">

    <label>Username</label><br>
    <input type="text" name="username">
    <br><br>

    <label>Password</label><br>
    <input type="password" name="password">
    <br><br>

    <button type="submit" name="login">
        Login
    </button>

</form>

</body>
</html>
