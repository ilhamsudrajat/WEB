<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

echo "Selamat datang, " . $_SESSION['username'] . "!";
?>
<a href="logout.php">Logout</a>
<html>
<head>
    <title>HAMS</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&amp;display=swap" rel="stylesheet"/>
    <style>
        body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background-color: #0d0d0d;
            color: #ffffff;
        }     
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 50px;
            background-color: #0d0d0d;
        }
        .navbar .logo {
            font-size: 24px;
            font-weight: 700;
        }
        .navbar .menu {
            display: flex;
            gap: 20px;
            flex-grow: 1;
            justify-content: center; 
            align-items: center;
        }
        .navbar .menu a {
            text-decoration: none;
            color: #ffffff;
            padding: 10px 20px;
            border-radius: 20px;
        }
        .navbar .menu a.active, .navbar .menu a:hover {
            background-color: #ffffff;
            color: #0d0d0d;
        }
        .navbar .search {
            display: flex;
            align-items: center;
        }
        .navbar .search input {
            padding: 10px;
            border-radius: 20px;
            border: none;
            outline: none;
            width: 200px;
        }
        .navbar .search button {
            padding: 10px;
            border-radius: 20px;
            border: none;
            background-color: #ffffff;
            color: #0d0d0d;
            cursor: pointer;
            margin-left: 5px;
        }
        .navbar .auth {
            display: flex;
            gap: 20px;
        }
        .navbar .auth a {
            text-decoration: none;
            color: #ffffff;
            padding: 10px 20px;
            border-radius: 20px;
        }
        .navbar .auth a.signup, .navbar .auth a:hover {
            background-color: #ffffff;
            color: #0d0d0d;
        }
        .produk-container {
            display: flex;
            flex-wrap: wrap; 
            justify-content: center; 
            padding: 20px; 
        }
        .produk-container :hover{
            transform: scale(1.05);
        }
        .produk {
            background-color: #ffffff;
            border-radius: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            width: 250px;
            text-align: center;
            padding: 10px;
            margin: 16px;
        }
        .produk img {
            width: 100%;
            border-radius: 8px;
        }
        .produk-title {
            font-size: 16px;
            font-weight: bold;
            margin: 16px 0 8px;
            color: #0d0d0d;
        }
        .produk-price {
            color: #888888;
            font-size: 14px;
            margin-bottom: 16px;
        }
        .produk-button {
            background-color:#0d0d0d;
            color: #ffffff;
            border: none;
            border-radius: 4px;
            padding: 10px 16px;
            font-size: 14px;
            cursor: pointer;
            text-decoration: none;
        }
        .produk-button:hover {
            background-color: gray;
        }
    </style>
</head>
<body>
    <div class="navbar">
        <div class="logo">
            HAMS
        </div>
        <div class="menu">
            <a href="#">Home</a>
            <a href="#">Kategori</a>
            <a href="#">About</a>
        </div>
        <div class="search">
            <input type="text" placeholder="Search...">
            <button type="button"><i class="fas fa-search"></i></button>
        </div>
        <div class="auth">
            <a class="login" href="login.php">Login</a>
            <a class="login" href="register.php">Sign up</a>
        </div>
    </div>
    <div class="produk-container">
    <a href="detail-produk.php">
    <div class="produk">
   <img alt="Book cover with a smiling man and the text 'Seni Membangun PERSONAL Branding By Arya Mustafa'" height="350" src="https://storage.googleapis.com/a1aa/image/LkFMiwfU8cwcfUKwJGCJJWZXfBQyeZwbjMGdsUqoLAuFv3cOB.jpg" width="250"/>
   <div class="produk-title">
    Seni Membangun Personal Branding
   </div>
   <div class="produk-price">
    Rp130.000
   </div>
   <button class="produk-button">
    Beli Sekarang
   </button>
  </div>
  </a>
  </div>
 </body>
</html>
</body>
</html>
