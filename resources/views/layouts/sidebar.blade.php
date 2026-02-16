<aside class="fixed top-0 left-0 w-[280px] h-screen bg-white border-r-2 border-border flex flex-col">

    <!-- LOGO -->
    <div class="px-6 py-7 pb-5">
        <a href="{{ url('/dashboard') }}" class="font-medium text-xl tracking-logo text-[#1e1e1e]">
            CALCERA
        </a>
    </div>

    <!-- MENU -->
    <nav class="px-4 flex-1 overflow-y-auto">

        <!-- MAIN -->
        <div class="mb-6">
            <p class="text-[11px] tracking-wider mb-2.5 text-[#1e1e1e] opacity-60">MAIN</p>

            <a href="{{ url('/dashboard') }}"
            class="menu-item flex items-center gap-3 h-11 px-3 rounded-xl text-base font-normal text-[rgba(30,30,30,0.5)] transition-all duration-200 hover:bg-gray-50">
                <i class="ph-fill ph-house text-[22px]"></i>
                <span>Dashboard</span>
            </a>
        </div>


        <!-- LEARNING ACTIVITY -->
        <div class="mb-6">
            <p class="text-[11px] tracking-wider mb-2.5 text-[#1e1e1e] opacity-60">LEARNING ACTIVITY</p>

            <a href="{{ url('/dashboard/mapel') }}"
            class="menu-item flex items-center gap-3 h-11 px-3 rounded-xl text-base font-normal text-[rgba(30,30,30,0.5)] transition-all duration-200 hover:bg-gray-50">
                <i class="ph-fill ph-book-open text-[22px]"></i>
                <span>Mata Pelajaran</span>
            </a>

            <a href="{{ url('/dashboard/tugas') }}"
            class="menu-item flex items-center gap-3 h-11 px-3 rounded-xl text-base font-normal text-[rgba(30,30,30,0.5)] transition-all duration-200 hover:bg-gray-50">
                <i class="ph-fill ph-clipboard-text text-[22px]"></i>
                <span>Tugas</span>
            </a>
        </div>


        <!-- TOOLS -->
        <div class="mb-6">
            <p class="text-[11px] tracking-wider mb-2.5 text-[#1e1e1e] opacity-60">TOOLS</p>

            <a href="{{ url('/dashboard/kalender') }}"
            class="menu-item flex items-center gap-3 h-11 px-3 rounded-xl text-base font-normal text-[rgba(30,30,30,0.5)] transition-all duration-200 hover:bg-gray-50">
                <i class="ph-fill ph-calendar text-[22px]"></i>
                <span>Kalender</span>
            </a>

            <a href="{{ url('/dashboard/setelan') }}"
            class="menu-item flex items-center gap-3 h-11 px-3 rounded-xl text-base font-normal text-[rgba(30,30,30,0.5)] transition-all duration-200 hover:bg-gray-50">
                <i class="ph-fill ph-gear text-[22px]"></i>
                <span>Setelan</span>
            </a>

            <a href="{{ url('/dashboard/help') }}"
            class="menu-item flex items-center gap-3 h-11 px-3 rounded-xl text-base font-normal text-[rgba(30,30,30,0.5)] transition-all duration-200 hover:bg-gray-50">
                <i class="ph-fill ph-headset text-[22px]"></i>
                <span>Help and support</span>
            </a>
        </div>

    </nav>

    <!-- USER PROFILE CARD -->
    <div class="mx-4 mb-6 w-[calc(100%-32px)] border border-border rounded-[18px] bg-white overflow-hidden">

        <!-- WELCOME PART -->
        <div class="p-4 border-b border-border">
            <p class="text-[15px] font-semibold text-[#1E1E1E] mb-1.5 leading-[1.4]">
                Selamat datang di Calcera! 👋
            </p>
            <p class="text-[13px] text-gray-500 leading-relaxed mb-4">
                Akun kamu sudah siap. Yuk mulai belajar Matematika dan PKN.
            </p>

            <div class="flex gap-3">
                <a href="{{ url('/dashboard/mapel') }}" class="h-[34px] px-3 text-[13px] rounded-full bg-primary text-white border-none cursor-pointer hover:bg-primary/90 transition-colors flex items-center justify-center">
                    Mulai Belajar
                </a>
                <a href="{{ url('/dashboard/help') }}" class="h-[34px] px-3 text-[13px] rounded-full bg-transparent border border-border cursor-pointer hover:bg-gray-50 transition-colors flex items-center justify-center">
                    Panduan
                </a>
            </div>
        </div>

        <!-- USER PART -->
        <div class="p-4">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-full overflow-hidden bg-gray-200">
@if(Auth::check() && Auth::user()->avatar)
    <img 
        src="{{ asset('storage/'.Auth::user()->avatar) }}" 
        alt="{{ Auth::user()->name ?? 'User' }}" 
        class="w-full h-full object-cover"
    />
@else
    <img src="{{ asset('AKU1.jpeg') }}" alt="User" class="w-full h-full object-cover" />
@endif
</div>

                <div class="flex-1">
                    <p class="text-sm font-semibold">{{ Auth::user()->name ?? 'Zulfiqar Ahnaf, S.Pd' }}</p>
                    <p class="text-xs text-gray-400">{{ Auth::user()->email ?? 'zulfiqar14@gmail.com' }}</p>
                </div>

                @if(Auth::check())
                    <form action="{{ route('logout') }}" method="POST" class="ml-auto">
                        @csrf
                        <button type="submit" class="text-lg cursor-pointer hover:opacity-70 transition-opacity" title="Logout">
                            ⤴
                        </button>
                    </form>
                @else
                    <div class="ml-auto text-lg cursor-pointer hover:opacity-70 transition-opacity" title="Settings">⤴</div>
                @endif
            </div>
        </div>

    </div>

</aside>