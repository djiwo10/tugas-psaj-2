<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Materi;

class MateriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
public function run()
{
    Materi::create([
        'mata_pelajaran_id' => 1,
        'judul' => 'Limit'
    ]);

    Materi::create([
        'mata_pelajaran_id' => 1,
        'judul' => 'Integral'
    ]);

    Materi::create([
        'mata_pelajaran_id' => 1,
        'judul' => 'Turunan'
    ]);

    Materi::create([
        'mata_pelajaran_id' => 2,
        'judul' => 'Pancasila'
    ]);

    Materi::create([
        'mata_pelajaran_id' => 2,
        'judul' => 'Konstitusi'
    ]);

    Materi::create([
        'mata_pelajaran_id' => 2,
        'judul' => 'Bhinneka Tunggal Ika'
    ]);
}
}
