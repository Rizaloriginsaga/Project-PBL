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
        Schema::create('prestasi', function (Blueprint $table) {
            $table->id();
            $table->string('id_prestasi');
            $table->string('nim');
            $table->string('nama_prestasi');
            $table->binary('dokumen');
            $table->string('tingkat_prestasi');
            $table->string('tahun_pengeluaran');
            $table->string('tahun_angkatan');
            $table->string('jenis_sertifikat');
            $table->boolean('status_verifikasi')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prestasi');
    }
};
