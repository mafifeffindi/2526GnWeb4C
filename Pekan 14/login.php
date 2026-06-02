<?php
session_start();

if (isset($_POST['login'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username == "pemrograman web" && $password == "homaidi") {

        $_SESSION['login'] = true;
        header("location:index.php");
        exit;

    } else {
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
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body{
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: linear-gradient(135deg, #fffdfd, #ffffff);
        }

        .container{
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-box{
            width: 380px;
            background: white;
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.2);
            text-align: center;
        }

        .login-box h2{
            font-size: 32px;
            margin-bottom: 10px;
            color: #333;
        }

        .login-box p{
            color: #777;
            margin-bottom: 30px;
        }

        .input-box{
            margin-bottom: 20px;
        }

        .input-box input{
            width: 100%;
            padding: 15px;
            border: 1px solid #ccc;
            border-radius: 10px;
            outline: none;
            font-size: 16px;
            transition: 0.3s;
        }

        .input-box input:focus{
            border-color: #4facfe;
            box-shadow: 0 0 10px rgba(79,172,254,0.3);
        }

        button{
            width: 100%;
            padding: 15px;
            border: none;
            border-radius: 10px;
            background: linear-gradient(135deg, #f00000, #fb0000);
            color: white;
            font-size: 18px;
            cursor: pointer;
            transition: 0.3s;
        }

        button:hover{
            transform: scale(1.03);
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
        }

        @media(max-width: 500px){

            .login-box{
                width: 90%;
                padding: 30px;
            }

        }
    </style>

</head>
<body>

<div class="container">

    <div class="login-box">

        <div class="logo"></div>

        <h2>Login</h2>

        <p>Silakan login untuk masuk ke dashboard</p>

        <form method="post">

            <div class="input-box">
                <input 
                    type="text" 
                    name="username" 
                    placeholder="Masukkan Username" 
                    required
                >
            </div>

            <div class="input-box">
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

    </div>

</div>

</body>
</html>