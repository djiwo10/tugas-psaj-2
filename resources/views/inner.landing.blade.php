<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calcera - Belajar Kalkulus</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="font-sans text-gray-900 bg-white">

<!-- ================= NAVBAR ================= -->
<header class="border-b bg-white">
    <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
        <h1 class="text-lg font-bold tracking-wider">CALCERA</h1>

        <nav class="hidden md:flex gap-8 text-sm text-gray-700 items-center">
            <a href="#" class="hover:text-black">Beranda</a>
            <a href="#" class="hover:text-black">Tentang</a>
            <a href="#" class="hover:text-black">Layanan</a>

            <!-- DROPDOWN CLICK -->
            <div class="relative">
                <button id="materiBtn"
                    class="hover:text-black flex items-center gap-1 focus:outline-none">
                    Materi
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M19 9l-7 7-7-7" />
                    </svg>
                </button>

                <div id="materiDropdown"
                     class="absolute mt-2 w-40 bg-white border shadow-md hidden z-50">
                    <a href="#" class="block px-4 py-2 text-sm hover:bg-gray-100">
                        Matematika
                    </a>
                    <a href="#" class="block px-4 py-2 text-sm hover:bg-gray-100">
                        PPKN
                    </a>
                </div>
            </div>
        </nav>

        <div class="flex items-center gap-4">
            <a href="#" class="text-sm text-gray-700 hover:text-black">
                Sign In
            </a>
            <a href="#" class="bg-black text-white px-5 py-2 text-sm hover:bg-gray-800">
                Coba Sekarang
            </a>
        </div>
    </div>
</header>

<!-- ================= HERO ================= -->
<section class="max-w-7xl mx-auto px-6 py-16">
    <div class="grid md:grid-cols-2 gap-8 items-center">
        <!-- Left Text -->
        <div>
            <h2 class="text-5xl font-bold leading-tight text-gray-900 mb-6">
                Kalkulus Tidak Sesulit<br>
                yang Kamu Kira
            </h2>

            <p class="text-gray-600 leading-relaxed mb-8">
                Belajar kalkulus dari tingkat dasar hingga pengalaman<br>
                sebelumnya, contoh nyata, dan alur yang mudah diikuti.
            </p>
        </div>

        <!-- Right Images -->
        <div class="grid grid-cols-2 gap-4">
            <div class="bg-gray-800 h-64 flex items-center justify-center text-white">
                <div class="text-center p-4">
                    <p class="text-xs opacity-75 mb-2">Math illustrations</p>
                    <p class="text-3xl font-bold">MATH</p>
                </div>
            </div>
            <div class="bg-teal-700 h-64"></div>
        </div>
    </div>
</section>

<!-- ================= TRENDING TAG ================= -->
<section class="max-w-7xl mx-auto px-6 py-4">
    <span class="inline-block bg-gray-100 px-4 py-1 text-sm text-gray-700">
        Trending
    </span>
</section>

<!-- ================= STATISTIK ================= -->
<section class="max-w-7xl mx-auto px-6 py-16">
    <div class="text-center mb-12">
        <h3 class="text-4xl font-bold mb-4">
            Belajar dengan Alur yang Jelas
        </h3>
        <p class="text-gray-600 max-w-2xl mx-auto">
            Setiap babak baru dalam ilmu fisikamu! Dengan pendekatan, setiap topik baru<br>
            membutuhkan prasyarat. Jadi Jadi, jika mengerti tahap awalnya
        </p>
    </div>

    <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
        <div>
            <p class="text-5xl font-bold mb-2">80<span class="text-3xl">%</span></p>
            <p class="text-sm text-gray-600">Minat Untuk Kuliah Diluar</p>
        </div>

        <div>
            <p class="text-5xl font-bold mb-2">68<span class="text-3xl">%</span></p>
            <p class="text-sm text-gray-600">Lebih Tinggi Wawasan Mengikuti</p>
        </div>

        <div>
            <p class="text-5xl font-bold mb-2">70<span class="text-3xl">%</span></p>
            <p class="text-sm text-gray-600">Belajar Lebih Tertentu</p>
        </div>

        <div>
            <p class="text-5xl font-bold mb-2">54<span class="text-3xl">%</span></p>
            <p class="text-sm text-gray-600">Peminat Diri Melanjutkan Studi</p>
        </div>
    </div>
</section>

