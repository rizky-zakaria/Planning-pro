<?php

namespace App\Http\Controllers;

use App\Models\Proyek;
use App\Models\Rab;
use App\Models\Uraian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function admin()
    {
        $proyeks = Proyek::latest()->get();
        $uraians = Uraian::latest()->get();

        $anggaranProyek = [];
        foreach ($proyeks as $proyek) {
            $ap = 0;
            foreach ($proyek->uraians as $uraian) {
                $ap += $uraian['total_biaya'];
            }
            $anggaranProyek[] = $ap;
        }

        return view('dashboard.admin.dashboard', compact([
            'proyeks',
            'uraians',
            'anggaranProyek'
        ]));
    }

    public function bos()
    {
        return view('dashboard.bos.dashboard');
    }
}
