<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

echo "Selamat datang, " . $_SESSION['username'] . "!";

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Admin</title>
    <link rel="stylesheet" href="styles.css"> <!-- Ganti dengan link CSS jika ada -->
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        h1 {
            text-align: center;
        }
        .menu {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 50px;
        }
        .menu a {
            padding: 15px 25px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        .menu a:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<h1>Halaman Admin</h1>
<div class="menu">
    <a href="produk.php">PRODUK</a>
    <a href="penjualan.php">PENJUALAN</a>
    <a href="detail_penjualan.php">DETAIL PENJUALAN</a>
</div>

</body>
</html>
