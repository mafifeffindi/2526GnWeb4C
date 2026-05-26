<?php
session_start();

if(isset($_SESSION['login'])){
    header("location:index.php");
    exit;
}

$error = false;

if(isset($_POST['login'])){

    $username = $_POST['username'];
    $password = $_POST['password'];

    if($username == "awsan" && $password == "2525"){
        $_SESSION['login'] = true;
        header("location:index.php");
        exit;
    } else {
        $error = true;
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

    <h2>Login Admin</h2>

    <?php if($error){ ?>
        <p style="color:red;">
            Username atau Password salah!
        </p>
    <?php } ?>

    <form method="post">

        <input
            type="text"
            name="username"
            placeholder="Username"
            required>
        <br><br>

        <input
            type="password"
            name="password"
            placeholder="Password"
            required>
        <br><br>

        <button type="submit" name="login">
            Login
        </button>

    </form>

</div>

</body>
</html>