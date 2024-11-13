<?php
include "../koneksi.php";
$id = $_GET['id'];

$queryData = mysqli_query($conn, "SELECT foto FROM tb_produk where id='$id'");
$data = mysqli_fetch_array($queryData);
$fotoLama = $data['foto'];


$sql = "DELETE FROM tb_produk WHERE id ='$id'";
$query = mysqli_query($conn, $sql);

if($query){
    unlink("../foto_produk/$fotoLama");
}
if(!$query){
    echo mysqli_connect_error();
    echo mysqli_error($conn);
}
header("Location: index2.php");