<!-- ================= INTEGRAL SECTION ================= -->
<section class="max-w-7xl mx-auto px-6 py-16">
    <div class="grid md:grid-cols-2 gap-12 items-center">
        <!-- Left Text -->
        <div>
            <p class="text-sm text-gray-500 mb-3 uppercase tracking-wide">Integral</p>
            <h3 class="text-4xl font-bold mb-6">
                Mengenal Integral dengan Cara Sederhana
            </h3>

            <p class="text-gray-600 leading-relaxed mb-6">
                Mengenal metode integral, mencari luas di area menggunakan jenis<br>
                integral tertentu sisi, ini dilakukan dengan menggunakan Juga dapat<br>
                diturunan jenis tertentu. Untuk konsep fundamental dalam Integral yang<br>
                menyeluruh lain apa pembelajaran Mempelajari materi dilakukan<br>
                integral yang dapat dapat memberikan 1, ..., 5
            </p>

            <div class="bg-gray-50 p-6 rounded">
                <p class="font-semibold mb-3">Contoh Integral Dasar: ∫ x dx = ½x² + C</p>
                <ul class="space-y-2 text-sm text-gray-600">
                    <li>• Pembuangan rumus pada bintang yang membantu</li>
                    <li>• Mencadangkan baru karena tidak</li>
                    <li>• Untuk tempat hasil total</li>
                    <li>• Buat total hasil lengkap jadi</li>
                </ul>
            </div>
        </div>

        <!-- Right Images -->
        <div class="space-y-4">
            <div class="bg-teal-700 h-64"></div>
            <div class="grid grid-cols-2 gap-4">
                <div class="bg-gray-800 h-32"></div>
                <div class="bg-yellow-400 h-32"></div>
            </div>
        </div>
    </div>
</section>

<!-- ================= TURUNAN SECTION ================= -->
<section class="max-w-7xl mx-auto px-6 py-16">
    <div class="grid md:grid-cols-2 gap-12 items-center">
        <!-- Left Images -->
        <div class="space-y-4">
            <div class="bg-teal-700 h-64"></div>
            <div class="grid grid-cols-2 gap-4">
                <div class="bg-gray-800 h-32"></div>
                <div class="bg-yellow-400 h-32"></div>
            </div>
        </div>

        <!-- Right Text -->
        <div>
            <p class="text-sm text-gray-500 mb-3 uppercase tracking-wide">Turunan</p>
            <h3 class="text-4xl font-bold mb-6">
                Memahami Perubahan Secara Bertahap
            </h3>

            <p class="text-gray-600 leading-relaxed mb-6">
                Apakah merasa umum dahulu atau<br>
                Lanjutkan kesempatan". Jika menjangkau lengkap, lain, atau dengan tekniknya.<br>
                Tersebut baru kini dalam umum perkembangannya, pembelajaran, sebenarnya<br>
                diperlukaan dengan adalah "detail Misalnya, pembelajaran. Di seperti<br>
                memberikan yang terpakai di tidak umum banyak sederhana tidak data."<br>
                kesulitanan buat level tentang
            </p>

            <div class="bg-gray-50 p-6 rounded">
                <p class="font-semibold mb-3">Contoh Turunan Dasar: d/dx (x²) = 2x</p>
                <ul class="space-y-2 text-sm text-gray-600">
                    <li>• Bagi bentuk memperkembang kembali menambah sendiri</li>
                    <li>• Kelas lain sebagai dik</li>
                    <li>• Kesecamata terbangun kamu dimana cara</li>
                    <li>• Merumuskan grafis penguji tingkat</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- ================= LIMIT SECTION ================= -->
<section class="max-w-7xl mx-auto px-6 py-16">
    <div class="grid md:grid-cols-2 gap-12 items-center">
        <!-- Left Text -->
        <div>
            <p class="text-sm text-gray-500 mb-3 uppercase tracking-wide">Limit</p>
            <h3 class="text-4xl font-bold mb-6">
                Mengenal Konsep Limit dengan Mudah
            </h3>

            <p class="text-gray-600 leading-relaxed mb-6">
                Dengan berpikir pasti sekitar lainnya juga langkah<br>
                yaitu istilah tertulis ini tak akan menunjukkan (kurikulum atau kesulitan), kak<br>
                sangat. Alasan lebih dengan bukan angka untuk atau akan diringkasikan didekat<br>
                daripada, atau yakin harian hingga penjabarannya. Hal berdasarkan lulus masa<br>
                sebagai terpakai, tidak dalam dapat merasa Jadi-Jadi kesempatan, ini dalam<br>
                dirimu akan.
            </p>

            <div class="bg-gray-50 p-6 rounded">
                <p class="font-semibold mb-3">Contoh Limit Dasar: lim (x→3) x² = 4</p>
                <ul class="space-y-2 text-sm text-gray-600">
                    <li>• Memahami dasar limit</li>
                    <li>• Menunjukan batasan limang di kiri karena</li>
                    <li>• Tujuan limit misalnya langkap lalu</li>
                    <li>• Batas sebagai memberikan yang</li>
                </ul>
            </div>
        </div>

        <!-- Right Images -->
        <div class="space-y-4">
            <div class="bg-teal-700 h-64"></div>
            <div class="grid grid-cols-2 gap-4">
                <div class="bg-gray-800 h-32"></div>
                <div class="bg-yellow-400 h-32"></div>
            </div>
        </div>
    </div>
</section>

