<?php
session_start();

if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    if($username == 'admin' && $password == 'admin123'){
        $_SESSION['login'] = true;
        header("location:index.php");
    } else {
        echo "<script>alert('Login gagal');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        body{
            background: linear-gradient(135deg, #0d6efd, #6610f2);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: 'Segoe UI', sans-serif;
        }

        .login-card{
            width: 400px;
            border: none;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
            overflow: hidden;
        }

        .card-header-custom{
            background: #0d6efd;
            color: white;
            text-align: center;
            padding: 30px;
        }

        .card-header-custom i{
            font-size: 60px;
        }

        .form-control{
            border-radius: 10px;
            padding: 12px;
        }

        .btn-login{
            border-radius: 10px;
            padding: 12px;
            font-weight: bold;
            transition: 0.3s;
        }

        .btn-login:hover{
            transform: translateY(-2px);
        }

        .footer-text{
            text-align: center;
            font-size: 14px;
            color: #6c757d;
            margin-top: 15px;
        }
    </style>
</head>
<body>

<div class="card login-card">
    
    <div class="card-header-custom">
        <i class="bi bi-person-circle"></i>
        <h3 class="mt-2">Login Admin</h3>
        <p class="mb-0">Sistem Informasi Mahasiswa</p>
    </div>

    <div class="card-body p-4">

        <form method="POST">

            <div class="mb-3">
                <label class="form-label">
                    <i class="bi bi-person-fill"></i> Username
                </label>
                <input type="text" name="username" class="form-control" placeholder="Masukkan Username" required>
            </div>

            <div class="mb-3">
                <label class="form-label">
                    <i class="bi bi-lock-fill"></i> Password
                </label>
                <input type="password" name="password" class="form-control" placeholder="Masukkan Password" required>
            </div>

            <button type="submit" name="login" class="btn btn-primary btn-login w-100">
                <i class="bi bi-box-arrow-in-right"></i> Login
            </button>

        </form>

        <div class="footer-text">
            © 2026 Sistem Informasi Mahasiswa
        </div>

    </div>

</div>

</body>
</html>