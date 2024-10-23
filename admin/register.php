<?php
session_start();
include 'koneksi.php'; // Sertakan file koneksi

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = htmlspecialchars(trim($_POST['username']));
    $password = htmlspecialchars(trim($_POST['password']));

    // Cek apakah username sudah ada
    $stmt = $conn->prepare("SELECT password FROM tb_user WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $error = "Username sudah terdaftar.";
    } else {
        // Simpan user baru ke database
        $stmt = $conn->prepare("INSERT INTO tb_user (username, password) VALUES (?, ?)");
        $stmt->bind_param("ss", $username, $password);

        if ($stmt->execute()) {
            $success = "Registrasi berhasil! Silakan login.";
        } else {
            $error = "Terjadi kesalahan. Coba lagi.";
        }
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
    <title>Registrasi</title>
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
    <h2>Registrasi</h2>
    <?php if (isset($error)) { echo "<p style='color:red;'>$error</p>"; } ?>
    <?php if (isset($success)) { echo "<p style='color:green;'>$success</p>"; } ?>
    <form action="" method="post">
        <label for="username">Username:</label><br>
        <input type="text" name="username" required><br>
        <label for="password">Password:</label><br>
        <input type="password" name="password" required><br>
        <button type="submit" value="Registrasi">Sign up</button>
    </form>
    <p>Sudah memiliki akun? <a href="login.php"> Sign in</a></p>
    </div>
</body>
</html>
