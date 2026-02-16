<header class="sticky top-0 z-10 bg-transparent">
    <div class="w-full bg-white border-0 px-5 py-4 flex justify-between items-center flex-wrap gap-4">

        <div class="max-w-[520px]">
            <h2 class="text-xl font-semibold text-text-main mb-1.5">
                @if(Auth::check())
                    Halo {{ Auth::user()->name }}, Selamat datang di Calcera!
                @else
                    Halo, Selamat datang di Calcera!
                @endif
            </h2>
            <p class="text-sm text-text-muted">
                @yield('header-subtitle', 'Lanjutkan pembelajaran Matematika dan PKN hari ini.')
            </p>
        </div>

        <div class="flex items-center gap-3">
            <!-- Search Box -->
        
            <!-- Action Buttons -->
            <button class="h-10 px-4 rounded-[10px] bg-transparent border border-border text-sm cursor-pointer hover:bg-gray-50 transition-colors hidden sm:block">
                Notifikasi
            </button>
            <button class="h-10 px-4 rounded-[10px] bg-primary text-white border-none text-sm cursor-pointer hover:bg-primary/90 transition-colors hidden sm:block">
                Bantuan
            </button>
        </div>

    </div>
</header>