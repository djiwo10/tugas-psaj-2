<?php

namespace App\Http\Controllers;

use App\Models\MataPelajaran;
use App\Models\ProgressMateri;
use Illuminate\Support\Facades\Auth;

class MapelController extends Controller
{
    // LIST MAPEL + PROGRESS
    public function index()
    {
        $mapel = MataPelajaran::with('materi')->get()->map(function ($m) {

            $totalMateri = $m->materi->count();

            $materiSelesai = ProgressMateri::where('user_id', Auth::id())
                ->whereIn('materi_id', $m->materi->pluck('id'))
                ->where('status', 'selesai')
                ->count();

            $m->progress = $totalMateri > 0
                ? round(($materiSelesai / $totalMateri) * 100)
                : 0;

            return $m;
        });

        return view('dashboard.mapel', compact('mapel'));
    }

    // DETAIL MAPEL + PROGRESS
    public function show($id)
    {
        $mapel = MataPelajaran::with(['materi' => function($q){
        $q->orderBy('urutan'); // penting supaya urut
        }])->findOrFail($id);

        $totalMateri = $mapel->materi->count();

        $materiSelesai = ProgressMateri::where('user_id', Auth::id())
            ->whereIn('materi_id', $mapel->materi->pluck('id'))
            ->where('status', 'selesai')
            ->count();

        $progress = $totalMateri > 0
            ? round(($materiSelesai / $totalMateri) * 100)
            : 0;

        $progressMateri = ProgressMateri::where('user_id', Auth::id())
            ->whereIn('materi_id', $mapel->materi->pluck('id'))
            ->get()
            ->keyBy('materi_id');

        $materi = $mapel->materi->values(); // reset index array

foreach ($materi as $index => $m) {

    if($index == 0){
        $m->locked = false;
        continue;
    }

    $prev = $materi[$index-1];

    $prevStatus = $progressMateri[$prev->id]->status ?? null;

    $m->locked = ($prevStatus !== 'selesai');
}

        return view('dashboard.mapel-detail', compact(
            'mapel',
            'progress',
            'progressMateri',
            'totalMateri',
            'materiSelesai',
            'materi'
        ));
    }
}
