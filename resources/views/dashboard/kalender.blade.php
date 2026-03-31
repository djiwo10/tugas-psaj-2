@extends('layouts.app')

@php use Carbon\Carbon; @endphp

@section('title','Kalender')
@section('header-subtitle','Lihat jadwal dan aktivitas pembelajaran')

@section('content')

<div class="w-full max-w-7xl mx-auto px-2 sm:px-4">

<!-- Header Section -->
<div class="mb-6">
<h2 class="text-2xl sm:text-3xl font-bold text-gray-800">Kalender Pembelajaran</h2>
<p class="text-sm text-gray-500 mt-1">{{ Carbon::create($year,$month,1)->locale('id')->translatedFormat('F Y') }}</p>
</div>

<!-- Calendar Container -->
<div class="bg-white rounded-2xl sm:rounded-3xl shadow-sm p-3 sm:p-6 lg:p-8 border border-gray-100">

<!-- Calendar Header - Days -->
<div class="grid grid-cols-7 gap-1 sm:gap-3 mb-4">
@foreach(['Min','Sen','Sel','Rab','Kam','Jum','Sab'] as $day)
<div class="text-center text-xs sm:text-sm font-semibold text-gray-600 py-2">
{{ $day }}
</div>
@endforeach
</div>

<!-- Calendar Grid -->
<div class="grid grid-cols-7 gap-1 sm:gap-3">

@for($i=1;$i<=$daysInMonth;$i++)

@php
$date = Carbon::create($year,$month,$i)->format('Y-m-d');
$dayEvents = $events[$date] ?? [];
$daySchedules = $schedules[$date] ?? [];
$totalItems = count($dayEvents) + count($daySchedules);
$isToday = $today->day === $i;
$hasCompleted = collect($dayEvents)->where('status','selesai')->count() > 0;
$hasPending = collect($dayEvents)->where('status','!=','selesai')->count() > 0;
@endphp

<div onclick="showEvents('{{ $date }}',this)" data-date="{{ $date }}"
class="calendar-cell aspect-square p-1.5 sm:p-3 rounded-lg sm:rounded-xl border-2 relative cursor-pointer transition-all duration-300 ease-out group overflow-hidden
{{ $isToday ? 'bg-gradient-to-br from-primary to-primary/90 text-white border-primary shadow-lg scale-105 ring-2 ring-primary/20' : 'border-gray-200 hover:border-primary/50 hover:shadow-md hover:scale-105 bg-white' }}">

<!-- Day Number -->
<div class="text-xs sm:text-base font-bold {{ $isToday?'text-white':'text-gray-700 group-hover:text-primary' }} transition-colors duration-300 relative z-10">
{{ $i }}
</div>

@if($totalItems > 0)

<!-- Enhanced Badge with Icon -->
<div class="absolute top-1 sm:top-2 right-1 sm:right-2 flex items-center gap-0.5 text-[9px] sm:text-[10px] font-bold px-1 sm:px-1.5 py-0.5 rounded-full 
{{ $isToday ? 'bg-white text-primary' : 'bg-primary text-white' }} 
shadow-sm {{ !$isToday ? 'group-hover:scale-110' : '' }} transition-transform duration-300 z-10">
<svg class="w-2 h-2 sm:w-2.5 sm:h-2.5" fill="currentColor" viewBox="0 0 20 20">
<path d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"/>
</svg>
<span>{{ $totalItems }}</span>
</div>

<!-- Visual Indicator Bar -->
<div class="absolute bottom-0 left-0 right-0 h-1 sm:h-1.5 flex gap-0.5 p-0.5 {{ $isToday ? 'bg-white/20' : 'bg-gray-100' }} rounded-b-lg sm:rounded-b-xl">
@if($hasCompleted)
<div class="flex-1 bg-green-500 rounded-full transition-all duration-300 {{ !$isToday ? 'group-hover:h-2' : '' }}"></div>
@endif
@if($hasPending)
<div class="flex-1 bg-orange-400 rounded-full transition-all duration-300 {{ !$isToday ? 'group-hover:h-2' : '' }}"></div>
@endif
@if(count($daySchedules) > 0)
<div class="flex-1 bg-blue-500 rounded-full transition-all duration-300 {{ !$isToday ? 'group-hover:h-2' : '' }}"></div>
@endif
</div>

<!-- Hover Preview (Desktop Only) -->
<div class="hidden lg:block absolute inset-x-0 bottom-full mb-2 opacity-0 group-hover:opacity-100 transition-opacity duration-300 pointer-events-none z-20">
<div class="bg-gray-900 text-white text-[10px] px-2 py-1 rounded shadow-lg whitespace-nowrap">
{{ $totalItems }} aktivitas
</div>
</div>

