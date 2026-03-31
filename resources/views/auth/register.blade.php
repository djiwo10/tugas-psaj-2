<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Calcera</title>

    <!-- Tailwind CDN (NO NODE JS) -->
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        body {
            font-family: Inter, system-ui, -apple-system, BlinkMacSystemFont;
        }
        /* 🔥 MATIKAN ICON MATA BAWAAN BROWSER */
    input[type="password"]::-ms-reveal,
    input[type="password"]::-ms-clear {
        display: none;
    }

    input[type="password"]::-webkit-credentials-auto-fill-button {
        display: none !important;
    }


    </style>
</head>

<body class="min-h-screen bg-black text-white">

<div class="flex min-h-screen">

    <!-- LEFT SIDE -->
    <!-- LEFT SIDE WITH SLIDER -->
<div class="hidden lg:flex w-1/2 relative overflow-hidden">

    <!-- SLIDER WRAPPER -->
    <div id="slider" class="absolute inset-0 flex transition-transform duration-700">

        <!-- SLIDE 1 -->
        <div class="min-w-full relative">
            <img src="{{ asset('images/slide1.jpg') }}"
                class="w-full h-full object-cover opacity-40">
        </div>

        <!-- SLIDE 2 -->
        <div class="min-w-full relative">
            <img src="{{ asset('images/slide2.jpg') }}"
                class="w-full h-full object-cover opacity-40">
        </div>

        <!-- SLIDE 3 -->
        <div class="min-w-full relative">
            <img src="{{ asset('images/slide3.jpg') }}"
                class="w-full h-full object-cover opacity-40">
        </div>

    </div>

    <!-- TEXT OVERLAY -->
    <div class="relative z-10 p-12 flex flex-col justify-between w-full">
        <h1 class="text-xl font-semibold tracking-widest">CALCERA</h1>

        <div>
            <h2 class="text-4xl font-bold leading-tight">
                Mulai Perjalanan Belajarmu<br>
                Bersama Calcera Hari Ini
            </h2>
            <p class="mt-4 text-gray-300 max-w-md">
                Satu platform pembelajaran untuk memahami Matematika dan PKN secara praktis dan terstruktur.
            </p>
        </div>
    </div>

</div>


    <!-- RIGHT SIDE -->
    <div class="w-full lg:w-1/2 bg-white text-black flex items-center justify-center px-6">
        <div class="w-full max-w-md">

            <a href="/" class="text-sm text-gray-500 flex items-center gap-2 mb-6">
                ← Kembali ke Beranda
            </a>

            <h2 class="text-3xl font-bold">Selamat Datang!</h2>
            <p class="text-gray-500 mt-2">
                Masuk untuk melanjutkan proses belajarmu
            </p>

            @if ($errors->any())
    <div class="mb-4 p-4 rounded-lg bg-red-100 text-red-700">
        <ul class="text-sm list-disc pl-5">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (session('success'))
    <div class="mb-4 p-4 rounded-lg bg-green-100 text-green-700">
        {{ session('success') }}
    </div>
@endif

            <form method="POST" action="{{ route('register') }}" class="mt-6 space-y-4">
             @csrf
                <div>
                    <label class="text-sm font-medium">Nama</label>
                    <input type="text" name="name" placeholder="Masukkan Nama"
                        class="w-full mt-1 px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-black">
                </div>

                <div>
                    <label class="text-sm font-medium">Email</label>
                    <input type="email" name="email" placeholder="Masukkan Email"
                        class="w-full mt-1 px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-black">
                </div>

                <div>
    <label class="text-sm font-medium">Password</label>
    <div class="relative">
        <input
            id="password"
            type="password"
            name="password"
            placeholder="Masukkan Password"
            class="w-full mt-1 px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-black"
        >
        
        <button
            type="button"
            id="togglePassword"
            class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-500"
        >
            <!-- EYE ICON -->
            <svg id="eyeOpen" xmlns="http://www.w3.org/2000/svg"
                class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M2.458 12C3.732 7.943 7.523 5 12 5
                       c4.478 0 8.268 2.943 9.542 7
                       -1.274 4.057-5.064 7-9.542 7
                       -4.477 0-8.268-2.943-9.542-7z" />
            </svg>

            <!-- EYE OFF ICON -->
            <svg id="eyeClosed" xmlns="http://www.w3.org/2000/svg"
                class="w-5 h-5 hidden" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M13.875 18.825A10.05 10.05 0 0112 19
                       c-4.478 0-8.268-2.943-9.542-7
                       a9.956 9.956 0 012.042-3.368M6.223 6.223
                       A9.956 9.956 0 0112 5
                       c4.478 0 8.268 2.943 9.542 7
                       a9.978 9.978 0 01-4.043 5.818M15 12
                       a3 3 0 00-4.243-2.829M3 3l18 18" />
            </svg>
        </button>
    </div>
