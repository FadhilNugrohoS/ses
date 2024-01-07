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
        Schema::create('hasil_peramalans', function (Blueprint $table) {
            $table->id();
            $table->string('nama_barang');
            $table->string('bulan');
            $table->string('tahun');
            $table->double('hasil_peramalan');
            $table->double('mape');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hasil_peramalans');
    }
};
