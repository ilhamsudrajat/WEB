<?php
include '../koneksi.php';

$id   = $_POST['id'];
$nama = $_POST['nama'];
$harga = $_POST['harga'];
$detail = $_POST['detail'];

$foto = $_FILES['foto']['name'];
$lokasi_foto = $_FILES['foto']['tmp_name'];

// ambil data foto lama
$queryData = mysqli_query($conn, "SELECT foto FROM tb_produk where id='$id'");
$data = mysqli_fetch_array($queryData);
$fotoLama = $data['foto'];

$sql = "UPDATE tb_produk SET nama='$nama',harga='$harga',detail='$detail',foto='$foto' WHERE id='$id'";
$query = mysqli_query($conn, $sql);

// update foto
        if($query){
            unlink("../foto_produk/$fotoLama");
            move_uploaded_file($lokasi_foto,"../foto_produk/$foto");
        };
    
header("Location: index2.php");