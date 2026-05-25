<!DOCTYPE html>
<html>
<head>
    <title>Login Admin</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body{
            background: linear-gradient(to right, #0f2027, #203a43, #2c5364);
            height:100vh;
            display:flex;
            justify-content:center;
            align-items:center;
        }

        .card{
            width:400px;
            border-radius:20px;
        }
    </style>
</head>
<body>

<div class="card shadow p-4">
    <h2 class="text-center mb-4">Login Admin</h2>

    <form action="proseslogin.php" method="POST">
        <div class="mb-3">
            <label>Username</label>
            <input type="text" name="username" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-dark w-100">
            Login
        </button>
    </form>
</div>

</body>
</html>