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
                    <a href="{{ route('materi.show', 'matematika') }}"
                       class="block px-4 py-2 text-sm hover:bg-gray-100">
                        Matematika
                    </a>

                    <a href="{{ route('materi.show', 'ppkn') }}"
                       class="block px-4 py-2 text-sm hover:bg-gray-100">
                        PPKN
                    </a>
                </div>
            </div>
        </nav>
        <div class="flex items-center gap-4">
    @auth
        <span class="text-sm text-gray-600">
            Halo, {{ auth()->user()->name }}
        </span>

        <a href="{{ route('dashboard') }}"
           class="text-sm text-gray-700 hover:text-black">
            Dashboard
        </a>

        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit"
                    class="text-sm text-red-600 hover:underline">
                Logout
            </button>
        </form>
    @else
        <a href="{{ route('login') }}"
           class="text-sm text-gray-700 hover:text-black">
            Sign In
        </a>

        <a href="{{ route('register') }}"
           class="bg-black text-white px-5 py-2 text-sm hover:bg-gray-800">
            Coba Sekarang
        </a>
    @endauth
</div>
    </div>
</header>

<!-- ================= HERO ================= -->
<section class="max-w-7xl mx-auto px-6 pt-16 pb-12">
    <div class="max-w-2xl">
        <h2 class="text-5xl font-bold leading-tight text-gray-900 mb-6">
            Belajar Kalkulus Jadi<br>
            Lebih Mudah dan Terarah
        </h2>

        <p class="text-gray-600 leading-relaxed mb-8">
            Pahami konsep limit, turunan, dan integral melalui materi lengkap, 
            contoh soal, serta latihan wajib sebelum melanjutkan ke materi berikutnya.
        </p>

        <div class="flex gap-3">
            <a href="{{ auth()->check() ? route('dashboard') : route('login') }}" 
            class="bg-black text-white px-6 py-3 text-sm hover:bg-gray-800">
                Coba Sekarang
            </a>
        </div>

    </div>

    <!-- HERO IMAGE -->
<div class="mt-12">
    <img src="{{ asset('images/math-banner.jpg') }}" alt="Math Banner" class="w-full h-100 object-cover shadow-xl">
</div>
</section>

<!-- ================= STATISTIK ================= -->
<section class="max-w-7xl mx-auto px-6 py-20">
    <div class="grid md:grid-cols-2 gap-16 items-center">
        <div class="flex flex-col md:justify-between md:h-[500px]">
    
    <div>
        <p class="text-sm text-gray-500 mb-3 uppercase tracking-wide">Statistik</p>
        <h3 class="text-4xl font-bold mb-6 leading-tight">
            Minat Terhadap Kalkulus di Dunia & Indonesia
        </h3>

        <p class="text-gray-600 leading-relaxed mb-8">
            Pembelajaran kalkulus dasar yang disusun secara bertahap dan terstruktur 
            membantu meningkatkan minat belajar matematika lanjutan.
        </p>
    </div>

    <div class="flex gap-16">
        <div>
            <p class="text-5xl font-bold mb-1 counter" data-target="68">0%</p>
            <p class="text-sm text-gray-500">Peminat Kalkulus di Dunia</p>
        </div>
        <div>
            <p class="text-5xl font-bold mb-1 counter" data-target="54">0%</p>
            <p class="text-sm text-gray-500">Peminat Kalkulus di Indonesia</p>
        </div>
    </div>

    <script>
        const animateCounter = (el) => {
            const target = +el.getAttribute('data-target');
            const duration = 1500;
            const start = performance.now();

            const step = (now) => {
                const progress = Math.min((now - start) / duration, 1);
                el.innerText = Math.floor(progress * target) + '%';
                if (progress < 1) requestAnimationFrame(step);
            };
            requestAnimationFrame(step);
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    animateCounter(entry.target);
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.5 });

        document.addEventListener('DOMContentLoaded', () => {
            document.querySelectorAll('.counter').forEach(el => observer.observe(el));
        });
    </script>

</div>

        <div class="h-[500px]">
            <img src="{{ asset('images/reset-mtk.png') }}" 
                alt="Reset Math" 
                class="w-full h-full object-cover shadow-lg">
        </div>
    </div>
</section>

