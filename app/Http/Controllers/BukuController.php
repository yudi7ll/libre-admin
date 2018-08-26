<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Buku;
use App\Genre;
use DB;


class BukuController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
      $this->middleware('auth');
    }


    // daftar buku
    public function index($order = 'id', $dir = 'asc')
    {
      
      $bukus = Buku::all();
      return view('buku/buku', compact('bukus'));

    }


    // tambah data buku
    public function tambah(Request $request)
    {
      
      // if tambah submitted
      if($request->has('tambahbuku')){

        // validate data
        Buku::validateBuku($request);

        // insert into database
        Buku::create(request([
          'judul',
          'penulis',
          'penerbit',
          'tahun_terbit',
          'jumlah',
          'genre',
          'harga',
        ]));
        return redirect('buku')->with('messages', ['success', 'Done!', 'Data buku telah berhasil disimpan']);
        
      }else{

        // if not yet submitted
        // get data genre
        $genre = Genre::get();
        
        return view('buku/tambah_buku', ['genres' => $genre]);

      }

    }


    // edit buku view
    public function edit($id)
    {
      // find buku with id $id
      $buku = Buku::where('id', $id)->first();

      // get data genre
      $genre = DB::table('genres')->get();

      return view('buku/edit_buku', [
                                      'buku' => $buku, 
                                      'genres' => $genre
                                    ]);
    }


    // edit action
    public function update(Request $request)
    {
      // validate request
      Buku::validateBuku($request);

      // update current request
      $buku = Buku::where('id', $request->id);
      // update database
      $buku->update(request([
        'judul',
        'penulis',
        'penerbit',
        'tahun_terbit',
        'jumlah',
        'genre',
        'harga'
      ]));

      return redirect('buku')->with('messages', ['success', 'Done! ', 'Buku telah berhasil diedit.']);
    }
    

    public function destroy($id)
    {
      $buku = Buku::find($id)->delete();
      return redirect('buku')->with('messages', ['danger', 'Deleted!', 'Data telah terhapus']);
    }
}
