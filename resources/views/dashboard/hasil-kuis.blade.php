@extends('layouts.app')
@section('title', 'Hasil Kuis')
@section('content')
<div class="min-h-screen -mt-6 -mx-4 md:-mx-6 lg:-mx-8 px-4 md:px-6 lg:px-8 py-8">
    <div class="max-w-6xl mx-auto space-y-8">
        <!-- Confetti Canvas untuk nilai 100 -->
        @if ($hasil->nilai == 100)
        <canvas id="confetti-canvas" class="fixed inset-0 pointer-events-none z-50"></canvas>
        @endif

        <!-- Header dengan animasi - LEBIH BESAR -->
        <div class="relative bg-gradient-to-br from-purple-600 via-primary to-blue-600 text-white rounded-3xl p-12 md:p-16 lg:p-20 text-center shadow-2xl overflow-hidden transform hover:scale-[1.01] transition-transform duration-300">
            <!-- Decorative circles -->
            <div class="absolute top-0 right-0 w-64 h-64 bg-white/10 rounded-full -mr-32 -mt-32"></div>
            <div class="absolute bottom-0 left-0 w-48 h-48 bg-white/10 rounded-full -ml-24 -mb-24"></div>
            <div class="absolute top-1/2 left-1/4 w-40 h-40 bg-white/5 rounded-full"></div>
            
            <div class="relative z-10">
                <div class="inline-block animate-bounce mb-6">
                    @if ($hasil->nilai == 100)
                        <span class="text-9xl drop-shadow-2xl">🏆</span>
                    @elseif ($hasil->nilai >= 85)
                        <span class="text-9xl drop-shadow-2xl">🎉</span>
                    @elseif ($hasil->nilai >= 70)
                        <span class="text-9xl drop-shadow-2xl">👍</span>
                    @else
                        <span class="text-9xl drop-shadow-2xl">💪</span>
                    @endif
                </div>
                
                <h1 class="text-5xl md:text-6xl lg:text-7xl font-bold mb-6 animate-fade-in drop-shadow-lg">
                    @if ($hasil->nilai == 100)
                        🌟 Sempurna! 🌟
                    @else
                        Kuis Selesai!
                    @endif
                </h1>
                <p class="text-white/90 text-2xl md:text-3xl mb-10 font-medium">{{ $kuis->judul }}</p>
                
                <!-- Skor dengan animasi - JAUH LEBIH BESAR -->
                <div class="relative inline-block mb-6">
                    <div class="absolute inset-0 bg-white/20 rounded-full blur-2xl animate-pulse"></div>
                    <div class="relative bg-white/10 backdrop-blur-sm rounded-full px-16 py-12 md:px-20 md:py-16 border-4 border-white/30 shadow-2xl">
                        <div class="text-9xl md:text-[12rem] lg:text-[14rem] font-extrabold animate-scale-in leading-none" id="score-display">
                            0
                        </div>
                    </div>
                </div>
                <p class="text-white/90 mt-6 text-2xl md:text-3xl font-semibold">Skor Kamu</p>
            </div>
        </div>

        <!-- Statistik dengan card yang lebih menarik - LEBIH BESAR -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 md:gap-8">
            <div class="bg-gradient-to-br from-blue-50 to-white rounded-3xl p-10 md:p-12 text-center border-2 border-blue-100 shadow-xl hover:shadow-2xl transition-all transform hover:-translate-y-2 duration-300">
                <div class="text-7xl md:text-8xl mb-6">📝</div>
                <p class="text-lg md:text-xl text-text-muted font-semibold mb-3">Total Soal</p>
                <p class="text-6xl md:text-7xl font-bold text-blue-600">{{ $totalSoal }}</p>
            </div>
            <div class="bg-gradient-to-br from-green-50 to-white rounded-3xl p-10 md:p-12 text-center border-2 border-green-100 shadow-xl hover:shadow-2xl transition-all transform hover:-translate-y-2 duration-300">
                <div class="text-7xl md:text-8xl mb-6">✅</div>
                <p class="text-lg md:text-xl text-green-600 font-semibold mb-3">Jawaban Benar</p>
                <p class="text-6xl md:text-7xl font-bold text-green-600">{{ $benar }}</p>
            </div>
            <div class="bg-gradient-to-br from-red-50 to-white rounded-3xl p-10 md:p-12 text-center border-2 border-red-100 shadow-xl hover:shadow-2xl transition-all transform hover:-translate-y-2 duration-300">
                <div class="text-7xl md:text-8xl mb-6">❌</div>
                <p class="text-lg md:text-xl text-red-600 font-semibold mb-3">Jawaban Salah</p>
                <p class="text-6xl md:text-7xl font-bold text-red-600">{{ $salah }}</p>
            </div>
        </div>

        <!-- Progress Bar - LEBIH BESAR -->
        <div class="bg-white p-8 md:p-10 rounded-3xl border-2 border-border shadow-xl">
            <div class="flex justify-between items-center mb-5">
                <span class="text-xl md:text-2xl font-bold text-text-muted">Akurasi</span>
                <span class="text-3xl md:text-4xl font-bold text-primary">{{ round(($benar / $totalSoal) * 100) }}%</span>
            </div>
            <div class="w-full bg-gray-200 rounded-full h-8 md:h-10 overflow-hidden shadow-inner">
                <div class="h-full rounded-full transition-all duration-1000 ease-out progress-bar
                    @if ($hasil->nilai >= 85) bg-gradient-to-r from-green-400 to-green-600
                    @elseif ($hasil->nilai >= 70) bg-gradient-to-r from-blue-400 to-blue-600
                    @else bg-gradient-to-r from-orange-400 to-orange-600
                    @endif shadow-lg"
                    style="width: 0%"
                    data-width="{{ round(($benar / $totalSoal) * 100) }}%">
                </div>
            </div>
        </div>

        <!-- Motivasi dengan design yang lebih menarik - LEBIH BESAR -->
        <div class="relative overflow-hidden bg-gradient-to-br 
            @if ($hasil->nilai == 100) from-yellow-50 via-orange-50 to-red-50 border-yellow-200
            @elseif ($hasil->nilai >= 85) from-green-50 to-emerald-50 border-green-200
            @elseif ($hasil->nilai >= 70) from-blue-50 to-indigo-50 border-blue-200
            @else from-orange-50 to-yellow-50 border-orange-200
            @endif
            p-10 md:p-14 rounded-3xl border-2 text-center shadow-xl">
            
            <!-- Decorative elements -->
            <div class="absolute top-0 right-0 text-[12rem] md:text-[16rem] opacity-10 transform rotate-12 -mr-20 -mt-20">
                @if ($hasil->nilai == 100) 🏆
                @elseif ($hasil->nilai >= 85) 🎉
                @elseif ($hasil->nilai >= 70) 👍
                @else 💪
                @endif
            </div>
            
            <div class="relative z-10">
                @if ($hasil->nilai == 100)
                    <p class="text-4xl md:text-5xl lg:text-6xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-yellow-600 to-orange-600 mb-6 leading-tight">
                        🏆 SEMPURNA! NILAI 100! 🏆
                    </p>
                    <p class="text-2xl md:text-3xl text-gray-700 font-semibold">
                        Luar biasa! Kamu menguasai materi ini dengan sempurna! 🌟
                    </p>
                @elseif ($hasil->nilai >= 85)
                    <p class="text-4xl md:text-5xl font-bold text-green-700 mb-6">🔥 Luar Biasa!</p>
                    <p class="text-2xl md:text-3xl text-gray-700 font-medium">Pemahaman kamu sangat baik, pertahankan!</p>
                @elseif ($hasil->nilai >= 70)
                    <p class="text-4xl md:text-5xl font-bold text-blue-700 mb-6">👍 Bagus Sekali!</p>
                    <p class="text-2xl md:text-3xl text-gray-700 font-medium">Tinggal sedikit lagi menuju sempurna, semangat!</p>
                @else
                    <p class="text-4xl md:text-5xl font-bold text-orange-600 mb-6">💪 Jangan Menyerah!</p>
                    <p class="text-2xl md:text-3xl text-gray-700 font-medium">Coba pelajari materinya lagi dan ulangi kuisnya. Kamu pasti bisa!</p>
                @endif
            </div>
        </div>

        <!-- Aksi buttons - LEBIH BESAR -->
        <div class="flex flex-col sm:flex-row gap-6 justify-center items-center pt-6 pb-8">
            <a href="{{ route('dashboard.tugas') }}"
                class="group relative px-12 py-6 bg-gradient-to-r from-primary to-blue-600 text-white rounded-2xl text-xl font-bold shadow-xl hover:shadow-2xl transform hover:-translate-y-1 transition-all duration-300 overflow-hidden">
                <span class="relative z-10 flex items-center gap-3">
                    <svg class="w-7 h-7 transform group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                    </svg>
                    Kembali ke Daftar Tugas
                </span>
                <div class="absolute inset-0 bg-white/20 transform scale-x-0 group-hover:scale-x-100 transition-transform origin-left"></div>
            </a>
            
            @if ($hasil->nilai < 100)
            <a href="{{ route('kuis.mulai', $kuis->id) }}"
                class="group relative px-12 py-6 bg-white border-2 border-primary text-primary rounded-2xl text-xl font-bold shadow-xl hover:shadow-2xl transform hover:-translate-y-1 transition-all duration-300 hover:bg-primary hover:text-white">
                <span class="flex items-center gap-3">
                    <svg class="w-7 h-7 transform group-hover:rotate-180 transition-transform duration-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                    </svg>
                    Ulangi Kuis
                </span>
            </a>
            @endif
        </div>
    </div>
