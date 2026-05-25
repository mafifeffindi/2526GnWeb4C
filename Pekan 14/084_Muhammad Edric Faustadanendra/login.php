<?php
session_start();
include 'koneksi.php';

if(isset($_SESSION['login'])){
    header("Location: index.php");
    exit;
}

if(isset($_POST['login'])){

    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = mysqli_query($conn,
    "SELECT * FROM users
    WHERE username='$username'
    AND password='$password'");

    if(mysqli_num_rows($query) > 0){

        $_SESSION['login'] = true;

        echo "

        <!DOCTYPE html>
        <html>
        <head>

        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>

        </head>

        <body>

        <script>

        Swal.fire({

            icon: 'success',
            title: 'Login Berhasil!',
            text: 'Selamat datang di Dashboard',
            confirmButtonColor: '#6366f1',
            timer: 1800,
            showConfirmButton: false

        }).then(() => {

            window.location.href='index.php';

        });

        setTimeout(() => {

            window.location.href='index.php';

        }, 1800);

        </script>

        </body>
        </html>

        ";

        exit;

    } else {

        echo "

        <!DOCTYPE html>
        <html>
        <head>

        <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>

        </head>

        <body>

        <script>

        Swal.fire({

            icon: 'error',
            title: 'Login Gagal!',
            text: 'Username atau Password salah',
            confirmButtonColor: '#ef4444'

        });

        </script>

        </body>
        </html>

        ";

    }
}
?>

<!DOCTYPE html>
<html>
<head>

    <title>Login Admin</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="style.css">

    <link rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

</head>

<body>

<div class="container-center">

    <div class="card-custom p-5 position-relative"
    style="width:450px;">

        <!-- DARK MODE -->

        <button
        onclick="toggleDarkMode()"
        class="btn btn-dark position-absolute"
        style="top:20px; right:20px;">

            🌙

        </button>

        <!-- ICON -->

        <div class="text-center mb-4">

            <div style="
            width:85px;
            height:85px;
            background:linear-gradient(to right,#6366f1,#8b5cf6);
            border-radius:50%;
            margin:auto;
            display:flex;
            align-items:center;
            justify-content:center;
            color:white;
            font-size:38px;
            margin-bottom:15px;
            box-shadow:0 10px 20px rgba(99,102,241,0.3);">

                <i class="bi bi-person-fill-lock"></i>

            </div>

            <h2 class="title">
                Login Admin
            </h2>

            <p class="text-secondary">
                Silakan login untuk masuk dashboard
            </p>

        </div>

        <!-- FORM -->

        <form method="POST">

            <div class="mb-3">

                <label class="mb-2">
                    Username
                </label>

                <input type="text"
                name="username"
                class="form-control"
                placeholder="Masukkan username"
                required>

            </div>

            <div class="mb-4">

                <label class="mb-2">
                    Password
                </label>

                <input type="password"
                name="password"
                class="form-control"
                placeholder="Masukkan password"
                required>

            </div>

            <button
            type="submit"
            name="login"
            class="btn btn-custom w-100">

                <i class="bi bi-box-arrow-in-right"></i>
                Login

            </button>

        </form>

        <!-- FOOTER -->

        <div class="text-center mt-4 text-secondary">

            © 2026 CRUD Mahasiswa

        </div>

    </div>

</div>

<script>

function toggleDarkMode(){

    document.body.classList.toggle('dark-mode');

}

</script>

</body>
</html>