<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function admin()
    {
        $user = Auth::user();
        return view('dashboard.admin.index', compact('user'));
    }

    public function bos()
    {
        $user = Auth::user();
        return view('dashboard.bos.index', compact('user'));
    }
}
