<?php
include 'koneksi.php';

// Menangani aksi update produk
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $id_kategori = $_POST['id_kategori'];
    $nama = $_POST['nama'];
    $harga = $_POST['harga'];
    $detail = $_POST['detail'];
    $ketersediaan_stok = $_POST['ketersediaan_stok'];

    // Cek jika ada file foto yang diunggah
    if (!empty($_FILES['foto']['name'])) {
        $foto = $_FILES['foto']['name'];
        move_uploaded_file($_FILES['foto']['tmp_name'], "uploads/" . $foto);
        $sql = "UPDATE tb_produk SET id_kategori='$id_kategori', nama='$nama', harga='$harga', foto='$foto', detail='$detail', ketersediaan_stok='$ketersediaan_stok' WHERE id='$id'";
    } else {
        $sql = "UPDATE tb_produk SET id_kategori='$id_kategori', nama='$nama', harga='$harga', detail='$detail', ketersediaan_stok='$ketersediaan_stok' WHERE id='$id'";
    }

    $conn->query($sql);
    header("Location: " . $_SERVER['PHP_SELF']); // Redirect untuk mencegah form resubmit
}

// Menangani aksi tambah produk
if (isset($_POST['tambah'])) {
    $id_kategori = $_POST['id_kategori'];
    $nama = $_POST['nama'];
    $harga = $_POST['harga'];
    $detail = $_POST['detail'];
    $ketersediaan_stok = $_POST['ketersediaan_stok'];

    // Cek jika ada file foto yang diunggah
    if (!empty($_FILES['foto']['name'])) {
        $foto = $_FILES['foto']['name'];
        move_uploaded_file($_FILES['foto']['tmp_name'], "uploads/" . $foto);
        $sql = "INSERT INTO tb_produk (id_kategori, nama, harga, foto, detail, ketersediaan_stok) VALUES ('$id_kategori', '$nama', '$harga', '$foto', '$detail', '$ketersediaan_stok')";
    } else {
        $sql = "INSERT INTO tb_produk (id_kategori, nama, harga, detail, ketersediaan_stok) VALUES ('$id_kategori', '$nama', '$harga', '$detail', '$ketersediaan_stok')";
    }

    $conn->query($sql);
    header("Location: " . $_SERVER['PHP_SELF']); // Redirect untuk mencegah form resubmit
}

// Menangani aksi edit produk
if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $result = $conn->query("SELECT * FROM tb_produk WHERE id='$id'");
    $row = $result->fetch_assoc();
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
    
    <!-- Form Tambah/Update Produk -->
    <form method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo isset($row['id']) ? $row['id'] : ''; ?>">
        <input type="number" name="id_kategori" placeholder="ID Kategori" value="<?php echo isset($row['id_kategori']) ? $row['id_kategori'] : ''; ?>" required>
        <input type="text" name="nama" placeholder="Nama Produk" value="<?php echo isset($row['nama']) ? $row['nama'] : ''; ?>" required>
        <input type="number" step="0.01" name="harga" placeholder="Harga" value="<?php echo isset($row['harga']) ? $row['harga'] : ''; ?>" required>
        <input type="file" name="foto">
        <?php if (isset($row['foto']) && $row['foto'] != ''): ?>
            <img src="uploads/<?php echo $row['foto']; ?>" width="100"><br>
            <small>Biarkan kosong jika tidak ingin mengubah foto.</small>
        <?php endif; ?>
        <textarea name="detail" placeholder="Detail Produk" required><?php echo isset($row['detail']) ? $row['detail'] : ''; ?></textarea>
        <select name="ketersediaan_stok" required>
            <option value="">-- Pilih Ketersediaan --</option>
            <option value="tersedia" <?php echo isset($row['ketersediaan_stok']) && $row['ketersediaan_stok'] == 'tersedia' ? 'selected' : ''; ?>>Tersedia</option>
            <option value="habis" <?php echo isset($row['ketersediaan_stok']) && $row['ketersediaan_stok'] == 'habis' ? 'selected' : ''; ?>>Habis</option>
        </select>
        <?php if (isset($_GET['edit'])): ?>
            <button type="submit" name="update">Update Produk</button>
        <?php else: ?>
            <button type="submit" name="tambah">Tambah Produk</button>
        <?php endif; ?>
    </form>

    <h2>Daftar Produk</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Harga</th>
            <th>Foto</th>
            <th>Detail</th>
            <th>Ketersediaan Stok</th>
            <th>Aksi</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['nama']; ?></td>
            <td><?php echo number_format($row['harga'], 0, ',', '.'); ?></td>
            <td><img src="uploads/<?php echo $row['foto']; ?>" width="100"></td>
            <td><?php echo $row['detail']; ?></td>
            <td><?php echo $row['ketersediaan_stok']; ?></td>
            <td>
                <a href="?edit=<?php echo $row['id']; ?>">Edit</a>
                <a href="?delete=<?php echo $row['id']; ?>">Hapus</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>

<?php $conn->close(); ?>
