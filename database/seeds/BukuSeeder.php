<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

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
            [
                'judul' => 'In Search of Lost Time',
                'penulis' => 'Miguel de Cervantes',
                'penerbit' => title_case(str_random(10)),
                'tahun_terbit' => Carbon::now()->format('Y'),
                'jumlah' => rand(1, 100),
                'genre' => array_random(['IPS', 'IPA', 'Computer', 'Fiksi', 'Komik', 'Matematika', 'Action', 'Religion', 'Enginer']),
                'harga' => rand(10000, 500000),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],[
                'judul' => 'Don Quixote',
                'penulis' => 'James Joyce',
                'penerbit' => title_case(str_random(10)),
                'tahun_terbit' => Carbon::now()->format('Y'),
                'jumlah' => rand(1, 100),
                'genre' => array_random(['IPS', 'IPA', 'Computer', 'Fiksi', 'Komik', 'Matematika', 'Action', 'Religion', 'Enginer']),
                'harga' => rand(10000, 500000),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],[
                'judul' => 'Ulysses',
                'penulis' => 'F. Scott Fitzgerald',
                'penerbit' => title_case(str_random(10)),
                'tahun_terbit' => Carbon::now()->format('Y'),
                'jumlah' => rand(1, 100),
                'genre' => array_random(['IPS', 'IPA', 'Computer', 'Fiksi', 'Komik', 'Matematika', 'Action', 'Religion', 'Enginer']),
                'harga' => rand(10000, 500000),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ]);
    }
}
