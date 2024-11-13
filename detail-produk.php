<?php
include('koneksi.php'); // Menyertakan koneksi database

// Query untuk mengambil data produk
$sql = "SELECT * FROM tb_produk";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Product Page</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <style>
    /* Styling seperti yang Anda buat sebelumnya */
    /* Anda dapat menyertakan gaya CSS Anda di sini atau menggunakan stylesheet terpisah */
  </style>
</head>
<body>
  <?php while($row = $result->fetch_assoc()): ?>
  <div class="container">
    <div class="image-section">
      <img src="foto_produk/<?php echo $row['foto'] ?>" alt="<?php echo $row['nama']; ?>" width="600" height="400"/>
    </div>
    <div class="details-section">
      <h1><?php echo $row['nama']; ?></h1>
      <p class="price">Rp <?php echo number_format($row['harga'], 0, ',', '.'); ?>,00</p>
      <p class="installments">
        or 3 payments of Rp <?php echo number_format($row['harga'] / 3, 0, ',', '.'); ?>,00 with
        <i class="fas fa-credit-card"></i> atome <i class="fas fa-info-circle"></i>
      </p>
      <p>Tax included.</p>

      <div class="size-chart">
        <span>Size — Size chart <i class="fas fa-ruler"></i></span>
      </div>
      <!-- Anda bisa menambahkan lebih banyak opsi size jika diperlukan -->

      <div class="buttons">
        <button class="add-to-cart">Add to cart</button>
        <button class="buy-now">Buy it now</button>
      </div>

      <div class="description">
        <p><?php echo $row['detail']; ?></p>
      </div>

      <div class="ask-question">
        <p>Ask a question</p>
      </div>

      <div class="social-icons">
        <i class="fas fa-share"></i>
        <i class="fas fa-twitter"></i>
        <i class="fas fa-pinterest"></i>
      </div>
    </div>
  </div>
  <?php endwhile; ?>

  <?php $conn->close(); ?> <!-- Menutup koneksi ke database -->
</body>
</html>
