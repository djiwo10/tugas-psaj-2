<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function store(Request $request)
    {

        // VALIDASI (WAJIB biar ga null lagi)
        $request->validate([
            'title' => 'required|string|max:255',
            'date' => 'required|date'
        ]);

        Schedule::create([
            'user_id' => auth()->id(),
            'title' => $request->title,
            'date' => $request->date
        ]);

        // RETURN HARUS REDIRECT (karena form submit normal)
        return redirect()->back()->with('success','Schedule berhasil ditambahkan');

    }
}
