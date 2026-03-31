@extends('layouts.app')

@section('title', 'Progress')

@section('header-subtitle', 'Pantau perkembangan belajarmu')

@section('content')
<div class="w-full">

    <h2 class="text-2xl font-bold mb-6">Progress Pembelajaran</h2>

    <!-- Overall Progress -->
    <div class="bg-gradient-to-r from-primary to-blue-600 rounded-2xl p-8 text-white mb-8">
        <div class="flex items-center justify-between">
            <div class="flex-1">
                <h3 class="text-2xl font-bold mb-2">Progress Keseluruhan</h3>
                <p class="opacity-90 mb-4">Kamu sudah menyelesaikan 80% dari total pembelajaran</p>
                
                <div class="w-full bg-white/20 rounded-full h-4 mb-2">
                    <div class="bg-white rounded-full h-4 transition-all duration-500" style="width: 80%"></div>
                </div>
                <p class="text-sm opacity-90">80% Complete</p>
            </div>
            
            <div class="w-40 h-40 bg-white/10 rounded-full flex items-center justify-center ml-8">
                <div class="text-center">
                    <p class="text-5xl font-bold">80%</p>
                    <p class="text-sm opacity-90">Selesai</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Progress by Subject -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
        
        <!-- Matematika Progress -->
        <div class="bg-white rounded-xl p-6 border border-border">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-lg font-bold">📐 Matematika</h3>
                <span class="text-2xl font-bold text-primary">75%</span>
            </div>
            
            <div class="space-y-3">
                <div>
                    <div class="flex justify-between text-sm mb-1">
                        <span>Limit</span>
                        <span class="text-green-600 font-semibold">100%</span>
                    </div>
                    <div class="w-full bg-gray-200 rounded-full h-2">
                        <div class="bg-green-500 rounded-full h-2" style="width: 100%"></div>
                    </div>
                </div>
                
                <div>
                    <div class="flex justify-between text-sm mb-1">
                        <span>Turunan</span>
                        <span class="text-yellow-600 font-semibold">80%</span>
                    </div>
                    <div class="w-full bg-gray-200 rounded-full h-2">
                        <div class="bg-yellow-500 rounded-full h-2" style="width: 80%"></div>
                    </div>
                </div>
                
                <div>
                    <div class="flex justify-between text-sm mb-1">
                        <span>Integral</span>
                        <span class="text-orange font-semibold">60%</span>
                    </div>
                    <div class="w-full bg-gray-200 rounded-full h-2">
                        <div class="bg-orange rounded-full h-2" style="width: 60%"></div>
                    </div>
                </div>
                
                <div>
                    <div class="flex justify-between text-sm mb-1">
                        <span>Matriks</span>
                        <span class="text-red-600 font-semibold">40%</span>
                    </div>
                    <div class="w-full bg-gray-200 rounded-full h-2">
                        <div class="bg-red-500 rounded-full h-2" style="width: 40%"></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- PKN Progress -->
        <div class="bg-white rounded-xl p-6 border border-border">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-lg font-bold">🏛️ PKN</h3>
                <span class="text-2xl font-bold text-orange">85%</span>
            </div>
            
            <div class="space-y-3">
                <div>
                    <div class="flex justify-between text-sm mb-1">
                        <span>Pancasila</span>
                        <span class="text-green-600 font-semibold">100%</span>
                    </div>
                    <div class="w-full bg-gray-200 rounded-full h-2">
                        <div class="bg-green-500 rounded-full h-2" style="width: 100%"></div>
                    </div>
                </div>
                
                <div>
                    <div class="flex justify-between text-sm mb-1">
                        <span>UUD 1945</span>
                        <span class="text-green-600 font-semibold">90%</span>
                    </div>
                    <div class="w-full bg-gray-200 rounded-full h-2">
                        <div class="bg-green-500 rounded-full h-2" style="width: 90%"></div>
                    </div>
                </div>
                
                <div>
                    <div class="flex justify-between text-sm mb-1">
                        <span>Demokrasi</span>
                        <span class="text-yellow-600 font-semibold">75%</span>
                    </div>
                    <div class="w-full bg-gray-200 rounded-full h-2">
                        <div class="bg-yellow-500 rounded-full h-2" style="width: 75%"></div>
                    </div>
                </div>
                
                <div>
                    <div class="flex justify-between text-sm mb-1">
                        <span>HAM</span>
                        <span class="text-orange font-semibold">70%</span>
                    </div>
                    <div class="w-full bg-gray-200 rounded-full h-2">
                        <div class="bg-orange rounded-full h-2" style="width: 70%"></div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Achievement Stats -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-8">
        <div class="bg-white rounded-xl p-5 text-center border border-border">
            <div class="text-4xl mb-2">📚</div>
            <p class="text-2xl font-bold text-primary">24</p>
            <p class="text-sm text-text-muted">Materi Selesai</p>
        </div>
        
        <div class="bg-white rounded-xl p-5 text-center border border-border">
            <div class="text-4xl mb-2">✅</div>
            <p class="text-2xl font-bold text-green-600">18</p>
            <p class="text-sm text-text-muted">Tugas Selesai</p>
        </div>
        
        <div class="bg-white rounded-xl p-5 text-center border border-border">
            <div class="text-4xl mb-2">🏆</div>
            <p class="text-2xl font-bold text-orange">8</p>
            <p class="text-sm text-text-muted">Quiz Lulus</p>
        </div>
        
        <div class="bg-white rounded-xl p-5 text-center border border-border">
            <div class="text-4xl mb-2">⭐</div>
            <p class="text-2xl font-bold text-yellow-600">87</p>
            <p class="text-sm text-text-muted">Rata-rata Nilai</p>
        </div>
    </div>

    <!-- Recent Activity -->
    <div class="bg-white rounded-xl p-6">
        <h3 class="text-lg font-bold mb-4">Aktivitas Terakhir</h3>
        
        <div class="space-y-4">
            <div class="flex items-center gap-4 pb-4 border-b border-gray-100">
                <div class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center text-green-600 font-bold">
                    ✓
                </div>
                <div class="flex-1">
                    <p class="font-semibold">Menyelesaikan Materi Limit</p>
                    <p class="text-sm text-text-muted">Matematika • 2 jam yang lalu</p>
                </div>
            </div>
            
            <div class="flex items-center gap-4 pb-4 border-b border-gray-100">
                <div class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center text-blue-600 font-bold">
                    📝
                </div>
                <div class="flex-1">
                    <p class="font-semibold">Mengerjakan Quiz Integral</p>
                    <p class="text-sm text-text-muted">Matematika • 1 hari yang lalu</p>
                </div>
                <span class="text-lg font-bold text-green-600">95</span>
            </div>
            
            <div class="flex items-center gap-4">
                <div class="w-10 h-10 bg-orange-100 rounded-full flex items-center justify-center text-orange font-bold">
                    📖
                </div>
                <div class="flex-1">
                    <p class="font-semibold">Membaca Materi Demokrasi</p>
                    <p class="text-sm text-text-muted">PKN • 2 hari yang lalu</p>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection