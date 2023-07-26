<?php
// Cek apakah form telah disubmit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    session_start(); // Memulai session
    // Lakukan operasi pengecekan login di database
    require_once('connect.php');
    // Query untuk memeriksa kecocokan email dan password di tabel pengguna
    // Buat query untuk mengecek apakah terdapat user dengan email X dan password Y, jika ya maka login berhasil
    $email = $_POST['email'];
    $password = $_POST['password'];
    $query = "SELECT * FROM user WHERE email = '$email' AND password = '$password'";
    $result = $conn->query($query);
    if ($result->num_rows > 0) {
        session_start(); // Memulai session
        // Login berhasil, simpan data pengguna ke dalam session
        $user = $result->fetch_assoc();
        // ISI_DISINI
        // Ubah X, Y, Z dengan session agar menyimpan data yang tadi berhasil login kedalam session
        $_SESSION['user_id'] = $user['user_id'];
        $_SESSION['role_id'] = $user['role_id'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['nama_lengkap'] = $user['nama_lengkap'];

        $admin = 1;
        // Login berhasil, redirect ke halaman utama
        if($user['role_id'] = $admin) {
            header("Location: admin/restaurant/tables.php");
        }
        else{
            header("Location: index.php?alert=berhasil&idUser=". $_SESSION['user_id']);
        echo "Login berhasil";
        exit();
        }        
    } else {
        echo "Login gagal. Silakan cek kembali email dan password Anda.";
    }
    // Tutup koneksi database
    $conn->close();
}