<?php
// koneksi.php
$host = '147.93.20.80'; // atau IP database server
$user = 'webuser'; // username untuk koneksi ke DB
$pass = 'Tamamfajar01@'; // password untuk koneksi ke DB
$dbname = 'upn'; // ganti dengan nama database yang kamu pakai

// $host = 'localhost'; // Menggunakan localhost untuk koneksi lokal
// $user = 'root'; // Username default untuk koneksi lokal
// $pass = ''; // Password default biasanya kosong di server lokal (XAMPP, MAMP, WAMP, dll.)
// $dbname = 'upn'; // Ganti dengan nama database yang digunakan
// Membuat koneksi
$conn = new mysqli($host, $user, $pass, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>