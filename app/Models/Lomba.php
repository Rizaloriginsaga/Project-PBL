<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lomba extends Model
{
        use HasFactory;
        protected $table = 'lomba';
        protected $primaryKey = 'id';
        protected $fillable = ['id_lomba','nama_lomba','tingkat_lomba','tanggal_posting','tanggal_berakhir','deskripsi','foto'];
}
