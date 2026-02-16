<?php

namespace App\Http\Controllers;

use App\Models\HasilKuis;
use App\Models\PilihanJawaban;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\Kuis;
use Illuminate\Http\Request;

class DashboardTugasController extends Controller
{
    public function index()
    {
        $kuis = Kuis::with(['mataPelajaran', 'pertanyaan'])->latest()->get();
        return view('dashboard.tugas', compact('kuis'));
    }

    public function show(Kuis $kuis)
    {
        $kuis->load([
            'mataPelajaran',
            'pertanyaan.pilihanJawaban'
        ]);

        return view('dashboard.kerjakan', compact('kuis'));
    }

    public function submit(Request $request, Kuis $kuis)
{
    $jawabanUser = $request->input('jawaban'); // [pertanyaan_id => pilihan_jawaban_id]

    $totalSoal = $kuis->pertanyaan()->count();
    $jawabanBenar = 0;

    foreach ($jawabanUser as $pertanyaanId => $pilihanId) {
        $isBenar = PilihanJawaban::where('id', $pilihanId)
            ->where('benar', true)
            ->exists();

        if ($isBenar) {
            $jawabanBenar++;
        }
    }

    // hitung nilai (0 - 100)
    $nilai = round(($jawabanBenar / $totalSoal) * 100);

    // simpan hasil kuis
    HasilKuis::create([
        'pengguna_id' => Auth::id(),
        'kuis_id' => $kuis->id,
        'nilai' => $nilai,
        'selesai_pada' => Carbon::now(),
    ]);

    $hasil = HasilKuis::create([
        'pengguna_id' => Auth::id(),
        'kuis_id' => $kuis->id,
        'nilai' => $nilai,
        'selesai_pada' => now(),
    ]);
    
    return redirect()->route('dashboard.tugas.hasil', $kuis->id);
}

public function hasil(Kuis $kuis)
{
    $hasil = HasilKuis::where('kuis_id', $kuis->id)
        ->where('pengguna_id', auth()->id())
        ->latest()
        ->first();

    $totalSoal = $kuis->pertanyaan()->count();
    $benar = round(($hasil->nilai / 100) * $totalSoal);
    $salah = $totalSoal - $benar;

    return view('dashboard.hasil-kuis', compact(
        'kuis',
        'hasil',
        'totalSoal',
        'benar',
        'salah'
    ));
}

}