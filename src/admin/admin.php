<?php
session_start();
include '../database/connect.php'; 
// Cek apakah user sudah login dan memiliki role user
if (!isset($_SESSION['email']) || $_SESSION['role'] != 0) {
    // Jika tidak login atau bukan user, redirect ke login.php
    header("Location: ../../login.php");
    exit();
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Live Count</title>
    <style>
        .load {
            animation: transitionIn 0.75s;
        }

        .keren {
            animation: gerak 15s linear infinite;
        }

        .scroll {
            animation: appear linear;
            animation-timeline: view();
            animation-range: entry 0% cover 30%;
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

        @keyframes gerak {
            to {
                transform: translateX(calc(-100% - 32px));
            }
        }

        @keyframes appear {
            from {
                opacity: 0;
                transform: translateX(-100px);
            }
            
            to {
                opacity: 1;
                transform: translateX(0px);
            }
        }
        /* Animasi perubahan angka */
        .count-animate {
            transition: transform 0.3s ease-in-out, opacity 0.3s ease-in-out;
        }

        /* Flexbox di body */
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        main {
            flex-grow: 1;
        }
    </style>
</head>
<body class="flex flex-col min-h-screen bg-gray-100">
    <!-- navbar -->
    <nav class="flex items-center justify-between p-4 md:p-6 lg:p-8 w-full bg-red-950">
        <div class="flex items-center space-x-4 md:space-x-6 overflow-hidden" style="user-select: none;">
            <img src="../../assets/logo.png" alt="logo" class="h-12 md:h-16 lg:h-20 object-contain" />

            <div class="border-l-2 border-white h-12 md:h-16 lg:h-20"></div>

            <div class="flex overflow-hidden whitespace-nowrap gap-8">
                <div class="inline-flex whitespace-nowrap gap-8 relative keren">
                    <p class="text-white text-3xl md:text-4xl lg:text-5xl font-semibold">
                        LIVE COUNT
                    </p>
                    <p class="text-white text-3xl md:text-4xl lg:text-5xl font-semibold">
                        LIVE COUNT
                    </p>
                    <p class="text-white text-3xl md:text-4xl lg:text-5xl font-semibold">
                        LIVE COUNT
                    </p>
                    <p class="text-white text-3xl md:text-4xl lg:text-5xl font-semibold">
                        LIVE COUNT
                    </p>
                    <p class="text-white text-3xl md:text-4xl lg:text-5xl font-semibold">
                        LIVE COUNT
                    </p>
                </div>
                <div class="inline-flex whitespace-nowrap gap-8 relative keren">
                    <p class="text-white text-3xl md:text-4xl lg:text-5xl font-semibold">
                        LIVE COUNT
                    </p>
                    <p class="text-white text-3xl md:text-4xl lg:text-5xl font-semibold">
                        LIVE COUNT
                    </p>
                    <p class="text-white text-3xl md:text-4xl lg:text-5xl font-semibold">
                        LIVE COUNT
                    </p>
                    <p class="text-white text-3xl md:text-4xl lg:text-5xl font-semibold">
                        LIVE COUNT
                    </p>
                    <p class="text-white text-3xl md:text-4xl lg:text-5xl font-semibold">
                        LIVE COUNT
                    </p>
                </div>
                <div class="inline-flex whitespace-nowrap gap-8 relative keren">
                    <p class="text-white text-3xl md:text-4xl lg:text-5xl font-semibold">
                        LIVE COUNT
                    </p>
                    <p class="text-white text-3xl md:text-4xl lg:text-5xl font-semibold">
                        LIVE COUNT
                    </p>
                    <p class="text-white text-3xl md:text-4xl lg:text-5xl font-semibold">
                        LIVE COUNT
                    </p>
                    <p class="text-white text-3xl md:text-4xl lg:text-5xl font-semibold">
                        LIVE COUNT
                    </p>
                    <p class="text-white text-3xl md:text-4xl lg:text-5xl font-semibold">
                        LIVE COUNT
                    </p>
                </div>
            </div>
        </div>
    </nav>
    <main class="flex flex-col items-center w-full px-4 py-10 space-y-10">
        <!-- Live Count BEM -->
        <section class="w-full max-w-4xl bg-white p-6 shadow-md rounded-lg">
            <h2 class="text-2xl font-bold text-gray-800 mb-4">Live Count - BEM</h2>
            <div id="bemContainer" class="space-y-6">
                <?php
                $paslon_bem = [
                    ['id' => 1, 'name' => 'Muhammad Faishal Rizkiawan Kodiri & Muhammad Yassaar Aziz', 'img' => '../../assets/BEM.png'],
                    ['id' => 2, 'name' => 'Kotak Kosong', 'img' => '../../assets/kosong.jpg'],
                ];
                foreach ($paslon_bem as $paslon) {
                ?>
                <div class="flex items-center bg-gray-100 p-4 rounded-lg shadow-sm">
                    <div class="flex-shrink-0 flex items-center space-x-4">
                        <img src="<?= $paslon['img'] ?>" alt="Foto <?= $paslon['name'] ?>" class="w-20 h-20 rounded-lg border border-gray-300">
                        <div class="text-xl font-bold"><?= $paslon['id'] ?></div>
                    </div>
                    <div class="flex-1 ml-6">
                        <h3 class="text-lg font-semibold"><?= $paslon['name'] ?></h3>
                        <div class="relative w-full bg-gray-300 h-6 rounded-lg mt-2">
                            <div id="progress-bem-<?= $paslon['id'] ?>" class="progress-bar absolute top-0 left-0 h-full bg-blue-500 rounded-lg transition-all duration-500" style="width: 0%;"></div>
                        </div>
                        <p id="vote-<?= $paslon['id'] ?>" class="text-sm font-semibold mt-1 count-animate">0 Suara</p>
                    </div>
                </div>
                <?php } ?>
            </div>
        </section>

        <!-- Live Count BLM -->
        <section class="w-full max-w-4xl bg-white p-6 shadow-md rounded-lg">
            <h2 class="text-2xl font-bold text-gray-800 mb-4">Live Count - BLM</h2>
            <div id="blmContainer" class="space-y-6">
                <?php
                $paslon_blm = [
                    ['id' => 'A', 'name' => 'Revido Al Firmansyah', 'img' => '../../assets/BLM.png'],
                    ['id' => 'B', 'name' => 'Kotak Kosong', 'img' => '../../assets/kosong.jpg'],
                ];
                foreach ($paslon_blm as $paslon) {
                ?>
                <div class="flex items-center bg-gray-100 p-4 rounded-lg shadow-sm">
                    <div class="flex-shrink-0 flex items-center space-x-4">
                        <img src="<?= $paslon['img'] ?>" alt="Foto <?= $paslon['name'] ?>" class="w-20 h-20 rounded-lg border border-gray-300">
                        <div class="text-xl font-bold"><?= $paslon['id'] ?></div>
                    </div>
                    <div class="flex-1 ml-6">
                        <h3 class="text-lg font-semibold"><?= $paslon['name'] ?></h3>
                        <div class="relative w-full bg-gray-300 h-6 rounded-lg mt-2">
                            <div id="progress-blm-<?= $paslon['id'] ?>" class="progress-bar absolute top-0 left-0 h-full bg-green-500 rounded-lg transition-all duration-500" style="width: 0%;"></div>
                        </div>
                        <p id="vote-<?= $paslon['id'] ?>" class="text-sm font-semibold mt-1 count-animate">0 Suara</p>
                    </div>
                </div>
                <?php } ?>
            </div>
        </section>
    </main>
    <!-- Tombol Logout -->
    <div class="w-full flex justify-center my-6">
        <a href="logout.php" class="bg-red-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-red-700 transition-all">
            Logout
        </a>
    </div>

    <!-- Footer-->
    <footer class="bg-gray-900 text-white py-4 w-full mt-10" style="user-select: none;">
        <div class="text-center text-sm">
            <p>Hak Cipta &copy; 2025 - Di design oleh @tamam_fb</p>
        </div>
    </footer>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function updateLiveCount() {
            $.getJSON('live_count_data.php', function(data) {
                console.log(data); // Debugging untuk memastikan data yang diterima benar

                let totalVotesBEM = data.votes_bem.reduce((a, b) => a + b, 0);
                let totalVotesBLM = data.votes_blm.reduce((a, b) => a + b, 0);
                
                let totalPemilih = 1779; // ganti dengan jumlah pemilih nanti

                // Update Progress Bar BEM
                for (let i = 0; i < 3; i++) {
                    let percentage = totalPemilih > 0 ? (data.votes_bem[i] / totalPemilih) * 100 : 0;
                    $('#vote-' + (i + 1)).text(data.votes_bem[i] + ' Suara');
                    $('#progress-bem-' + (i + 1)).css('width', percentage + '%');
                }

                // Update Progress Bar BLM
                ['A', 'B'].forEach((id, i) => {
                    let percentage = totalPemilih > 0 ? (data.votes_blm[i] / totalPemilih) * 100 : 0;
                    $('#vote-' + id).text(data.votes_blm[i] + ' Suara');
                    $('#progress-blm-' + id).css('width', percentage + '%');
                });

                // Tambahkan informasi total pemilih
                $('#total-votes').text('Total Pemilih: ' + totalPemilih);
            });
        }

        // Jalankan saat halaman pertama kali dimuat dan update tiap detik
        $(document).ready(function () {
            updateLiveCount();
            setInterval(updateLiveCount, 1000);
        });


    </script>
</body>
</html>
