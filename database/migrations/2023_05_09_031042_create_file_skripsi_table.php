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
        Schema::create('file_skripsi', function (Blueprint $table) {
            $table->unsignedBigInteger('id')->autoIncrement();
            $table->unsignedBigInteger('skripsi_id');
            $table->foreign('skripsi_id')->references('id')->on('skripsi');
            $table->string('files_name');
            $table->string('files_path');
            $table->string('file_type');
            $table->string('file_size');
            $table->dateTime('uploaded_at');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('file_skripsi');
    }
};
