<?php
include 'koneksi.php';

// Menangani aksi tambah produk
if (isset($_POST['tambah'])) {
    $id_kategori = $_POST['id_kategori'];
    $nama = $_POST['nama'];
    $harga = $_POST['harga'];
    $foto = $_FILES['foto']['name'];
    $detail = $_POST['detail'];
    $ketersediaan_stok = $_POST['ketersediaan_stok'];

    // Upload foto
    move_uploaded_file($_FILES['foto']['tmp_name'], "uploads/" . $foto);

    $sql = "INSERT INTO tb_produk (id_kategori, nama, harga, foto, detail, ketersediaan_stok)
            VALUES ('$id_kategori', '$nama', '$harga', '$foto', '$detail', '$ketersediaan_stok')";
    $conn->query($sql);
}

// Menangani aksi hapus produk
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $conn->query("DELETE FROM tb_produk WHERE id='$id'");
}

// Mengambil semua produk
$result = $conn->query("SELECT * FROM tb_produk");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Produk</title>
</head>
<body>
    <h1>Admin Produk</h1>
    <form method="POST" enctype="multipart/form-data">
        <input type="number" name="id_kategori" placeholder="ID Kategori" required>
        <input type="text" name="nama" placeholder="Nama Produk" required>
        <input type="number" step="0.01" name="harga" placeholder="Harga" required>
        <input type="file" name="foto" required>
        <textarea name="detail" placeholder="Detail Produk" required></textarea>
        <input type="number" name="ketersediaan_stok" placeholder="Ketersediaan Stok" required>
        <button type="submit" name="tambah">Tambah Produk</button>
    </form>

    <h2>Daftar Produk</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>ID Kategori</th>
            <th>Nama</th>
            <th>Harga</th>
            <th>Foto</th>
            <th>Detail</th>
            <th>Ketersediaan Stok</th>
            <th>Aksi</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()) : ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= $row['id_kategori'] ?></td>
            <td><?= $row['nama'] ?></td>
            <td><?= $row['harga'] ?></td>
            <td><img src="uploads/<?= $row['foto'] ?>" width="50"></td>
            <td><?= $row['detail'] ?></td>
            <td><?= $row['ketersediaan_stok'] ?></td>
            <td>
                <a href="?delete=<?= $row['id'] ?>">Hapus</a>
                <!-- Update link dapat ditambahkan di sini -->
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>

<?php $conn->close(); ?>
