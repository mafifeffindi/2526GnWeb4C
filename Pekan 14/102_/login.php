<?php

session_start();

if(isset($_POST['login'])){

    $username = $_POST['username'];
    $password = $_POST['password'];

    if($username == "admin" && $password == "123"){

        $_SESSION['login'] = true;

        header("location:index.php");
        exit;

    }else{

        echo "<script>alert('Username atau Password salah!');</script>";

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

    <h2>Login Admin</h2>

    <form method="post">

        <input
            type="text"
            name="username"
            placeholder="Masukkan Username"
            required
        >

        <input
            type="password"
            name="password"
            placeholder="Masukkan Password"
            required
        >

        <button type="submit" name="login">
            Login
        </button>

    </form>

</div>

</body>

</html>