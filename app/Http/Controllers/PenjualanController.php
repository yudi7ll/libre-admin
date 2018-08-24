<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Penjualan;
use App\Buku;
use Carbon\Carbon;

class PenjualanController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $penjualans = Penjualan::get();
        return view('penjualan.penjualan', compact('penjualans'));
    }

    public function tambah(Request $request)
    {
        // ketika submit diklik
        if($request->has('tambahpenjualan')){
            // validate request
            $request->validate([
                'buku' => 'required',
                'harga' => 'required|integer',
                'jumlah' => 'required'
            ]);
            
            // simpan ke database
            $penjualan = new Penjualan;
            $penjualan->buku = $request->buku;
            $penjualan->harga = $request->harga;
            $penjualan->jumlah = $request->jumlah;
            $penjualan->tanggal_jual = Carbon::now();
            $penjualan->save();
            
            return redirect('penjualan')->with('messages', ['success', 'Done!', 'Data Penjualan Berhasil Disimpan.']);
        }else{
            // parsing buku untuk genre
            $buku = Buku::get();
            return view('penjualan/tambah_penjualan', ['bukus' => $buku]);
        }
    }

    /**
     * Display for edit
     */
    public function edit($id)
    {
        $penjualan = Penjualan::where('id', $id)->first();
        return view('penjualan.edit_penjualan', compact('penjualan'));
    }

    /**
     * Storing into database
     */
    public function update(Request $request, $id)
    {
         // validate request
         $request->validate([
            'buku' => 'required',
            'tanggal_jual' => 'required',
            'jumlah' => 'required|string|max:5',
            'harga' => 'required'
        ]);

        $penjualan = Penjualan::where('id', $id);
        $penjualan->update([
            'buku' => $request->buku,
            'tanggal_jual' => $request->tanggal_jual,
            'jumlah' => $request->jumlah,
            'harga' => $request->harga
        ]);

        return redirect('penjualan')->with('messages', ['success', 'Done!', 'Data berhasil diperbaharui.']);
    }

    public function destroy($id)
    {
        Penjualan::where('id', $id)->delete();
        return redirect('penjualan')->with('messages', ['danger', 'Deleted!', 'Data telah terhapus!.']);
    }
}
