@extends('layouts.app')

@section('title', 'Help & Support')

@section('header-subtitle', 'Dapatkan bantuan dan dukungan')

@section('content')
<div class="w-full max-w-5xl">

    <h2 class="text-2xl font-bold mb-6">Bantuan & Dukungan</h2>

    <!-- Quick Help Cards -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <div class="bg-white rounded-xl p-6 text-center hover:shadow-lg transition-shadow cursor-pointer">
            <div class="w-16 h-16 bg-primary-soft rounded-full flex items-center justify-center mx-auto mb-4">
                <span class="text-3xl">📚</span>
            </div>
            <h3 class="font-bold mb-2">Panduan Pengguna</h3>
            <p class="text-sm text-text-muted">Pelajari cara menggunakan platform</p>
        </div>

        <div class="bg-white rounded-xl p-6 text-center hover:shadow-lg transition-shadow cursor-pointer">
            <div class="w-16 h-16 bg-orange-soft rounded-full flex items-center justify-center mx-auto mb-4">
                <span class="text-3xl">❓</span>
            </div>
            <h3 class="font-bold mb-2">FAQ</h3>
            <p class="text-sm text-text-muted">Pertanyaan yang sering ditanyakan</p>
        </div>

        <div class="bg-white rounded-xl p-6 text-center hover:shadow-lg transition-shadow cursor-pointer">
            <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                <span class="text-3xl">💬</span>
            </div>
            <h3 class="font-bold mb-2">Hubungi Kami</h3>
            <p class="text-sm text-text-muted">Dapatkan bantuan langsung</p>
        </div>
    </div>

    <!-- FAQ Section -->
    <div class="bg-white rounded-xl p-6 mb-8">
        <h3 class="text-xl font-bold mb-6">Pertanyaan yang Sering Ditanyakan</h3>

        <div class="space-y-4">

@foreach($faqs as $faq)

<details class="group">
    <summary class="flex items-center justify-between cursor-pointer p-4 bg-gray-50 rounded-lg hover:bg-gray-100">
        <span class="font-semibold">{{ $faq->question }}</span>
        <span class="group-open:rotate-180 transition-transform">▼</span>
    </summary>

    <div class="p-4 text-sm text-text-muted">
        {!! nl2br(e($faq->answer)) !!}
    </div>
</details>

@endforeach

</div>
    </div>

    <!-- Contact Info -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-8">
        <div class="bg-white rounded-xl p-6 text-center">
            <div class="text-4xl mb-3">📧</div>
            <h4 class="font-bold mb-2">Email</h4>
            <p class="text-sm text-text-muted">support@calcera.com</p>
        </div>

        <div class="bg-white rounded-xl p-6 text-center">
            <div class="text-4xl mb-3">📱</div>
            <h4 class="font-bold mb-2">WhatsApp</h4>
            <p class="text-sm text-text-muted">+62 812-3456-7890</p>
        </div>

        <div class="bg-white rounded-xl p-6 text-center">
            <div class="text-4xl mb-3">🕒</div>
            <h4 class="font-bold mb-2">Jam Operasional</h4>
            <p class="text-sm text-text-muted">Senin - Jumat<br>08:00 - 17:00 WIB</p>
        </div>
    </div>

</div>
@endsection