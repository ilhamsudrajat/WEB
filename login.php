<?php
session_start();
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Prepare and execute SQL statement
    $stmt = $conn->prepare("SELECT id, username, password, role FROM tb_user WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $stored_username, $stored_password, $role);
        $stmt->fetch();

        // Verify password
        if (password_verify($password, $stored_password)) {
            $_SESSION['id'] = $id;
            $_SESSION['username'] = $stored_username;
            $_SESSION['role'] = $role;

            // Redirect based on role
            if ($role === 'admin') {
                header('Location: Admin/admin.php');
            } else {
                header('Location: index.php');
            }
            exit();
        } else {
            $error = "Username atau Password salah.";
        }
    } else {
        $error = "username atau password salah.";
    }

    $stmt->close();
}

$conn->close();
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
        <button type="submit">Sign in</button>
    </form>
    <p>belum memiliki akun? <a href="register.php"> Sign up</a></p>
</div>
</body>
</html>