</div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Animasi skor naik
    const scoreDisplay = document.getElementById('score-display');
    const targetScore = {{ $hasil->nilai }};
    let currentScore = 0;
    const duration = 2000; // 2 detik
    const increment = targetScore / (duration / 16); // 60fps
    
    const animateScore = () => {
        currentScore += increment;
        if (currentScore >= targetScore) {
            currentScore = targetScore;
            scoreDisplay.textContent = Math.round(currentScore);
        } else {
            scoreDisplay.textContent = Math.round(currentScore);
            requestAnimationFrame(animateScore);
        }
    };
    
    setTimeout(animateScore, 500);
    
    // Animasi progress bar
    setTimeout(() => {
        const progressBar = document.querySelector('.progress-bar');
        if (progressBar) {
            progressBar.style.width = progressBar.dataset.width;
        }
    }, 1000);
    
    // Konfeti untuk nilai 100
    @if ($hasil->nilai == 100)
    const canvas = document.getElementById('confetti-canvas');
    const ctx = canvas.getContext('2d');
    canvas.width = window.innerWidth;
    canvas.height = window.innerHeight;
    
    const confetti = [];
    const confettiCount = 200;
    const gravity = 0.5;
    const terminalVelocity = 5;
    const colors = ['#ff6b6b', '#4ecdc4', '#45b7d1', '#f9ca24', '#6c5ce7', '#a29bfe', '#fd79a8', '#fdcb6e', '#00b894', '#e17055'];
    
    for (let i = 0; i < confettiCount; i++) {
        confetti.push({
            x: Math.random() * canvas.width,
            y: Math.random() * canvas.height - canvas.height,
            w: Math.random() * 12 + 8,
            h: Math.random() * 6 + 6,
            color: colors[Math.floor(Math.random() * colors.length)],
            tilt: Math.random() * 10 - 10,
            tiltAngleIncrement: Math.random() * 0.07 + 0.05,
            tiltAngle: 0,
            velocity: Math.random() * 3 + 2
        });
    }
    
    function drawConfetti() {
        ctx.clearRect(0, 0, canvas.width, canvas.height);
        
        confetti.forEach((c, index) => {
            ctx.beginPath();
            ctx.lineWidth = c.w / 2;
            ctx.strokeStyle = c.color;
            ctx.moveTo(c.x + c.tilt + c.w / 4, c.y);
            ctx.lineTo(c.x + c.tilt, c.y + c.tilt + c.h / 4);
            ctx.stroke();
            
            c.tiltAngle += c.tiltAngleIncrement;
            c.y += c.velocity;
            c.tilt = Math.sin(c.tiltAngle) * 15;
            
            if (c.y > canvas.height) {
                confetti[index] = {
                    x: Math.random() * canvas.width,
                    y: -20,
                    w: c.w,
                    h: c.h,
                    color: c.color,
                    tilt: c.tilt,
                    tiltAngleIncrement: c.tiltAngleIncrement,
                    tiltAngle: c.tiltAngle,
                    velocity: c.velocity
                };
            }
        });
        
        requestAnimationFrame(drawConfetti);
    }
    
    drawConfetti();
    
    // Stop konfeti setelah 15 detik
    setTimeout(() => {
        canvas.style.opacity = '0';
        canvas.style.transition = 'opacity 2s';
        setTimeout(() => canvas.remove(), 2000);
    }, 15000);
    @endif
});

// Resize canvas on window resize
window.addEventListener('resize', function() {
    const canvas = document.getElementById('confetti-canvas');
    if (canvas) {
        canvas.width = window.innerWidth;
        canvas.height = window.innerHeight;
    }
});
</script>

<style>
@keyframes fade-in {
    from { opacity: 0; transform: translateY(-30px); }
    to { opacity: 1; transform: translateY(0); }
}

@keyframes scale-in {
    from { transform: scale(0.3); opacity: 0; }
    to { transform: scale(1); opacity: 1; }
}

.animate-fade-in {
    animation: fade-in 0.8s ease-out;
}

.animate-scale-in {
    animation: scale-in 1s ease-out 0.3s both;
}
</style>
@endpush
@endsection