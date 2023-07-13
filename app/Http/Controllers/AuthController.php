<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function storeLogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            $role = auth()->user()->role;
            if ($role == 'admin') {
                Alert::toast('Berhasil Login', 'success');
                return redirect("admin/dashboard");
            } elseif ($role == 'direktur') {
                Alert::toast('Berhasil Login', 'success');
                return redirect("direktur/dashboard");
            } elseif ($role == 'estimator') {
                Alert::toast('Berhasil Login', 'success');
                return redirect("estimator/dashboard");
            } elseif ($role == 'draftek') {
                Alert::toast('Berhasil Login', 'success');
                return redirect("draftek/dashboard");
            } else {
                Alert::toast('Berhasil Login', 'success');
                return redirect('home');
            }
        }

        Alert::toast('Username atau Password Salah', 'error');
        return back()->with('status', 'Username atau Password salah');
    }

    public function logout()
    {
        Auth::logout();
        Alert::toast('Berhasil Logout', 'success');
        return redirect()->route('home');
    }
}
