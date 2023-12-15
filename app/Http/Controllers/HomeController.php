<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lomba;
use App\Models\Mahasiswa;

class HomeController extends Controller
{
    public function index()
    {
        $jumlahLomba = Lomba::count(); 
        $jumlahMahasiswa = Mahasiswa::count();
        return view('home.index',['lomba'=>$jumlahLomba,'mahasiswa'=>$jumlahMahasiswa]);
    }
}
