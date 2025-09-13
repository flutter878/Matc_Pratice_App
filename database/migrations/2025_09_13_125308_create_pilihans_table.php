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
        Schema::create('pilihans', function (Blueprint $table) {
            //pilihan
            $table->id('id_pilihan');
            $table->unsignedBigInteger('id_soal');
            $table->string('teks_pilihan', 100);
            $table->foreign('id_soal')
                ->references('id_soal')->on('soal')
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pilihans');
    }
};
