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
        Schema::create('data_subkriteria', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_kriteria')->constrained('data_kriteria');
            $table->foreignId('id_tanaman')->constrained('data_tanaman');
            $table->foreignId('id_kesesuaian')->constrained('data_kesesuaian');
            $table->string('range');
            $table->integer('loop');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_subkriteria');
    }
};
