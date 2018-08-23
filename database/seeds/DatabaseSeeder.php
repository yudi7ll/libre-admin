<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([GenreSeeder::class]);
        for($i = 0; $i < 200; $i++){
            $this->call(BukuSeeder::class);
            $this->call(PenjualanSeeder::class);
            $this->call(PembelianSeeder::class);
        }
    }
}
