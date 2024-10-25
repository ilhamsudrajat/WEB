<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

echo "Selamat datang, " . $_SESSION['username'] . "!";
?>
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
            padding-top: 80px; /* Beri padding-top untuk menghindari overlap dengan navbar */
        }     
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 50px;
            background-color: #0d0d0d;
            position: fixed;
            width: 100%;
            top: 0;
          
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
            margin-right: 100px; /* Tambahkan margin kanan untuk memberi jarak dari profil */
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
        .produk-container {
            display: flex;
            flex-wrap: wrap; 
            justify-content: center; 
            padding: 20px;
            margin-top: 20px; /* Tambahkan jarak antara navbar dan produk */
        }
        .produk-container :hover {
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
            height: 300px;
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
        .navbar .profile {
            position: relative;
            display: flex;
            align-items: center;
            cursor: pointer;
            right: 5%;
            
        }
        .navbar .profile img {
            width:  40px;
            height: 40px;
            border-radius: 50%;
            
        }
        .navbar .dropdown {
            display: none;
            position: absolute;
            top: 60px;
            right: 0;
            background-color: #ffffff;
            color: #0d0d0d;
            min-width: 150px;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        .navbar .dropdown a {
            display: block;
            padding: 10px 20px;
            text-decoration: none;
            color: #0d0d0d;
        }
        .navbar .dropdown a:hover {
            background-color: #C0C0C0;
        }
    </style>
</head>
<body>
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
                <a href=>Profil</a>
                <a href="logout.php">Logout</a>
            </div>
        </div>
    </div>
    <div class="produk-container">
        <?php
        include 'koneksi.php';

        $sql = "SELECT * FROM tb_produk";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                ?>
                <a href="detail-produk.php?id=<?php echo $row['id']; ?>">
                    <div class="produk">
                        <img src="uploads/<?php echo $row['foto']; ?>" alt="<?php echo $row['nama']; ?>">
                        <div class="produk-title"><?php echo $row['nama']; ?></div>
                        <div class="produk-price">Rp<?php echo number_format($row['harga'], 0, ',', '.'); ?></div>
                        <button class="produk-button">Beli Sekarang</button>
                    </div>
                </a>
                <?php
            }
        } else {
            echo "<p>Produk tidak tersedia</p>";
        }
        $conn->close();
        ?>
    </div>
    <script>
        function toggleDropdown() {
            const dropdown = document.getElementById('dropdownMenu');
            dropdown.style.display = dropdown.style.display === 'block' ? 'none' : 'block';
        }
        window.onclick = function(event) {
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
