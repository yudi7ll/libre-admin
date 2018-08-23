<?php

use Illuminate\Database\Seeder;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('genres')->insert([
          ['genre' => 'Computer'],
          ['genre' => 'IPA'],
          ['genre' => 'IPS'],
          ['genre' => 'Matematika'],
          ['genre' => 'Fiksi'],
          ['genre' => 'Komik'],
          ['genre' => 'Action'],
          ['genre' => 'Religion'],
          ['genre' => 'Enginer'],
        ]);
    }
}
