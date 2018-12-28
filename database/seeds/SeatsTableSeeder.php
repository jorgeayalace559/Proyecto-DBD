<?php

use Illuminate\Database\Seeder;
use App\Seat;

class SeatsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Seat::class,50)->create();

    }
}
