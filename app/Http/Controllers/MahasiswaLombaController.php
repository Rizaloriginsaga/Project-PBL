<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\ExportExcelLomba;
use App\Models\Lomba;
use Maatwebsite\Excel\Facades\Excel;

class MahasiswaLombaController extends Controller
{

    public function index(Request $request){

        $search = $request->get('search');
        $lomba = new Lomba();

        if(!empty($search)){
            $lombaAll = $lomba->where('nama_lomba', 'like', '%'. $search . '%')->get();
        }else{
            $lombaAll = $lomba->all();
        }
        

        return view('mahasiswa.lomba.index', compact('lombaAll'));
    }

    public function show(Request $request, $id){
        if(empty($id)){ return redirect()->back(); }
        $lomba = new Lomba();
        $lombaDetail = $lomba->where('id', '=', $id)->first();
        

        return view('mahasiswa.lomba.show', compact('lombaDetail'));
    }

}