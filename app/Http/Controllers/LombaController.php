<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lomba;
use App\Exports\ExportExcelProduk;
use Maatwebsite\Excel\Facades\Excel;

class LombaController extends Controller
{
    //
    public function index(){
        $data = Lomba::all();
        return view('lomba.index', ['dataLomba' => $data]);
    }

    public function create(){
        return view('lomba.create');
    }

    public function store(Request $request){

        $message= [
            'required' => ':attribute tidak boleh kosong',
            'unique' => ':attribute sudah digunakan',
            'numeric' => ':attribute harus berupa angka',
        ];

        $this->validate($request, [
            'id' => 'required|unique:lomba'
        ], $message);
        $data = new Lomba();
        $data->id = $request->id;
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
        return redirect('/tampil-lomba')->with('success','Data berhasil disimpan!');
    }

    public function edit($id){
        $data = Lomba::find($id);
        return view('lomba.edit', compact('data'));
    }

    public function update(Request $request, $id){
        $data = Lomba::find($id);
        $data->nama_lomba = $request->nama_lomba;
        $data->tingkat_lomba = $request->tingkat_lomba;
        $data->tanggal_posting = $request->tanggal_posting;
        $data->tanggal_berakhir = $request->tanggal_berakhir;
        $data->deskripsi = $request->deskripsi;
        if ($request->hasFile('foto')) {
            // Jika ada berkas yang diunggah, proses berkas baru
            $file = $request->file('foto');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images'), $fileName);
            $data->foto = $fileName;
        } else {
            // Jika tidak ada berkas yang diunggah, gunakan foto yang sudah ada
            $data->foto = $data->foto;
        }
        $data->update();
        return redirect('/tampil-lomba')->with('success','Data berhasil diubah!');
    }

    public function destroy($id){
        $data = Lomba::find($id);
        $data->delete();
        return redirect('/tampil-lomba')->with('success','Data berhasil dihapus!');
    }

    public function read($id){
        $data = Lomba::find($id);
    
        if (!$data) {
            return redirect('/tampil-lomba')->with('error', 'Data tidak ditemukan!');
        }
    
        return view('lomba.read', compact('data'));
    }
    
    public function exportExcelProduk(){
        return Excel::download(new exportExcelProduk, 'HasilProduk.xlsx');
    }

}
