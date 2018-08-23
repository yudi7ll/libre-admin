<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pembelian;
use DB;

class PembelianController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    // return data pembelian
    public function index()
    {
        $data = Pembelian::get();
        return view('pembelian.pembelian', ['pembelians' => $data]);
    }

    public function tambah(Request $request)
    {
        if($request->has('tambahpembelian')){
            // validate data
            $request->validate([
                'barang' => 'required',
                'jumlah' => 'required|integer',
                'harga' => 'required',
                'supplier' => 'string|required',
                'status' => 'integer|required'
            ]);

            // insert into database
            $pembelian = new Pembelian;
            $pembelian->barang = $request->barang;
            $pembelian->jumlah = $request->jumlah;
            $pembelian->harga = $request->harga;
            $pembelian->supplier = $request->supplier;
            $pembelian->status = $request->status;
            $pembelian->save();

            return redirect('pembelian')->with('messages', ['success', 'Done!', 'Data pembelian berhasil ditambahkan!.']);
        }else{
            return view('pembelian.tambah_pembelian');
        }
    }

    public function edit($id)
    {
        $pembelians = Pembelian::where('id', $id)->get();
        foreach($pembelians as $pembelian);
        return view('pembelian.edit_pembelian', ['pembelian' => $pembelian]);
    }

    public function update(Request $request, $id)
    {
        if($request->has('editpembelian')){
            // validate request
            $request->validate([
                'barang' => 'required',
                'jumlah' => 'required|integer',
                'harga' => 'required',
                'supplier' => 'string|required',
                'status' => 'integer|required'
            ]);

            $pembelian = Pembelian::where('id', $id);
            $pembelian->update([
                'barang' => $request->barang,
                'jumlah' => $request->jumlah,
                'harga' => $request->harga,
                'supplier' => $request->supplier,
                'status' => $request->status,
            ]);
            return redirect('pembelian')->with('messages', ['success', 'Done!', 'Berhasil edit data pembelian!.']);
        }
        
    }
}
