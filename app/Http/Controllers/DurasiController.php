<?php

namespace App\Http\Controllers;

use App\Models\Durasi;
use App\Models\Instansi;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class DurasiController extends Controller
{
    public function index()
    {
        $instansis = Instansi::all();
        $durasis = Durasi::all();
        return view('dashboard.admin.durasi.index', compact('durasis', 'instansis'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'instansi' => 'required',
            'lama_pengerjaan' => 'required',
            'tanggal_mulai' => 'required',
            'tanggal_selesai' => 'required',
            'dokumen_spmk' => 'required|mimes:pdf',
        ]);

        $durasi = new Durasi();
        $durasi->instansi_id = $request->instansi;
        $durasi->lama_pengerjaan = $request->lama_pengerjaan;
        $durasi->tanggal_mulai = $request->tanggal_mulai;
        $durasi->tanggal_selesai = $request->tanggal_selesai;
        $durasi->keterangan = $request->keterangan;

        $dokumen = $request->file('dokumen_spmk');
        $filename = time() . '.' . $dokumen->getClientOriginalExtension();

        $path = $dokumen->storeAs('public/kontrak', $filename);
        $url = Storage::url($path);

        $durasi->dokumen_spmk = $url;
        $durasi->save();

        Alert::toast('Berhasil tambah waktu pelaksanaan', 'success');
        return back();
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'instansi' => 'required',
            'lama_pengerjaan' => 'required',
            'tanggal_mulai' => 'required',
            'tanggal_selesai' => 'required',
            'dokumen_spmk' => 'mimes:pdf',
        ]);

        $durasi = Durasi::findOrFail($id);
        // cek jika terdapat dokument dokumen baru
        if ($request->file('dokumen_spmk')) {

            // jika ada maka hapus ddokumen lama
            Storage::disk('public')->delete(Str::after($durasi->dokumen_spmk, 'storage/'));

            // buat upload dokuemn baru
            $dokumen = $request->file('dokumen_spmk');
            $filename = time() . '.' . $dokumen->getClientOriginalExtension();

            $path = $dokumen->storeAs('public/kontrak', $filename);
            $url = Storage::url($path);

            $durasi->update([
                'instansi_id' => $request->instansi,
                'lama_pengerjaan' => $request->lama_pengerjaan,
                'tanggal_mulai' => $request->tanggal_mulai,
                'tanggal_selesai' => $request->tanggal_selesai,
                'keterangan' => $request->keterangan,
                'dokumen_spmk' => $url,
            ]);
        } else {
            $durasi->update([
                'instansi_id' => $request->instansi,
                'lama_pengerjaan' => $request->lama_pengerjaan,
                'tanggal_mulai' => $request->tanggal_mulai,
                'tanggal_selesai' => $request->tanggal_selesai,
                'keterangan' => $request->keterangan,
            ]);
        }

        Alert::toast('Berhasil ubah waktu pelaksanaan', 'success');
        return back();
    }

    public function destroy($id)
    {
        $durasi = Durasi::findOrFail($id);
        Storage::disk('public')->delete(Str::after($durasi->dokumen_spmk, 'storage/'));
        $durasi->delete();

        Alert::toast('Berhasil menghapus waktu pelaksanaan', 'success');
        return back();
    }
}
