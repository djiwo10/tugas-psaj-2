@extends('layouts.app')

@section('title', 'Riwayat Belajar')

@section('header-subtitle', 'Lihat semua aktivitas pembelajaran kamu')

@section('content')
<div class="w-full">

<div class="flex justify-between items-center mb-6">
    <h2 class="text-2xl font-bold">Riwayat Belajar</h2>

    <div class="flex gap-2">
        <select class="px-4 py-2 border border-border rounded-lg text-sm outline-none focus:border-primary">
            <option>Semua Mata Pelajaran</option>
        </select>
        <select class="px-4 py-2 border border-border rounded-lg text-sm outline-none focus:border-primary">
            <option>Semua</option>
        </select>
    </div>
</div>

@php
$grouped = $riwayat->groupBy(function ($item) {
    return $item->updated_at->format('Y-m-d');
});
@endphp

<div class="space-y-6">

@foreach($grouped as $date => $items)

<div>

<div class="flex items-center gap-3 mb-4">
    <div class="w-2 h-2 bg-primary rounded-full"></div>

    <h3 class="font-semibold text-lg">

    @if(\Carbon\Carbon::parse($date)->isToday())
        Hari Ini
    @elseif(\Carbon\Carbon::parse($date)->isYesterday())
        Kemarin
    @else
        {{ \Carbon\Carbon::parse($date)->translatedFormat('d F Y') }}
    @endif

    </h3>

    <div class="flex-1 h-px bg-gray-200"></div>
</div>

<div class="ml-5 space-y-4">

@foreach($items as $learning)

<div class="bg-white rounded-xl p-5 border-l-4
{{ $learning->materi->mapel->nama == 'PKN' ? 'border-orange' : 'border-primary' }}">

<div class="flex justify-between items-start mb-2">

<div class="flex-1">

<div class="flex items-center gap-2 mb-2">

<span class="px-3 py-1 text-xs rounded-full
{{ $learning->materi->mapel->nama == 'PKN'
? 'bg-orange-soft text-orange'
: 'bg-primary-soft text-primary' }}">

{{ $learning->materi->mapel->nama }}

</span>

@if($learning->status == 'selesai')
<span class="px-3 py-1 bg-green-100 text-green-800 text-xs rounded-full">
Selesai
</span>
@else
<span class="px-3 py-1 bg-yellow-100 text-yellow-800 text-xs rounded-full">
Sedang Dikerjakan
</span>
@endif

</div>

<h4 class="font-semibold">
Materi: {{ $learning->materi->judul }}
</h4>

<p class="text-sm text-text-muted mt-1">
Aktivitas pembelajaran
</p>

</div>

<span class="text-xs text-text-muted">
{{ $learning->updated_at->format('H:i') }}
</span>

</div>

</div>

@endforeach

</div>
</div>

@endforeach

</div>

</div>
@endsection
    