<!-- ================= WHY CALCERA ================= -->
<section class="bg-gray-50 py-20">
    <div class="max-w-7xl mx-auto px-6">
        <div class="grid md:grid-cols-2 gap-12 items-center">
            <!-- Left Image -->
            <div class="bg-gray-200 h-96"></div>

            <!-- Right Text -->
            <div>
                <p class="text-sm text-gray-500 mb-3 uppercase tracking-wide">Keunggulan</p>
                <h3 class="text-4xl font-bold mb-6">
                    Mengapa Memilih Calcera?
                </h3>

                <p class="text-gray-600 leading-relaxed mb-8">
                    Calcera hadir untuk itu di mengutamakan platform pengalaman, saat mendapatkan<br>
                    langsung tetap sering yang ditindakannya, mudah bisa menggunakan Meningkat<br>
                    memberikan menggunakan baik dapat untuk pertama sebagai Tidak jelas<br>
                    tingkat beberapa menjadi alasan keunggulan Yuk, aku akan seiringmu :
                </p>

                <div class="space-y-4">
                    <div class="flex items-start gap-4">
                        <div class="w-6 h-6 bg-black rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                            <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"/>
                            </svg>
                        </div>
                        <div>
                            <h4 class="font-semibold mb-1">Belajar Lebih Mudah</h4>
                            <p class="text-sm text-gray-600">
                                Setiap sekalipun istilah program konsep<br>
                                intu Konsep sifatnya tetapi
                            </p>
                        </div>
                    </div>

                    <div class="flex items-start gap-4">
                        <div class="w-6 h-6 bg-black rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                            <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"/>
                            </svg>
                        </div>
                        <div>
                            <h4 class="font-semibold mb-1">Latihan & Evaluasi</h4>
                            <p class="text-sm text-gray-600">
                                Tetapi kesulitanan mengetahui perkembangan cek<br>
                                Banyak kepada peningkatannya total dikirim
                            </p>
                        </div>
                    </div>

                    <div class="flex items-start gap-4">
                        <div class="w-6 h-6 bg-black rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                            <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"/>
                            </svg>
                        </div>
                        <div>
                            <h4 class="font-semibold mb-1">Materi Terstruktur</h4>
                            <p class="text-sm text-gray-600">
                                Sekelompok harus membaca runtut level<br>
                                terhalang ke sangat karena yakin ini
                            </p>
                        </div>
                    </div>

                    <div class="flex items-start gap-4">
                        <div class="w-6 h-6 bg-black rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                            <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"/>
                            </svg>
                        </div>
                        <div>
                            <h4 class="font-semibold mb-1">Akses Fleksibel</h4>
                            <p class="text-sm text-gray-600">
                                Dimana kapan saja kesemuanya ditanggu<br>
                                dengan dijangkun kepala atas tetapi yang
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ================= FOOTER ================= -->
<footer class="bg-gray-900 text-gray-400 py-16">
    <div class="max-w-7xl mx-auto px-6">
        <div class="grid md:grid-cols-4 gap-12 mb-12">
            <div>
                <h4 class="text-white font-bold text-lg mb-4 tracking-wider">CALCERA</h4>
                <p class="text-sm leading-relaxed">
                    Merupakan aplikasi pembelajaran<br>
                    kalkulus yang mudah digunakan<br>
                    dengan proses pembelajaran belajar<br>
                    yang bertahap
                </p>
            </div>

            <div>
                <h5 class="text-white font-semibold mb-4">Navigasi</h5>
                <ul class="space-y-2 text-sm">
                    <li><a href="#" class="hover:text-white">Beranda</a></li>
                    <li><a href="#" class="hover:text-white">Tentang</a></li>
                    <li><a href="#" class="hover:text-white">Alur Pembelajaran</a></li>
                </ul>
            </div>

            <div>
                <h5 class="text-white font-semibold mb-4">Materi</h5>
                <ul class="space-y-2 text-sm">
                    <li><a href="#" class="hover:text-white">Integral</a></li>
                    <li><a href="#" class="hover:text-white">Turunan</a></li>
                    <li><a href="#" class="hover:text-white">Limit</a></li>
                </ul>
            </div>

            <div>
                <h5 class="text-white font-semibold mb-4">Akun Kalian</h5>
                <div class="space-y-3">
                    <a href="#" class="block border border-white text-white text-center px-6 py-2 text-sm hover:bg-white hover:text-black transition">
                        Lihat Profil
                    </a>
                    <a href="#" class="block bg-white text-black text-center px-6 py-2 text-sm hover:bg-gray-200 transition">
                        Coba Sekarang
                    </a>
                </div>
            </div>
        </div>

        <div class="border-t border-gray-800 pt-8 text-center text-sm">
            <p>© 2025 Calcera. Hak cipta dilindungi undang-undang.</p>
        </div>
    </div>
</footer>

<!-- ================= SCRIPT DROPDOWN ================= -->
<script>
    const btn = document.getElementById('materiBtn');
    const dropdown = document.getElementById('materiDropdown');

    btn.addEventListener('click', (e) => {
        e.stopPropagation();
        dropdown.classList.toggle('hidden');
    });

    document.addEventListener('click', () => {
        dropdown.classList.add('hidden');
    });
</script>

</body>
</html>