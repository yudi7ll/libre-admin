<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('home');
});

Auth::routes();

Route::group(['middleware' => 'auth'], function(){
  // dashboard
  Route::get('/home', 'HomeController@index')->name('home');
  
  // buku
  Route::get('/buku', 'BukuController@index')->name('buku');
  Route::get('/buku/show/{id}', 'BukuController@show')->name('buku.show');
  Route::get('/buku/tambah', 'BukuController@tambah')->name('tambahbuku');
  Route::post('/buku/tambah', 'BukuController@tambah')->name('tambahbuku');
  Route::get('/buku/edit/{id}', 'BukuController@edit')->name('buku.edit');
  Route::put('/buku/update/{data}', 'BukuController@update')->name('buku.update');  
  Route::delete('/buku/delete/{id}', 'BukuController@destroy')->name('buku.delete');
  Route::get('/editbuku/{$id}', 'BukuController@edit')->name('editbuku');

  // penjualan
  Route::get('/penjualan', 'PenjualanController@index')->name('penjualan');
  Route::get('/penjualan/edit/{id}', 'PenjualanController@edit')->name('penjualan.edit');
  Route::put('/penjualan/update/{id}', 'PenjualanController@update')->name('penjualan.update');
  Route::get('/penjualan/tambah', 'PenjualanController@tambah')->name('penjualan.tambah');
  Route::post('/penjualan/tambah', 'PenjualanController@tambah')->name('penjualan.tambah');
  Route::delete('/penjualan/delete/{id}', 'PenjualanController@destroy')->name('penjualan.delete');
  

  // pembelian
  Route::get('/pembelian', 'PembelianController@index')->name('pembelian');
  Route::get('/pembelian/hutang', 'PembelianController@index')->name('pembelian.hutang');
  Route::get('/pembelian/tambah', 'PembelianController@tambah')->name('pembelian.tambah');
  Route::post('/pembelian/tambah', 'PembelianController@tambah')->name('pembelian.tambah');
  Route::delete('/pembelian/delete/{id}', 'PembelianController@destroy')->name('pembelian.delete');
  Route::get('/pembelian/edit/{id}', 'PembelianController@edit')->name('pembelian.edit');
  Route::put('/pembelian/update/{id}', 'PembelianController@update')->name('pembelian.update');
  
  // staff
  Route::get('/staff/profile', 'StaffController@profile')->name('staff.profile');
  Route::resource('/staff', 'StaffController')->except(['show']);
  
  // return login page
  Route::get('/logout', 'HomeController@logout')->name('logout'); 
}
);
