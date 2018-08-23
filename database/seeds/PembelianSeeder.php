<?php

use Illuminate\Database\Seeder;

class PembelianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('pembelians')->insert([
           [
            'barang' => 'Sherlock Holmes Series',
            'jumlah' => 15,
            'harga' => 45000,
            'supplier' => 'Gramedia',
            'status' => 1
           ],[
            'barang' => str_random(15),
            'jumlah' => 11,
            'harga' => 50000,
            'supplier' => str_random(10),
            'status' => 1
           ]
       ]);
    }
}
