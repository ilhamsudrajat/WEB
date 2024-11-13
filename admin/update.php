<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: ../login.php");
    exit();
}
if ($_SESSION["role"] != "admin") {
    header("Location: ../login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Produk</title>

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
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .form-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 500px;
        }

        h1 {
            text-align: center;
            color: #4CAF50;
            margin-bottom: 20px;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            font-weight: bold;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="number"],
        input[type="file"] {
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
            width: 100%;
        }

        input[type="text"]:focus,
        input[type="number"]:focus,
        input[type="file"]:focus {
            border-color: #4CAF50;
            outline: none;
        }

        button {
            background-color: #4CAF50;
            color: white;
            padding: 12px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #45a049;
        }

        .form-group {
            margin-bottom: 15px;
        }

        /* Responsive styling */
        @media (max-width: 600px) {
            .form-container {
                width: 90%;
                padding: 15px;
            }

            h1 {
                font-size: 1.5em;
            }
        }
    </style>

</head>

<body>

    <div class="form-container">
        <h1>Update Produk</h1>

        <?php
        include '../koneksi.php';
        $id = $_GET['id'];
        $query = mysqli_query($conn, "SELECT * FROM tb_produk WHERE id='$id'");
        $produk = mysqli_fetch_array($query);
        ?>
        <form action="proses_update.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= htmlspecialchars($produk['id']) ?>">

            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" name="nama" id="nama" value="<?= htmlspecialchars($produk['nama']) ?>" required>
            </div>

            <div class="form-group">
                <label for="harga">Harga</label>
                <input type="number" name="harga" id="harga" value="<?= htmlspecialchars($produk['harga']) ?>" required>
            </div>

            <div class="form-group">
                <label for="foto">Foto</label>
                <input type="file" name="foto" id="foto">
            </div>

            <div class="form-group">
                <label for="detail">Detail</label>
                <input type="text" name="detail" id="detail" value="<?= htmlspecialchars($produk['detail']) ?>" required>
            </div>

            <button type="submit">UPDATE</button>
        </form>
    </div>

</body>

</html>
