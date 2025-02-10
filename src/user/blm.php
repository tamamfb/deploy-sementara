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
    <title>Calon Ketua BLM</title>
    <style>
        .keren {
            animation: gerak 15s linear infinite;
        }


        @keyframes gerak {
            to {
                transform: translateX(calc(-100% - 32px));
            }
        }
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
    </style>
</head>

<body class="flex flex-col min-h-screen">
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
    <!-- utama -->
    <main class="flex flex-col flex-grow items-center mt-10 w-full px-4 load">
        <div class="flex items-center justify-between gap-8 mb-8 w-full max-w-4xl" style="user-select: none;">
            <div class="flex flex-col items-center gap-2 w-1/3">
                <div
                    class="flex justify-center items-center w-12 h-12 bg-blue-700 text-white rounded-full text-xl font-semibold">
                    &#10003;
                </div>
                <span class="text-black text-center min-h-[48px] text-sm">Calon Ketua-Wakil BEM</span>
            </div>
            <div class="flex flex-col items-center gap-2 w-1/3">
                <div
                    class="flex justify-center items-center w-12 h-12 bg-blue-700 text-white rounded-full text-xl font-semibold">
                    2
                </div>
                <span class="text-black text-center min-h-[48px] font-bold text-sm">Calon Ketua BLM</span>
            </div>
            <div class="flex flex-col items-center gap-2 w-1/3">
                <div
                    class="flex justify-center items-center w-12 h-12 bg-gray-300 text-white rounded-full text-xl font-semibold">
                    3
                </div>
                <span class="text-gray-400 text-center min-h-[48px] text-sm">Konfirmasi Pilihan</span>
            </div>
        </div>

        <!-- paslon 1 -->
        <div class="bg-gray-200 rounded-2xl p-6 w-full max-w-4xl shadow-md scroll">
            <div class="flex flex-col md:flex-row items-center gap-10">
                <!-- Foto -->
                <div class="flex flex-col items-center" style="user-select: none;">
                    <img src="../../assets/BLM.png" alt="Photo"
                        class="w-48 h-48 object-cover rounded-lg shadow-md" />
                    <p class="mt-4 bg-black text-white rounded-full px-4 py-2 text-center text-lg font-bold">01</p>
                    <p class="mt-2 text-gray-800 text-lg font-semibold">Revido Al Firmansyah</p>
                </div>
                <div class="flex flex-col w-full">
                    <div class="flex flex-col w-full">
                        <!-- Visi -->
                        <div class="mb-4">
                            <h3 class="text-xl font-bold text-gray-800">VISI</h3>
                            <p class="text-gray-700 mt-2 text-justify">
                            Menjadi Badan Legislatif Mahasiswa Fakultas Hukum yang inovatif, transparan, dan partisipatif dalam memperjuangkan hak-hak mahasiswa serta berkontribusi pada pengembangan legislasi di lingkup fakultas hukum.
                            </p>
                        </div>
                        <!-- Misi -->
                        <div>
                            <h3 class="text-xl font-bold text-gray-800">MISI</h3>
                            <ul class="list-disc pl-8 text-gray-700 mt-2 space-y-2 text-justify">
                                <li>Menampung aspirasi mahasiswa dengan cara membangun platform komunikasi yang efektif dan inovatif.</li>
                                <li>Legislasi berbasis riset dengan cara mengembangkan produk legislasi yang berdasarkan riset mendalam dan didasari kebutuhan nyata mahasiswa.</li>
                                <li>Melakukan pengawasan aktif terhadap Badan Eksekutif Mahasiswa dan kebijakan fakultas untuk memastikan transparansi, akuntabilitas, dan keadilan dalam pengelolaan sumber daya.</li>
                                <li>Menjalin kerja sama yang harmonis dengan dosen, administrasi fakultas, dan organisasi kemahasiswaan lainnya untuk memperkuat sinergi dalam mencapai tujuan bersama.</li>
                                <li>Mengadakan program pendidikan dan pelatihan bagi mahasiswa untuk meningkatkan pemahaman tentang hukum, etika profesi, serta pemahaman lebih mendalam mengenai legislasi.</li>
                            </ul>
                        </div>
                    </div>
                    <!-- Tombol Pilih -->
                    <div class="mt-6">
                        <button
                            style="user-select: none;"
                            class="w-full border-2 bg-red-950 hover:bg-white text-white hover:text-red-950 hover:border-red-950 px-6 py-2 rounded-lg text-lg font-semibold cursor-pointer pilih-button"
                            onclick="pilihCalon(1)">
                            PILIH
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- paslon 2 -->
        <div class="bg-gray-200 rounded-2xl p-6 w-full max-w-4xl shadow-md mt-10 scroll">
            <div class="flex flex-col md:flex-row items-center gap-10">
                <!-- Foto -->
                <div class="flex flex-col items-center" style="user-select: none;">
                    <img src="../../assets/kosong.jpg" alt="Photo"
                        class="w-48 h-48 object-cover rounded-lg shadow-md" />
                    <p class="mt-4 bg-black text-white rounded-full px-4 py-2 text-center text-lg font-bold">02</p>
                    <p class="mt-2 text-gray-800 text-lg font-semibold">Kotak Kosong</p>
                </div>
                <div class="flex flex-col w-full">
                    <div class="mt-6">
                        <button
                            style="user-select: none;"
                            class="w-full border-2 bg-red-950 hover:bg-white text-white hover:text-red-950 hover:border-red-950 px-6 py-2 rounded-lg text-lg font-semibold cursor-pointer pilih-button"
                            onclick="pilihCalon(2)">
                            PILIH
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- Modal Konfirmasi -->
    <div id="confirmationModal" class="fixed inset-0 hidden items-center justify-center bg-black/30 backdrop-blur-sm z-50">
        <div class="bg-white rounded-lg p-6 w-80 shadow-lg">
            <h3 class="text-xl font-semibold text-gray-800 mb-4">Konfirmasi Pilihan</h3>
            <p class="text-gray-600 mb-6">Apakah Anda yakin dengan pilihan Anda?</p>
            <div class="flex justify-end gap-4">
                <button id="cancelButton" class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-4 py-2 rounded-lg cursor-pointer">
                    Belum
                </button>
                <button id="confirmButton" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg cursor-pointer">
                    Yakin
                </button>
            </div>
        </div>
    </div>
    <!-- Footer-->
    <footer class="bg-gray-900 text-white py-4 w-full mt-10" style="user-select: none;">
        <div class="text-center text-sm">
            <p>Hak Cipta &copy; 2025 - Di design oleh @tamam_fb</p>
        </div>
    </footer>

    <script>
        // Mendapatkan elemen tombol "Pilih" dan modal
        const buttons = document.querySelectorAll('.pilih-button');
        const modal = document.getElementById('confirmationModal');
        const cancelButton = document.getElementById('cancelButton');
        const confirmButton = document.getElementById('confirmButton');
        let selectedChoice = 0; // Menyimpan pilihan yang dipilih (1, 2, atau 3)

        // Fungsi untuk menangani pemilihan calon
        function pilihCalon(choice) {
            selectedChoice = choice; // Menyimpan pilihan yang dipilih
            modal.classList.remove('hidden'); // Menampilkan modal konfirmasi
            modal.classList.add('flex'); // Pastikan modal terlihat
        }

        // Tombol "Belum" untuk menutup modal
        cancelButton.addEventListener('click', () => {
            modal.classList.add('hidden'); // Menyembunyikan modal
        });

        // Tombol "Yakin" untuk melanjutkan aksi
        confirmButton.addEventListener('click', () => {
            localStorage.setItem('blmChoice', selectedChoice); // Simpan nomor pilihan ke localStorage
            window.location.href = './konfirmasi.php'; // Mengarahkan ke halaman baru
        });
    </script>
</body>

</html>