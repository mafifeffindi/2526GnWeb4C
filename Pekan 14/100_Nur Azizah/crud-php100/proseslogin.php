<?php
include 'koneksi.php';

$username = $_POST['username'];
$password = md5($_POST['password']);

$query = mysqli_query($conn,
"SELECT * FROM users 
WHERE username='$username' 
AND password='$password'");

$data = mysqli_num_rows($query);

if($data > 0){
    $_SESSION['login'] = true;
    header("Location: index.php");
}else{
    echo "
    <script>
        alert('Login gagal!');
        window.location='login.php';
    </script>
    ";
}
?>