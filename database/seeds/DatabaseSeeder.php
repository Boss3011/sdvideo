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
         $this->call([
             Users::class,
             Categories::class,
             Myvideos::class,
             Tags::class,
             Videos::class,
             Comments::class
            ]);
    }
}
