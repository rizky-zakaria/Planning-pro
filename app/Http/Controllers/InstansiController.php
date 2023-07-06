<?php

namespace App\Http\Controllers;

use App\Models\Instansi;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class InstansiController extends Controller
{
    public function index()
    {
        $instansis = Instansi::all();
        return view('dashboard.admin.instansi.index', compact('instansis'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_instansi' => 'required',
            'program_instansi' => 'required',
            'kegiatan_instansi' => 'required',
            'lokasi_instansi' => 'required',
            'tujuan_proyek' => 'required',
            'tahun_anggaran' => 'required',
        ]);

        $instansi = new Instansi();
        $instansi->nama_instansi = $request->nama_instansi;
        $instansi->program_instansi = $request->program_instansi;
        $instansi->kegiatan_instansi = $request->kegiatan_instansi;
        $instansi->lokasi_instansi = $request->lokasi_instansi;
        $instansi->tujuan_proyek = $request->tujuan_proyek;
        $instansi->tahun_anggaran = $request->tahun_anggaran;
        $instansi->save();

        Alert::toast('Berhasil menambahkan instansi', 'success');
        return back();
    }

    public function update(Request $request, Instansi $instansi)
    {
        $this->validate($request, [
            'nama_instansi' => 'required',
            'program_instansi' => 'required',
            'kegiatan_instansi' => 'required',
            'lokasi_instansi' => 'required',
            'tujuan_proyek' => 'required',
            'tahun_anggaran' => 'required',
        ]);

        $instansi->update([
            'nama_instansi' => $request->nama_instansi,
            'program_instansi' => $request->program_instansi,
            'kegiatan_instansi' => $request->kegiatan_instansi,
            'lokasi_instansi' => $request->lokasi_instansi,
            'tujuan_proyek' => $request->tujuan_proyek,
            'tahun_anggaran' => $request->tahun_anggaran,
        ]);
        Alert::toast('Berhasil ubah data instansi', 'success');
        return back();
    }

    public function destroy(Instansi $instansi)
    {
        $instansi->delete();
        Alert::toast('Berhasil hapus intansi', 'success');
        return back();
    }
}
