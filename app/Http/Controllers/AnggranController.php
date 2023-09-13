<?php

namespace App\Http\Controllers;

use App\Models\Proyek;
use App\Models\Rab;
use App\Models\Uraian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class AnggranController extends Controller
{
    public function index(Request $request)
    {
        // $rabs = Rab::all();
        $uraians = Uraian::all();

        $proyeks = Proyek::all();
        $selectedProyek = $request->input('proyek');

        // Lakukan logika filtering sesuai dengan nilai $selectedProyek
        if ($selectedProyek && $selectedProyek !== 'all') {
            $proyeks = Proyek::where('id', $selectedProyek)->get();
            $uraians = [];
            foreach ($proyeks as $proyek) {
                $uraians = $proyek->uraians;
            }
        }
        return view('dashboard.admin.rab.index', compact('uraians', 'proyeks', 'selectedProyek'));
    }

    public function store(Request $request)
    {
        $rules = [
            'uraian_id' => 'required',
            'nama_item' => 'required',
            'harga_satuan' => 'required',
            'volume' => 'required',
            'satuan' => 'required',
        ];

        $validator = Validator::make(
            $request->all(),
            $rules
        );

        if ($validator->fails()) {
            // toast('Data yang anda masukan bermasalah', 'warning');
            Alert::warning('Data tidak valid, mohon masukan data yang valid!');
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }


        $anggaran = new Rab();
        $anggaran->uraian_id = $request->uraian_id;
        $anggaran->nama_item = $request->nama_item;
        $anggaran->harga_satuan = $request->harga_satuan;
        $anggaran->volume = $request->volume;
        $anggaran->satuan = $request->satuan;
        $anggaran->harga_total_per_item = ($request->volume * $request->harga_satuan);
        $anggaran->save();

        $uraian = Uraian::findOrFail($request->uraian_id);
        $uraian->update([
            'total_biaya' => $uraian->total_biaya + $anggaran->harga_total_per_item,
        ]);

        Alert::toast('Berhasil tambah detail anggaran', 'success');
        return back();
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'uraian_id' => 'required',
            'nama_item' => 'required',
            'harga_satuan' => 'required',
            'volume' => 'required',
            'satuan' => 'required',
        ];

        $validator = Validator::make(
            $request->all(),
            $rules
        );

        if ($validator->fails()) {
            // toast('Data yang anda masukan bermasalah', 'warning');
            Alert::warning('Data tidak valid, mohon masukan data yang valid!');
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }


        // get data anggaran yang akan di ubah
        $anggaran = Rab::findOrFail($id);
        // cek kalau anggaran merubah uraian_id sama dengan yang sekarang atau berbeda
        // jika sama
        if ($anggaran->uraian_id == $request->uraian_id) {
            // get data uraian
            $uraian = Uraian::where('id', $anggaran->uraian_id)->first();
            // kurangkan total_biaya sebelumnya dengan anggaran sekarang
            $uraian->update([
                'total_biaya' => $uraian->total_biaya - $anggaran->harga_total_per_item,
            ]);

            // update data anggaran atau rabnya
            $anggaran->update([
                'nama_item' => $request->nama_item,
                'harga_satuan' => $request->harga_satuan,
                'volume' => $request->volume,
                'satuan' => $request->satuan,
                'harga_total_per_item' => ($request->volume * $request->harga_satuan),
            ]);


            $uraian->update([
                'total_biaya' => $uraian->total_biaya + $anggaran->harga_total_per_item,
            ]);
        } else {

            // Hapus atau kurang nilai pada uraian sebelumnya atau uraian awalnya
            $uraianAwal = Uraian::where('id', $anggaran->uraian_id)->first();
            $uraianAwal->update([
                'total_biaya' => $uraianAwal->total_biaya - $anggaran->harga_total_per_item,
            ]);

            // kemudian update data anggaran beserta uraiannya.

            $anggaran->update([
                'uraian_id' => $request->uraian_id,
                'nama_item' => $request->nama_item,
                'harga_satuan' => $request->harga_satuan,
                'volume' => $request->volume,
                'satuan' => $request->satuan,
                'harga_total_per_item' => ($request->volume * $request->harga_satuan),
            ]);

            // panggil uraian dengan uraian yang baru
            $uraianDipilih = Uraian::where('id', $request->uraian_id)->first();
            // kemudian tambahkan datanya pada uraian baru.
            $uraianDipilih->update([
                'total_biaya' => $uraianDipilih->total_biaya + ($request->volume * $request->harga_satuan),
            ]);
        }

        Alert::toast('Berhasil ubah data anggaran', 'success');
        return back();
    }

    public function destroy($id)
    {
        $anggaran = Rab::findOrFail($id);
        $anggaran->delete();

        $uraian = Uraian::where('id', $anggaran->uraian_id)->first();
        $uraian->update([
            'total_biaya' => $uraian->total_biaya - $anggaran->harga_total_per_item,
        ]);

        Alert::toast('Berhasil hapus anggaran');
        return back();
    }
}
