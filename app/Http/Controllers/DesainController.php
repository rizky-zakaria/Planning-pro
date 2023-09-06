<?php

namespace App\Http\Controllers;

use App\Models\Desain;
use App\Models\Instansi;
use App\Models\Proyek;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Str;

class DesainController extends Controller
{
    public function index()
    {
        $proyeks = Proyek::join('instansis', 'instansis.id', '=', 'proyeks.instansi_id')
            ->get(['proyeks.*', 'instansis.nama_instansi']);
        $desains = Desain::all();
        $instansi = Instansi::all();
        return view('dashboard.admin.ded.index', compact('desains', 'proyeks', 'instansi'));
    }

    public function getProyek($id)
    {
        $proyek = Proyek::where('instansi_id', $id)->get();
        if ($proyek) {
            return response()->json([
                'status' => true,
                'message' => 'berhasil mendapatkan data',
                'data' => $proyek
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'gagal mendapatkan data'
            ]);
        }
    }

    public function store(Request $request)
    {
        $rules = [
            'instansi' => 'required',
            'proyek' => 'required',
            'ded' => 'required|max:5120|mimes:pdf,png,jpeg,jpg',
        ];

        $validator = Validator::make(
            $request->all(),
            $rules
        );

        if ($validator->fails()) {
            toast('Data yang anda masukan bermasalah', 'warning');
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }


        $file = $request->file('ded');
        $filename = time() . '.' . $file->getClientOriginalExtension();

        $path = $file->storeAs('public/ded', $filename);
        $url = Storage::url($path);

        $desain = new Desain();
        $desain->proyek_id = $request->proyek;
        $desain->ded = $url;
        $desain->save();

        Alert::toast('Berhasil tambah desain perencanaan', 'success');
        return back();
    }

    public function destroy($id)
    {
        $desain = Desain::findOrFail($id);
        Storage::disk('public')->delete(Str::after($desain->gambar_desain, 'storage/'));
        $desain->delete();

        Alert::toast('Berhasil menghapus desain perancangan', 'success');
        return back();
    }
}
