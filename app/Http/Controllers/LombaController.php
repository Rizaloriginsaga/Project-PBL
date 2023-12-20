<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lomba;
use App\Exports\ExportExcelLomba;
use Maatwebsite\Excel\Facades\Excel;

class LombaController extends Controller
{
    //
    public function index(){
        $tanggal = request('tanggal');
        $query = Lomba::query();
    
        if ($tanggal) {
            $query->whereDate('tanggal_posting', $tanggal);
        }
    
        $dataLomba = $query->get();
    
        return view('admin.idx_lomba', [
            'dataLomba' => $dataLomba,
            'tanggal' => $tanggal,
        ]);
        
    }

    public function create(){
        return view('admin.create_lomba');
    }

    public function store(Request $request){
        $data = new Lomba();
        $data->id_lomba = $request->id_lomba;
        $data->nama_lomba = $request->nama_lomba;
        $data->tingkat_lomba = $request->tingkat_lomba;
        $data->tingkat_lomba = $request->tingkat_lomba;
        $data->tanggal_posting = $request->tanggal_posting;
        $data->tanggal_berakhir = $request->tanggal_berakhir;
        $data->deskripsi = $request->deskripsi;
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images'), $fileName);
            $data->foto = $fileName;
        }
        $data->save();
        $request->session()->flash('success', 'Data berhasil ditambahkan');
        return redirect('/tampil-lomba');
    }

    public function edit($id){
        $data = Lomba::find($id);
        return view('admin.edit_lomba', compact('data'));
    }

    public function update(Request $request, $id){
        $data = Lomba::find($id);
        $data->nama_lomba = $request->nama_lomba;
        $data->tingkat_lomba = $request->tingkat_lomba;
        $data->tanggal_posting = $request->tanggal_posting;
        $data->tanggal_berakhir = $request->tanggal_berakhir;
        $data->deskripsi = $request->deskripsi;
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images'), $fileName);
            $data->foto = $fileName;
        } else {
            $data->foto = $data->foto;
        }
        $data->update();
        $request->session()->flash('success', 'Data berhasil diubah');
        return redirect('/tampil-lomba');
    }

    public function destroy(Request $request, $id){
        $data = Lomba::find($id);
        if(!$data) {
            $request->session()->flash('success', 'Data tidak ditemukan.');
            return redirect('/tampil-lomba');
        }
        $data->delete();
        $request->session()->flash('success', 'Data berhasil dihapus');
        return redirect('/tampil-lomba');
    }

    public function read($id){
        $data = Lomba::find($id);
    
        if (!$data) {
            return redirect('/tampil-lomba')->with('error', 'Data tidak ditemukan!');
        }
    
        return view('admin.view_lomba', compact('data'));
    }
    
    public function exportExcelLomba(){
        return Excel::download(new exportExcelLomba, 'HasilLomba.xlsx');
    }

    public function widgetJumlahLomba()
    {
        $jumlahLomba = Lomba::count(); 
        dd($jumlahLomba);
        return view('home.index', compact('jumlahLomba'));
    }

    // mahasiswa
    public function lombaMahasiswa(Request $request){
        $search = $request->get('search');
        $lomba = new Lomba();

        if(!empty($search)){
            $lombaAll = $lomba->where('nama_lomba', 'like', '%'. $search . '%')->get();
        }else{
            $lombaAll = $lomba->all();
        }
        return view('mahasiswa.lomba', compact('lombaAll'));
    }

    public function show(Request $request, $id){
        if(empty($id)){ return redirect()->back(); }
        $lomba = new Lomba();
        $lombaDetail = $lomba->where('id', '=', $id)->first();
        return view('mahasiswa.lombaDetail', compact('lombaDetail'));
    }


}


