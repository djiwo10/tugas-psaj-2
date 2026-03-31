@extends('layouts.app')

@section('title', 'Kerjakan Kuis')

@section('content')
<div class="w-full space-y-6">

    {{-- Quiz Header - Simple & Clean --}}
    <div class="bg-white p-6 rounded-2xl border-2 border-gray-100 shadow-sm">
        <span class="text-sm text-gray-500 font-medium">
            {{ $kuis->mataPelajaran->nama }}
        </span>
        <h1 class="text-2xl font-bold mt-1 text-gray-900">
            {{ $kuis->judul }}
        </h1>
        <p class="text-gray-600 mt-2">
            {{ $kuis->deskripsi }}
        </p>
    </div>

    {{-- Quiz Form --}}
    <form action="{{ route('dashboard.tugas.submit', $kuis->id) }}" method="POST" class="space-y-5" id="quizForm">
        @csrf

        {{-- Questions --}}
        @foreach ($kuis->pertanyaan as $index => $pertanyaan)
            <div class="bg-white p-5 rounded-2xl border-2 border-gray-100 hover:border-gray-200 transition-colors duration-200">
                
                {{-- Question --}}
                <p class="font-semibold mb-4 text-gray-900">
                    {{ $index + 1 }}. {{ $pertanyaan->pertanyaan }}
                </p>

                {{-- Answer Options --}}
                <div class="space-y-2.5">
                    @foreach ($pertanyaan->pilihanJawaban as $jawaban)
                        <label class="flex items-center gap-3 cursor-pointer p-3 rounded-lg hover:bg-gray-50 transition-colors duration-200 has-[:checked]:bg-primary/5 has-[:checked]:border-primary/30 border-2 border-transparent">
                            <input
                                type="radio"
                                name="jawaban[{{ $pertanyaan->id }}]"
                                value="{{ $jawaban->id }}"
                                class="w-4 h-4 text-primary focus:ring-2 focus:ring-primary/20"
                                required
                            >
                            <span class="text-gray-700 has-[:checked]:text-gray-900 has-[:checked]:font-medium">{{ $jawaban->jawaban }}</span>
                        </label>
                    @endforeach
                </div>

            </div>
        @endforeach

        {{-- Submit Button --}}
        <div class="text-right">
            <button type="submit"
                    id="submitBtn"
                    class="px-6 py-3 bg-primary text-white rounded-xl hover:bg-primary/90 font-semibold transition-all duration-300 disabled:opacity-50 disabled:cursor-not-allowed">
                Kirim Jawaban
            </button>
        </div>

    </form>

</div>

{{-- JavaScript for Submit Control --}}
<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('quizForm');
    const submitBtn = document.getElementById('submitBtn');
    const totalQuestions = {{ $kuis->pertanyaan->count() }};
    
    // Get all question groups
    const questionGroups = form.querySelectorAll('[name^="jawaban"]');
    const uniqueQuestions = new Set();
    questionGroups.forEach(input => {
        uniqueQuestions.add(input.name);
    });
    
    function checkCompletion() {
        let answeredCount = 0;
        
        // Count answered questions
        uniqueQuestions.forEach(questionName => {
            const radios = form.querySelectorAll(`[name="${questionName}"]`);
            const isAnswered = Array.from(radios).some(radio => radio.checked);
            if (isAnswered) answeredCount++;
        });
        
        // Enable/disable submit button
        submitBtn.disabled = answeredCount < totalQuestions;
    }
    
    // Listen to all radio changes
    questionGroups.forEach(input => {
        input.addEventListener('change', checkCompletion);
    });
    
    // Initial check
    checkCompletion();
});
</script>

@endsection