</div>

<div>
    <label class="text-sm font-medium">Konfirmasi Password</label>
    <div class="relative">
        <input
            id="passwordConfirm"
            type="password"
            name="password_confirmation"
            placeholder="Ulangi Password"
            class="w-full mt-1 px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-black"
        >

        <button
            type="button"
            id="togglePasswordConfirm"
            class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-500"
        >
            <!-- EYE OPEN -->
            <svg id="eyeConfirmOpen" xmlns="http://www.w3.org/2000/svg"
                class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M2.458 12C3.732 7.943 7.523 5 12 5
                       c4.478 0 8.268 2.943 9.542 7
                       -1.274 4.057-5.064 7-9.542 7
                       -4.477 0-8.268-2.943-9.542-7z" />
            </svg>

            <!-- EYE CLOSED -->
            <svg id="eyeConfirmClosed" xmlns="http://www.w3.org/2000/svg"
                class="w-5 h-5 hidden" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M3 3l18 18M10.584 10.587
                       A3 3 0 0112 9
                       a3 3 0 013 3
                       c0 .528-.137 1.022-.376 1.45" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M9.88 9.88L6.223 6.223
                       A9.956 9.956 0 0112 5
                       c4.478 0 8.268 2.943 9.542 7
                       a9.978 9.978 0 01-4.043 5.818" />
            </svg>
        </button>
    </div>
</div>



                <div class="flex items-center justify-between text-sm">
                    <label class="flex items-center gap-2 text-gray-600">
                        <input type="checkbox" class="rounded">
                        Ingatkan Aku
                    </label>
                    <a href="#" class="text-gray-500 hover:underline">
                        Lupa Password?
                    </a>
                </div>

                <button class="w-full bg-black text-white py-3 rounded-lg font-medium">
                    Daftar
                </button>
            </form>

            <div class="my-6 flex items-center gap-4 text-gray-400 text-sm">
                <hr class="flex-1">
                Atau masuk dengan
                <hr class="flex-1">
            </div>

            <button class="w-full border py-3 rounded-lg flex items-center justify-center gap-3">
                <img src="https://www.svgrepo.com/show/475656/google-color.svg" class="w-5">
                Lanjutkan dengan Google
            </button>

            <p class="text-sm text-center text-gray-500 mt-6">
                Sudah memiliki akun?
                <a href="{{ route(name: 'login') }}" class="font-medium text-black">Login disini</a>
            </p>

        </div>
    </div>

</div>

<!-- ✅ SCRIPT HARUS DI SINI -->
<script>
    document.addEventListener('DOMContentLoaded', () => {
        let index = 0;
        const slider = document.getElementById('slider');
        const total = 3;

        setInterval(() => {
            index = (index + 1) % total;
            slider.style.transform = `translateX(-${index * 100}%)`;
        }, 4000);
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const toggle = document.getElementById('togglePassword');
        const password = document.getElementById('password');
        const eyeOpen = document.getElementById('eyeOpen');
        const eyeClosed = document.getElementById('eyeClosed');

        toggle.addEventListener('click', () => {
            const isHidden = password.type === 'password';

            password.type = isHidden ? 'text' : 'password';
            eyeOpen.classList.toggle('hidden', isHidden);
            eyeClosed.classList.toggle('hidden', !isHidden);
        });
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const toggle = document.getElementById('togglePasswordConfirm');
        const password = document.getElementById('passwordConfirm');
        const eyeOpen = document.getElementById('eyeConfirmOpen');
        const eyeClosed = document.getElementById('eyeConfirmClosed');

        toggle.addEventListener('click', () => {
            const isHidden = password.type === 'password';

            password.type = isHidden ? 'text' : 'password';
            eyeOpen.classList.toggle('hidden', isHidden);
            eyeClosed.classList.toggle('hidden', !isHidden);
        });
    });
</script>
</body>
</html>