<header 
class="sticky top-0 z-10 border-b border-border"
style="
background-image: linear-gradient(rgba(255,255,255,0.85), rgba(255,255,255,0.85)), url('{{ asset('images/headbarbatik.jpg') }}');
background-size: 450px;
background-repeat: repeat;
background-position: center;
">

<div class="w-full px-5 py-4 flex justify-between items-center flex-wrap gap-4">

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

            <!-- NOTIFIKASI -->
            <div class="relative hidden sm:block">

                <button id="notifBtn" onclick="toggleNotif(event)"
                    class="h-10 px-4 rounded-[10px] bg-transparent border border-border text-sm cursor-pointer hover:bg-gray-50 transition-colors relative">

                    Notifikasi

                    @auth
                        @if(auth()->user()->unreadNotifications->count() > 0)
                        <span id="notifBadge" class="ml-2 bg-red-500 text-white text-xs px-2 py-0.5 rounded-full">
                            {{ auth()->user()->unreadNotifications->count() }}
                        </span>
                        @endif
                    @endauth

                </button>

            </div>

            <!-- BANTUAN -->
            <button class="h-10 px-4 rounded-[10px] bg-primary text-white border-none text-sm cursor-pointer hover:bg-primary/90 transition-colors hidden sm:block">
                Bantuan
            </button>

        </div>

    </div>
</header>

