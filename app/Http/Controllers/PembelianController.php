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
        $data = Pembelian::all();
        return view('pembelian.pembelian', ['pembelians' => $data]);
    }

    public function tambah(Request $request)
    {
        if($request->has('tambahpembelian')){
            // validate data
            Pembelian::validatePembelian($request);
            
            // insert into database
            Pembelian::create(request([
                'barang',
                'jumlah',
                'harga',
                'supplier',
                'status'
            ]));

            return redirect('pembelian')->with('messages', ['success', 'Done!', 'Data pembelian berhasil ditambahkan!.']);
        }else{
            return view('pembelian.tambah_pembelian');
        }
    }

    /**
     * Display data for edit
     */

    public function edit($id)
    {
        $pembelian = Pembelian::where('id', $id)->first();
        return view('pembelian.edit_pembelian', ['pembelian' => $pembelian]);
    }

    /**
     * Store into database
     */
    public function update(Request $request, $id)
    {
        if($request->has('editpembelian')){
            // validate request
            Pembelian::validatePembelian($request);

            // store into database
            Pembelian::find($id)->update(request([
                'barang',
                'jumlah',
                'harga',
                'supplier',
                'status'
            ]));
            return redirect('pembelian')->with('messages', ['success', 'Done!', 'Berhasil edit data pembelian!.']);
        }
    }

    /**
     * Delete
     */
    public function destroy($id)
    {
        Pembelian::find($id)->delete();
        return redirect()->route('pembelian')->with('messages', ['danger', 'Deleted!', 'Data pembelian terhapus!.']);
    }
}
