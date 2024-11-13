<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tampil Semua Produk</title>

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
            flex-direction: column;
        }

        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 900px;
        }

        h1 {
            text-align: center;
            color: #4CAF50;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid #ccc;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        a {
            text-decoration: none;
        }

        button {
            background-color: #4CAF50;
            color: white;
            padding: 8px 15px;
            border: none;
            border-radius: 5px;
            font-size: 14px;
            cursor: pointer;
            margin: 2px;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #45a049;
        }

        .action-buttons {
            display: flex;
            gap: 10px;
        }

        /* Responsive styling */
        @media (max-width: 768px) {
            .container {
                width: 90%;
                padding: 15px;
            }

            table {
                font-size: 14px;
            }

            button {
                padding: 6px 12px;
                font-size: 12px;
            }
        }
    </style>

</head>

<body>

    <div class="container">
        <h1>Daftar Produk</h1>
        <a href="tambah.php">
            <button>Tambah Produk</button>
        </a>
        <table>
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Harga</th>
                    <th>Foto</th>
                    <th>Detail</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include '../koneksi.php';
                $query = mysqli_query($conn, 'SELECT * FROM tb_produk');
                while ($produk = mysqli_fetch_array($query)) {
                ?>
                    <tr>
                        <td><?= htmlspecialchars($produk['nama']) ?></td>
                        <td><?= htmlspecialchars($produk['harga']) ?></td>
                        <td><img src="<?= htmlspecialchars($produk['foto']) ?>" alt="<?= htmlspecialchars($produk['nama']) ?>" width="100"></td>
                        <td><?= htmlspecialchars($produk['detail']) ?></td>
                        <td class="action-buttons">
                            <a href="update.php?id=<?= $produk['id'] ?>"><button>Edit</button></a>
                            <a href="delete.php?id=<?= $produk['id'] ?>"><button>Hapus</button></a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

</body>

</html>
