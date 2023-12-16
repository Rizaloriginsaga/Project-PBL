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
        //
        Schema::create('lomba', function(Blueprint $table){
            $table->id();
            $table->string('id_lomba');
            $table->string('nama_lomba');
            $table->string('tingkat_lomba');
            $table->date('tanggal_posting');
            $table->date('tanggal_berakhir');
            $table->string('deskripsi');
            $table->binary('foto');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
