<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Proyek;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
