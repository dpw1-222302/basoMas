<?php
session_start();
include 'connect.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $resto_id = $_POST['idResto'];
    $caption = $_POST['caption'];
    $user_id = $_SESSION['user_id'];
    $created_at = date('Y-m-d H:i:s');
    $rating = $_POST['outputValue'];

    $ekstensi = array('png', 'jpg', 'jpeg', 'gif');
    $filename = $_FILES['image']['name'];
    $tmp_name = $_FILES['image']['tmp_name'];
    $ukuran = $_FILES['image']['size'];
    $ext = pathinfo($filename, PATHINFO_EXTENSION);

        if ($ukuran < 1044070000) {
            $xx = $filename;
            move_uploaded_file($_FILES['image']['tmp_name'], './assets/upload/restaurant/' . $filename);

            // memasukan data menggunakan query sql
            $query = "INSERT INTO review (review_id, user_id, resto_id, created_at,  rating, caption) VALUES (DEFAULT, $user_id,$resto_id,'$created_at', $rating,'$caption')";
            echo $query;
            if ($conn->query($query)) {
                echo "query berhasil";
                header("location: restaurant.php?idResto=". $resto_id);
                exit;
            } else {
                echo "Error executing query: " . $conn->error;
            }
            header("location:restaurant.php?alert=berhasil");
        } else {
            header("location:restaurant.php?alert=gagal_ukuran");
        }
    

}