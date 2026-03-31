<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\MataPelajaran;

class MataPelajaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
{
    MataPelajaran::create([
        'nama' => 'Matematika',
        'deskripsi' => 'Pelajaran Matematika'
    ]);

    MataPelajaran::create([
        'nama' => 'PKN',
        'deskripsi' => 'Pendidikan Kewarganegaraan'
    ]);
}
}
