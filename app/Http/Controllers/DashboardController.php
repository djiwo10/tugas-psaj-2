<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\MataPelajaran;
use App\Models\Materi;
use App\Models\HasilKuis;
use App\Models\ProgressMateri;
use Carbon\Carbon; 
use App\Models\Schedule;


class DashboardController extends Controller
{
    public function riwayat()
{
    $riwayat = ProgressMateri::with('materi.mapel')
        ->where('user_id', auth()->id())
        ->latest('updated_at')
        ->get();

    return view('dashboard.riwayat', compact('riwayat'));
}

public function kalender()
{
    $today = Carbon::now();

    $year = $today->year;
    $month = $today->month;

    $daysInMonth = Carbon::create($year,$month)->daysInMonth;
    $schedules = auth()->user()
->schedules()
->get()
->groupBy(function($item){
return \Carbon\Carbon::parse($item->date)->format('Y-m-d');
});

$schedules = Schedule::where('user_id', auth()->id())
->get()
->groupBy('date');

    // ambil aktivitas user (contoh relasi kamu)
    $riwayat = auth()->user()
        ->riwayat()
        ->with('materi.mapel')
        ->get();

    // GROUP BY DATE (INI KUNCI BIAR POPUP MUNCUL)
    $events = $riwayat->groupBy(function($item){
        return Carbon::parse($item->updated_at)->format('Y-m-d');
    });

return view('dashboard.kalender', compact(
'daysInMonth','year','month','today','events','schedules'
));

}

    public function index()
{
    $user = Auth::user();

    $totalMapel = MataPelajaran::count();
    $totalMateri = Materi::count();

    $totalKuisSelesai = HasilKuis::where('pengguna_id', $user->id)->count();

    $rataRataNilai = HasilKuis::where('pengguna_id', $user->id)->avg('nilai');

    $aktivitasTerakhir = HasilKuis::where('pengguna_id', $user->id)
        ->latest('selesai_pada')
        ->first();

    $recentLearning = ProgressMateri::with(['materi.mapel'])
    ->where('user_id', $user->id)
    ->latest('updated_at')
    ->get();
    /*
    ==============================
    GLOBAL USER PROGRESS
    ==============================
    */

    $materiSelesai = ProgressMateri::where('user_id', $user->id)
        ->where('status', 'selesai')
        ->count();

    $materiSedang = ProgressMateri::where('user_id', $user->id)
        ->where('status', 'sedang')
        ->count();

    $totalProgressUser = $materiSelesai + $materiSedang;

    $materiBelum = max($totalMateri - $totalProgressUser, 0);

    $persenSelesai = $totalMateri > 0 ? round(($materiSelesai / $totalMateri) * 100) : 0;
    $persenSedang  = $totalMateri > 0 ? round(($materiSedang / $totalMateri) * 100) : 0;
    $persenBelum   = $totalMateri > 0 ? round(($materiBelum / $totalMateri) * 100) : 0;

    $progress = $persenSelesai;

    /*
    ==============================
    PROGRESS PER MAPEL
    ==============================
    */

    $mapel = MataPelajaran::with('materi')->get()->map(function ($m) use ($user) {

        $totalMateriMapel = $m->materi->count();

        $materiSelesaiMapel = ProgressMateri::where('user_id', $user->id)
            ->whereIn('materi_id', $m->materi->pluck('id'))
            ->where('status', 'selesai')
            ->count();

        $m->progress = $totalMateriMapel > 0
            ? round(($materiSelesaiMapel / $totalMateriMapel) * 100)
            : 0;

        return $m;
    });
    

    return view('dashboard.index', compact(
        'user',
        'totalMapel',
        'totalMateri',
        'totalKuisSelesai',
        'rataRataNilai',
        'aktivitasTerakhir',
        'progress',
        'persenSelesai',
        'persenSedang',
        'persenBelum',
        'recentLearning',
        'mapel'
    ));
}
}
