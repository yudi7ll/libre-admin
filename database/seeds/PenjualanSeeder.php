<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

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
                'tanggal_jual' => Carbon::now(),
                'harga' => 20000,
                'jumlah' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],[
                'buku' => 'Computer',
                'tanggal_jual' => Carbon::now(),
                'harga' => 24000,
                'jumlah' => 5,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],[
                'buku' => str_random(10),
                'tanggal_jual' => Carbon::now(),
                'harga' => 100000,
                'jumlah' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ]);
    }
}
