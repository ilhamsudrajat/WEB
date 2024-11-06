<?php
include "koneksi.php";
$nama = $_GET['nama'];
$harga = $_GET['harga'];
$detail = $_GET['detail'];
$sql = "DELETE FROM tb_produk WHERE nama ='$nama'";
$query = mysqli_query($conn, $sql);

header("Location: index2.php");