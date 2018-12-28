<?php

use Illuminate\Database\Seeder;
use App\TicketReservation;

class TicketReservationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\TicketReservation::class, 50)->create();
	
    }
}
