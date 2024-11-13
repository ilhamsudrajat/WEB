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

    <style>
        /* Reset default margins and paddings */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            color: #333;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        h1 {
            text-align: center;
            color: #4CAF50;
            margin-bottom: 30px;
        }

        .menu {
            display: flex;
            justify-content: center;
            gap: 30px;
            margin-top: 20px;
            width: 100%;
            max-width: 800px;
            flex-wrap: wrap;
            justify-content: center;
        }

        .menu a {
            padding: 15px 25px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-size: 16px;
            font-weight: bold;
            transition: background-color 0.3s, transform 0.2s ease;
            text-align: center;
        }

        .menu a:hover {
            background-color: #0056b3;
            transform: translateY(-5px);
        }

        .menu a:active {
            transform: translateY(1px);
        }

        /* Responsive styling */
        @media (max-width: 768px) {
            h1 {
                font-size: 1.8em;
            }

            .menu {
                gap: 15px;
            }

            .menu a {
                padding: 12px 20px;
                font-size: 14px;
            }
        }
    </style>
</head>

<body>

    <h1>Halaman Admin</h1>

    <div class="menu">
        <a href="index2.php">DAFTAR PRODUK</a>
        <a href="penjualan.php">PENJUALAN</a>
        <a href="detail_penjualan.php">DETAIL PENJUALAN</a>
    </div>

</body>

</html>
