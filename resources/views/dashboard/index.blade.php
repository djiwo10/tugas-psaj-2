@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="w-full">
    <div class="mb-4 text-sm text-red-500">
    </div>

    <!-- SUBJECT CARDS -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">

        @foreach($mapel as $item)

        <div class="{{ $loop->index % 2 == 0 ? 'bg-primary-soft' : 'bg-orange-soft' }}
            rounded-2xl p-6 flex flex-col justify-between min-h-[220px] border-2 border-transparent
            transition-all hover:scale-[1.02] hover:shadow-lg duration-200">

            <div>

                <p class="text-[13px] text-text-muted mb-1.5 font-medium">
                    {{ $item->nama }}
                </p>

                <h3 class="text-lg font-semibold text-text-main mb-3">
                    {{ $item->deskripsi }}
                </h3>

                <p class="text-sm text-text-muted mb-3">
                    {{ $item->materi->count() }} Materi
                </p>

                <div class="w-full h-1.5 bg-gray-200 rounded-full overflow-hidden mb-4">

                    <div class="h-full
                        {{ $loop->index % 2 == 0 ? 'bg-primary' : 'bg-orange' }}
                        transition-all duration-500"
                        style="width: {{ $item->progress }}%">
                    </div>

                </div>

                <p class="text-xs text-text-muted font-medium">
                    {{ $item->progress }}% selesai
                </p>

            </div>

            <a href="{{ route('dashboard.mapel.show', $item->id) }}"
                class="h-10 rounded-xl bg-primary text-white flex items-center justify-center font-semibold hover:bg-primary/90 transition-colors duration-200">
                Masuk Materi
            </a>

        </div>

        @endforeach

        <!-- Progress Summary -->
        <div class="bg-white rounded-2xl p-6 border-2 border-gray-100 shadow-sm">
            <h3 class="text-base font-semibold mb-5 text-gray-900">Progress Belajar Kamu</h3>

            <div class="w-[120px] h-[120px] rounded-full border-[10px] border-primary flex flex-col items-center justify-center mb-5 mx-auto shadow-sm">
                <span class="text-[22px] font-bold text-gray-900">
                    {{ $progress }}%
                </span>
                <p class="text-sm text-gray-600">Selesai</p>
            </div>

            <ul class="space-y-2.5">
                <li class="text-sm flex items-center gap-2 text-gray-700">
                    <span class="w-2.5 h-2.5 rounded-full bg-primary flex-shrink-0"></span>
                    {{ $persenSelesai }}% Materi Sudah Selesai
                </li>
                <li class="text-sm flex items-center gap-2 text-gray-700">
                    <span class="w-2.5 h-2.5 rounded-full bg-orange flex-shrink-0"></span>
                    {{ $persenSedang }}% Sedang Dipelajari
                </li>
                <li class="text-sm flex items-center gap-2 text-gray-700">
                    <span class="w-2.5 h-2.5 rounded-full bg-gray-300 flex-shrink-0"></span>
                    {{ $persenBelum }}% Belum Dimulai
                </li>
            </ul>
        </div>

    </div>

    <!-- RECENT LEARNING TABLE -->
    <div class="bg-white rounded-2xl p-6 border-2 border-gray-100 shadow-sm">
        <div class="flex justify-between items-center mb-4">
            <h3 class="text-base font-semibold text-gray-900">
                Pembelajaran Terakhir Kamu
            </h3>
            <a href="{{ url('/dashboard/riwayat') }}" class="text-sm text-primary hover:underline font-medium">
                Lihat Semua →
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full border-collapse">
                <thead>
                    <tr class="border-b-2 border-gray-100">
                        <th class="text-left text-[13px] text-text-muted pb-3 font-semibold">Tanggal</th>
                        <th class="text-left text-[13px] text-text-muted pb-3 font-semibold">Mata Pelajaran</th>
                        <th class="text-left text-[13px] text-text-muted pb-3 font-semibold">Kategori</th>
                        <th class="text-left text-[13px] text-text-muted pb-3 font-semibold">Tipe</th>
                        <th class="text-left text-[13px] text-text-muted pb-3 font-semibold">Status</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse($recentLearning as $learning)

                    <tr class="hover:bg-gray-50 transition-colors">

                        <td class="text-sm py-3.5 border-t border-gray-100 text-gray-700">
                            {{ $learning->updated_at->format('d/m/Y') }}
                        </td>

                        <td class="text-sm py-3.5 border-t border-gray-100 font-medium text-gray-900">
                            {{ $learning->materi->mapel->nama }}
                        </td>

                        <td class="text-sm py-3.5 border-t border-gray-100 text-gray-700">
                            {{ $learning->materi->judul }}
                        </td>

                        <td class="text-sm py-3.5 border-t border-gray-100 text-gray-600">
                            Materi
                        </td>

                        <td class="text-sm py-3.5 border-t border-gray-100">

                            @if($learning->status == 'selesai')
                            <span class="inline-flex items-center gap-1 bg-green-50 text-green-700 px-3 py-1 rounded-full text-xs font-semibold border border-green-200">
                                <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                </svg>
                                Selesai
                            </span>

                            @elseif($learning->status == 'sedang')
                            <span class="inline-flex items-center gap-1 bg-yellow-50 text-yellow-700 px-3 py-1 rounded-full text-xs font-semibold border border-yellow-200">
                                <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/>
                                </svg>
                                Sedang Dipelajari
                            </span>

                            @else
                            <span class="bg-gray-100 text-gray-600 px-3 py-1 rounded-full text-xs font-medium">
                                Belum
                            </span>
                            @endif

                        </td>

                    </tr>

                    @empty

                    <tr>
                        <td colspan="5" class="text-center py-8 text-gray-400">
                            Belum ada aktivitas
                        </td>
                    </tr>

                    @endforelse

                </tbody>

            </table>
        </div>

    </div>

</div>
@endsection