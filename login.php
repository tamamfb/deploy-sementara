<?php
// Termasuk file koneksi
include 'src/database/connect.php'; 

// Inisialisasi pesan kesalahan
$errorMessage = "";

// Cek apakah form login disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil data dari form
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Query untuk mengecek email dan password
    $query = "SELECT * FROM user WHERE U_Email = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Data ditemukan, cek password
        $user = $result->fetch_assoc();
        
        // Cek apakah password cocok
        if (password_verify($password, $user['U_Password'])) {
            // Cek U_Status
            if ($user['U_Status'] == 1) {
                // Status 1, tampilkan pesan bahwa pengguna hanya dapat memilih sekali
                $errorMessage = "Anda hanya dapat memilih sekali!";
            } else {
                // Set session untuk email dan role
                session_start();
                $_SESSION['email'] = $user['U_Email'];
                $_SESSION['role'] = $user['U_Role'];

                // Cek role dan arahkan ke halaman yang sesuai
                if ($user['U_Role'] == 0) {
                    // Admin, arahkan ke admin.php
                    header("Location: src/admin/admin.php");
                    exit();
                } elseif ($user['U_Role'] == 1) {
                    // User, arahkan ke bem.php
                    header("Location: src/user/bem.php");
                    exit();
                }
            }
        } else {
            // Password tidak cocok
            $errorMessage = "Username atau Password salah!";
        }
    } else {
        // Email tidak ditemukan
        $errorMessage = "Username tidak ditemukan!";
    }

    // Tutup koneksi
    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link href="src/output.css" rel="stylesheet" />
    <title>Login Page</title>
    <style>
        .load {
            animation: transitionIn 0.75s;
        }

        @keyframes transitionIn {
            from {
                opacity: 0;
                transform: rotateX(-10deg);
            }
            to {
                opacity: 1;
                transform: rotateX(0);
            }
        }

        .error-message {
            background-color: #fddede;
            color: #9b2c2c;
            padding: 10px;
            border: 1px solid #9b2c2c;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        .thank-you-message {
            background-color: #d1fae5;
            color: #047857;
            border: 1px solid #047857;
            padding: 10px;
            font-weight: bold;
            text-align: center;
            border-radius: 5px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body class="bg-gray-50 flex flex-col items-center justify-center min-h-screen">

    <div class="w-full max-w-md bg-white shadow-lg rounded-lg load">
        
        <!-- Pesan Terima Kasih -->
        <div id="thankYouMessage" class="thank-you-message hidden">
            Terima kasih telah memilih
        </div>

        <!-- Pesan kesalahan -->
        <?php if ($errorMessage != ""): ?>
        <div class="error-message text-center" id="error-message hidden">
            <?= $errorMessage ?>
        </div>
        <?php endif; ?>

        <!-- Form Login -->
        <div class="p-6">
            <h2 class="text-2xl font-bold mb-6 text-center">LOGIN</h2>
            <form action="login.php" method="POST">
                <div class="mb-4">
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-700">
                        Username
                    </label>
                    <input
                        type="text"
                        id="email"
                        name="email"
                        placeholder="Masukkan username"
                        class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-red-400"
                        required
                    />
                </div>
                <div class="mb-4">
                    <label for="password" class="block mb-2 text-sm font-medium text-gray-700">
                        Password
                    </label>
                    <input
                        type="password"
                        id="password"
                        name="password"
                        placeholder="Masukkan password"
                        class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-red-400"
                        required
                    />
                </div>
                <button type="submit" class="w-full bg-red-500 text-white py-2 px-4 rounded hover:bg-red-300 transition-colors cursor-pointer">
                    Login
                </button>
            </form>
        </div>
    </div>

    <script>
        // Cek apakah pengguna datang dari 'konfirmasi.php'
        if (document.referrer.includes('konfirmasi.php')) {
            document.getElementById('thankYouMessage').classList.remove('hidden');
        }

        // Cek apakah ada error message yang tersimpan di sessionStorage
        if (sessionStorage.getItem('errorMessage')) {
            // Tampilkan pesan error jika ada
            const errorMessage = sessionStorage.getItem('errorMessage');
            const errorDiv = document.getElementById('error-message');
            errorDiv.textContent = errorMessage;
            errorDiv.classList.remove('hidden');
            // Hapus pesan error dari sessionStorage setelah ditampilkan
            sessionStorage.removeItem('errorMessage');
        }
    </script>
</body>
</html>
