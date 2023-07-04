<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function admin()
    {
        return view('dashboard.admin.dashboard');
    }

    public function bos()
    {
        return view('dashboard.bos.dashboard');
    }
}
