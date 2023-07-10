<?php

namespace App\Http\Controllers;

use App\Models\Desain;
use App\Models\Proyek;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Str;

class DesainController extends Controller
{
    public function index()
    {
        $proyeks = Proyek::all();
        $desains = Desain::all();
        return view('dashboard.admin.ded.index', compact('desains', 'proyeks'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'proyek' => 'required',
            'gambar_desain' => 'required|image|max:5120',
        ]);

        $gambar = $request->file('gambar_desain');
        $filename = time() . '.' . $gambar->getClientOriginalExtension();

        $path = $gambar->storeAs('public/photo', $filename);
        $url = Storage::url($path);

        $desain = new Desain();
        $desain->proyek_id = $request->proyek;
        $desain->gambar_desain = $url;
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
