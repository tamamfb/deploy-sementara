<?php
session_start();
include '../database/connect.php'; 
// Cek apakah user sudah login dan memiliki role user
if (!isset($_SESSION['email']) || $_SESSION['role'] != 0) {
    // Jika tidak login atau bukan user, redirect ke login.php
    header("Location: ../home/login.php");
    exit();
}
// Query untuk menghitung suara BEM
$query_bem = "SELECT U_BEM, COUNT(*) AS total_votes FROM User WHERE U_BEM IS NOT NULL GROUP BY U_BEM";
$result_bem = mysqli_query($conn, $query_bem);

// Menyimpan hasil BEM ke dalam array
$votes_bem = [0, 0, 0]; // Index 0 untuk paslon 1, 1 untuk paslon 2, 2 untuk paslon 3
while ($row = mysqli_fetch_assoc($result_bem)) {
    $votes_bem[$row['U_BEM'] - 1] = $row['total_votes'];
}

// Query untuk menghitung suara BLM
$query_blm = "SELECT U_BLM, COUNT(*) AS total_votes FROM User WHERE U_BLM IS NOT NULL GROUP BY U_BLM";
$result_blm = mysqli_query($conn, $query_blm);

// Menyimpan hasil BLM ke dalam array
$votes_blm = [0, 0]; // Index 0 untuk paslon A, 1 untuk paslon B
while ($row = mysqli_fetch_assoc($result_blm)) {
    $votes_blm[$row['U_BLM'] - 1] = $row['total_votes'];
}

// Kembalikan data dalam format JSON
echo json_encode([
    'votes_bem' => $votes_bem,
    'votes_blm' => $votes_blm,
]);
?>
