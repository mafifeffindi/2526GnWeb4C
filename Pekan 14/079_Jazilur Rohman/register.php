<?php
session_start();
require_once 'koneksi.php';

if (isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit;
}

$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $email    = trim($_POST['email']);
    $nomor_hp = trim($_POST['nomor_hp']);
    $password = $_POST['password'];
    $confirm  = $_POST['confirm_password'];

    if (empty($username) || empty($email) || empty($nomor_hp) || empty($password)) {
        $error = "Semua field wajib diisi!";
    } elseif ($password !== $confirm) {
        $error = "Konfirmasi password tidak cocok!";
    } else {
        $cek = $conn->prepare("SELECT id FROM users WHERE username = ? OR email = ?");
        $cek->bind_param("ss", $username, $email);
        $cek->execute();
        $cek->store_result();
        if ($cek->num_rows > 0) {
            $error = "Username atau email sudah terdaftar.";
        } else {
            $hashed = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $conn->prepare("INSERT INTO users (username, email, nomor_hp, password) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("ssss", $username, $email, $nomor_hp, $hashed);
            if ($stmt->execute()) {
                $success = "Pendaftaran berhasil! Silakan login.";
            } else {
                $error = "Gagal mendaftar: " . $conn->error;
            }
            $stmt->close();
        }
        $cek->close();
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Akun - Data Barang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>body{background:#f0f2f5;}.card{box-shadow:0 10px 25px rgba(0,0,0,0.05);border-radius:20px;}</style>
</head>
<body class="d-flex align-items-center min-vh-100">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-primary text-white text-center fw-bold">📝 Daftar Akun Baru</div>
                    <div class="card-body">
                        <?php if($error): ?><div class="alert alert-danger"><?= $error ?></div><?php endif; ?>
                        <?php if($success): ?><div class="alert alert-success"><?= $success ?> <a href="login.php">Login disini</a></div><?php endif; ?>
                        <form method="POST">
                            <div class="mb-3">
                                <label>Username</label>
                                <input type="text" name="username" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label>Nomor HP</label>
                                <input type="text" name="nomor_hp" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label>Konfirmasi Password</label>
                                <input type="password" name="confirm_password" class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Daftar</button>
                        </form>
                        <div class="mt-3 text-center">Sudah punya akun? <a href="login.php">Login</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>