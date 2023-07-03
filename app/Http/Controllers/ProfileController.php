<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Str;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('dashboard.profile.index', compact('user'));
    }

    public function updatePhoto(Request $request)
    {
        $request->validate([
            'photo' => 'required|image|max:5120',
        ]);

        $photo = $request->file('photo');
        $filename = time() . '.' . $photo->getClientOriginalExtension();

        $path = $photo->storeAs('public/photo', $filename);
        $url = Storage::url($path);

        $user = User::findOrFail(auth()->user()->id);
        if ($user->photo_profile) {
            Storage::disk('public')->delete(Str::after($user->photo_profile, 'storage/'));
        }

        $user->update([
            'photo_profile' => $url,
        ]);

        Alert::toast('Berhaisl Upload Profile', 'success');
        return back();
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        // dd($request->all());
        $this->validate($request, [
            'nama_depan' => 'required',
            'nama_belakang' => 'required',
            'nomor_telepon' => 'required',
            'alamat' => 'required',
            'email' => 'required',
        ]);

        $user->update([
            'nama_depan' => $request->nama_depan,
            'nama_belakang' => $request->nama_belakang,
            'nomor_telepon' => $request->nomor_telepon,
            'alamat' => $request->alamat,
            'email' => $request->email,
            // 'password' => Hash::make($request->password),
            'nama_lengkap' => trim($request->nama_depan . ' ' . $request->nama_belakang),
        ]);

        // Logout dan login kembali untuk memperbarui sesi dengan email yang diperbarui
        Auth::logout();
        Auth::login($user);

        Alert::toast('Berhasil Ubah Data', 'success');
        return redirect()->route('profile.index');
    }
}
