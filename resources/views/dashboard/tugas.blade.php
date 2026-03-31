@extends('layouts.app')

@section('title', 'Tugas')

@section('header-subtitle', 'Kelola dan kerjakan tugas-tugas kamu')

@section('content')
<div class="w-full">

<div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-4 mb-8">
    <div>
        <h2 class="text-3xl font-bold text-gray-900 mb-1">Daftar Tugas</h2>
        <p class="text-sm text-gray-600">Kerjakan tugas untuk meningkatkan pemahamanmu</p>
    </div>
</div>

<div class="space-y-4">

@forelse ($kuis as $item)

@php
$isMtk = strtolower($item->mataPelajaran->nama) === 'matematika';

/* ✅ CEK APAKAH USER SUDAH MENGERJAKAN */
$isSelesai = isset($hasilUser[$item->id]);

/* ✅ AMBIL NILAI JIKA ADA */
$nilai = $isSelesai ? $hasilUser[$item->id]->nilai : null;

$colors = [
    'matematika' => [
        'badge_bg' => 'bg-blue-50',
        'badge_text' => 'text-blue-700',
        'badge_border' => 'border-blue-200',
        'button_bg' => 'bg-blue-500',
        'button_hover' => 'hover:bg-blue-600',
        'icon_color' => 'text-blue-500',
    ],
    'default' => [
        'badge_bg' => 'bg-orange-50',
        'badge_text' => 'text-orange-700',
        'badge_border' => 'border-orange-200',
        'button_bg' => 'bg-orange-500',
        'button_hover' => 'hover:bg-orange-600',
        'icon_color' => 'text-orange-500',
    ],
];

$color = $isMtk ? $colors['matematika'] : $colors['default'];
@endphp


<div class="group bg-white rounded-2xl p-6 border-2 border-gray-100 hover:shadow-lg transition-all duration-300">

<div class="flex flex-col sm:flex-row sm:items-start justify-between gap-4">

<div class="flex-1 min-w-0">

{{-- BADGES --}}
<div class="flex flex-wrap items-center gap-2 mb-3">

<span class="px-3 py-1.5 text-xs font-semibold rounded-lg {{ $color['badge_bg'] }} {{ $color['badge_text'] }} border {{ $color['badge_border'] }}">
    {{ $item->mataPelajaran->nama }}
</span>


{{-- ⭐ STATUS BADGE UPDATED --}}
@if($isSelesai)

<span class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-green-50 text-green-700 text-xs rounded-lg font-semibold border border-green-200">
    ✅ Selesai
</span>

@else

<span class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-yellow-50 text-yellow-700 text-xs rounded-lg font-semibold border border-yellow-200">
    🔥 Aktif
</span>

@endif

</div>

<h3 class="text-lg font-bold text-gray-900 mb-2">
    {{ $item->judul }}
</h3>

<p class="text-sm text-gray-600 mb-4">
    {{ $item->deskripsi ?? 'Kerjakan kuis berikut untuk menguji pemahamanmu.' }}
</p>

<div class="text-xs text-gray-500 space-y-1">

<div>
    {{ $item->pertanyaan()->count() }} soal
</div>

@if($isSelesai)
<div class="text-green-600 font-semibold">
    🎯 Nilai kamu: {{ $nilai }}
</div>
@endif

</div>

</div>


{{-- ⭐ BUTTON UPDATED --}}
<div class="flex-shrink-0">

@if($isSelesai)

<a href="{{ route('dashboard.tugas.hasil', $item->id) }}"
class="px-5 py-3 bg-green-500 hover:bg-green-600 text-white rounded-xl text-sm font-semibold transition">
    Lihat Hasil
</a>

@else

<a href="{{ route('dashboard.tugas.show', $item->id) }}"
class="inline-flex items-center gap-2 px-5 py-3 {{ $color['button_bg'] }} {{ $color['button_hover'] }} text-white rounded-xl text-sm font-semibold transition-all duration-300">
    Kerjakan →
</a>

@endif

</div>

</div>
</div>

@empty

<div class="bg-white rounded-2xl border-2 border-dashed border-gray-200 p-12 text-center">
    <h3 class="text-lg font-semibold text-gray-700 mb-2">Belum Ada Tugas</h3>
</div>

@endforelse

</div>
</div>
@endsection