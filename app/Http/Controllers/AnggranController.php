<?php

namespace App\Http\Controllers;

use App\Models\Rab;
use Illuminate\Http\Request;

class AnggranController extends Controller
{
    public function index()
    {
        $rabs = Rab::all();
        return view('dashboard.admin.rab.index', compact('rabs'));
    }
}
