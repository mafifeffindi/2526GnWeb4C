<?php
// File: login.php
include 'koneksi.php';

if (isset($_SESSION['login'])) {
    header("Location: index.php");
    exit;
}

if (isset($_POST['login'])) {
    $username = mysqli_real_escape_string($koneksi, $_POST['username']);
    $password = md5($_POST['password']); // Menggunakan MD5 sesuai data dummy tadi

    $result = mysqli_query($koneksi, "SELECT * FROM users WHERE username = '$username' AND password = '$password'");
    
    if (mysqli_num_rows($result) === 1) {
        $_SESSION['login'] = true;
        $_SESSION['username'] = $username;
        header("Location: index.php");
        exit;
    }
    $error = true;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <title>Login - SIM Kampus</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex align-items-center" style="height: 100vh;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card shadow">
                    <div class="card-body p-4">
                        <h3 class="text-center mb-4">Sign In</h3>
                        <?php if (isset($error)) : ?>
                            <div class="alert alert-danger p-2 text-center" role="alert">Username / Password salah!</div>
                        <?php endif; ?>
                        <form method="post" action="">
                            <div class="mb-3">
                                <label class="form-label">Username</label>
                                <input type="text" name="username" class="form-content form-control" required autofocus>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" required>
                            </div>
                            <button type="submit" name="login" class="btn btn-primary w-100 mt-2">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>