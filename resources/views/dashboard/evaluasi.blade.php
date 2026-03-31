@extends('layouts.app')

@section('title', 'Evaluasi')

@section('header-subtitle', 'Ikuti evaluasi untuk mengukur pemahamanmu')

@section('content')
<div class="w-full">

    <h2 class="text-2xl font-bold mb-6">Evaluasi Pembelajaran</h2>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-8">
        <div class="bg-gradient-to-br from-blue-500 to-primary p-5 rounded-xl text-white">
            <p class="text-sm opacity-90 mb-1">Evaluasi Selesai</p>
            <h3 class="text-3xl font-bold">8</h3>
        </div>
        <div class="bg-gradient-to-br from-orange-400 to-orange p-5 rounded-xl text-white">
            <p class="text-sm opacity-90 mb-1">Rata-rata Nilai</p>
            <h3 class="text-3xl font-bold">87</h3>
        </div>
        <div class="bg-gradient-to-br from-green-500 to-green-600 p-5 rounded-xl text-white">
            <p class="text-sm opacity-90 mb-1">Tingkat Kelulusan</p>
            <h3 class="text-3xl font-bold">95%</h3>
        </div>
    </div>

    <!-- Available Evaluations -->
    <h3 class="text-xl font-semibold mb-4">Evaluasi Tersedia</h3>
    
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
        
        <!-- Quiz 1 -->
        <div class="bg-white rounded-xl p-6 border-2 border-primary">
            <div class="flex justify-between items-start mb-4">
                <div>
                    <span class="px-3 py-1 bg-primary text-white text-xs rounded-full">Matematika</span>
                    <h4 class="text-lg font-bold mt-3">Quiz Limit & Kontinuitas</h4>
                    <p class="text-sm text-text-muted mt-1">20 soal pilihan ganda</p>
                </div>
                <div class="text-right">
                    <p class="text-2xl font-bold text-primary">60</p>
                    <p class="text-xs text-text-muted">menit</p>
                </div>
            </div>
            
            <div class="space-y-2 mb-4 text-sm">
                <div class="flex items-center gap-2">
                    <span class="text-green-600">✓</span>
                    <span>Kesempatan: 2x</span>
                </div>
                <div class="flex items-center gap-2">
                    <span class="text-green-600">✓</span>
                    <span>Passing grade: 70</span>
                </div>
                <div class="flex items-center gap-2">
                    <span class="text-orange">⏰</span>
                    <span>Batas waktu: 5 Mar 2026</span>
                </div>
            </div>
            
            <button class="w-full py-3 bg-primary text-white rounded-lg font-semibold hover:bg-primary/90 transition-colors">
                Mulai Quiz
            </button>
        </div>

        <!-- Quiz 2 -->
        <div class="bg-white rounded-xl p-6 border-2 border-orange">
            <div class="flex justify-between items-start mb-4">
                <div>
                    <span class="px-3 py-1 bg-orange text-white text-xs rounded-full">PKN</span>
                    <h4 class="text-lg font-bold mt-3">Ujian Pancasila & UUD 1945</h4>
                    <p class="text-sm text-text-muted mt-1">15 soal essay</p>
                </div>
                <div class="text-right">
                    <p class="text-2xl font-bold text-orange">90</p>
                    <p class="text-xs text-text-muted">menit</p>
                </div>
            </div>
            
            <div class="space-y-2 mb-4 text-sm">
                <div class="flex items-center gap-2">
                    <span class="text-green-600">✓</span>
                    <span>Kesempatan: 1x</span>
                </div>
                <div class="flex items-center gap-2">
                    <span class="text-green-600">✓</span>
                    <span>Passing grade: 75</span>
                </div>
                <div class="flex items-center gap-2">
                    <span class="text-orange">⏰</span>
                    <span>Batas waktu: 10 Mar 2026</span>
                </div>
            </div>
            
            <button class="w-full py-3 bg-orange text-white rounded-lg font-semibold hover:bg-orange/90 transition-colors">
                Mulai Ujian
            </button>
        </div>

    </div>

    <!-- Completed Evaluations -->
    <h3 class="text-xl font-semibold mb-4">Riwayat Evaluasi</h3>
    
    <div class="bg-white rounded-xl overflow-hidden">
        <table class="w-full">
            <thead class="bg-gray-50">
                <tr>
                    <th class="text-left p-4 text-sm font-semibold">Judul</th>
                    <th class="text-left p-4 text-sm font-semibold">Mata Pelajaran</th>
                    <th class="text-left p-4 text-sm font-semibold">Tanggal</th>
                    <th class="text-left p-4 text-sm font-semibold">Nilai</th>
                    <th class="text-left p-4 text-sm font-semibold">Status</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                <tr class="hover:bg-gray-50">
                    <td class="p-4">Quiz Integral</td>
                    <td class="p-4">
                        <span class="px-3 py-1 bg-primary-soft text-primary text-xs rounded-full">Matematika</span>
                    </td>
                    <td class="p-4 text-sm text-text-muted">15 Feb 2026</td>
                    <td class="p-4">
                        <span class="text-lg font-bold text-green-600">95</span>
                    </td>
                    <td class="p-4">
                        <span class="px-3 py-1 bg-green-100 text-green-800 text-xs rounded-full">Lulus</span>
                    </td>
                </tr>
                <tr class="hover:bg-gray-50">
                    <td class="p-4">Ujian Turunan</td>
                    <td class="p-4">
                        <span class="px-3 py-1 bg-primary-soft text-primary text-xs rounded-full">Matematika</span>
                    </td>
                    <td class="p-4 text-sm text-text-muted">10 Feb 2026</td>
                    <td class="p-4">
                        <span class="text-lg font-bold text-green-600">88</span>
                    </td>
                    <td class="p-4">
                        <span class="px-3 py-1 bg-green-100 text-green-800 text-xs rounded-full">Lulus</span>
                    </td>
                </tr>
                <tr class="hover:bg-gray-50">
                    <td class="p-4">Quiz Demokrasi</td>
                    <td class="p-4">
                        <span class="px-3 py-1 bg-orange-soft text-orange text-xs rounded-full">PKN</span>
                    </td>
                    <td class="p-4 text-sm text-text-muted">5 Feb 2026</td>
                    <td class="p-4">
                        <span class="text-lg font-bold text-orange">65</span>
                    </td>
                    <td class="p-4">
                        <span class="px-3 py-1 bg-red-100 text-red-800 text-xs rounded-full">Tidak Lulus</span>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

</div>
@endsection