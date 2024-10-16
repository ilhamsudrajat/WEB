<?php
session_start();
include 'koneksi.php'; // Sertakan file koneksi
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Product Page</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <style>
   body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f5f5f5;
        }
        .container {
            display: flex;
            background-color: #ffffff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .image-section {
            flex: 1;
            padding-right: 20px;
        }
        .image-section img {
            width: 100%;
            height: auto;
        }
        .details-section {
            flex: 1;
            padding-left: 20px;
        }
        .details-section h1 {
            font-size: 24px;
            margin: 0;
        }
        .details-section .price {
            font-size: 20px;
            margin: 10px 0;
        }
        .details-section .installments {
            font-size: 14px;
            color: #666;
        }
        .details-section .size-chart {
            display: flex;
            align-items: center;
            margin: 20px 0;
        }
        .details-section .size-chart span {
            margin-right: 10px;
        }
        .details-section .sizes {
            display: flex;
            gap: 10px;
        }
        .details-section .sizes div {
            width: 30px;
            height: 30px;
            border: 1px solid #000;
            display: flex;
            justify-content: center;
            align-items: center;
            cursor: pointer;
        }
        .details-section .sizes .selected {
            background-color: #000;
            color: #fff;
        }
        .details-section .sizes .unavailable {
            text-decoration: line-through;
            color: #ccc;
        }
        .details-section .buttons {
            margin: 20px 0;
        }
        .details-section .buttons button {
            width: 100%;
            padding: 10px;
            border: 1px solid #000;
            background-color: #fff;
            cursor: pointer;
            margin-bottom: 10px;
        }
        .details-section .buttons .buy-now {
            background-color: #000;
            color: #fff;
        }
        .details-section .description,
        .details-section .ask-question {
            margin: 20px 0;
        }
        .details-section .social-icons {
            display: flex;
            gap: 10px;
        }
        .details-section .social-icons i {
            font-size: 20px;
            cursor: pointer;
        }
  </style>
</head>
<body>
<div class="container">
    <div class="image-section">
        <img alt="<?= $product['name'] ?>" height="400" src="<?= $product['image_url'] ?>" width="600"/>
    </div>
    <div class="details-section">
        <p><?= $product['code'] ?></p>
        <h1><?= $product['name'] ?></h1>
        <p class="price">Rp <?= number_format($product['price'], 2, ',', '.') ?></p>
        <p class="installments">or 3 payments of Rp <?= number_format($product['price'] / 3, 2, ',', '.') ?> with <span style="color: #00aaff;">atome</span><i class="fas fa-info-circle"></i></p>
        <p>Tax included.</p>
        <div class="size-chart">
            <span>Size — Size chart<i class="fas fa-ruler"></i></span>
        </div>
        <div class="sizes">
            <div class="selected">38</div>
            <div>39</div>
            <div>40</div>
            <div class="unavailable">41</div>
            <div>44</div>
        </div>
        <div class="buttons">
            <button>Add to cart</button>
            <button class="buy-now">Buy it now</button>
        </div>
        <div class="description">
            <p>Description</p>
            <p><?= $product['description'] ?></p>
        </div>
        <div class="ask-question">
            <p>Ask a question</p>
        </div>
        <div class="social-icons">
            <i class="fab fa-facebook"></i>
            <i class="fab fa-twitter"></i>
            <i class="fab fa-pinterest"></i>
        </div>
    </div>
</div>
</body>
</html>
