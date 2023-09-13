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
        Schema::create('surat', function (Blueprint $table) {
            $table->id();
            // relation with jenis
            $table->foreignId('jenis_id')->constrained('jenis')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('tipe', 30); // surat masuk atau surat keluar
            $table->string('no_surat', 20);
            $table->date('tgl_surat');
            $table->string('hal');
            $table->string('dari_ke', 100);
            $table->string('gambar', 100)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surat');
    }
};
