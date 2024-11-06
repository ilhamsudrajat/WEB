<?php
include 'koneksi.php';
$nama = $_POST['nama'];
$harga = $_POST['harga'];
$detail = $_POST['detail'];

$foto = $_FILES['foto']['name'];
$lokasi_tmp = $_FILES['foto']['tmp_name'];

$sql = "INSERT INTO tb_produk (`id_kategori`,`nama` ,`harga`,`detail`,`foto`)VALUES(1,'$nama','$harga','$detail','$foto')";
$query = mysqli_query($conn ,$sql);
if(!$query){
    echo mysqli_connect_error();
    echo mysqli_error($conn);
}
header("location: index2.php");

move_uploaded_file($lokasi_tmp,"../foto_produk/$foto");
?>