<?php
$host = 'localhost'; // Nama host database
$username = 'root'; // Username database
$password = ''; // Password database
<<<<<<< HEAD
$database = 'basoMas'; // Nama database
=======
$database = 'basomas'; // Nama database
>>>>>>> b79c358d0772730ee00d1d9433fd465eeab52ee3
// Buat koneksi
$conn = new mysqli($host, $username, $password, $database);
// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
// Jika koneksi berhasil, dapatkan pesan sukses
<<<<<<< HEAD
//echo "Koneksi berhasil";
=======
echo "Koneksi berhasil";
>>>>>>> b79c358d0772730ee00d1d9433fd465eeab52ee3
?>