@endif

<!-- Today Ring Animation -->
@if($isToday)
<div class="absolute inset-0 rounded-lg sm:rounded-xl border-2 border-white/40 animate-pulse"></div>
@endif

</div>

@endfor

</div>

<!-- Legend -->
</div>
</div>
</div>

</div>
</div>


{{-- POPUP EVENT - Enhanced & Responsive - CENTERED MODAL --}}
<div id="eventBox"
class="fixed hidden inset-0 bg-black/30 backdrop-blur-sm z-50 items-center justify-center p-4 transition-all duration-300 ease-out">
<div class="bg-white shadow-2xl rounded-2xl p-4 sm:p-5 w-full max-w-sm sm:max-w-md transform scale-95 opacity-0 transition-all duration-300 border border-gray-100 max-h-[80vh] overflow-y-auto">
<div id="eventContent"></div>
</div>
</div>


{{-- ADD SCHEDULE MODAL - Enhanced & Responsive --}}
<div id="addScheduleModal"
class="fixed hidden inset-0 bg-black/50 backdrop-blur-sm z-[60] items-center justify-center p-4 transition-all duration-300"
style="overflow-y: auto;">

<div class="bg-white shadow-2xl rounded-2xl sm:rounded-3xl p-5 sm:p-6 w-full max-w-md mx-auto my-auto transform scale-95 opacity-0 transition-all duration-300" id="addScheduleModalContent">

<form method="POST" action="{{ route('schedule.store') }}" id="scheduleForm">
@csrf

<input type="hidden" name="date" id="scheduleDate">

<!-- Modal Header -->
<div class="flex items-center justify-between mb-5">
<h4 class="font-bold text-lg sm:text-xl text-gray-800">Tambah Schedule</h4>
<button type="button" onclick="closeAddSchedule()" class="text-gray-400 hover:text-gray-600 transition-colors duration-200 text-xl font-bold">
✕
</button>
</div>

<!-- Date Display -->
<div class="mb-4 p-3 bg-primary/5 rounded-xl border border-primary/10">
<div class="text-xs text-gray-500 mb-1">Tanggal</div>
<div class="font-semibold text-primary" id="selectedDateDisplay"></div>
</div>

<!-- Input Field -->
<div class="mb-5">
<label class="block text-sm font-semibold text-gray-700 mb-2">Judul Schedule</label>
<input
name="title"
placeholder="Contoh: Belajar Limit"
class="w-full border-2 border-gray-200 rounded-xl p-3 text-sm focus:border-primary focus:outline-none focus:ring-4 focus:ring-primary/10 transition-all duration-300"
required>
<div class="mb-5">
<label class="block text-sm font-semibold text-gray-700 mb-2">Waktu</label>

<input
type="time"
name="time"
class="w-full border-2 border-gray-200 rounded-xl p-3 text-sm focus:border-primary focus:outline-none focus:ring-4 focus:ring-primary/10 transition-all duration-300"
required>

<p class="mt-2 text-xs text-gray-500">Tentukan jam pengingat schedule</p>
</div>
<p class="mt-2 text-xs text-gray-500">Masukkan aktivitas yang ingin kamu jadwalkan</p>
</div>

<!-- Action Buttons -->
<div class="flex gap-3">

<button type="submit"
class="flex-1 bg-primary text-white py-3 sm:py-3.5 rounded-xl font-semibold hover:bg-opacity-90 transition-all duration-300 hover:shadow-lg transform hover:scale-105 active:scale-95 flex items-center justify-center gap-2">
<svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
<path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
</svg>
<span>Simpan</span>
</button>

<button type="button"
onclick="closeAddSchedule()"
class="px-5 border-2 border-gray-200 rounded-xl font-semibold text-gray-600 hover:border-gray-300 hover:bg-gray-50 transition-all duration-300 active:scale-95">
Batal
</button>

</div>

</form>

</div>

</div>

<!-- Loading Overlay -->
<div id="loadingOverlay" class="fixed inset-0 bg-black/30 backdrop-blur-sm z-50 hidden items-center justify-center">
<div class="bg-white rounded-2xl p-6 shadow-2xl">
<div class="animate-spin rounded-full h-12 w-12 border-4 border-primary border-t-transparent mx-auto"></div>
<p class="mt-4 text-sm text-gray-600 font-medium">Menyimpan...</p>
</div>
</div>

@endsection


<style>
/* Smooth animations */
@keyframes slideIn {
from {
opacity: 0;
transform: translateY(-10px);
}
to {
opacity: 1;
transform: translateY(0);
}
}

