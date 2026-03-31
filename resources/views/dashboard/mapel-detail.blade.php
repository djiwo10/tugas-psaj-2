@extends('layouts.app')

@section('title', $mapel->nama)

@section('content')
<div class="w-full">

    {{-- PROGRESS BAR - Modern & Compact --}}
    <div class="mb-6">
        <div class="flex items-center justify-between mb-2">
            <span class="text-sm font-semibold text-gray-600">Progress Pembelajaran</span>
            <span class="text-2xl font-bold text-primary">{{ $progress }}%</span>
        </div>
        <div class="w-full h-2.5 bg-gray-200 rounded-full overflow-hidden">
            <div class="h-full bg-gradient-to-r from-primary to-primary/80 rounded-full transition-all duration-500"
                 style="width: {{ $progress }}%">
            </div>
        </div>
    </div>

    {{-- HEADER - Clean --}}
    <h2 class="text-3xl font-bold mb-2 text-gray-900">{{ $mapel->nama }}</h2>
    <p class="text-gray-600 mb-8">{{ $mapel->deskripsi }}</p>

    {{-- MATERI CARD - Modern but Compact --}}
    <div class="bg-white rounded-2xl border border-gray-200 overflow-hidden shadow-sm">
        
        {{-- Card Header --}}
        <div class="px-6 py-4 border-b border-gray-100 bg-gray-50/50">
            <h3 class="text-lg font-bold text-gray-900">Daftar Materi</h3>
        </div>

        {{-- Materi List --}}
        <ul class="divide-y divide-gray-100">
            @forelse ($materi as $materi)
                @php
                    $status = $progressMateri[$materi->id]->status ?? 'belum';
                @endphp

                <li class="px-6 py-4 hover:bg-gray-50 transition-colors duration-200">
                    <div class="flex justify-between items-center gap-6">
                        
                        {{-- Title --}}
                        <span class="text-base font-medium text-gray-800">{{ $materi->judul }}</span>

                        <div class="flex items-center gap-4 flex-shrink-0">
                            
                            {{-- STATUS BADGE - Modern --}}
                            @if ($status === 'selesai')
                                <span class="inline-flex items-center gap-1.5 text-sm font-semibold text-green-600 bg-green-50 px-3 py-1 rounded-lg">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                    </svg>
                                    Selesai
                                </span>
                            @elseif ($status === 'sedang')
                                <span class="inline-flex items-center gap-1.5 text-sm font-semibold text-orange-600 bg-orange-50 px-3 py-1 rounded-lg">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/>
                                    </svg>
                                    Sedang
                                </span>
                            @else
                                <span class="text-gray-400 text-sm font-medium">Belum</span>
                            @endif

                            {{-- ACTION BUTTON --}}
                            @if(!$materi->locked)
                                <a href="{{ route('materi.show', $materi->id) }}"
                                   class="inline-flex items-center gap-1.5 text-primary hover:text-primary/80 text-sm font-semibold transition-colors duration-200">
                                    Buka
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"/>
                                    </svg>
                                </a>
                            @else
                                <span class="inline-flex items-center gap-1.5 text-gray-400 text-sm">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd"/>
                                    </svg>
                                    Terkunci
                                </span>
                            @endif
                            
                        </div>
                    </div>
                </li>
            @empty
                <li class="px-6 py-12 text-center">
                    <p class="text-sm text-gray-500">Belum ada materi</p>
                </li>
            @endforelse
        </ul>
        
    </div>

</div>
@endsection