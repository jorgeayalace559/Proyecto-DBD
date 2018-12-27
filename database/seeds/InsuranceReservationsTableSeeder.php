<?php

use Illuminate\Database\Seeder;

class InsuranceReservationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        factory(App\InsuranceReservation::class, 5)->create()->make();
    
    }
}
