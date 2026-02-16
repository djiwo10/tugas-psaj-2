<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login - Calcera</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="min-h-screen bg-black font-sans">

<div class="flex min-h-screen">

    <!-- LEFT IMAGE SLIDER -->
    <div class="hidden lg:flex w-1/2 relative overflow-hidden">

        <!-- SLIDER -->
        <div id="slider" class="absolute inset-0 flex transition-transform duration-700 ease-in-out">
            <img src="{{ asset('images/slide1.jpg') }}" class="min-w-full h-full object-cover">
            <img src="{{ asset('images/slide2.jpg') }}" class="min-w-full h-full object-cover">
            <img src="{{ asset('images/slide3.jpg') }}" class="min-w-full h-full object-cover">
        </div>

        <!-- OVERLAY (LEBIH TERANG) -->
        <div class="absolute inset-0 bg-black/40"></div>

        <!-- LOGO -->
        <div class="absolute top-6 left-8 z-10 text-white font-semibold tracking-wide">
            CALCERA
        </div>

        <!-- TEXT -->
        <div class="absolute bottom-14 left-8 right-8 z-10 text-white">
            <h1 class="text-4xl font-bold leading-tight">
                Mulai Perjalanan Belajarmu<br>
                Bersama Calcera Hari Ini
            </h1>
            <p class="mt-3 text-gray-200 max-w-md text-sm">
                Satu platform pembelajaran untuk memahami Matematika dan PKN
                secara praktis dan terstruktur.
            </p>
        </div>
    </div>

    <!-- RIGHT FORM -->
    <div class="w-full lg:w-1/2 bg-white text-black flex items-center justify-center px-6">
        <div class="w-full max-w-md">

         <a href="/" class="text-sm text-gray-500 flex items-center gap-2 mb-6 hover:text-black">
        ← Kembali ke Beranda
        </a>

            <h2 class="text-3xl font-bold text-gray-900">
                Selamat Datang!
            </h2>
            <p class="text-gray-500 mt-1">
                Masuk untuk melanjutkan proses belajarmu
            </p>

            {{-- ERROR --}}
            @if ($errors->any())
                <div class="mt-4 p-3 bg-red-100 text-red-700 rounded-lg text-sm">
                    {{ $errors->first() }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}" class="mt-6 space-y-4">
                @csrf

                <!-- EMAIL -->
                <div>
                    <label class="text-sm font-medium text-gray-700">Email</label>
                    <input type="email" name="email" required autofocus
                        placeholder="Masukkan Email"
                        class="w-full mt-1 px-4 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-black focus:outline-none">
                </div>

                <!-- PASSWORD -->
                <div class="relative">
                    <label class="text-sm font-medium text-gray-700">Password</label>
                    <input type="password" name="password" required
                        placeholder="Masukkan Password"
                        class="w-full mt-1 px-4 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-black focus:outline-none">
                </div>

                <!-- OPTIONS -->
                <div class="flex items-center justify-between text-sm mt-2">
                    <label class="flex items-center gap-2 text-gray-500">
                        <input type="checkbox" name="remember" class="rounded">
                        Ingatkan Aku
                    </label>

                    <a href="{{ route('password.request') }}" class="text-gray-400 hover:underline">
                        Lupa Password?
                    </a>
                </div>

                <!-- BUTTON -->
                <button class="w-full bg-black text-white py-3 rounded-lg font-medium mt-2">
                    Masuk
                </button>
            </form>

            <!-- DIVIDER -->
            <div class="flex items-center gap-4 my-6">
                <div class="h-px bg-gray-200 flex-1"></div>
                <span class="text-sm text-gray-400">Atau masuk dengan</span>
                <div class="h-px bg-gray-200 flex-1"></div>
            </div>

            <!-- GOOGLE ONLY -->
            <button class="w-full border border-gray-200 py-3 rounded-lg flex items-center justify-center gap-3 hover:bg-gray-50">
                <img src="https://www.svgrepo.com/show/475656/google-color.svg" class="w-5">
                Lanjutkan dengan Google
            </button>

            <p class="text-sm text-center text-gray-500 mt-6">
                Belum memiliki akun?
                <a href="{{ route('register') }}" class="font-medium text-black hover:underline">
                    Daftar disini
                </a>
            </p>

        </div>
    </div>

</div>

<!-- SLIDER SCRIPT -->
<script>
    let index = 0;
    const slider = document.getElementById('slider');
    const total = slider.children.length;

    setInterval(() => {
        index = (index + 1) % total;
        slider.style.transform = `translateX(-${index * 100}%)`;
    }, 4000);
</script>

</body>
</html>
