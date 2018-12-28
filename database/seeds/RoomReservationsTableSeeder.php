<?php

use Illuminate\Database\Seeder;
use App\RoomReservation;

class RoomReservationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\RoomReservation::class, 50)->create();
    }
}
