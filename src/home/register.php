<?php
// Termasuk file koneksi
include '../database/connect.php'; // Sesuaikan path sesuai lokasi koneksi.php

// Inisialisasi pesan kesalahan
$errorMessage = "";

// Tentukan path file CSV
$csvFile = 'data.csv'; // Ganti dengan path ke file CSV Anda

// Periksa apakah file CSV ada
if (file_exists($csvFile)) {
    // Membuka file CSV
    if (($handle = fopen($csvFile, 'r')) !== FALSE) {
        // Lewati header CSV jika ada
        fgetcsv($handle);

        // Membuat array untuk menampung data yang akan di-insert
        $batchData = [];

        // Membaca setiap baris dalam file CSV
        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
            // Ambil data dari CSV (misalnya, kolom pertama = NPM, kolom kedua = PASSWORD)
            $email = trim($data[0]);  // NPM digunakan sebagai email
            $password = trim($data[1]);  // Password

            // Hash password sebelum disimpan
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            // Nilai tetap lainnya
            $role = 1; // U_Role = 1
            $status = null; 
            $bem = null; // U_BEM dikosongi
            $blm = null; // U_BLM dikosongi

            // Menambahkan data ke dalam array batch
            $batchData[] = [$email, $hashedPassword, $role, $bem, $blm, $status];
        }

        // Tutup file CSV setelah selesai
        fclose($handle);

        // Memulai transaksi
        $conn->begin_transaction();

        try {
            // Batch insert ke database
            $insertQuery = "INSERT INTO user (U_Email, U_Password, U_Role, U_BEM, U_BLM, U_Status) VALUES (?, ?, ?, ?, ?, ?)";
            $stmt_insert = $conn->prepare($insertQuery);

            foreach ($batchData as $data) {
                // Mengikat parameter dan mengeksekusi query untuk setiap data
                $stmt_insert->bind_param('ssiiss', $data[0], $data[1], $data[2], $data[3], $data[4], $data[5]);
                $stmt_insert->execute();
            }

            // Commit transaksi
            $conn->commit();
            echo "Data berhasil dimasukkan ke dalam database.";
        } catch (Exception $e) {
            // Rollback transaksi jika terjadi error
            $conn->rollback();
            $errorMessage = "Terjadi kesalahan saat registrasi: " . $e->getMessage();
        }

        // Menutup statement insert
        $stmt_insert->close();

        if (!empty($errorMessage)) {
            echo "Error: " . $errorMessage;
        }
    } else {
        echo "Gagal membuka file CSV!";
    }
} else {
    echo "File CSV tidak ditemukan!";
}

// Tutup koneksi
$conn->close();
?>
