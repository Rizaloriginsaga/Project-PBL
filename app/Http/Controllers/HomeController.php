<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lomba;
use App\Models\Mahasiswa;
use App\Models\Prestasi;

class HomeController extends Controller
{
    public function index()
    {
        $jumlahLomba = Lomba::count();
        $jumlahMahasiswa = Prestasi::distinct('nim')->count('nim');;
        return view('home.index', ['lomba' => $jumlahLomba, 'mahasiswa' => $jumlahMahasiswa]);
    }
}
