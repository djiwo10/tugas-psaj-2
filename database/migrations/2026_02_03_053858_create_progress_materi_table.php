<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
 Schema::create('progress_materi', function (Blueprint $table) {
    $table->id();
    $table->foreignId('user_id')->constrained()->cascadeOnDelete();
    $table->foreignId('materi_id')->constrained('materi')->cascadeOnDelete();
    $table->enum('status', ['belum', 'sedang', 'selesai'])->default('belum');
    $table->timestamps();

    $table->unique(['user_id', 'materi_id']);
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('progress_materi');
    }
};
