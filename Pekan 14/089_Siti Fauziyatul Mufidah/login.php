<?php
session_start();

// Jika user sudah login, langsung lempar ke halaman utama
if (isset($_SESSION['login'])) {
    header("Location: index.php");
    exit;
}

// Data login statis
$username_admin = "admin";
$password_admin = "12345";

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username === $username_admin && $password === $password_admin) {
        $_SESSION['login'] = true;
        header("Location: index.php");
        exit;
    } else {
        $error = true;
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Sistem</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card shadow border-0 mt-5">
                <div class="card-body p-4">
                    <h3 class="card-title text-center mb-4fw-bold text-primary">Sign In</h3>
                    
                    <?php if (isset($error)) : ?>
                        <div class="alert alert-danger text-center p-2" role="alert">
                            Username / Password Salah!
                        </div>
                    <?php endif; ?>

                    <form action="" method="POST">
                        <div class="mb-3">
                            <label class="form-label">Username</label>
                            <input type="text" name="username" class="form-control" placeholder="Masukkan username" required autofocus>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Masukkan password" required>
                        </div>
                        <button type="submit" name="login" class="btn btn-primary w-100 py-2 mt-2">Masuk</button>
                    </form>
                </div>
            </div>
            <p class="text-center text-muted mt-4" style="font-size: 0.8rem;">Tugas Individu &copy; 2026</p>
        </div>
    </div>
</div>
</body>
</html>