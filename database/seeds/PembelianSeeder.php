<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

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
            'status' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
           ],[
            'barang' => str_random(15),
            'jumlah' => 11,
            'harga' => 50000,
            'supplier' => str_random(10),
            'status' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
           ]
       ]);
    }
}
