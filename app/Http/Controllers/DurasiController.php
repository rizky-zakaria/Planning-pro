<?php

namespace App\Http\Controllers;

use App\Models\Durasi;
use Illuminate\Http\Request;

class DurasiController extends Controller
{
    public function index()
    {
        $durasis = Durasi::all();
        return view('dashboard.admin.durasi.index', compact('durasis'));
    }
}
