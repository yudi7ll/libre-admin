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
      $buku = new Buku;
      $buku = $buku->orderby($order, $dir);
      return view('buku/buku', ['bukus' => $buku->get(), 'sort' => 1]);
    }

    // tambah data buku
    public function tambah(Request $request)
    {
      // if tambah submitted
      if($request->has('tambahbuku')){
        // validate data
        $request->validate([
          'judul' => 'required|max:200',
          'penulis' => 'max:100',
          'penerbit' => 'max:100',
          'tahun_terbit' => 'integer|required',
          'jumlah' => 'integer|required',
          'genre' => 'required',
          'harga' => 'required',
        ]);
        // insert into database
        $buku = new Buku;
        $buku->judul = $request->judul;
        $buku->penulis = $request->penulis;
        $buku->penerbit = $request->penerbit;
        $buku->tahun_terbit = $request->tahun_terbit;
        $buku->jumlah = $request->jumlah;
        $buku->genre = $request->genre;
        $buku->harga = $request->harga;
        $buku->save();
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
      $buku = Buku::where('id', $id)->get();
      foreach($buku as $book);

      // get data genre
      $genre = DB::table('genres')->get();

      return view('buku/edit_buku', [
                                      'buku' => $book, 
                                      'genres' => $genre
                                    ]);
    }

    // edit action
    public function update(Request $data)
    {
      // validate data
      $data->genre == 0 ? $data->genre = NULL : '';
      $data->validate([
        'judul' => 'required|max:200',
        'penulis' => 'max:100',
        'penerbit' => 'max:100',
        'jumlah' => 'integer|required',
        'genre' => 'required',
        'harga' => 'required',
      ]);

      // update current data
      $buku = Buku::where('id', $data->id);
      $buku->update([
        'judul' => $data->judul,
        'penulis' => $data->penulis,
        'penerbit' => $data->penerbit,
        'tahun_terbit' => $data->tahun_terbit,
        'jumlah' => $data->jumlah,
        'genre' => $data->genre,
        'harga' => $data->harga,
      ]);

      return redirect('buku')->with('messages', ['success', 'Done! ', 'Buku telah berhasil diedit.']);
    }
    
    public function destroy($id)
    {
      $buku = Buku::find($id)->delete();
      return redirect('buku')->with('messages', ['danger', 'Deleted!', 'Data telah terhapus']);
    }
}
