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
        Schema::create('skripsi', function (Blueprint $table) {
            $table->unsignedBigInteger('id')->autoIncrement();
            $table->unsignedBigInteger('mahasiswa_id');
            $table->unsignedBigInteger('dosen_pembimbing_id');
            $table->foreign('mahasiswa_id')->references('id')->on('mahasiswa');
            $table->foreign('dosen_pembimbing_id')->references('id')->on('dosen');
            $table->string('judul');
            $table->enum('status', ['proses', 'disetujui', 'ditolak'])->default('proses');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('skripsi');
    }
};
