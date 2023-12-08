<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prestasi extends Model
{
        use HasFactory;
        protected $table = 'prestasi';
        protected $primaryKey = 'id';
        protected $fillable = ['id_prestasi','nim','nama_prestasi','dokumen','tingkat_prestasi','tahun_pengeluaran','tahun_angkatan','jenis_sertifikat','status_verifikasi'];

        public function mahasiswa()
        {
            return $this->belongsTo(Mahasiswa::class, 'nim', 'nim');
        }
}