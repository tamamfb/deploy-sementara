<?php
// Termasuk file koneksi
include '../database/connect.php'; // sesuaikan path sesuai folder tempat koneksi.php berada
session_start();

// Cek apakah user sudah login dan memiliki role user
if (!isset($_SESSION['email']) || $_SESSION['role'] != 1) {
    // Jika tidak login atau bukan user, redirect ke login.php
    header("Location: ../home/login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link href="../output.css" rel="stylesheet" />
    <title>Konfirmasi</title>
    <style>
        .load {
            animation: transitionIn 0.75s;
        }

        .keren {
            animation: scroll 15s linear infinite;
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

        @keyframes scroll {
            to {
                transform: translateX(calc(-100% - 32px));
            }
        }

        .hidden {
            display: none;
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

<body class="flex flex-col min-h-screen bg-gray-50">
    <!-- navbar -->
    <nav class="flex items-center justify-between p-4 md:p-6 lg:p-8 w-full bg-red-950">
        <div class="flex items-center space-x-4 md:space-x-6 overflow-hidden" style="user-select: none;">
            <img src="../../assets/logo.png" alt="logo" class="h-12 md:h-16 lg:h-20 object-contain" />

            <div class="border-l-2 border-white h-12 md:h-16 lg:h-20"></div>

            <div class="flex overflow-hidden whitespace-nowrap gap-8">
                <div class="inline-flex whitespace-nowrap gap-8 relative keren">
                    <p class="text-white text-3xl md:text-4xl lg:text-5xl font-semibold">
                        PILIHLAH DENGAN BIJAK
                    </p>
                    <p class="text-white text-3xl md:text-4xl lg:text-5xl font-semibold">
                        PILIHLAH DENGAN BIJAK
                    </p>
                    <p class="text-white text-3xl md:text-4xl lg:text-5xl font-semibold">
                        PILIHLAH DENGAN BIJAK
                    </p>
                    <p class="text-white text-3xl md:text-4xl lg:text-5xl font-semibold">
                        PILIHLAH DENGAN BIJAK
                    </p>
                    <p class="text-white text-3xl md:text-4xl lg:text-5xl font-semibold">
                        PILIHLAH DENGAN BIJAK
                    </p>
                </div>
                <div class="inline-flex whitespace-nowrap gap-8 relative keren">
                    <p class="text-white text-3xl md:text-4xl lg:text-5xl font-semibold">
                        PILIHLAH DENGAN BIJAK
                    </p>
                    <p class="text-white text-3xl md:text-4xl lg:text-5xl font-semibold">
                        PILIHLAH DENGAN BIJAK
                    </p>
                    <p class="text-white text-3xl md:text-4xl lg:text-5xl font-semibold">
                        PILIHLAH DENGAN BIJAK
                    </p>
                    <p class="text-white text-3xl md:text-4xl lg:text-5xl font-semibold">
                        PILIHLAH DENGAN BIJAK
                    </p>
                    <p class="text-white text-3xl md:text-4xl lg:text-5xl font-semibold">
                        PILIHLAH DENGAN BIJAK
                    </p>
                </div>
                <div class="inline-flex whitespace-nowrap gap-8 relative keren">
                    <p class="text-white text-3xl md:text-4xl lg:text-5xl font-semibold">
                        PILIHLAH DENGAN BIJAK
                    </p>
                    <p class="text-white text-3xl md:text-4xl lg:text-5xl font-semibold">
                        PILIHLAH DENGAN BIJAK
                    </p>
                    <p class="text-white text-3xl md:text-4xl lg:text-5xl font-semibold">
                        PILIHLAH DENGAN BIJAK
                    </p>
                    <p class="text-white text-3xl md:text-4xl lg:text-5xl font-semibold">
                        PILIHLAH DENGAN BIJAK
                    </p>
                    <p class="text-white text-3xl md:text-4xl lg:text-5xl font-semibold">
                        PILIHLAH DENGAN BIJAK
                    </p>
                </div>
            </div>
        </div>
    </nav>
    <!-- Main Content -->
    <main class="flex-grow flex flex-col items-center mt-12 w-full px-4 load">
        <!-- Steps -->
        <div class="flex items-center justify-between gap-8 mb-12 max-w-3xl" style="user-select: none;">
            <div class="flex flex-col items-center gap-2">
                <div class="flex justify-center items-center w-12 h-12 bg-blue-700 text-white rounded-full text-xl font-semibold">
                    &#10003;
                </div>
                <span class="text-black text-center font-semibold text-sm">Calon Ketua-Wakil BEM</span>
            </div>
            <div class="flex flex-col items-center gap-2">
                <div class="flex justify-center items-center w-12 h-12 bg-blue-700 text-white rounded-full text-xl font-semibold">
                    &#10003;
                </div>
                <span class="text-black text-center font-semibold text-sm">Calon Ketua BLM</span>
            </div>
            <div class="flex flex-col items-center gap-2">
                <div class="flex justify-center items-center w-12 h-12 bg-blue-700 text-white rounded-full text-xl font-semibold">
                    3
                </div>
                <span class="text-black text-center font-bold text-sm">Konfirmasi Pilihan</span>
            </div>
        </div>

        <!-- Konfirmasi Pilihan -->
        <h2 class="text-2xl font-bold mb-8 text-gray-800" style="user-select: none;">Konfirmasi Pilihan Anda</h2>
        <div class="w-full max-w-3xl p-6 bg-white rounded-lg shadow-lg">
            <!-- Pilihan Ketua-Wakil BEM -->
            <div class="mb-8">
                <h3 class="text-xl font-semibold text-gray-800">Pilihan Calon Ketua-Wakil BEM</h3>
                <div class="flex items-center mt-4">
                    <img id="bemFoto" class="w-24 h-24 object-cover rounded-lg border border-gray-300 shadow-sm" alt="Foto Ketua-Wakil BEM" />
                    <p id="bemNama" class="text-lg text-gray-700 font-medium ml-6">Loading...</p>
                </div>
            </div>

            <!-- Pilihan Ketua BLM -->
            <div>
                <h3 class="text-xl font-semibold text-gray-800">Pilihan Calon Ketua BLM</h3>
                <div class="flex items-center mt-4">
                    <img id="blmFoto" class="w-24 h-24 object-cover rounded-lg border border-gray-300 shadow-sm" alt="Foto Ketua BLM" />
                    <p id="blmNama" class="text-lg text-gray-700 font-medium ml-6">Loading...</p>
                </div>
            </div>
        </div>

        <!-- Checkbox Konfirmasi -->
        <div class="mt-6 flex items-center" style="user-select: none;">
            <input type="checkbox" id="confirmCheckbox" class="w-5 h-5 text-blue-600">
            <label for="confirmCheckbox" class="ml-2 text-gray-700 text-xl">Saya yakin dengan pilihan saya</label>
        </div>

        <!-- Tombol Pilih -->
        <button id="pilihButton" class="mt-4 px-6 py-3 bg-gray-400 text-white font-bold rounded-lg cursor-not-allowed" disabled>
            Pilih
        </button>
    </main>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-4 w-full mt-10">
        <div class="text-center text-sm">
            <p>Hak Cipta &copy; 2025 - Di design oleh @tamam_fb</p>
        </div>
    </footer>

    <!-- Script -->
    <script>
        // Cek nilai bemChoice dan blmChoice di localStorage
        const bemChoice = localStorage.getItem('bemChoice');
        const blmChoice = localStorage.getItem('blmChoice');

        // Log nilai untuk memverifikasi
        console.log('bemChoice:', bemChoice);
        console.log('blmChoice:', blmChoice);

        // Definisikan data calon BEM berdasarkan nomor pilihan
        const bemData = {
            1: { name: "Muhammad Faishal Rizkiawan Kodiri & Muhammad Yassaar Aziz", photo: "../../assets/BEM.png" },
            2: { name: "Kotak Kosong", photo: "../../assets/kosong.jpg" },
        };

        // Definisikan data calon BLM berdasarkan nomor pilihan
        const blmData = {
            1: { name: "Revido Al Firmansyah", photo: "../../assets/BLM.png" },
            2: { name: "Kotak Kosong", photo: "../../assets/kosong.jpg" },
        };

        // Ambil pilihan dari localStorage
        const bemChoiceNumber = parseInt(localStorage.getItem('bemChoice'));
        const blmChoiceNumber = parseInt(localStorage.getItem('blmChoice'));
        const confirmCheckbox = document.getElementById('confirmCheckbox');
        const pilihButton = document.getElementById('pilihButton');

        // Tampilkan data BEM
        if (bemChoiceNumber && bemData[bemChoiceNumber]) {
            document.getElementById('bemNama').textContent = bemData[bemChoiceNumber].name;
            document.getElementById('bemFoto').src = bemData[bemChoiceNumber].photo;
            document.getElementById('bemFoto').classList.remove('hidden');
        } else {
            document.getElementById('bemNama').textContent = 'Belum Memilih';
            document.getElementById('bemFoto').classList.add('hidden');
        }

        // Tampilkan data BLM
        if (blmChoiceNumber && blmData[blmChoiceNumber]) {
            document.getElementById('blmNama').textContent = blmData[blmChoiceNumber].name;
            document.getElementById('blmFoto').src = blmData[blmChoiceNumber].photo;
            document.getElementById('blmFoto').classList.remove('hidden');
        } else {
            document.getElementById('blmNama').textContent = 'Belum Memilih';
            document.getElementById('blmFoto').classList.add('hidden');
        }

        // Event listener untuk checkbox konfirmasi
        confirmCheckbox.addEventListener('change', function () {
            if (this.checked) {
                pilihButton.disabled = false;
                pilihButton.classList.remove('bg-gray-400', 'cursor-not-allowed');
                pilihButton.classList.add('bg-blue-700', 'cursor-pointer');
            } else {
                pilihButton.disabled = true;
                pilihButton.classList.remove('bg-blue-700', 'cursor-pointer');
                pilihButton.classList.add('bg-gray-400', 'cursor-not-allowed');
            }
        });

        // Event listener untuk tombol Pilih
        pilihButton.addEventListener('click', function() {
            if (!pilihButton.disabled) {
                // Ambil nilai bemChoice dan blmChoice dari localStorage
                const bemChoiceValue = localStorage.getItem('bemChoice');
                const blmChoiceValue = localStorage.getItem('blmChoice');

                // Kirim permintaan untuk memperbarui status U_Status, U_BEM, dan U_BLM
                fetch('update_status.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: `email=${encodeURIComponent('<?php echo $_SESSION['email']; ?>')}&U_Status=1&U_BEM=${encodeURIComponent(bemChoiceValue)}&U_BLM=${encodeURIComponent(blmChoiceValue)}`
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        window.location.href = '../home/login.php'; // Redirect jika berhasil
                    } else {
                        alert('Gagal memperbarui status');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Terjadi kesalahan, coba lagi');
                });
            }
        });

    </script>
</body>

</html>
