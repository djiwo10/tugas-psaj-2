@extends('layouts.app')

@section('title', $materi->judul)

@section('content')
<div class="w-full">

    {{-- Header Section --}}
    <div class="mb-8">
        {{-- Back Navigation --}}
        <a href="{{ route('dashboard.mapel.show', $materi->mapel->id) }}"
           class="inline-flex items-center gap-2 text-gray-600 hover:text-primary transition-colors duration-200 mb-4 text-sm font-medium">
            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd"/>
            </svg>
            Kembali
        </a>

        {{-- Title --}}
        <h1 class="text-3xl sm:text-4xl font-bold text-gray-900 mb-3">
            {{ $materi->judul }}
        </h1>

        {{-- Meta Info --}}
        <div class="flex items-center gap-4 text-sm text-gray-500">
            <span class="inline-flex items-center gap-1.5">
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3zM3.31 9.397L5 10.12v4.102a8.969 8.969 0 00-1.05-.174 1 1 0 01-.89-.89 11.115 11.115 0 01.25-3.762zM9.3 16.573A9.026 9.026 0 007 14.935v-3.957l1.818.78a3 3 0 002.364 0l5.508-2.361a11.026 11.026 0 01.25 3.762 1 1 0 01-.89.89 8.968 8.968 0 00-5.35 2.524 1 1 0 01-1.4 0zM6 18a1 1 0 001-1v-2.065a8.935 8.935 0 00-2-.712V17a1 1 0 001 1z"/>
                </svg>
                {{ $materi->mapel->nama }}
            </span>
        </div>
    </div>

    {{-- Content Card --}}
    <div class="bg-white rounded-2xl border-2 border-gray-100 shadow-sm overflow-hidden mb-6">
        <div class="p-6 sm:p-8">
            {{-- Content with Tailwind Prose --}}
            <div class="prose prose-lg prose-gray max-w-none leading-relaxed
                        prose-p:mb-6 prose-ul:mb-6 prose-ol:mb-6
                        prose-li:mb-2
                        prose-headings:font-bold prose-headings:text-gray-900
                        prose-h1:text-3xl prose-h2:text-2xl prose-h3:text-xl
                        prose-p:text-gray-700 prose-p:leading-relaxed
                        prose-a:text-primary prose-a:no-underline hover:prose-a:underline
                        prose-strong:text-gray-900 prose-strong:font-semibold
                        prose-ul:text-gray-700 prose-ol:text-gray-700
                        prose-li:marker:text-primary
                        prose-code:text-primary prose-code:bg-primary/5 prose-code:px-1.5 prose-code:py-0.5 prose-code:rounded
                        prose-pre:bg-gray-50 prose-pre:border-2 prose-pre:border-gray-200
                        prose-img:rounded-xl prose-img:shadow-md">
                {!! $materi->isi !!}
            </div>
        </div>
    </div>

    {{-- Action Section --}}
    <div class="bg-white rounded-2xl border-2 border-gray-100 shadow-sm p-6">
        @if(!$progress || $progress->status !== 'selesai')
            {{-- Mark as Complete Form --}}
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                <div>
                    <h3 class="font-semibold text-gray-900 mb-1">Selesaikan Materi</h3>
                    <p class="text-sm text-gray-600">Tandai materi ini sebagai selesai untuk melanjutkan ke materi berikutnya</p>
                </div>
                
                <form action="{{ route('materi.selesai', $materi->id) }}" method="POST" class="flex-shrink-0">
                    @csrf
                    <button type="submit"
                            class="inline-flex items-center justify-center gap-2 px-6 py-3 bg-green-600 hover:bg-green-700 text-white rounded-xl font-semibold text-sm transition-all duration-300 shadow-md hover:shadow-lg transform hover:scale-105 active:scale-95 w-full sm:w-auto">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                        </svg>
                        Tandai Selesai
                    </button>
                </form>
            </div>
        @else
            {{-- Completed Badge --}}
            <div class="flex items-center gap-3 p-4 bg-green-50 rounded-xl border-2 border-green-200">
                <div class="w-10 h-10 bg-green-500 rounded-full flex items-center justify-center flex-shrink-0">
                    <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                    </svg>
                </div>
                <div>
                    <p class="font-semibold text-green-700 text-base">Materi Selesai!</p>
                    <p class="text-sm text-green-600">Kamu sudah menyelesaikan materi ini</p>
                </div>
            </div>
        @endif
    </div>

</div>

<style>
/* Additional prose styling for better content display */
/* Hilangkan nama file attachment */
.prose figcaption {
    display: none;
}

/* khusus caption trix */
.trix-attachment__caption {
    display: none;
}
.prose img {
    margin-left: auto;
    margin-right: auto;
}

.prose table {
    border-collapse: collapse;
    width: 100%;
}

.prose table th {
    background-color: #f9fafb;
    font-weight: 600;
    padding: 0.75rem;
    border: 1px solid #e5e7eb;
}

.prose table td {
    padding: 0.75rem;
    border: 1px solid #e5e7eb;
}

.prose blockquote {
    border-left: 4px solid #6366f1;
    background-color: #eef2ff;
    padding: 1rem 1.5rem;
    margin: 1.5rem 0;
    border-radius: 0.5rem;
}

.prose ul {
    list-style-type: disc !important;
    padding-left: 1.5rem !important;
}

.prose ol {
    list-style-type: decimal !important;
    padding-left: 1.5rem !important;
}

.prose li {
    display: list-item !important;
}
</style>

@endsection