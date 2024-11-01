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
        Schema::create('kondisi_tanah', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_kriteria')->constrained('data_kriteria');
            $table->foreignId('id_tanah')->constrained('data_tanah');
            $table->integer('nilai');
            $table->string('bulan');
            $table->integer('tahun');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kondisi_tanah');
    }
};
