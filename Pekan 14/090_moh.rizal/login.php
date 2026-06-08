<?php

session_start();

if(isset($_POST['login'])){

    $username = $_POST['username'];
    $password = $_POST['password'];

    if($username == "moh rizal" && $password == "12345"){

        $_SESSION['login'] = true;

        header("location:index.php");
        exit;

    }else{

        echo "<script>alert('Username atau Password salah!');</script>";

    }
}

?>

<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login Admin</title>

    <style>

        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family: Arial, Helvetica, sans-serif;
        }

        body{
            height:100vh;
            display:flex;
            justify-content:center;
            align-items:center;
            background: linear-gradient(135deg, #4facfe, #00f2fe);
        }

        .login-box{
            width:350px;
            background:white;
            padding:40px;
            border-radius:20px;
            box-shadow:0 10px 25px rgba(0,0,0,0.2);
            text-align:center;
            animation: muncul 0.8s ease;
        }

        @keyframes muncul{
            from{
                opacity:0;
                transform:translateY(-20px);
            }
            to{
                opacity:1;
                transform:translateY(0);
            }
        }

        .login-box h2{
            margin-bottom:30px;
            color:#333;
        }

        .input-box{
            margin-bottom:20px;
            text-align:left;
        }

        .input-box label{
            font-size:14px;
            color:#555;
        }

        .input-box input{
            width:100%;
            padding:12px;
            margin-top:8px;
            border:none;
            border-radius:10px;
            background:#f1f1f1;
            outline:none;
            transition:0.3s;
        }

        .input-box input:focus{
            background:#e0f7ff;
            border:1px solid #00bfff;
        }

        button{
            width:100%;
            padding:12px;
            border:none;
            border-radius:10px;
            background:linear-gradient(135deg, #4facfe, #00c6fb);
            color:white;
            font-size:16px;
            cursor:pointer;
            transition:0.3s;
        }

        button:hover{
            transform:scale(1.03);
            background:linear-gradient(135deg, #00c6fb, #005bea);
        }

        .footer{
            margin-top:20px;
            font-size:13px;
            color:#777;
        }

    </style>

</head>

<body>

    <div class="login-box">

        <h2>🔐 Login Admin</h2>

        <form method="post">

            <div class="input-box">

                <label>Username</label>

                <input
                    type="text"
                    name="username"
                    placeholder="Masukkan Username"
                    required
                >

            </div>

            <div class="input-box">

                <label>Password</label>

                <input
                    type="password"
                    name="password"
                    placeholder="Masukkan Password"
                    required
                >

            </div>

            <button type="submit" name="login">
                Login
            </button>

        </form>

        <div class="footer">
            © 2026 | Web Login Sekolah
        </div>

    </div>

</body>

</html>
