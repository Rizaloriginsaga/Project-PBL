<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Prestasi;
use App\Models\Mahasiswa;
use App\Exports\ExportExcelPrestasi;
use Maatwebsite\Excel\Facades\Excel;

class PrestasiController extends Controller
{
    public function index(){
        $query = Prestasi::query();
        $tanggal = request('tanggal');
    
        if ($tanggal) {
            $query->whereDate('tahun_pengeluaran', $tanggal);
        }
    
        $data = $query->get();
    
        return view('admin.idx_prestasi', [
            'dataPrestasi' => $data,
            'tanggal' => $tanggal,
        ]);
    }

    public function create(){
        return view('admin.create_prestasi');
    }

    public function store(Request $request)
    {
        if ($request->is('create_prestasi')) {
            $rules['dokumen'] = 'required';
        }
        $data = new Prestasi();
        $data->id_prestasi = $request->idPrestasi;
        $data->nim = $request->nim;
        $data->nama_prestasi = $request->namaPrestasi;
        if ($request->hasFile('dokumen')) {
            $file = $request->file('dokumen');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images'), $fileName);
            $data->dokumen = $fileName;
        }
        $data->tingkat_prestasi = $request->tingkatPrestasi;
        $data->tahun_pengeluaran = $request->tahunPengeluaran;
        $data->tahun_angkatan = $request->tahunAngkatan;
        $data->jenis_sertifikat = $request->jenisSertifikat;
        $data->save();
        $request->session()->flash('success', 'Data berhasil Ditambahkan');
        return redirect('/tampil-prestasi');
    }

    public function edit($id){
        $data = Prestasi::find($id);
        return view('admin\edit_prestasi', compact('data'));
    }

    public function update(Request $request, $id){
        if ($request->is('create_prestasi')) {
            $rules['dokumen'] = 'required';
        }
        $data = Prestasi::find($id);
        $data->id_prestasi = $request->idPrestasi;
        $data->nim = $request->nim;
        $data->nama_prestasi = $request->namaPrestasi;
        if ($request->hasFile('dokumen')) {
            $file = $request->file('dokumen');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images'), $fileName);
            $data->dokumen = $fileName;
        } else {
            $data->dokumen = $data->dokumen;
        }
        $data->tingkat_prestasi = $request->tingkatPrestasi;
        $data->tahun_pengeluaran = $request->tahunPengeluaran;
        $data->tahun_angkatan = $request->tahunAngkatan;
        $data->jenis_sertifikat = $request->jenisSertifikat;
        $data->update();
        $request->session()->flash('success', 'Data berhasil diubah');
        return redirect('/tampil-prestasi');
    }

    public function verify(){
        $data = Prestasi::all();
        return view('admin.verify_prestasi',['dataPrestasi' => $data]);
    }

    public function verifikasi(Request $request, $id)
    {
        $data = Prestasi::findOrFail($id);
        $data->status_verifikasi = true;
        $data->save();
        $request->session()->flash('success', 'Data berhasil diverifikasi');
        return redirect()->back();
    }
    
    public function unverifikasi(Request $request, $id)
    {
        $data = Prestasi::findOrFail($id);
        $data->status_verifikasi = false;
        $data->save();
        $request->session()->flash('success', 'Data berhasil diunverifikasi');
        return redirect()->back();
    }

    public function view($id){
        $data = Prestasi::find($id);
        return view('admin\view_prestasi', compact('data'));
    }

    public function destroy(Request $request, $id_prestasi){
        $data = Prestasi::find($id_prestasi);
        if(!$data) {
            $request->session()->flash('success', 'Data tidak ditemukan.');
            return redirect('/tampil-prestasi');
        }
        $request->session()->flash('success', 'Data berhasil dihapus');
        $data->delete();
        return redirect('/tampil-prestasi');
    }

    public function exportExcelPrestasi(){
        return Excel::download(new exportExcelPrestasi, 'DataPrestasi.xlsx');
    }

    public function checkNimExists(Request $request)
    {
        $nim = $request->nim;
        $exists = Mahasiswa::where('nim', $nim)->exists();
        return response()->json(['exists' => $exists]);
    }
    public function autofillData(Request $request)
    {
        $nim = $request->input('nim');

        $data = Mahasiswa::where('nim', $nim)->first();

        if ($data) {
            return response()->json([
                'nama' => $data->nama,
                'tahunAngkatan' => $data->tahun_angkatan,
            ]);
        }
        return response()->json(null);
    }
}
