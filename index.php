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
    <title>HAMS</title>

    <!-- Font Awesome & Google Fonts -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet" />

    <style>
        /* Reset margin and padding */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f4f4f9;
            color: #333;
            padding-top: 80px;
            margin: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            height: 100vh;
        }

        /* Navbar Styles */
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 50px;
            background-color: #0d0d0d;
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
        }

        .navbar .logo {
            font-size: 24px;
            font-weight: 700;
            color: #fff;
        }

        .navbar .menu {
            display: flex;
            gap: 20px;
            justify-content: center;
            align-items: center;
        }

        .navbar .menu a {
            color: #fff;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 20px;
            font-size: 14px;
            font-weight: 600;
            transition: background-color 0.3s;
        }

        .navbar .menu a:hover,
        .navbar .menu a.active {
            background-color: #4CAF50;
            color: #fff;
        }

        .navbar .search {
            display: flex;
            align-items: center;
            margin-right: 100px;
        }

        .navbar .search input {
            padding: 10px;
            border-radius: 20px;
            border: none;
            width: 200px;
            outline: none;
        }

        .navbar .search button {
            padding: 10px;
            border-radius: 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
            margin-left: 10px;
        }

        .navbar .profile {
            position: relative;
            display: flex;
            align-items: center;
            cursor: pointer;
        }

        .navbar .profile img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
        }

        .navbar .dropdown {
            display: none;
            position: absolute;
            top: 60px;
            right: 0;
            background-color: #fff;
            color: #333;
            min-width: 150px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .navbar .dropdown a {
            padding: 10px 20px;
            text-decoration: none;
            color: #333;
            display: block;
        }

        .navbar .dropdown a:hover {
            background-color: #f4f4f9;
        }

        /* Product Cards Styles */
        .produk-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            padding: 20px;
            margin-top: 100px;
        }

        .produk {
            background-color: #fff;
            border-radius: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            width: 250px;
            text-align: center;
            padding: 15px;
            margin: 20px;
            transition: transform 0.3s ease-in-out;
        }

        .produk:hover {
            transform: scale(1.05);
        }

        .produk img {
            width: 100%;
            height: 300px;
            object-fit: cover;
            border-radius: 10px;
        }

        .produk-title {
            font-size: 16px;
            font-weight: bold;
            margin-top: 10px;
            color: #333;
        }

        .produk-price {
            color: #888;
            font-size: 14px;
            margin: 10px 0;
        }

        .produk-button {
            background-color: #4CAF50;
            color: #fff;
            padding: 10px 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
            font-size: 14px;
            transition: background-color 0.3s ease;
        }

        .produk-button:hover {
            background-color: #45a049;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .navbar {
                flex-direction: column;
                padding: 20px;
                gap: 15px;
            }

            .navbar .menu a {
                font-size: 12px;
            }

            .produk {
                width: 200px;
            }

            .produk img {
                height: 250px;
            }

            .navbar .search input {
                width: 150px;
            }
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <div class="navbar">
        <div class="logo">HAMS</div>
        <div class="menu">
            <a href="#">Home</a>
            <a href="#">Kategori</a>
            <a href="#">About</a>
        </div>
        <div class="search">
            <input type="text" placeholder="Search...">
            <button type="button"><i class="fas fa-search"></i></button>
        </div>
        <div class="profile" onclick="toggleDropdown()">
            <img src="https://i.pravatar.cc/300" alt="Profile">
            <div class="dropdown" id="dropdownMenu">
                <a href="#">Profil</a>
                <a href="logout.php">Logout</a>
            </div>
        </div>
    </div>

    <!-- Produk Display -->
    <div class="produk-container">
        <?php
        include 'koneksi.php';
        $query = mysqli_query($conn, "SELECT * FROM tb_produk");
        while ($produk = mysqli_fetch_array($query)) {
        ?>
            <a href="detail-produk.php">
                <div class="produk">
                    <figure>
                        <img src="foto_produk/<?php echo $produk['foto'] ?>" alt="<?php echo $produk['nama']; ?>">
                    </figure>
                    <div class="produk-title"><?php echo $produk['nama']; ?></div>
                    <div class="produk-price">Rp<?php echo number_format($produk['harga'], 0, ',', '.'); ?></div>
                    <button class="produk-button">Beli Sekarang</button>
                </div>
            </a>
        <?php
        }
        ?>
    </div>

    <script>
        function toggleDropdown() {
            const dropdown = document.getElementById('dropdownMenu');
            dropdown.style.display = dropdown.style.display === 'block' ? 'none' : 'block';
        }

        window.onclick = function (event) {
            if (!event.target.matches('.profile img')) {
                const dropdowns = document.getElementsByClassName('dropdown');
                for (let i = 0; i < dropdowns.length; i++) {
                    const openDropdown = dropdowns[i];
                    if (openDropdown.style.display === 'block') {
                        openDropdown.style.display = 'none';
                    }
                }
            }
        };
    </script>
</body>

</html>