.calendar-cell:active {
transform: scale(0.98);
}

/* Custom Scrollbar */
#eventBox > div::-webkit-scrollbar {
width: 6px;
}

#eventBox > div::-webkit-scrollbar-track {
background: #f1f1f1;
border-radius: 10px;
}

#eventBox > div::-webkit-scrollbar-thumb {
background: #cbd5e1;
border-radius: 10px;
}

#eventBox > div::-webkit-scrollbar-thumb:hover {
background: #94a3b8;
}
</style>

<script>

document.addEventListener('DOMContentLoaded',function(){

const events = @json($events);
const schedules = @json($schedules);

const box = document.getElementById('eventBox');
const content = document.getElementById('eventContent');
const scheduleModal = document.getElementById('addScheduleModal');
const scheduleModalContent = document.getElementById('addScheduleModalContent');
const scheduleForm = document.getElementById('scheduleForm');
const loadingOverlay = document.getElementById('loadingOverlay');

let activeDate = null;
let activeCell = null;


// =================
// OPEN EVENT POPUP
// =================

window.showEvents = function(date,el){

// Close if clicking same date
if(activeDate === date && !box.classList.contains('hidden')) {
closeEvents();
return;
}

// Remove previous active cell highlight FIRST before setting new one
if(activeCell && activeCell !== el) {
activeCell.classList.remove('ring-2','ring-primary','ring-offset-2');
}

activeDate = date;
activeCell = el;

// Show modal with flex centering (no complex positioning needed!)
box.classList.remove('hidden');
box.classList.add('flex');

// Highlight active cell
if(activeCell) {
activeCell.classList.add('ring-2','ring-primary','ring-offset-2');
}

// Animate in
setTimeout(()=>{
const inner = box.firstElementChild;
inner.classList.remove('scale-95','opacity-0');
inner.classList.add('scale-100','opacity-100');
},10);

// Format date for display
const dateObj = new Date(date + 'T00:00:00');
const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
const dateStr = dateObj.toLocaleDateString('id-ID', options);

let html = `
<div class="flex justify-between items-center mb-4 pb-3 border-b-2 border-gray-100">
<div>
<h4 class="font-bold text-base text-gray-800">Aktivitas</h4>
<p class="text-xs text-gray-500 mt-0.5">${dateStr}</p>
</div>
<button onclick="closeEvents()" class="text-gray-400 hover:text-gray-600 transition-colors duration-200 text-lg font-bold hover:scale-110 transform">✕</button>
</div>

<button onclick="openAddSchedule('${date}')"
class="w-full mb-4 text-sm font-semibold bg-gradient-to-r from-primary to-primary/90 text-white py-3 rounded-xl hover:shadow-lg transition-all duration-300 transform hover:scale-105 active:scale-95 flex items-center justify-center gap-2">
<svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
<path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd"/>
</svg>
<span>Tambah Schedule</span>
</button>
`;

let hasContent = false;

if(events[date] && events[date].length > 0){
hasContent = true;
html += `<div class="mb-3">
<div class="text-xs font-bold text-gray-400 uppercase tracking-wide mb-2">Materi Pembelajaran</div>
<div class="space-y-2">`;
events[date].forEach((ev,idx)=>{
const statusColor = ev.status=='selesai' ? 'green' : 'orange';
const statusText = ev.status=='selesai' ? 'Selesai' : 'Berlangsung';
const statusIcon = ev.status=='selesai' ? '✓' : '○';
html += `
<div class="p-3 bg-gradient-to-br from-${statusColor}-50 to-white rounded-xl border-2 border-${statusColor}-200 hover:border-${statusColor}-300 transition-all duration-300 hover:shadow-md transform hover:scale-105" style="animation: slideIn 0.3s ease-out ${idx * 0.1}s both;">
<div class="flex items-start justify-between mb-2">
<div class="font-semibold text-sm text-gray-800">${ev.materi.judul}</div>
<span class="text-xs px-2 py-0.5 bg-${statusColor}-500 text-white rounded-full font-semibold">${statusIcon}</span>
</div>
<div class="text-xs text-gray-600 flex items-center gap-1">
<svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
<path d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3zM3.31 9.397L5 10.12v4.102a8.969 8.969 0 00-1.05-.174 1 1 0 01-.89-.89 11.115 11.115 0 01.25-3.762zM9.3 16.573A9.026 9.026 0 007 14.935v-3.957l1.818.78a3 3 0 002.364 0l5.508-2.361a11.026 11.026 0 01.25 3.762 1 1 0 01-.89.89 8.968 8.968 0 00-5.35 2.524 1 1 0 01-1.4 0zM6 18a1 1 0 001-1v-2.065a8.935 8.935 0 00-2-.712V17a1 1 0 001 1z"/>
</svg>
${ev.materi.mapel.nama}
</div>
<div class="mt-2 text-xs text-gray-500">${statusText}</div>
</div>`;
});
html += `</div></div>`;
}

if(schedules[date] && schedules[date].length > 0){
hasContent = true;
html += `<div class="mt-4">
<div class="text-xs font-bold text-gray-400 uppercase tracking-wide mb-2">Schedule Personal</div>
<div class="space-y-2">`;
schedules[date].forEach((sc,idx)=>{
html += `
<div class="p-3 bg-gradient-to-br from-blue-50 to-white rounded-xl border-2 border-blue-200 hover:border-blue-300 transition-all duration-300 hover:shadow-md transform hover:scale-105" style="animation: slideIn 0.3s ease-out ${idx * 0.1}s both;">
<div class="flex items-start justify-between">
<div class="font-semibold text-sm text-primary">${sc.title}</div>
<svg class="w-4 h-4 text-blue-500" fill="currentColor" viewBox="0 0 20 20">
<path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"/>
</svg>
</div>
<div class="text-xs text-gray-500 mt-1 flex items-center gap-1">
<svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
<path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
</svg>
Personal
</div>
</div>`;
});
html += `</div></div>`;
}

if(!hasContent){
html += `
<div class="text-center py-8">
<svg class="w-16 h-16 mx-auto text-gray-300 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
</svg>
<p class="text-sm text-gray-500 font-medium">Belum ada aktivitas</p>
<p class="text-xs text-gray-400 mt-1">Tambahkan schedule untuk hari ini</p>
</div>
`;
}

content.innerHTML = html;

}


// =================
// CLOSE EVENT
// =================

window.closeEvents = function(){

if(activeCell) {
activeCell.classList.remove('ring-2','ring-primary','ring-offset-2');
activeCell = null;
}

activeDate = null;

const inner = box.firstElementChild;
inner.classList.remove('scale-100','opacity-100');
inner.classList.add('scale-95','opacity-0');

setTimeout(()=>{
box.classList.add('hidden');
box.classList.remove('flex');
},300);

}


// =================
// OPEN ADD SCHEDULE
// =================

window.openAddSchedule = function(date){

document.getElementById('scheduleDate').value = date;

// Format date for display
const dateObj = new Date(date + 'T00:00:00');
const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
const dateStr = dateObj.toLocaleDateString('id-ID', options);
document.getElementById('selectedDateDisplay').textContent = dateStr;

// Show modal with flex to center content
scheduleModal.classList.remove('hidden');
scheduleModal.classList.add('flex');

setTimeout(()=>{
scheduleModalContent.classList.remove('scale-95','opacity-0');
scheduleModalContent.classList.add('scale-100','opacity-100');
},10);

// Focus input
setTimeout(()=>{
scheduleForm.querySelector('input[name="title"]').focus();
},350);

}


// =================
// CLOSE ADD SCHEDULE
// =================

window.closeAddSchedule = function(){

scheduleModalContent.classList.remove('scale-100','opacity-100');
scheduleModalContent.classList.add('scale-95','opacity-0');

setTimeout(()=>{
scheduleModal.classList.add('hidden');
scheduleModal.classList.remove('flex');
scheduleForm.reset();
},300);

}


// =================
// FORM SUBMIT WITH LOADING
// =================

scheduleForm.addEventListener('submit', function(e) {
// Show loading
loadingOverlay.classList.remove('hidden');
loadingOverlay.classList.add('flex');
});


// =================
// CLICK OUTSIDE CLOSE
// =================

document.addEventListener('click',e=>{

// Close event box if clicked on backdrop (outside the white box)
if(box.contains(e.target) && e.target === box){
closeEvents();
}

// Close modal if clicked on backdrop
if(scheduleModal.contains(e.target) && e.target === scheduleModal){
closeAddSchedule();
}

});


// ESC CLOSE
document.addEventListener('keydown',e=>{
if(e.key==='Escape'){
closeEvents();
closeAddSchedule();
}
});


// =================
// PREVENT SCROLL WHEN MODAL OPEN
// =================

const observer = new MutationObserver(function(mutations) {
mutations.forEach(function(mutation) {
if (mutation.attributeName === 'class') {
// Lock body scroll when either modal is open
if (!scheduleModal.classList.contains('hidden') || !box.classList.contains('hidden')) {
document.body.style.overflow = 'hidden';
} else {
document.body.style.overflow = '';
}
}
});
});

observer.observe(scheduleModal, { attributes: true });
observer.observe(box, { attributes: true });

});
</script>