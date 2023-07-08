<?php

namespace App\Http\Controllers;

use App\Models\Instansi;
use App\Models\Proyek;
use App\Models\Uraian;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function laporanRab()
    {
        $uraians = Uraian::all();
        return view('dashboard.laporan.tampilan.laporan_rab', compact('uraians'));
    }

    public function cetakLaporanRab()
    {
    }

    public function laporanProyek(Request $request)
    {
        $instansis = Instansi::all();
        $pilihInstansi = $request->input('instansi');

        if ($pilihInstansi && $pilihInstansi !== 'all') {
            $instansis = Instansi::where('id', $pilihInstansi)->get();
        }


        $proyeks = Proyek::all();
        $selectedProyek = $request->input('proyek');

        // Lakukan logika filtering sesuai dengan nilai $selectedProyek
        if ($selectedProyek && $selectedProyek !== 'all') {
            $proyeks = Proyek::where('id', $selectedProyek)->get();
        }


        return view('dashboard.laporan.tampilan.laporan_proyek', compact('instansis', 'pilihInstansi', 'proyeks', 'selectedProyek'));
    }

    public function cetekLaporanProyek(Request $request)
    {
        $selectedProyek = $request->input('proyek');

        // Lakukan logika filtering sesuai dengan nilai $selectedProyek
        if ($selectedProyek && $selectedProyek !== 'all') {
            $proyeks = Proyek::where('id', $selectedProyek)->get();
            foreach ($proyeks as $proyek) {
                $instansi = $proyek->instansi;
            }
        } else {
            $proyeks = Proyek::all();
        }

        // Logika cetak PDF atau cetak ke printer sesuai kebutuhan Anda

        $pdf = Pdf::loadview('dashboard.laporan.cetak.print_proyek', compact('proyeks', 'instansi'))->setPaper('A4', 'potrait');
        return $pdf->stream();
    }
}
