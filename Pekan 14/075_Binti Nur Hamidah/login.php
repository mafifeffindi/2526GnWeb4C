<?php

session_start();

if(isset($_POST['login'])){

    $username = $_POST['username'];
    $password = $_POST['password'];

    if($username == "admin" && $password == "123"){

        $_SESSION['login'] = true;

        header("location:index.php");

    } else {

        echo "<script>alert('Username atau Password salah!')</script>";
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

<div class="container">

    <h2>Login</h2>

    <form method="post">

        <input type="text"
        name="username"
        placeholder="Username">

        <input type="password"
        name="password"
        placeholder="Password">

        <button type="submit" name="login">
            Login
        </button>

    </form>

</div>

</body>

</html>