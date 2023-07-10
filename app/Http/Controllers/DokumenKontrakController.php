<?php

namespace App\Http\Controllers;

use App\Models\DokumenKontrak;
use App\Models\Proyek;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Str;

class DokumenKontrakController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proyeks = Proyek::all();
        $kontraks = DokumenKontrak::all();
        return view('dashboard.laporan.tampilan.laporan_kontrak', compact('kontraks', 'proyeks'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'proyek' => 'required',
            'dokumen' => 'required'
        ]);

        $kontrak = new DokumenKontrak();
        $kontrak->proyek_id = $request->proyek;
        $dokumen = $request->file('dokumen');
        $filename = time() . '.' . $dokumen->getClientOriginalExtension();

        $path = $dokumen->storeAs('public/kontrak', $filename);
        $url = Storage::url($path);

        $kontrak->dokumen = $url;
        $kontrak->save();

        Alert::toast('Berhasil upload dokumen kontrak', 'success');
        return back();
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'proyek' => 'required',
        ]);

        $kontrak = DokumenKontrak::findOrFail($id);
        // cek jika terdapat dokument dokumen baru
        if ($request->file('dokumen')) {
            // jika ada maka hapus ddokumen lama
            Storage::disk('public')->delete(Str::after($kontrak->dokumen, 'storage/'));

            // buat upload dokuemn baru
            $dokumen = $request->file('dokumen');
            $filename = time() . '.' . $dokumen->getClientOriginalExtension();

            $path = $dokumen->storeAs('public/kontrak', $filename);
            $url = Storage::url($path);

            $kontrak->update([
                'proye_id' => $request->proyek,
                'dokumen' => $url
            ]);
        } else {
            $kontrak->update([
                'proye_id' => $request->proyek,
            ]);
        }

        Alert::toast('Berhasil ubah bukti tagihan', 'success');
        return back();
    }

    public function destroy($id)
    {
        $kontrak = DokumenKontrak::findOrFail($id);
        Storage::disk('public')->delete(Str::after($kontrak->dokumen, 'storage/'));
        $kontrak->delete();

        Alert::toast('Berhasil menghapus dokumen kontrak', 'success');
        return back();
    }
}
