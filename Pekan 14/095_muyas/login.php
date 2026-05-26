<?php
session_start();
include 'koneksi.php';

if(isset($_POST['login'])){

    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $query = mysqli_query($koneksi,
        "SELECT * FROM users 
         WHERE username='$username' 
         AND password='$password'");

    $cek = mysqli_num_rows($query);

    if($cek > 0){
        $_SESSION['username'] = $username;
        header("Location: index.php");
    } else {
        echo "<script>
                alert('Username atau Password salah!');
              </script>";
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
    <table>
        <tr>
            <td>Username</td>
            <td><input type="text" name="username" required></td>
        </tr>

        <tr>
            <td>Password</td>
            <td><input type="password" name="password" required></td>
        </tr>

        <tr>
            <td></td>
            <td><button type="submit" name="login">Login</button></td>
        </tr>
    </table>
</form>

</body>
</html>