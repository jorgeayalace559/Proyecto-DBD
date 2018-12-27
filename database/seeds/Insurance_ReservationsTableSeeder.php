<?php

use Illuminate\Database\Seeder;

class Insurance_ReservationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        factory(App\Insurance_Reservation::class, 5)->create()->make();
    
    }
}
