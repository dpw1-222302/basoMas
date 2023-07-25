<?php
session_start();
include '../connect.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['resto_id'];
    $video = $_POST['video'];
    $nama_resto = $_POST['nama_resto'];
    $harga = $_POST['harga'];
    $lokasi = $_POST['lokasi'];
    $no_telp = $_POST['no_telp'];
    $jam_buka = $_POST['jam_buka'];
    $jam_tutup = $_POST['jam_tutup'];

    $rand = rand();
    $ekstensi = array('png', 'jpg', 'jpeg', 'gif');
    $filename = $_FILES['image']['name'];
    $ukuran = $_FILES['image']['size'];
    $ext = pathinfo($filename, PATHINFO_EXTENSION);

    $true = true;
    if ($ukuran < 1044070000) {
        $xx = $filename;
        move_uploaded_file($_FILES['image']['tmp_name'], '../assets/upload/restaurant/' . $filename);

        // memasukan data menggunakan query sql
        $query = "UPDATE restaurant SET resto_id='$id', foto='$xx', video='$video', nama_resto='$nama_resto' , harga='$harga', lokasi='$lokasi', no_telp='$no_telp', jam_buka='$jam_buka', jam_tutup='$jam_tutup' WHERE resto_id='$id'";
        if ($conn->query($query)) {
            header("location:restaurant/tables.php?alert=berhasil");
            exit;
        } else {
            echo "Error executing query: " . $conn->error;
        }
        header("location:restaurant.php?alert=berhasil");
    } else {
        header("location:restaurant.php?alert=gagak_ukuran");
    }
}

// memasukan data menggunakan query sql
//$query = "INSERT INTO restaurant (resto_id, foto, video, nama_resto, harga, lokasi, no_telp, jam_buka, jam_tutup) VALUES (DEFAULT,'$img','$video','$nama_resto', '$harga','$lokasi','$no_telp','$jam_buka','$jam_tutup')";

// jika berhasil maka dialihkan ke halamaan restaurant
