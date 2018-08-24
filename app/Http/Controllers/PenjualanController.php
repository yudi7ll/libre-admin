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

    public function edit($id)
    {
        $penjualan = Penjualan::find($id)->get();
        return view('penjualan.edit_penjualan', compact('penjualan'));
    }

    public function update()
    {

    }

    public function destroy($id)
    {
        Penjualan::where('id', $id)->delete();
        return redirect('penjualan')->with('messages', ['danger', 'Deleted!', 'Data telah terhapus!.']);
    }
}
