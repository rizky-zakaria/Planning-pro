<?php

namespace App\Http\Controllers;

use App\Models\Projek;
use App\Models\Proyek;
use App\Models\Uraian;
use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ProyekController extends Controller
{
    public function index()
    {
        $proyeks = Proyek::all();
        return view('dashboard.admin.proyek.index', compact('proyeks'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_proyek' => 'required',
            'uraian' => 'required',
        ]);

        $proyek = new Proyek();
        $proyek->nama_proyek = $request->nama_proyek;
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

        return view('dashboard.admin.proyek.detail', compact('proyek'));
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
}
