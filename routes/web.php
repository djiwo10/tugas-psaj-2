<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MateriController;
use App\Http\Controllers\KuisController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MapelController;
use App\Http\Controllers\DashboardTugasController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\HelpController;



/*
|--------------------------------------------------------------------------
| Public Pages
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('landing');
});

Route::get('/materi/matematika', [MateriController::class, 'landingMatematika'])
    ->name('materi.matematika');

Route::get('/materi/ppkn', [MateriController::class, 'landingPpkn'])
    ->name('materi.ppkn');


/*
|--------------------------------------------------------------------------
| Authenticated User Area
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {

    // ======================
    // DASHBOARD
    // ======================

    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');


    // ======================
    // MAPEL
    // ======================

    Route::get('/dashboard/mapel', [MapelController::class, 'index'])
        ->name('dashboard.mapel');

    Route::get('/dashboard/mapel/{id}', [MapelController::class, 'show'])
        ->name('dashboard.mapel.show');

    // ======================
    // RIWAYAT
    // ======================

    Route::get('/dashboard/riwayat', [DashboardController::class, 'riwayat'])
    ->name('dashboard.riwayat')
    ->middleware('auth');

    Route::get('/dashboard/kalender', [DashboardController::class, 'kalender'])
    ->name('dashboard.kalender');

    // ======================
    // MATERI (PENTING)
    // ======================

    // ⚠️ selesai HARUS diatas show
    Route::post('/materi/{materi}/selesai', [MateriController::class, 'selesai'])
        ->name('materi.selesai');

    Route::get('/materi/{materi}', [MateriController::class, 'show'])
        ->name('materi.show');

    Route::get('/materi', [MateriController::class, 'index'])
        ->name('materi.index');


    // ======================
    // TUGAS
    // ======================

    Route::get('/dashboard/tugas', [DashboardTugasController::class, 'index'])
        ->name('dashboard.tugas');

    Route::get('/dashboard/tugas/{kuis}', [DashboardTugasController::class, 'show'])
        ->name('dashboard.tugas.show');

    Route::post('/dashboard/tugas/{kuis}/submit', [DashboardTugasController::class, 'submit'])
        ->name('dashboard.tugas.submit');

    Route::get('/dashboard/tugas/{kuis}/hasil', [DashboardTugasController::class, 'hasil'])
        ->name('dashboard.tugas.hasil');


    // ======================
    // KUIS
    // ======================

    Route::get('/kuis', [KuisController::class, 'index'])
        ->name('kuis.index');

    Route::get('/kuis/{kuis}', [KuisController::class, 'show'])
        ->name('kuis.show');

    Route::get('/kuis/{kuis}/mulai', [KuisController::class, 'mulai'])
        ->name('kuis.mulai');


    // ======================
    // PROFILE
    // ======================

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');


    // ======================
    // STATIC MENU
    // ======================

    Route::view('/dashboard/evaluasi', 'dashboard.evaluasi')->name('dashboard.evaluasi');
    Route::view('/dashboard/progress', 'dashboard.progress')->name('dashboard.progress');


    Route::view('/dashboard/setelan', 'dashboard.setelan')->name('dashboard.setelan');
    
    Route::post('/schedule/store',[ScheduleController::class,'store'])
    ->name('schedule.store');

    Route::post('/profile/update-profile',[ProfileController::class,'updateProfile'])
    ->name('profile.updateProfile');

    Route::post('/profile/update-password',[ProfileController::class,'updatePassword'])
    ->name('profile.updatePassword');

    Route::get('/dashboard/help', [HelpController::class,'index'])
    ->name('dashboard.help');

});

require __DIR__.'/auth.php';
