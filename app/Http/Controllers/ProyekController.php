<?php

namespace App\Http\Controllers;

use App\Models\Instansi;
use App\Models\Projek;
use App\Models\Proyek;
use App\Models\Uraian;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class ProyekController extends Controller
{
    public function index(Request $request)
    {
        // $proyeks = Proyek::all();
        // $instansis = Instansi::all();

        $proyeks = Proyek::all();
        $instansis = Instansi::all();

        $selectedInstansi = $request->input('instansi');

        // Lakukan logika filtering sesuai dengan nilai $selectedProyek
        if ($selectedInstansi && $selectedInstansi !== 'all') {
            $instansis = Instansi::where('id', $selectedInstansi)->get();
            $proyeks = [];
            foreach ($instansis as $instansi) {
                $proyeks = $instansi->proyeks;
            }
        }

        return view('dashboard.admin.proyek.index', compact('proyeks', 'instansis', 'selectedInstansi'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'instansi_id' => 'required',
            'nama_proyek' => 'required',
            'uraian' => 'required',
        ]);

        $proyek = new Proyek();
        $proyek->instansi_id = $request->instansi_id;
        $proyek->nama_proyek = $request->nama_proyek;
        $proyek->user_id = Auth::user()->id;
        $proyek->save();

        foreach ($request->uraian as $data) {
            $uraian = new Uraian();
            $uraian->proyek_id = $proyek->id;
            $uraian->nama_uraian = $data;
            $uraian->save();
        }


        Alert::toast('Berhasil tambah proyek', 'success');
        return back();
    }

    public function show($id)
    {
        $proyek = Proyek::findOrFail($id);
        $totalBiaya = 0;
        foreach ($proyek->uraians as $uraian) {
            if ($uraian['total_biaya'] != null) {
                $totalBiaya += $uraian['total_biaya'];
            }
        }


        return view('dashboard.admin.proyek.detail', compact('proyek', 'totalBiaya'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama_proyek' => 'required',
        ]);

        $proyek = Proyek::findOrFail($id);
        $proyek->update([
            'nama_proyek' => $request->nama_proyek,
        ]);

        Alert::toast('Berhasil ubah proyek', 'success');
        return back();
    }

    public function destroy(Proyek $proyek)
    {
        $proyek->delete();
        Alert::toast('Berhasil menghapus proyek dan lainnya', 'success');
        return back();
    }

    // KODE UNTUK URAIAN
    public function tambahUraian(Request $request, $id)
    {
        $proyek = Proyek::findOrFail($id);
        $this->validate($request, [
            'nama_uraian' => 'required',
        ]);

        $uraian = new Uraian();
        $uraian->proyek_id = $proyek->id;
        $uraian->nama_uraian = $request->nama_uraian;
        $uraian->save();

        Alert::toast('Berhasil tambah uraian', 'success');
        return back();
    }

    public function ubahUraian(Request $request, $id)
    {
        $this->validate($request, [
            'nama_uraian' => 'required',
        ]);

        $uraian = Uraian::findOrFail($id);
        $uraian->update([
            'nama_uraian' => $request->nama_uraian,
        ]);

        Alert::toast('Berhasil ubah uraian', 'success');
        return back();
    }

    public function hapusUraian($id)
    {
        $uraian = Uraian::findOrFail($id);
        $uraian->delete();
        Alert::toast('Berhasil hapus uraian', 'success');
        return back();
    }
}
