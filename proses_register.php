<?php
// Cek apakah form telah disubmit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Lakukan operasi penyimpanan data ke database
    require_once('connect.php');
    // Query untuk menyimpan data pengguna baru ke tabel pengguna
    // Buat query untuk memasukan data user yang tadi diinputkan
    $name = $_POST['nama'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $query = "INSERT INTO user VALUES (NULL, 2, '$name', '$email', '$password')";
    if ($conn->query($query) === TRUE) {
        header("Location: index.php?alert=registerberhasil");
        exit();
    } else {
        echo "Error: " . $query . "<br>" . $conn->$error;
    }
    // Tutup koneksi database
    $conn->close();
}