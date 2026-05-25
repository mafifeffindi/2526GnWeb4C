<?php
session_start();
include 'koneksi.php';

if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = MD5($_POST['password']);

    $query = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username' AND password='$password'");

    if(mysqli_num_rows($query) > 0){
        $_SESSION['username'] = $username;
        header("location:index.php");
    } else {
        $error = "Username atau password salah!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #fce4ec, #f3e5f5, #e8eaf6);
            min-height: 100vh;
            display: flex;
            align-items: center;
        }
        .card {
            border: none;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(233,30,99,0.1);
        }
        .card-body { padding: 2.5rem; }
        .btn-login {
            background: linear-gradient(135deg, #f48fb1, #ce93d8);
            border: none;
            border-radius: 10px;
            color: white;
            font-weight: 500;
            padding: 10px;
        }
        .btn-login:hover {
            background: linear-gradient(135deg, #f06292, #ba68c8);
            color: white;
        }
        .form-control {
            border-radius: 10px;
            border: 1.5px solid #f8bbd0;
            padding: 10px 15px;
        }
        .form-control:focus {
            border-color: #f48fb1;
            box-shadow: 0 0 0 0.2rem rgba(244,143,177,0.25);
        }
        h4 { color: #ad1457; font-weight: 600; }
        .subtitle { color: #e91e63; font-size: 0.85rem; }
    </style>
</head>
<body>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="text-center mb-4">
                <h3 style="color:#ad1457; font-family:'Poppins',sans-serif; font-weight:700;">🌸 Student Data</h3>
                <p class="subtitle">Sistem Manajemen Data Mahasiswa</p>
            </div>
            <div class="card">
                <div class="card-body">
                    <h4 class="text-center mb-1">Selamat Datang!</h4>
                    <p class="text-center subtitle mb-4">Silakan login untuk melanjutkan</p>
                    <?php if(isset($error)) echo "<div class='alert alert-danger rounded-3'>$error</div>"; ?>
                    <form method="post">
                        <div class="mb-3">
                            <label class="form-label" style="color:#ad1457; font-weight:500;">Username</label>
                            <input type="text" name="username" class="form-control" placeholder="Masukkan username" required>
                        </div>
                        <div class="mb-4">
                            <label class="form-label" style="color:#ad1457; font-weight:500;">Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Masukkan password" required>
                        </div>
                        <button type="submit" name="login" class="btn btn-login w-100">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>