<!-- ======= DROPDOWN NOTIFIKASI ======= -->
<style>
    @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600&display=swap');

    #notifDropdown {
        display: none;
        position: fixed;
        width: 360px;
        z-index: 99999;
        font-family: 'Plus Jakarta Sans', sans-serif;
        border-radius: 20px;
        overflow: hidden;
        background: #ffffff;
        border: 1px solid rgba(0,0,0,0.07);
        box-shadow: 0 20px 60px rgba(0,0,0,0.12), 0 4px 16px rgba(0,0,0,0.06);
        transform-origin: top right;
        animation: dropIn 0.2s cubic-bezier(0.34, 1.56, 0.64, 1) forwards;
    }

    @keyframes dropIn {
        from { opacity: 0; transform: scale(0.92) translateY(-8px); }
        to   { opacity: 1; transform: scale(1) translateY(0); }
    }

    #notifList::-webkit-scrollbar { width: 4px; }
    #notifList::-webkit-scrollbar-track { background: transparent; }
    #notifList::-webkit-scrollbar-thumb { background: #e5e7eb; border-radius: 99px; }

    .notif-item {
        display: flex;
        gap: 12px;
        align-items: flex-start;
        padding: 14px 16px;
        border-bottom: 1px solid #f9fafb;
        transition: background 0.15s ease;
        cursor: default;
    }
    .notif-item:hover { background: #f8faff; }
    .notif-item:last-child { border-bottom: none; }

    .notif-icon {
        width: 36px;
        height: 36px;
        border-radius: 10px;
        background: linear-gradient(135deg, #e0e7ff 0%, #c7d2fe 100%);
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        margin-top: 2px;
    }

    .notif-icon svg { width: 16px; height: 16px; color: #6366f1; }

    .notif-title {
        font-size: 13px;
        font-weight: 600;
        color: #111827;
        line-height: 1.3;
        margin: 0 0 3px;
    }

    .notif-msg {
        font-size: 12px;
        color: #6b7280;
        line-height: 1.5;
        margin: 0 0 5px;
    }

    .notif-time {
        font-size: 10px;
        color: #d1d5db;
        font-weight: 500;
        letter-spacing: 0.02em;
    }

    .notif-dot {
        width: 7px;
        height: 7px;
        border-radius: 50%;
        background: #f87171;
        flex-shrink: 0;
        margin-top: 6px;
        box-shadow: 0 0 0 2px #fee2e2;
    }

    #notifFooter {
        background: linear-gradient(to bottom, #fafafa, #f5f5f5);
        border-top: 1px solid #f0f0f0;
        padding: 12px 16px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    #markAllBtn {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        font-size: 12px;
        font-weight: 600;
        color: #6366f1;
        background: white;
        border: 1px solid #e0e7ff;
        border-radius: 8px;
        padding: 6px 14px;
        cursor: pointer;
        transition: all 0.15s ease;
        letter-spacing: 0.01em;
    }
    #markAllBtn:hover {
        background: #6366f1;
        color: white;
        border-color: #6366f1;
        transform: translateY(-1px);
        box-shadow: 0 4px 12px rgba(99,102,241,0.25);
    }

    .notif-empty {
        padding: 32px 24px;
        text-align: center;
    }
    .notif-empty-icon {
        width: 36px;
        height: 36px;
        border-radius: 50%;
        background: #f0fdf4;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 10px;
    }
    .notif-empty p {
        font-size: 12.5px;
        color: #9ca3af;
        margin: 0;
        font-weight: 500;
    }
</style>

<div id="notifDropdown">
    @auth

    {{-- List notif --}}
    <div id="notifList" style="max-height: 320px; overflow-y: auto;">
        @forelse(auth()->user()->unreadNotifications as $notif)

        <div class="notif-item">
            <div class="notif-icon">
                <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
                </svg>
            </div>
            <div style="flex:1; min-width:0;">
                <p class="notif-title">{{ $notif->data['title'] }}</p>
                <p class="notif-msg">{{ $notif->data['message'] }}</p>
                <p class="notif-time">{{ $notif->created_at->diffForHumans() }}</p>
            </div>
            <div class="notif-dot"></div>
        </div>

        @empty

        <div class="notif-empty">
            <div class="notif-empty-icon">
                <svg width="16" height="16" fill="none" stroke="#22c55e" stroke-width="2.5" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                </svg>
            </div>
            <p>Semua notifikasi sudah dibaca</p>
        </div>

        @endforelse
    </div>

    {{-- Footer --}}
    @if(auth()->user()->unreadNotifications->count() > 0)
    <div id="notifFooter">
        <button id="markAllBtn" onclick="markAllRead()">
            <svg width="13" height="13" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
            </svg>
            Tandai semua sudah dibaca
        </button>
    </div>
    @endif

    @endauth
</div>

<!-- SOUND NOTIFICATION -->
<audio id="notifSound">
    <source src="{{ asset('sounds/iphone-notification.mp3') }}" type="audio/mpeg">
</audio>

<script>

function toggleNotif(event) {
    event.stopPropagation()
    const dropdown = document.getElementById('notifDropdown')
    const btn = document.getElementById('notifBtn')

    if (dropdown.style.display === 'none' || dropdown.style.display === '') {
        const rect = btn.getBoundingClientRect()
        dropdown.style.top = (rect.bottom + 8) + 'px'
        dropdown.style.right = (window.innerWidth - rect.right) + 'px'
        dropdown.style.display = 'block'
    } else {
        dropdown.style.display = 'none'
    }
}

document.addEventListener('click', function () {
    document.getElementById('notifDropdown').style.display = 'none'
})
document.getElementById('notifDropdown').addEventListener('click', function (e) {
    e.stopPropagation()
})

function markAllRead() {
    fetch('/notifications/mark-all-read', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        }
    })
    .then(res => res.json())
    .then(data => {
        if (data.success) {
            // Hapus badge
            const badge = document.getElementById('notifBadge')
            if (badge) badge.remove()

            // Ganti list jadi empty state
            const list = document.getElementById('notifList')
            if (list) {
                list.innerHTML = `
                    <div class="notif-empty">
                        <div class="notif-empty-icon">
                            <svg width="16" height="16" fill="none" stroke="#22c55e" stroke-width="2.5" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                            </svg>
                        </div>
                        <p>Semua notifikasi sudah dibaca</p>
                    </div>
                `
            }

            // Sembunyikan footer
            const footer = document.getElementById('notifFooter')
            if (footer) footer.style.display = 'none'
        }
    })
    .catch(() => {})
}

let lastNotifCount = {{ auth()->user()->unreadNotifications->count() ?? 0 }}

setInterval(() => {
    fetch('/check-notifications')
    .then(res => res.json())
    .then(data => {
        if (data.count > lastNotifCount) {
            let sound = document.getElementById("notifSound")
            if (sound) {
                sound.play().catch(() => {})
            }
        }
        lastNotifCount = data.count
    })
}, 10000)

</script>