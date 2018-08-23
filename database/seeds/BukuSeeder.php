<?php

use Illuminate\Database\Seeder;

class BukuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bukus')->insert([
            'judul' => str_random(10),
            'penulis' => str_random(10),
            'penerbit' => str_random(10),
            'tahun_terbit' => date('Y'),
            'jumlah' => 20,
            'genre' => 'IPA',
            'harga' => 154000
        ]);
    }
}
