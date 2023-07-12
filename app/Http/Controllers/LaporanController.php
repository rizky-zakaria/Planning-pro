<?php

namespace App\Http\Controllers;

use App\Models\Instansi;
use App\Models\Proyek;
use App\Models\Uraian;
use Barryvdh\DomPDF\Facade\Pdf;
// use PDF;
// use Barryvdh\DomPDF\PDF as PDFLAIN;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function laporanRab(Request $request)
    {
        $proyeks = Proyek::all();
        $selectedProyek = $request->input('proyek');

        // Lakukan logika filtering sesuai dengan nilai $selectedProyek
        if ($selectedProyek && $selectedProyek !== 'all') {
            $proyeks = Proyek::where('id', $selectedProyek)->get();
        }

        return view('dashboard.laporan.tampilan.laporan_rab', compact('proyeks', 'selectedProyek'));
    }

    public function cetakLaporanRab(Request $request)
    {
        $selectedProyek = $request->input('proyek');

        // Lakukan logika filtering sesuai dengan nilai $selectedProyek
        if ($selectedProyek && $selectedProyek !== 'all') {
            $proyeks = Proyek::where('id', $selectedProyek)->first();
            $instansis = Instansi::where('id', $proyeks['id'])->get();
        } else {
            $proyeks = Proyek::all();
            $instansis = Instansi::all();
        }

        $pdf = Pdf::loadView('dashboard.laporan.cetak.print_rab', compact('proyeks', 'instansis'))->setPaper('A4', 'potrait');
        return $pdf->stream('laporan_rab_proyek');
    }

    public function laporanProyek(Request $request)
    {
        $proyeks = Proyek::all();
        $selectedProyek = $request->input('proyek');

        // Lakukan logika filtering sesuai dengan nilai $selectedProyek
        if ($selectedProyek && $selectedProyek !== 'all') {
            $proyeks = Proyek::where('id', $selectedProyek)->get();
        }


        return view('dashboard.laporan.tampilan.laporan_proyek', compact('proyeks', 'selectedProyek'));
    }

    public function cetekLaporanProyek(Request $request)
    {
        $selectedProyek = $request->input('proyek');

        // Lakukan logika filtering sesuai dengan nilai $selectedProyek
        if ($selectedProyek && $selectedProyek !== 'all') {
            $proyeks = Proyek::where('id', $selectedProyek)->first();
            $instansis = Instansi::where('id', $proyeks['id'])->get();
        } else {
            $proyeks = Proyek::all();
            $instansis = Instansi::all();
        }

        $pdf = Pdf::loadView('dashboard.laporan.cetak.print_proyek', compact('proyeks', 'instansis'))->setPaper('A4', 'potrait');
        return $pdf->stream('laporan_data_proyek');
    }
}
