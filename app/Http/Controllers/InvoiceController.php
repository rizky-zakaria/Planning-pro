<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Proyek;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Str;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $invoices = Invoice::all();
        $proyeks = Proyek::all();
        return view('dashboard.laporan.tampilan.laporan_invoice', compact('invoices', 'proyeks'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'proyek' => 'required',
            'tanggal' => 'required',
            'invoice' => 'required'
        ]);

        $invoice = new Invoice();
        $invoice->proyek_id = $request->proyek;
        $invoice->status = 'Diajukan';
        $invoice->tanggal = date($request->tanggal);

        $tagihan = $request->file('invoice');
        $filename = time() . '.' . $tagihan->getClientOriginalExtension();

        $path = $tagihan->storeAs('public/invoice', $filename);
        $url = Storage::url($path);

        $invoice->invoice = $url;
        $invoice->save();

        Alert::toast('Berhasil upload bukti tagihan', 'success');
        return back();
    }

    public function show($id)
    {
        $invoice = Invoice::findOrFail($id);
        $invoice->update([
            'status' => 'Dibayarkan',
        ]);
        Alert::toast('Tagihan telah dibayarkan', 'success');
        return redirect()->route('invoice.index');
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'proyek' => 'required',
            'tanggal' => 'required',
        ]);

        $invoice = Invoice::findOrFail($id);
        // cek jika terdapat dokument invoice baru
        if ($request->file('invoice')) {
            // jika ada maka hapus invoice lama
            Storage::disk('public')->delete(Str::after($invoice->invoice, 'storage/'));

            // buat upload invoice baru
            $tagihan = $request->file('invoice');
            $filename = time() . '.' . $tagihan->getClientOriginalExtension();

            $path = $tagihan->storeAs('public/invoice', $filename);
            $url = Storage::url($path);

            $invoice->update([
                'proye_id' => $request->proyek,
                'tanggal' => $request->tanggal,
                'invoice' => $url
            ]);
        } else {
            $invoice->update([
                'proye_id' => $request->proyek,
                'tanggal' => $request->tanggal,
            ]);
        }

        Alert::toast('Berhasil ubah bukti tagihan', 'success');
        return back();
    }

    public function destroy($id)
    {
        $invoice = Invoice::findOrFail($id);
        Storage::disk('public')->delete(Str::after($invoice->invoice, 'storage/'));
        $invoice->delete();

        Alert::toast('Berhasil menghapus invoice', 'success');
        return back();
    }
}
