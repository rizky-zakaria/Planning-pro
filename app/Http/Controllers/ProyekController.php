<?php

namespace App\Http\Controllers;

use App\Models\Projek;
use App\Models\Proyek;
use Illuminate\Http\Request;

class ProyekController extends Controller
{
    public function index()
    {
        $proyeks = Proyek::all();
        return view('dashboard.admin.proyek.index', compact('proyeks'));
    }
}
