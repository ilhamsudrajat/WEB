<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
if ($_SESSION ["role"] !="admin") {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>

<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">

<meta name="viewport" content="width=device-width, initial-
scale=1.0">

<title>Document</title>
</head>
<body>
<form action="proses_tambah.php" method="post"enctype="multipart/form-data">
<p>Nama : <input type="text" name="nama" id=""></p>
<p>harga <input type="number" name="harga" id=""></p>
<p>foto <input type="file" name="foto" id=""></p>
<p>detail <input type="text" name="detail" id=""></p>
<button type="submit">simpan</button>
</form>
</body>
</html>