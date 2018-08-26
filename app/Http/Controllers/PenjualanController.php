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
            Penjualan::validatePenjualan($request);
            
            // simpan ke database
            Penjualan::create(request([
                'buku',
                'jumlah',
                'tanggal_jual',
                'harga'
            ]));
            
            return redirect('penjualan')->with('messages', ['success', 'Done!', 'Data Penjualan Berhasil Disimpan.']);
        }else{
            // parsing buku untuk buku
            $buku = Buku::all();
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
     * Update the database
     */
    public function update(Request $request, $id)
    {
        // validate request
        Penjualan::validatePenjualan($request);

        // update the database
        Penjualan::find($id)->update(request([
            'buku',
            'tanggal_jual',
            'jumlah',
            'harga'
       ]));

        return redirect('penjualan')->with('messages', ['success', 'Done!', 'Data berhasil diperbaharui.']);
    }

    public function destroy($id)
    {
        Penjualan::where('id', $id)->delete();
        return redirect('penjualan')->with('messages', ['danger', 'Deleted!', 'Data telah terhapus!.']);
    }
}
