<?php

namespace App\Http\Controllers;

use App\Models\Instansi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Str;

class InstansiController extends Controller
{
    public function index()
    {
        $instansis = Instansi::all();
        return view('dashboard.admin.instansi.index', compact('instansis'));
    }

    public function store(Request $request)
    {
        $validasi = $this->validate($request, [
            'nama_instansi' => 'required',
            'program_instansi' => 'required',
            'kegiatan_instansi' => 'required',
            'lokasi_instansi' => 'required',
            'tujuan_proyek' => 'required',
            'tahun_anggaran' => 'required',
            'dokumen_spk' => 'required|mimes:pdf',
        ]);

        $instansi = new Instansi();
        $instansi->nama_instansi = $request->nama_instansi;
        $instansi->program_instansi = $request->program_instansi;
        $instansi->kegiatan_instansi = $request->kegiatan_instansi;
        $instansi->lokasi_instansi = $request->lokasi_instansi;
        $instansi->tujuan_proyek = $request->tujuan_proyek;
        $instansi->tahun_anggaran = $request->tahun_anggaran;

        $dokumen = $request->file('dokumen_spk');
        $filename = time() . '.' . $dokumen->getClientOriginalExtension();

        $path = $dokumen->storeAs('public/kontrak', $filename);
        $url = Storage::url($path);

        $instansi->dokumen_spk = $url;
        $instansi->save();

        Alert::toast('Berhasil menambahkan instansi', 'success');
        return back();
    }

    public function update(Request $request, Instansi $instansi)
    {
        // dd($request->all());
        $this->validate($request, [
            'nama_instansi' => 'required',
            'program_instansi' => 'required',
            'kegiatan_instansi' => 'required',
            'lokasi_instansi' => 'required',
            'tujuan_proyek' => 'required',
            'tahun_anggaran' => 'required',
            'dokumen_spk' => 'mimes:pdf',
        ]);

        if ($request->file('dokumen_spk')) {
            // jika ada maka hapus ddokumen lama
            if ($instansi->dokumen_spk != null) {
                Storage::disk('public')->delete(Str::after($instansi->dokumen_spk, 'storage/'));
            }

            // buat upload dokuemn baru
            $dokumen = $request->file('dokumen_spk');
            $filename = time() . '.' . $dokumen->getClientOriginalExtension();

            $path = $dokumen->storeAs('public/kontrak', $filename);
            $url = Storage::url($path);

            $instansi->update([
                'nama_instansi' => $request->nama_instansi,
                'program_instansi' => $request->program_instansi,
                'kegiatan_instansi' => $request->kegiatan_instansi,
                'lokasi_instansi' => $request->lokasi_instansi,
                'tujuan_proyek' => $request->tujuan_proyek,
                'tahun_anggaran' => $request->tahun_anggaran,
                'dokumen_spk' => $url,
            ]);
        } else {

            $instansi->update([
                'nama_instansi' => $request->nama_instansi,
                'program_instansi' => $request->program_instansi,
                'kegiatan_instansi' => $request->kegiatan_instansi,
                'lokasi_instansi' => $request->lokasi_instansi,
                'tujuan_proyek' => $request->tujuan_proyek,
                'tahun_anggaran' => $request->tahun_anggaran,
            ]);
        }
        Alert::toast('Berhasil ubah data instansi', 'success');
        return back();
    }

    public function destroy(Instansi $instansi)
    {
        Storage::disk('public')->delete(Str::after($instansi->dokumen_spk, 'storage/'));
        $instansi->delete();
        Alert::toast('Berhasil hapus intansi', 'success');
        return back();
    }
}
