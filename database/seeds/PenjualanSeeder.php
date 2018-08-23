<?php

use Illuminate\Database\Seeder;

class PenjualanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('penjualans')->insert([
            [   
                'buku' => 'IPA',
                'tanggal_jual' => date('Y-m-d H:i:s'),
                'harga' => 20000,
                'jumlah' => 1
            ],[
                'buku' => 'Computer',
                'tanggal_jual' => date('Y-m-d H:i:s'),
                'harga' => 24000,
                'jumlah' => 5
            ],[
                'buku' => str_random(10),
                'tanggal_jual' => date('Y-m-d H:i:s'),
                'harga' => 100000,
                'jumlah' => 1
            ]
        ]);
    }
}
