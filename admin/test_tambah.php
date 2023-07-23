<?php 
include('../connect.php');
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Nama File</title>
</head>
<body>
    <form action="tambah.php" action="post" enctype="multipart/form-data">
        <label for="Pilih gambar"></label>
        <input type="file" name="image" id="">
        <input type="submit" name="submit" id="">
    </form>
</body>
</html>