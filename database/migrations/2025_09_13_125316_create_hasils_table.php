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
        Schema::create('hasils', function (Blueprint $table) {
            $table->id('id_hasil');
            $table->unsignedBigInteger('id_soal');
            $table->string('jawaban_dipilih', 100)->nullable();
            $table->boolean('benar')->nullable();
            $table->timestamp('dibuat_pada')->useCurrent();
            $table->foreign('id_soal')
                ->references('id_soal')->on('soal');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hasils');
    }
};
