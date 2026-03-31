<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KuisController extends Controller
{
    public function index() {
        return 'Kuis Index';
    }

    public function show($kuis) {
        return 'Kuis Detail';
    }

    public function mulai($kuis)
{
    return redirect()->route('dashboard.tugas.show', $kuis);
}
}
