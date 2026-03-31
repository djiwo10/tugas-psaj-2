<header class="bg-white border-b px-6 py-4 flex items-center justify-between">
    <div>
        <h1 class="text-lg font-semibold">
            Halo {{ auth()->user()->name }}, Selamat datang di Calcera!
        </h1>
        <p class="text-sm text-gray-500">
            Lanjutkan pembelajaran Matematika dan PKN hari ini.
        </p>
    </div>

    <div class="flex items-center gap-3">
        <input type="text"
               placeholder="Pencarian"
               class="border rounded-lg px-3 py-2 text-sm focus:outline-none">

        <button class="px-4 py-2 border rounded-lg text-sm">
            Ts button
        </button>

        <button class="px-4 py-2 bg-blue-600 text-white rounded-lg text-sm">
            Ts button
        </button>
    </div>
</header>
