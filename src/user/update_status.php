<?php
// Termasuk file koneksi
include '../database/connect.php';
session_start();

// Cek apakah email, U_BEM, U_BLM, dan U_Status dikirimkan melalui POST
if (isset($_POST['email'], $_POST['U_Status'], $_POST['U_BEM'], $_POST['U_BLM'])) {
    $email = $_POST['email'];
    $u_status = $_POST['U_Status'];
    $u_bem = $_POST['U_BEM'];
    $u_blm = $_POST['U_BLM'];

    // Update status, U_BEM, dan U_BLM di tabel User berdasarkan email
    $sql = "UPDATE User SET U_Status = ?, U_BEM = ?, U_BLM = ? WHERE U_Email = ?";
    $stmt = $conn->prepare($sql);

    // Bind parameter
    $stmt->bind_param('ssss', $u_status, $u_bem, $u_blm, $email);

    // Eksekusi query
    if ($stmt->execute()) {
        // Hancurkan sesi untuk logout pengguna setelah sukses
        session_destroy();

        // Kirim response sukses jika berhasil
        echo json_encode(['success' => true]);
    } else {
        // Kirim response gagal jika ada error
        echo json_encode(['success' => false]);
    }

    // Tutup statement
    $stmt->close();
} else {
    // Jika data tidak lengkap
    echo json_encode(['success' => false, 'message' => 'Data tidak lengkap']);
}

// Tutup koneksi
$conn->close();
?>
