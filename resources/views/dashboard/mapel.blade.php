@extends('layouts.app')

@section('title', 'Mata Pelajaran')

@section('header-subtitle', 'Pilih mata pelajaran yang ingin kamu pelajari')

@section('content')
<div class="w-full">

    {{-- Header Section --}}
    <div class="mb-8">
        <h2 class="text-3xl font-bold text-gray-900 mb-2">Mata Pelajaran</h2>
        <p class="text-gray-600">Pilih dan mulai perjalanan belajarmu</p>
    </div>

    {{-- Subject Cards Grid --}}
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

        @foreach ($mapel as $item)
            @php
                // Alternate colors for variety
                $colors = [
                    ['bg' => 'bg-blue-50', 'icon_bg' => 'bg-blue-500', 'badge_bg' => 'bg-blue-500', 'progress' => 'bg-blue-500', 'emoji' => '📐'],
                    ['bg' => 'bg-orange-50', 'icon_bg' => 'bg-orange-500', 'badge_bg' => 'bg-orange-500', 'progress' => 'bg-orange-500', 'emoji' => '🏛️'],
                    ['bg' => 'bg-purple-50', 'icon_bg' => 'bg-purple-500', 'badge_bg' => 'bg-purple-500', 'progress' => 'bg-purple-500', 'emoji' => '🔬'],
                    ['bg' => 'bg-green-50', 'icon_bg' => 'bg-green-500', 'badge_bg' => 'bg-green-500', 'progress' => 'bg-green-500', 'emoji' => '🌍'],
                    ['bg' => 'bg-pink-50', 'icon_bg' => 'bg-pink-500', 'badge_bg' => 'bg-pink-500', 'progress' => 'bg-pink-500', 'emoji' => '🎨'],
                    ['bg' => 'bg-indigo-50', 'icon_bg' => 'bg-indigo-500', 'badge_bg' => 'bg-indigo-500', 'progress' => 'bg-indigo-500', 'emoji' => '💻'],
                ];
                
                $colorIndex = $loop->index % count($colors);
                $color = $colors[$colorIndex];
            @endphp

            <div class="group {{ $color['bg'] }} rounded-2xl p-6 border-2 border-transparent hover:border-{{ explode('-', $color['icon_bg'])[1] }}-200 hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1">

                {{-- Header with Icon & Badge --}}
                <div class="flex items-start justify-between mb-5">
                    
                    {{-- Icon --}}
                    <div class="{{ $color['icon_bg'] }} w-14 h-14 rounded-xl flex items-center justify-center text-white text-2xl shadow-lg group-hover:scale-110 transition-transform duration-300">
                        {{ $color['emoji'] }}
                    </div>

                    {{-- Materi Count Badge --}}
                    <span class="inline-flex items-center gap-1.5 text-xs font-semibold {{ $color['badge_bg'] }} text-white px-3 py-1.5 rounded-full shadow-sm">
                        <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9 4.804A7.968 7.968 0 005.5 4c-1.255 0-2.443.29-3.5.804v10A7.969 7.969 0 015.5 14c1.669 0 3.218.51 4.5 1.385A7.962 7.962 0 0114.5 14c1.255 0 2.443.29 3.5.804v-10A7.968 7.968 0 0014.5 4c-1.255 0-2.443.29-3.5.804V12a1 1 0 11-2 0V4.804z"/>
                        </svg>
                        {{ $item->materi_count }} Materi
                    </span>

                </div>

                {{-- Subject Name --}}
                <h3 class="text-xl font-bold text-gray-900 mb-2 group-hover:text-{{ explode('-', $color['icon_bg'])[1] }}-600 transition-colors duration-300">
                    {{ $item->nama }}
                </h3>

                {{-- Description --}}
                <p class="text-sm text-gray-600 mb-5 line-clamp-2">
                    {{ $item->deskripsi }}
                </p>

                {{-- Progress Bar Section --}}
                <div class="mb-5">
                    <div class="flex justify-between items-center text-xs font-semibold mb-2">
                        <span class="text-gray-600">Progress</span>
                        <span class="text-{{ explode('-', $color['icon_bg'])[1] }}-600">{{ $item->progress }}%</span>
                    </div>
                    <div class="w-full h-2.5 bg-white/60 rounded-full overflow-hidden shadow-inner">
                        <div class="{{ $color['progress'] }} h-full rounded-full transition-all duration-500 shadow-sm"
                             style="width: {{ $item->progress }}%">
                        </div>
                    </div>
                </div>

                {{-- CTA Button --}}
                <a href="{{ route('dashboard.mapel.show', $item->id) }}"
                   class="w-full py-3 {{ $color['icon_bg'] }} text-white rounded-xl font-semibold text-sm hover:opacity-90 transition-all duration-300 text-center flex items-center justify-center gap-2 shadow-lg hover:shadow-xl group-hover:scale-105">
                    <span>Mulai Belajar</span>
                    <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform duration-300" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"/>
                    </svg>
                </a>

            </div>
        @endforeach

    </div>

</div>
@endsection