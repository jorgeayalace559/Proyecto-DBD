<?php

use Illuminate\Database\Seeder;
use App\InsuranceReservation;

class InsuranceReservationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        factory(App\InsuranceReservation::class, 50)->create();
    
    }
}
