@extends('layouts.app')

@section('title', 'Tugas')

@section('header-subtitle', 'Kelola dan kerjakan tugas-tugas kamu')

@section('content')
<div class="w-full">

    {{-- Header Section with Filters --}}
    <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-4 mb-8">
        <div>
            <h2 class="text-3xl font-bold text-gray-900 mb-1">Daftar Tugas</h2>
            <p class="text-sm text-gray-600">Kerjakan tugas untuk meningkatkan pemahamanmu</p>
        </div>
        
        {{-- Filter Buttons --}}
        <div class="flex gap-2">
            <button class="px-4 py-2.5 bg-primary text-white rounded-xl hover:bg-primary/90 transition-all duration-300 text-sm font-semibold shadow-sm hover:shadow-md">
                Semua
            </button>
            <button class="px-4 py-2.5 bg-white border-2 border-gray-200 rounded-xl hover:border-primary/30 hover:bg-gray-50 transition-all duration-300 text-sm font-semibold text-gray-700">
                Aktif
            </button>
            <button class="px-4 py-2.5 bg-white border-2 border-gray-200 rounded-xl hover:border-primary/30 hover:bg-gray-50 transition-all duration-300 text-sm font-semibold text-gray-700">
                Selesai
            </button>
        </div>
    </div>

    {{-- Tugas Cards --}}
    <div class="space-y-4">

        @forelse ($kuis as $item)
            @php
                $isMtk = strtolower($item->mataPelajaran->nama) === 'matematika';
                
                // Color configuration based on subject
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

            <div class="group bg-white rounded-2xl p-6 border-2 border-gray-100 hover:border-{{ $isMtk ? 'blue' : 'orange' }}-200 hover:shadow-lg transition-all duration-300">
                
                <div class="flex flex-col sm:flex-row sm:items-start justify-between gap-4">
                    
                    {{-- Left Content --}}
                    <div class="flex-1 min-w-0">
                        
                        {{-- Badges Row --}}
                        <div class="flex flex-wrap items-center gap-2 mb-3">
                            {{-- Subject Badge --}}
                            <span class="inline-flex items-center gap-1.5 px-3 py-1.5 text-xs font-semibold rounded-lg {{ $color['badge_bg'] }} {{ $color['badge_text'] }} border {{ $color['badge_border'] }}">
                                <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3zM3.31 9.397L5 10.12v4.102a8.969 8.969 0 00-1.05-.174 1 1 0 01-.89-.89 11.115 11.115 0 01.25-3.762zM9.3 16.573A9.026 9.026 0 007 14.935v-3.957l1.818.78a3 3 0 002.364 0l5.508-2.361a11.026 11.026 0 01.25 3.762 1 1 0 01-.89.89 8.968 8.968 0 00-5.35 2.524 1 1 0 01-1.4 0zM6 18a1 1 0 001-1v-2.065a8.935 8.935 0 00-2-.712V17a1 1 0 001 1z"/>
                                </svg>
                                {{ $item->mataPelajaran->nama }}
                            </span>

                            {{-- Status Badge --}}
                            <span class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-yellow-50 text-yellow-700 text-xs rounded-lg font-semibold border border-yellow-200">
                                <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/>
                                </svg>
                                Aktif
                            </span>
                        </div>

                        {{-- Title --}}
                        <h3 class="text-lg font-bold text-gray-900 mb-2 group-hover:{{ $color['icon_color'] }} transition-colors duration-300">
                            {{ $item->judul }}
                        </h3>

                        {{-- Description --}}
                        <p class="text-sm text-gray-600 mb-4">
                            {{ $item->deskripsi ?? 'Kerjakan kuis berikut untuk menguji pemahamanmu.' }}
                        </p>

                        {{-- Meta Information --}}
                        <div class="flex flex-wrap items-center gap-4 text-xs text-gray-500">
                            <span class="inline-flex items-center gap-1.5 font-medium">
                                <svg class="w-4 h-4 {{ $color['icon_color'] }}" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"/>
                                    <path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd"/>
                                </svg>
                                <span class="text-gray-700">{{ $item->pertanyaan()->count() }} soal</span>
                            </span>

                            {{-- You can add more meta info here if needed --}}
                            {{-- <span class="inline-flex items-center gap-1.5 font-medium">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/>
                                </svg>
                                30 menit
                            </span> --}}
                        </div>

                    </div>

                    {{-- Right Action Button --}}
                    <div class="flex-shrink-0">
                        <a href="{{ route('dashboard.tugas.show', $item->id) }}"
                           class="inline-flex items-center gap-2 px-5 py-3 {{ $color['button_bg'] }} {{ $color['button_hover'] }} text-white rounded-xl text-sm font-semibold transition-all duration-300 shadow-md hover:shadow-lg transform hover:scale-105 active:scale-95 w-full sm:w-auto justify-center">
                            <span>Kerjakan</span>
                            <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform duration-300" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"/>
                            </svg>
                        </a>
                    </div>

                </div>

            </div>

        @empty
            {{-- Empty State --}}
            <div class="bg-white rounded-2xl border-2 border-dashed border-gray-200 p-12 text-center">
                <svg class="w-20 h-20 mx-auto text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                </svg>
                <h3 class="text-lg font-semibold text-gray-700 mb-2">Belum Ada Tugas</h3>
                <p class="text-sm text-gray-500">Tugas baru akan muncul di sini ketika tersedia.</p>
            </div>
        @endforelse

    </div>

</div>
@endsection