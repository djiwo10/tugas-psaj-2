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
            'date' => 'required|date',
            'time' => 'required'
        ]);

        Schedule::create([
            'user_id' => auth()->id(),
            'title' => $request->title,
            'date' => $request->date,
            'time' => $request->time
        ]);

        // RETURN HARUS REDIRECT (karena form submit normal)
        return redirect()->back()->with('success','Schedule berhasil ditambahkan');

    }

    public function markAllRead()
{
    auth()->user()->unreadNotifications->markAsRead();
    return response()->json(['success' => true]);
}
}