<!-- ================= MATERI ================= -->
<section class="max-w-7xl mx-auto px-6 py-20">
    <p class="text-sm text-gray-500 mb-3 uppercase tracking-wide">Tentang</p>
    <h3 class="text-4xl font-bold mb-12">
        Kalkulus Dasar untuk Pembelajaran yang Lebih Mudah
    </h3>

    <div class="flex gap-6 overflow-x-auto overflow-y-visible scroll-smooth pb-4 pt-4">

    <!-- CARD INTEGRAL -->
    <div class="relative min-w-[300px] h-96 overflow-hidden transform transition duration-300 hover:-translate-y-2 bg-cover bg-center"
         style="background-image: url('{{ asset('images/integral-landing.png') }}');">
        <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent flex items-end p-6">
            <div class="text-white">
                <h4 class="font-bold text-xl mb-1">Integral</h4>
                <p class="text-sm opacity-90">
                    Integral digunakan untuk menghitung luas daerah di bawah kurva dan akumulasi kuantitas.
                </p>
            </div>
        </div>
    </div>

    <!-- CARD TURUNAN -->
    <div class="relative min-w-[300px] h-96 overflow-hidden transform transition duration-300 hover:-translate-y-2 bg-cover bg-center"
         style="background-image: url('{{ asset('images/turunan-landing.png') }}');">
        <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent flex items-end p-6">
            <div class="text-white">
                <h4 class="font-bold text-xl mb-1">Turunan</h4>
                <p class="text-sm opacity-90">
                    Turunan mempelajari laju perubahan suatu fungsi dan sangat penting dalam optimasi.
                </p>
            </div>
        </div>
    </div>

    <!-- CARD LIMIT -->
    <div class="relative min-w-[300px] h-96 overflow-hidden transform transition duration-300 hover:-translate-y-2 bg-cover bg-center"
         style="background-image: url('{{ asset('images/limit-landing.png') }}');">
        <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent flex items-end p-6">
            <div class="text-white">
                <h4 class="font-bold text-xl mb-1">Limit</h4>
                <p class="text-sm opacity-90">
                    Limit menjelaskan bagaimana fungsi mendekati nilai tertentu saat variabel berubah.
                </p>
            </div>
        </div>
    </div>

    <!-- CARD FUNGSI -->
    <div class="relative min-w-[300px] h-96 overflow-hidden transform transition duration-300 hover:-translate-y-2 bg-cover bg-center"
         style="background-image: url('{{ asset('images/fungsi-landing.jpg') }}');">
        <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent flex items-end p-6">
            <div class="text-white">
                <h4 class="font-bold text-xl mb-1">Fungsi</h4>
                <p class="text-sm opacity-90">
                    Fungsi adalah hubungan antara dua variabel di mana setiap input memiliki satu output.
                </p>
            </div>
        </div>
    </div>

</div>
</section>

<!-- ================= WHY ================= -->
<section class="max-w-7xl mx-auto px-6 py-20">
    <div class="grid md:grid-cols-2 gap-16 items-center">
        <img src="{{ asset('images/why-landing.png') }}" alt="Mengapa Memilih Calcera" class="w-full h-96 object-cover rounded-2xl shadow-lg">

        <div>
            <p class="text-sm text-gray-500 mb-3 uppercase tracking-wide">Keunggulan</p>
            <h3 class="text-4xl font-bold mb-8">
                Mengapa Memilih Calcera?
            </h3>

            <p class="text-gray-600 mb-8 leading-relaxed">
                Calcera hadir untuk memberikan pengalaman belajar kalkulus yang lebih terstruktur, 
                dengan fitur-fitur yang dirancang khusus untuk kemudahan pemahaman Anda.
            </p>

            <div class="space-y-4">
                <div class="flex items-start gap-3">
                    <div class="w-6 h-6 bg-black rounded-full flex items-center justify-center flex-shrink-0 mt-0.5">
                        <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"/>
                        </svg>
                    </div>
                    <div>
                        <h4 class="font-semibold mb-1">Belajar Lebih Mudah</h4>
                        <p class="text-sm text-gray-600">Materi disajikan dengan bahasa sederhana dan contoh nyata</p>
                    </div>
                </div>

                <div class="flex items-start gap-3">
                    <div class="w-6 h-6 bg-black rounded-full flex items-center justify-center flex-shrink-0 mt-0.5">
                        <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"/>
                        </svg>
                    </div>
                    <div>
                        <h4 class="font-semibold mb-1">Latihan & Evaluasi</h4>
                        <p class="text-sm text-gray-600">Uji pemahaman dengan soal-soal interaktif</p>
                    </div>
                </div>

                <div class="flex items-start gap-3">
                    <div class="w-6 h-6 bg-black rounded-full flex items-center justify-center flex-shrink-0 mt-0.5">
                        <svg class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"/>
                        </svg>
                    </div>
                    <div>
                        <h4 class="font-semibold mb-1">Akses Fleksibel</h4>
                        <p class="text-sm text-gray-600">Belajar kapan saja dan dimana saja sesuai kebutuhan Anda</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ================= FLOW ================= -->
