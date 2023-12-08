<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;
    protected $table = 'mahasiswa';
    protected $primaryKey = 'nim';
    protected $fillable = ['nim','nama','tahun_angkatan'];

    public function mahasiswa(){
        return $this->hasMany(Prestasi::class);
    }    
}
