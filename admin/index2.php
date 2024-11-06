<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-
scale=1.0">

    <title>Tampil semua produk</title>
</head>

<body>
    <div class="container" style="margin:0 auto; width:50%">
        <a href="tambah.php">Tambah produk</a>
        <table border="1" align="center" width="50% ">
            <tr>
                <td>
                    Nama
                </td>
                <td>
                    harga
                </td>
                <td>
                    foto
                </td>
                <td>
                    detail
                </td>
            </tr>
            <?php
            include 'koneksi.php';
            $query = mysqli_query($conn, 'select * from tb_produk');
            while ($produk = mysqli_fetch_array($query)) {
            ?>
                <tr>
                    <td>
                        <?= $produk['nama'] ?>
                    </td>
                    <td>
                        <?= $produk['harga'] ?>
                    </td>
                    <td>
                        <?= $produk['foto'] ?>
                    </td>
                    <td>
                        <?= $produk['detail'] ?>
                    </td>
                    <td>
                        <a href="edit.php?nama=<?= $produk['nama'] ?>">

                            <button type="submit">Edit</button></a>

                        <a href="hapus.php?nama=<?= $produk['nama'] ?>"><button type="submit">Hapus</button></a>

                    </td>
                </tr>
            <?php } ?>
        </table>
    </div>
</body>

</html>