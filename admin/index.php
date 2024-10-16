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
  <title>
   ilhjam
  </title>
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
        .hero {
            text-align: center;
            padding: 100px 20px;
        }
        .hero .tagline {
            font-size: 14px;
            color: #b3b3b3;
            margin-bottom: 20px;
        }
        .hero h1 {
            font-size: 48px;
            font-weight: 700;
            margin-bottom: 20px;
        }
        .hero p {
            font-size: 18px;
            color: #b3b3b3;
            margin-bottom: 40px;
        }
        .hero .cta {
            padding: 15px 30px;
            background-color: #ffffff;
            color: #0d0d0d;
            border: none;
            border-radius: 30px;
            font-size: 16px;
            cursor: pointer;
        }
        .carousel {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 20px;
            padding: 50px 20px;
        }
        .carousel .arrow {
            font-size: 24px;
            cursor: pointer;
        }
        .carousel .item {
            width: 150px;
            text-align: center;
        }
        .carousel .item img {
            width: 100%;
            border-radius: 50%;
        }
        .carousel .item .price {
            margin-top: 10px;
            font-size: 14px;
            color: #b3b3b3;
        }
        .carousel .item .price span {
            color: #ffffff;
        }
  </style>
 </head>
 <body>
  <div class="navbar">
   <div class="logo">
    CHICX
   </div>
   <div class="menu">
    <a href="#">
     Home
    </a>
    <a href="#">
     Kategori
    </a>
    <a href="#">
     About
    </a>
   </div>
   <div class="auth">
    <a class="login" href="login.php">
     Login
    </a>
    <a class="login" href="register.php">
     Sign up
    </a>
   </div>
  </div>
  <div class="hero">
   <div class="tagline">
    New spring collection 2023
   </div>
   <h1>
    Where style speaks, trends resonate, fashion flourishes
   </h1>
   <p>
    Unveiling a fashion destination where trends blend seamlessly with your individual style aspirations. Discover today!
   </p>
   <button class="cta">
    New collection
   </button>
  </div>
  <div class="carousel">
   <div class="arrow">
    <i class="fas fa-chevron-left">
    </i>
   </div>
   <div class="item">
    <img alt="Fashion model in brown outfit" height="150" src="https://storage.googleapis.com/a1aa/image/MfchmeZ0iyktckFrraHaADWRe9DofIEFqletxfMoa31wXmY5E.jpg" width="150"/>
   </div>
   <div class="item">
    <img alt="Fashion model in blue and orange outfit" height="150" src="https://storage.googleapis.com/a1aa/image/DsTdQgXQaELRJpj0LUh8e6XeSQyUNaCMQ9L0268xfLzEzELnA.jpg" width="150"/>
   </div>
   <div class="item">
    <img alt="Fashion model in white outfit with hat" height="150" src="https://storage.googleapis.com/a1aa/image/Qg77b707Vv4fVqDKdxgLYpxzXejbQXuAYPWaMO9Y11skZilTA.jpg" width="150"/>
    <div class="price">
     Price for all
     <span>
      400$
     </span>
    </div>
   </div>
   <div class="item">
    <img alt="Fashion model in red hoodie" height="150" src="https://storage.googleapis.com/a1aa/image/VF4QpYDrGwoZAh4CCKrGsVYP1lIzaG3DVJ9LN1K53eLwMxyJA.jpg" width="150"/>
   </div>
   <div class="item">
    <img alt="Fashion model in white outfit" height="150" src="https://storage.googleapis.com/a1aa/image/N6tPFUaIp16mFJDyesmIWtpS1crFyF7IJfv1CYYODsTjZilTA.jpg" width="150"/>
   </div>
   <div class="arrow">
    <i class="fas fa-chevron-right">
    </i>
   </div>
  </div>
 </body>
</html>
