<?php
session_start();

if (isset($_POST['login'])) {

    include ('koneksi.php');

    $username = $_POST['username'];
    $password = $_POST['password'];


    $query = mysqli_query($conn, "SELECT password FROM tb_user WHERE username = '$username'");

    $jumlah_data = mysqli_num_rows($query);

    if ($jumlah_data > 0) {
    $data = mysqli_fetch_array($query);
    
        if (password_verify($password,$data['password'])) {
            $_SESSION['id'] = $data['id'];
            $_SESSION['username'] = $data['username'];
            $_SESSION['role'] = $data['role'];

            if ($data['role'] === 'admin') {
                header('Location: admin.php');
            }else{
                header('Location: index.php');
            }
        } else {
            header('Location: login.php?eror=username atau password salah');
        }
    }else{
        header('Location: login.php?eror=username atau password salah');
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
        }
        .login-container {
            border: 1px solid #000;
            padding: 40px;
            width: 300px;
            text-align: center;
        }
        .login-container h1 {
            margin-bottom: 30px;
            font-size: 24px;
        }
        .login-container label {
            display: block;
            text-align: left;
            margin-bottom: 10px;
            font-size: 14px;
        }
        .login-container input[type="text"],
        .login-container input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: none;
            border-bottom: 1px solid #000;
            font-size: 14px;
        }
        .login-container button {
            width: 100%;
            padding: 10px;
            background-color: #000;
            color: white;
            border: none;
            font-size: 14px;
            cursor: pointer;
            margin: 2px;
            text-decoration: none;
        }
        .login-container button a{
            width: 100%;
            padding: 10px;
            background-color: #000;
            color: white;
            border: none;
            font-size: 14px;
            cursor: pointer;
            margin: 2px;
            text-decoration: none;
        }
    </style>
</head>
<body>
<div class="login-container">
<h1>Login</h1>
    <?php if (isset($error)) { echo "<p style='color:red;'>$error</p>"; } ?>
    <form action="" method="post">
        <label for="username">Username:</label><br>
        <input type="text" name="username" required><br>
        <label for="password">Password:</label><br>
        <input type="password" name="password" required><br>
        <button type="submit" value="Login">login</button>
    </form>
    <p>belum memiliki akun? <a href="register.php"> Sign up</a></p>
</div>

</body>
</html>
