<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Materi;
use App\Models\ProgressMateri;
use Illuminate\Support\Facades\Auth;

class MateriController extends Controller
{

    /*
    |----------------------------------
    | PUBLIC LANDING
    |----------------------------------
    */

    public function landingMatematika()
    {
        return view('landing');
    }

    public function landingPpkn()
    {
        return view('ppkn');
    }

    /*
    |----------------------------------
    | AUTH USER
    |----------------------------------
    */

    public function index()
    {
        return 'Materi Index';
    }

    /*
    |----------------------------------
    | OPEN MATERI
    |----------------------------------
    */

    public function show(Materi $materi)
{
    $progress = ProgressMateri::where('user_id', Auth::id())
        ->where('materi_id', $materi->id)
        ->first();

    // kalau belum ada progress baru buat
    if (!$progress) {

        $progress = ProgressMateri::create([
            'user_id' => Auth::id(),
            'materi_id' => $materi->id,
            'status' => 'sedang'
        ]);

    }

    return view('materi.show', compact('materi','progress'));
}



    /*
    |----------------------------------
    | TANDAI SELESAI
    |----------------------------------
    */

    public function selesai(Materi $materi)
{
    ProgressMateri::updateOrCreate(
        [
            'user_id' => Auth::id(),
            'materi_id' => $materi->id,
        ],
        [
            'status' => 'selesai'
        ]
    );

    return redirect()->back();
}

}