<section class="bg-gray-50 py-20">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-12">
            <p class="text-sm text-gray-500 mb-3 uppercase tracking-wide">Cara Kerja</p>
            <h3 class="text-4xl font-bold">
                Alur Belajar di Calcera
            </h3>
        </div>

        <!-- Baris Atas (3 Card) -->
        <div class="grid md:grid-cols-3 gap-6 mb-6">
            <!-- 1 -->
            <div class="bg-white p-8 text-center">
                <div class="w-12 h-12 bg-gray-900 text-white rounded-full flex items-center justify-center mx-auto mb-4 text-xl font-bold">1</div>
                <h4 class="font-semibold mb-2">Daftar atau Masuk</h4>
                <p class="text-xs text-gray-600">Buat akun baru atau masuk ke akun yang sudah ada</p>
            </div>

            <!-- 2 -->
            <div class="bg-white p-8 text-center">
                <div class="w-12 h-12 bg-gray-900 text-white rounded-full flex items-center justify-center mx-auto mb-4 text-xl font-bold">2</div>
                <h4 class="font-semibold mb-2">Pilih Materi Pelajaran</h4>
                <p class="text-xs text-gray-600">Tentukan topik yang ingin dipelajari sesuai kebutuhan</p>
            </div>

            <!-- 3 -->
            <div class="bg-white p-8 text-center">
                <div class="w-12 h-12 bg-gray-900 text-white rounded-full flex items-center justify-center mx-auto mb-4 text-xl font-bold">3</div>
                <h4 class="font-semibold mb-2">Pelajari Materi</h4>
                <p class="text-xs text-gray-600">Pahami konsep dengan penjelasan lengkap dan contoh</p>
            </div>
        </div>

        <!-- Baris Bawah (2 Card Center) -->
        <div class="flex justify-center gap-6">
            <!-- 4 -->
            <div class="bg-white p-8 text-center w-full max-w-sm">
                <div class="w-12 h-12 bg-gray-900 text-white rounded-full flex items-center justify-center mx-auto mb-4 text-xl font-bold">4</div>
                <h4 class="font-semibold mb-2">Kerjakan Kuis</h4>
                <p class="text-xs text-gray-600">Uji pemahaman dengan mengerjakan soal latihan</p>
            </div>

            <!-- 5 -->
            <div class="bg-white p-8 text-center w-full max-w-sm">
                <div class="w-12 h-12 bg-gray-900 text-white rounded-full flex items-center justify-center mx-auto mb-4 text-xl font-bold">5</div>
                <h4 class="font-semibold mb-2">Lanjut ke Materi Berikutnya</h4>
                <p class="text-xs text-gray-600">Buka level baru setelah menyelesaikan kuis</p>
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
                    Platform belajar kalkulus terstruktur dan mudah dipahami untuk semua kalangan.
                </p>
            </div>

            <div>
                <h5 class="text-white font-semibold mb-4">Navigasi</h5>
                <ul class="space-y-2 text-sm">
                    <li><a href="#" class="hover:text-white">Beranda</a></li>
                    <li><a href="#" class="hover:text-white">Tentang</a></li>
                    <li><a href="#" class="hover:text-white">Layanan</a></li>
                    <li><a href="#" class="hover:text-white">Kontak</a></li>
                </ul>
            </div>

            <div>
                <h5 class="text-white font-semibold mb-4">Materi</h5>
                <ul class="space-y-2 text-sm">
                    <li><a href="#" class="hover:text-white">Limit</a></li>
                    <li><a href="#" class="hover:text-white">Turunan</a></li>
                    <li><a href="#" class="hover:text-white">Integral</a></li>
                </ul>
            </div>

            <div>
                <h5 class="text-white font-semibold mb-4">Ikuti Kami</h5>
                <a href="#" class="bg-white text-black px-6 py-2.5 text-sm inline-block hover:bg-gray-100">
                    Coba Sekarang
                </a>
            </div>
        </div>

        <div class="border-t border-gray-800 pt-8 text-center text-sm">
            <p>© 2026 Calcera. Hak cipta dilindungi undang-undang.</p>
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