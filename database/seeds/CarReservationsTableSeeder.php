<?php

use Illuminate\Database\Seeder;
use App\CarReservation;

class CarReservationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\CarReservation::class, 50)->create();
    }
}
